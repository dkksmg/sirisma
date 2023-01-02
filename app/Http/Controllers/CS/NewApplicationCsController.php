<?php

namespace App\Http\Controllers\CS;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact;
use App\Models\LogSurat;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class NewApplicationCsController extends Controller
{
    public function __construct()
    {
        // cek_login();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = Contact::all()->sortByDesc('created_at');
        $countmessage = Contact::count();
        $id = Auth::user()->id;
        $dataUser = User::findOrFail($id);
        // DB::enableQueryLog();
        $penelitianBaru = DB::table('applications as one')
            ->select('*')
            ->join('users as us', 'one.id_user', '=', 'us.id')
            ->join('log_surats as two', 'one.id_application', '=', 'two.id_application')
            ->join('application_types as tp',  'tp.id', '=', 'one.jenis_permohonan')
            ->join(
                DB::raw('(select t.id_application, MAX(created_at) as maxt from log_surats t group by t.id_application) t'),
                function ($join) {
                    $join->on('t.id_application', '=', 'two.id_application');
                    $join->on('two.created_at', '=', 'maxt');
                }
            )
            ->where(['two.status_surat' => 'kirim', 'two.role' => 'USER'])
            ->whereNull('one.deleted_at')
            ->orWhere(['two.status_surat' => 'ubah', 'two.role' => 'USER'])
            ->whereNull('one.deleted_at')
            ->get();
        // dd(DB::getQueryLog());
        return view(
            'pages.cs.permohonan.baru.list',
            [
                'countmessage' => $countmessage,
                'messages' => $message,
                'dataUser' => $dataUser,
                'penelitianBaru' => $penelitianBaru,
                'penelitianBaruSidebar' => $penelitianBaru->count(),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $item = Application::findOrFail($id);
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nomor_agenda' => 'required',
            'status_surat' => 'required',
            'tgl_agenda' => 'required',
        ], [
            'nomor_agenda.required' => 'Nomor Agenda wajib diisi',
            'tgl_agenda.required' => 'Tanggal Agenda wajib diisi',
            'status_surat.required' => 'Status Surat wajib dipilih',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->getMessageBag()->all()[0])->withInput();
        } else {
            $data = [
                'nomor_agenda' => $request->nomor_agenda,
                'tgl_agenda' => $request->tgl_agenda,
            ];

            if ($request->status_surat == 'proses') {
                $log = [
                    'status_surat' => $request->status_surat,
                    'keterangan' => $request->keterangan,
                    'update_oleh' => Auth::user()->id,
                    'update_waktu' => Carbon::now()->format('Y-m-d H:i:s'),
                    'role' => Auth::user()->role,
                ];
                $logsurat = [new LogSurat($log)];
                $item->logsuratmany()->saveMany($logsurat);
                $item->update($data);
                return redirect()->route('cs.penelitian-baru')->with(['success' => 'Data Agenda Terdisposisi!']);
            } else {
                $item->update($data);
                return redirect()->route('cs.penelitian-baru')->with(['success' => 'Data Agenda Tersimpan!']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}