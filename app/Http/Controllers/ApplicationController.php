<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicationType;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApplicationRequest;
use App\Models\EducationLevelPenelitians;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        // DB::enableQueryLog();
        $applications = Application::with(['user', 'applicant', 'type'])->where('id_user', $id_user)->orderBy('status_permohonan', 'ASC')->orderBy('created_at', 'DESC')->get();
        $data = Applicant::with(['user', 'education'])->findOrFail($id_user);
        // dd(DB::getQueryLog());
        $timenow = Carbon::now()->toDateTimeString();
        return view(
            'pages.permohonan.index',
            [
                'applications' => $applications,
                'timenow' => $timenow,
                'data' => $data,
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ApplicationType::all();
        return view('pages.permohonan.create', [
            'types' => $types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        $surat = $request->file('file_pengantar')->getClientOriginalName();
        $name_surat_original = pathinfo($surat, PATHINFO_FILENAME);
        $proposal = $request->file('file_proposal')->getClientOriginalName();
        $name_proposal_original = pathinfo($proposal, PATHINFO_FILENAME);
        $surat_pengantar_enc = md5(sha1(bcrypt(Auth::user()->id . '' . $request->file('file_pengantar'))));
        $proposal_penelitian_enc = md5(sha1(bcrypt(Auth::user()->id . '' . $request->file('file_proposal'))));
        $file_ext_surat = $request->file('file_pengantar')->guessExtension();
        $file_ext_proposal = $request->file('file_proposal')->guessExtension();
        $file_pengantar =  $request->file('file_pengantar')->storeAs(
            'assets/upload/file/surat-pengantar',
            $name_surat_original . '-' . $surat_pengantar_enc . '.' . $file_ext_surat,
            'public'
        );
        $file_proposal = $request->file('file_proposal')->storeAs(
            'assets/upload/file/proposal',
            $name_proposal_original . '-' . $proposal_penelitian_enc . '.' . $file_ext_proposal,
            'public'
        );
        $data = [
            'kode_permohonan' => 'A1',
            'id_user' => Auth::user()->id,
            'id_applicant' => '1',
            'jenis_permohonan' => $request->jenis_permohonan,
            'keperluan' => $request->keperluan_pemohon,
            'judul_rencana_penelitian' => $request->judul_penelitian,
            'waktu_awal' => Carbon::createFromFormat('d/m/Y', $request->waktu_awal)->format('Y-m-d'),
            'waktu_akhir' => Carbon::createFromFormat('d/m/Y', $request->waktu_akhir)->format('Y-m-d'),
            'file_surat_pemohon'     => $file_pengantar,
            'file_proposal_pemohon'     => $file_proposal,
            'status_permohonan' => 'Kirim',
            'update_waktu_status' => Carbon::now()->format('Y-m-d h:i:s'),

        ];
        // dd($data);
        Application::create($data);
        return redirect()->route('permohonan.index')->with(['success' => 'Permohonan berhasil dikirim!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = ApplicationType::all();
        $app = Application::with(['applicant', 'user', 'type'])->findOrFail($id);
        // dd($app);
        return view('pages.permohonan.edit', [
            'types' => $types,
            'app' => $app,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function sanggah($id)
    {
        echo 'Sanggah View';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Application::findOrFail($id);

        if ($data->delete() == true)
            return redirect()->route('permohonan.index')->with(['success' => 'Data berhasil dihapus!']);
        else {
            return redirect()->route('permohonan.index')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}