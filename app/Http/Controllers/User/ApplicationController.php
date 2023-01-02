<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\LogSurat;
use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Support\Arr;
use App\Models\LokasiTujuan;
use Illuminate\Http\Request;
use App\Models\AddOnApplicant;
use App\Models\ApplicationType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Dd;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->isAuthorized();
    }

    public function isAuthorized()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role == 'CS') {
                return redirect()->route('cs.dashboard');
            } else if (Auth::user()->role == 'KABID') {
                return redirect()->route('kabid.dashboard');
            } else if (Auth::user()->role == 'KASI') {
                return redirect()->route('kasi.dashboard');
            } else if (Auth::user()->role == 'PETUGAS') {
                return redirect()->route('petugas.dashboard');
            } else if (Auth::user()->role == 'SUPERADMIN') {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->role == 'USER') {
                return $next($request);
            }
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $applications = Application::with(['type', 'logsuratone'])->where('id_user', $id_user)->orderByRaw('tanggal_permohonan DESC')->latest()->get();
        $logsurat = Application::with(['logsuratmany'])->where('id_user', $id_user)->orderByRaw('tanggal_permohonan DESC')->get();
        $data = Applicant::where('id_user', $id_user)->with(['user'])->first();
        $timenow = Carbon::now()->toDateTimeString();
        return view(
            'pages.user.permohonan.index',
            [
                'applications' => $applications,
                'timenow' => $timenow,
                'data' => $data,
                'logsurats' => $logsurat,
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
        $type = ApplicationType::all();
        $lokasi = LokasiTujuan::all()->sortBy('lokasi_tujuan');
        $id_user = Auth::user()->id;
        $data = Applicant::where('id_user', $id_user)->with(['user'])->first();
        if ($data->id_user != null) {
            return view('pages.user.permohonan.create', [
                'types' => $type,
                'data' => $data,
                'lokasis' => $lokasi
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_permohonan' => ['required'],
            'no_surat' => ['required', 'min:5', 'max:255', 'string'],
            'asal_surat' => ['required', 'min:5', 'max:255', 'string'],
            'lokasi_penelitian' => ['required'],
            'tgl_surat' => ['required'],
            'keperluan_pemohon' => ['required', 'min:5'],
            'judul_penelitian' => ['required', 'min:5'],
            'waktu_awal' => ['required'],
            'waktu_akhir' => ['required'],
            'file_pengantar'     => ['required', 'file', 'mimes:pdf', 'max:712'],
            'file_proposal'     => ['file', 'mimes:pdf', 'max:3072']
        ], [
            'jenis_permohonan.required' => 'Jenis Permohonan Wajib dipilih',
            'no_surat.required' => 'Nomor Surat Wajib diisi',
            'no_surat.min' => 'Nomor Surat berisi mainimal 5 karakter',
            'no_surat.max' => 'Nomor Surat berisi maksimal 255 karakter',
            'asal_surat.required' => 'Asal Surat Wajib diisi',
            'asal_surat.min' => 'Asal Surat berisi mainimal 5 karakter',
            'asal_surat.max' => 'Asal Surat berisi maksimal 255 karakter',
            'lokasi_penelitian.required' => 'Lokasi Wajib diisi',
            'tgl_surat.required' => 'Tanggal Surat Wajib diisi',
            'keperluan_pemohon.required' => 'Keperluan atau Jenis Data Permohonan Wajib diisi',
            'keperluan_pemohon.min' => 'Keperluan atau Jenis Data Permohonan berisi minimal 5 karakter',
            'judul_penelitian.required' => 'Rencana Judul Penelitian Wajib diisi',
            'judul_penelitian.min' => 'Rencana Judul Penelitian berisi minimal 5 karakter',
            'waktu_awal.required' => 'Tanggal Awal Pelaksanaan  Wajib diisi',
            'waktu_akhir.required' => 'Tanggal Akhir Pelaksanaan Wajib diisi',
            'file_pengantar.required' => 'File Surat Permohonan Wajib diisi',
            'file_pengantar.file' => 'File Surat Permohonan harus berupa file',
            'file_pengantar.mimes' => 'File Surat Permohonan harus berupa file berformat pdf',
            'file_pengantar.max' => 'File Surat Permohonan harus tidak boleh lebih dari 700 KB',
            'file_proposal.file' => 'File Proposal harus berupa file',
            'file_proposal.mimes' => 'File Proposal harus berupa file berformat pdf',
            'file_proposal.max' => 'File Proposal harus tidak boleh lebih dari 3 MB',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->getMessageBag()->all()[0])->withInput();
        } else {
            $surat = $request->file('file_pengantar')->getClientOriginalName();
            $name_surat_original = pathinfo($surat, PATHINFO_FILENAME);
            $surat_pengantar_enc = md5(sha1(bcrypt(Auth::user()->id . '' . $request->file('file_pengantar'))));
            $file_ext_surat = $request->file('file_pengantar')->guessExtension();
            $file_pengantar =  $request->file('file_pengantar')->storeAs(
                'assets/upload/file/surat-pengantar',
                $name_surat_original . '-' . $surat_pengantar_enc . '.' . $file_ext_surat,
                'public'
            );

            $proposal = $request->file('file_proposal')->getClientOriginalName();
            $name_proposal_original = pathinfo($proposal, PATHINFO_FILENAME);
            $proposal_penelitian_enc = md5(sha1(bcrypt(Auth::user()->id . '' . $request->file('file_proposal'))));
            $file_ext_proposal = $request->file('file_proposal')->guessExtension();
            $file_proposal = $request->file('file_proposal')->storeAs(
                'assets/upload/file/proposal',
                $name_proposal_original . '-' . $proposal_penelitian_enc . '.' . $file_ext_proposal,
                'public'
            );
            $data = [
                'kode_permohonan' => kodepermohonan(),
                'id_user' => Auth::user()->id,
                'id_applicant' => $request->applicant,
                'jenis_permohonan' => $request->jenis_permohonan,
                'no_surat' => $request->no_surat,
                'asal_surat' => $request->asal_surat,
                'lokasi_tujuan' => json_encode($request->lokasi_penelitian),
                'tgl_surat' => Carbon::createFromFormat('d/m/Y', $request->tgl_surat)->format('Y-m-d'),
                'keperluan' => $request->keperluan_pemohon,
                'judul_atau_data' => $request->judul_penelitian,
                'tgl_awal' => Carbon::createFromFormat('d/m/Y', $request->waktu_awal)->format('Y-m-d'),
                'tgl_akhir' => Carbon::createFromFormat('d/m/Y', $request->waktu_akhir)->format('Y-m-d'),
                'tanggal_permohonan' => Carbon::now()->format('Y-m-d H:i:s'),
                'file_surat_pemohon'     => $file_pengantar,
                'file_proposal_pemohon'     => $file_proposal,
            ];
            $log = [
                'status_surat' => 'kirim',
                'update_oleh' => Auth::user()->id,
                'update_waktu' => Carbon::now()->format('Y-m-d H:i:s'),
                'role' => Auth::user()->role,
            ];
            $app = Application::create($data);
            $appData = [];
            foreach ($request->dataApplicants as $applicant) {
                $appData[] = new AddOnApplicant($applicant);
            }
            $logsurat = [new LogSurat($log)];
            $app->logsuratmany()->saveMany($logsurat);
            $app->addonapplicant()->saveMany($appData);
            return redirect()->route('permohonan.index')->with(['success' => 'Permohonan berhasil dikirim!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $types = ApplicationType::all();
        $data = Application::with(['applicant', 'user', 'type', 'addonapplicant'])->findOrFail(Crypt::decrypt($id));
        $lokasi = LokasiTujuan::all()->sortBy('lokasi_tujuan');
        return view('pages.user.permohonan.show', [
            'types' => $types,
            'data' => $data,
            'lokasis' => $lokasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applications = Application::with(['logsuratone', 'applicant', 'user'])->where('id_application', $id)->first();
        if ($applications->id_user == Auth::user()->id) {
            if ($applications->logsuratone->status_surat == 'kirim' or $applications->logsuratone->status_surat == 'ubah') {
                $types = ApplicationType::all();
                $app = Application::with(['applicant', 'type'])->findOrFail($id);
                return view('pages.user.permohonan.edit', [
                    'types' => $types,
                    'app' => $app,
                ]);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $item = Application::findOrFail($id);
        if (Storage::disk('local')->exists('public/' . $item->file_surat_pemohon) || Storage::disk('local')->exists('public/' . $item->file_proposal_pemohon)) {
            $validator = Validator::make(
                $request->all(),
                [
                    'jenis_permohonan' => 'required',
                    'keperluan_pemohon' => 'required|min:5',
                    'judul_penelitian' => 'required|min:5',
                    'waktu_awal' => 'required',
                    'waktu_akhir' => 'required',
                    'file_pengantar'     => 'file|mimes:pdf,jpg,png,jpeg|max:712',
                    'file_proposal'     => 'file|mimes:pdf,jpg,png,jpeg|max:2048'
                ],
                [
                    'jenis_permohonan.required' => 'Jenis Permohonan Wajib dipilih',
                    'no_surat.required' => 'Nomor Surat Wajib diisi',
                    'no_surat.min' => 'Nomor Surat berisi mainimal 5 karakter',
                    'no_surat.max' => 'Nomor Surat berisi maksimal 255 karakter',
                    'asal_surat.required' => 'Asal Surat Wajib diisi',
                    'asal_surat.min' => 'Asal Surat berisi mainimal 5 karakter',
                    'asal_surat.max' => 'Asal Surat berisi maksimal 255 karakter',
                    'lokasi_penelitian.required' => 'Lokasi Wajib diisi',
                    'tgl_surat.required' => 'Tanggal Surat Wajib diisi',
                    'keperluan_pemohon.required' => 'Keperluan atau jenis data Permohonan Wajib diisi',
                    'keperluan_pemohon.min' => 'Keperluan atau jenis data Permohonan berisi minimal 5 karakter',
                    'judul_penelitian.required' => 'Rencana Judul Penelitian Wajib diisi',
                    'judul_penelitian.min' => 'Rencana Judul Penelitian berisi minimal 5 karakter',
                    'waktu_awal.required' => 'Tanggal Awal Pelaksanaan  Wajib diisi',
                    'waktu_akhir.required' => 'Tanggal Akhir Pelaksanaan Wajib diisi',
                    // 'file_pengantar.required' => 'File Surat Permohonan Wajib diisi',
                    'file_pengantar.file' => 'File Surat Permohonan harus berupa file',
                    'file_pengantar.mimes' => 'File Surat Permohonan harus berupa file berformat pdf',
                    'file_pengantar.max' => 'File Surat Permohonan harus tidak boleh lebih dari 700 KB',
                    'file_proposal.file' => 'File Proposal harus berupa file',
                    'file_proposal.mimes' => 'File Proposal harus berupa file berformat pdf',
                    'file_proposal.max' => 'File Proposal harus tidak boleh lebih dari 3 MB',
                ]
            );
        } else {
            $validator = Validator::make($request->all(), [
                'jenis_permohonan' => 'required',
                'keperluan_pemohon' => 'required|min:5',
                'judul_penelitian' => 'required|min:5',
                'waktu_awal' => 'required',
                'waktu_akhir' => 'required',
                'file_pengantar'     => 'required|file|mimes:pdf|max:712',
                'file_proposal'     => 'file|mimes:pdf|max:2048'
            ], [
                [
                    'jenis_permohonan.required' => 'Jenis Permohonan Wajib dipilih',
                    'no_surat.required' => 'Nomor Surat Wajib diisi',
                    'no_surat.min' => 'Nomor Surat berisi mainimal 5 karakter',
                    'no_surat.max' => 'Nomor Surat berisi maksimal 255 karakter',
                    'asal_surat.required' => 'Asal Surat Wajib diisi',
                    'asal_surat.min' => 'Asal Surat berisi mainimal 5 karakter',
                    'asal_surat.max' => 'Asal Surat berisi maksimal 255 karakter',
                    'lokasi_penelitian.required' => 'Lokasi Wajib diisi',
                    'tgl_surat.required' => 'Tanggal Surat Wajib diisi',
                    'keperluan_pemohon.required' => 'Keperluan atau jenis data Permohonan Wajib diisi',
                    'keperluan_pemohon.min' => 'Keperluan atau jenis data Permohonan berisi minimal 5 karakter',
                    'judul_penelitian.required' => 'Rencana Judul Penelitian Wajib diisi',
                    'judul_penelitian.min' => 'Rencana Judul Penelitian berisi minimal 5 karakter',
                    'waktu_awal.required' => 'Tanggal Awal Pelaksanaan  Wajib diisi',
                    'waktu_akhir.required' => 'Tanggal Akhir Pelaksanaan Wajib diisi',
                    'file_pengantar.required' => 'File Surat Pengantar Wajib diisi',
                    'file_pengantar.file' => 'File Surat Permohonan harus berupa file',
                    'file_pengantar.mimes' => 'File Surat Permohonan harus berupa file berformat pdf',
                    'file_pengantar.max' => 'File Surat Permohonan harus tidak boleh lebih dari 700 KB',
                    'file_proposal.file' => 'File Proposal harus berupa file',
                    'file_proposal.mimes' => 'File Proposal harus berupa file berformat pdf',
                    'file_proposal.max' => 'File Proposal harus tidak boleh lebih dari 3 MB',
                ]
            ]);
        }
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->getMessageBag()->all()[0])->withInput();
        } else {

            if (!empty($request->file('file_pengantar'))) {
                $surat = $request->file('file_pengantar')->getClientOriginalName();
                $name_surat_original = pathinfo($surat, PATHINFO_FILENAME);
                $surat_pengantar_enc = md5(sha1(bcrypt(Auth::user()->id . '' . $request->file('file_pengantar'))));
                $file_ext_surat = $request->file('file_pengantar')->guessExtension();
                $file_pengantar =  $request->file('file_pengantar')->storeAs(
                    'assets/upload/file/surat-pengantar',
                    $name_surat_original . '-' . $surat_pengantar_enc . '.' . $file_ext_surat,
                    'public'
                );
                try {
                    Storage::disk('local')->delete('public/' . $item->file_surat_pemohon);
                } catch (\Throwable $th) {
                    return $th->getMessage();
                }
            } else {
                $file_pengantar = $item->file_surat_pemohon;
            }
            if (!empty($request->file('file_proposal'))) {
                $proposal = $request->file('file_proposal')->getClientOriginalName();
                $name_proposal_original = pathinfo($proposal, PATHINFO_FILENAME);
                $proposal_penelitian_enc = md5(sha1(bcrypt(Auth::user()->id . '' . $request->file('file_proposal'))));
                $file_ext_proposal = $request->file('file_proposal')->guessExtension();

                $file_proposal = $request->file('file_proposal')->storeAs(
                    'assets/upload/file/proposal',
                    $name_proposal_original . '-' . $proposal_penelitian_enc . '.' . $file_ext_proposal,
                    'public'
                );
                try {
                    Storage::disk('local')->delete('public/' . $item->file_proposal_pemohon);
                } catch (\Throwable $th) {
                    return $th->getMessage();
                }
            } else {

                $file_proposal = $item->file_proposal_pemohon;
            }
            $data = [
                'jenis_permohonan' => $request->jenis_permohonan,
                'keperluan' => $request->keperluan_pemohon,
                'judul_atau_data' => $request->judul_penelitian,
                'waktu_awal' => Carbon::createFromFormat('d/m/Y', $request->waktu_awal)->format('Y-m-d'),
                'waktu_akhir' => Carbon::createFromFormat('d/m/Y', $request->waktu_akhir)->format('Y-m-d'),
                'tanggal_permohonan' => Carbon::now()->format('Y-m-d h:i:s'),
                'file_surat_pemohon'     => $file_pengantar,
                'file_proposal_pemohon'     => $file_proposal,
            ];
            $log = [
                'status_surat' => 'ubah',
                'update_oleh' => Auth::user()->id,
                'update_waktu' => Carbon::now()->format('Y-m-d H:i:s'),
                'role' => Auth::user()->role,
            ];
            $item->update($data);
            $logsurat = [new LogSurat($log)];
            $item->logsuratmany()->saveMany($logsurat);

            $appData = [];
            foreach ($request->dataApplicants as $applicant => $pemohon) {
                // DB::enableQueryLog();
                AddOnApplicant::updateOrCreate(['id' => $pemohon['idp'], 'id_application' => $id], [
                    'nama_pemohon' => $pemohon['nama_pemohon'],
                    'nim_pemohon' => $pemohon['nim_pemohon'],
                    'nik' => $pemohon['nik'],
                    'no_hp' => $pemohon['no_hp'],
                ]);
            }
            // dd(DB::getQueryLog());
            return redirect()->back()->with(['warning' => 'Permohonan berhasil diubah!']);
        }
    }
    public function sanggah(request $request, $id)
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