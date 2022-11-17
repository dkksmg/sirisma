<?php

namespace App\Http\Controllers\Kasi;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact;
use App\Models\LogSurat;
use App\Models\Application;
use App\Models\LokasiTujuan;
use Illuminate\Http\Request;
use App\Models\ApplicationType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewApplicationKasiController extends Controller
{
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
        // DB::enableQueryLog();
        $dataUser = User::findOrFail($id);
        // dd(DB::getQueryLog());
        $penelitianBaru = DB::table('applications as one')
            ->select('*')
            ->join('users as us', 'one.id_user', '=', 'us.id')
            ->join('application_types as tp',  'tp.id', '=', 'one.jenis_permohonan')
            ->join('log_surats as two', 'one.id_application', '=', 'two.id_application')
            ->join(
                DB::raw('(select t.id_application, MAX(created_at) as maxt from log_surats t group by t.id_application) t'),
                function ($join) {
                    $join->on('t.id_application', '=', 'two.id_application');
                    $join->on('two.created_at', '=', 'maxt');
                }
            )
            ->where(['two.status_surat' => 'proses', 'two.role' => 'KABID'])
            ->whereNull('one.deleted_at')
            ->get();
        return view(
            'pages.kasi.permohonan.baru.list',
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
        $message = Contact::all()->sortByDesc('created_at');
        $countmessage = Contact::count();
        $id_user = Auth::user()->id;
        $dataUser = User::findOrFail($id_user);
        $penelitianBaru = DB::table('applications as one')
            ->select('*')
            ->join('users as us', 'one.id_user', '=', 'us.id')
            ->join('application_types as tp',  'tp.id', '=', 'one.jenis_permohonan')
            ->join('log_surats as two', 'one.id_application', '=', 'two.id_application')
            ->join(
                DB::raw('(select t.id_application, MAX(created_at) as maxt from log_surats t group by t.id_application) t'),
                function ($join) {
                    $join->on('t.id_application', '=', 'two.id_application');
                    $join->on('two.created_at', '=', 'maxt');
                }
            )
            ->where(['two.status_surat' => 'proses', 'two.role' => 'KABID'])
            ->get();
        $types = ApplicationType::all();
        $data = Application::with(['applicant', 'user', 'type', 'addonapplicant'])->findOrFail($id);
        $lokasi = LokasiTujuan::all()->sortBy('lokasi_tujuan');
        return view('pages.kasi.permohonan.show', [
            'types' => $types,
            'data' => $data,
            'lokasis' => $lokasi,
            'countmessage' => $countmessage,
            'messages' => $message,
            'dataUser' => $dataUser,
            'penelitianBaru' => $penelitianBaru,
            'penelitianBaruSidebar' => $penelitianBaru->count(),
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
        if ($request->status_surat == 'tolak') {
            $validator = Validator::make($request->all(), [
                'status_surat' => 'required',
                'keterangan' => 'required',
            ], [
                'keterangan.required' => 'Keterangan wajib diisi',
                'status_surat.required' => 'Status Surat wajib dipilih',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'status_surat' => 'required',
            ], [
                'status_surat.required' => 'Status Surat wajib dipilih',
            ]);
        }
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->getMessageBag()->all()[0])->withInput();
        } else {

            $log = [
                'status_surat' => $request->status_surat,
                'keterangan' => $request->keterangan,
                'update_oleh' => Auth::user()->id,
                'update_waktu' => Carbon::now()->format('Y-m-d H:i:s'),
                'role' => Auth::user()->role,
            ];
            $logsurat = [new LogSurat($log)];
            $item->logsuratmany()->saveMany($logsurat);
            return redirect()->route('penelitian-baru-kasi.index')->with(['success' => 'Permohonan Terproses!']);
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