<?php

namespace App\Http\Controllers\Petugas;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = Contact::all();
        $countmessage = Contact::count();
        $id = Auth::user()->id;
        $dataUser = User::findOrFail($id);
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
            ->where(['two.status_surat' => 'proses', 'two.role' => 'KASI'])
            ->whereNull('one.deleted_at')
            ->get();
        $penelitianProses = DB::table('applications as one')
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
            ->where(['two.status_surat' => 'proses', 'two.role' => 'PETUGAS'])
            ->orWhere(['two.status_surat' => 'sesuai', 'two.role' => 'PETUGAS'])
            ->whereNull('one.deleted_at')
            ->count();
        return view('pages.petugas.index', [
            'countmessage' => $countmessage,
            'messages' => $message,
            'dataUser' => $dataUser,
            'penelitianBaruSidebar' => $penelitianBaru->count(),
            'penelitianBaru' => $penelitianBaru,
            'penelitianProses' => $penelitianProses,
            'penelitianBaruDashboard' => $penelitianBaru->count(),
            'penelitianProsesDashboard' => $penelitianProses,
        ]);
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