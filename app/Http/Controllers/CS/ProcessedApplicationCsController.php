<?php

namespace App\Http\Controllers\CS;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProcessedApplicationCsController extends Controller
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
        $penelitianProses = DB::table('applications as one')
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
            ->where(['two.status_surat' => 'proses', 'two.role' => 'CS'])
            ->whereNull('one.deleted_at')
            ->orWhere(['two.status_surat' => 'proses', 'two.role' => 'KABID'])
            ->whereNull('one.deleted_at')
            ->orWhere(['two.status_surat' => 'proses', 'two.role' => 'KASI'])
            ->whereNull('one.deleted_at')
            ->orWhere(['two.status_surat' => 'proses', 'two.role' => 'PETUGAS'])
            ->whereNull('one.deleted_at')
            ->get();
        // dd($penelitianProses);
        $penelitianBaru = DB::table('applications as one')
            ->select('*')
            ->join('users as us', 'one.id_user', '=', 'us.id')
            ->join('log_surats as two', 'one.id_application', '=', 'two.id_application')
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
        return view(
            'pages.cs.permohonan.terproses.list',
            [
                'countmessage' => $countmessage,
                'messages' => $message,
                'dataUser' => $dataUser,
                'permohonanBaru' => $penelitianBaru,
                'penelitianBaru' => $penelitianBaru,
                'penelitianBaruSidebar' => $penelitianBaru->count(),
                'penelitianProses' => $penelitianProses,
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
        //
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