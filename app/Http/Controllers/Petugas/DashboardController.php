<?php

namespace App\Http\Controllers\Petugas;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact;
use App\Models\Application;
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
    // public function index()
    // {
    //     $message = Contact::all();
    //     $countmessage = Contact::count();
    //     $id = Auth::user()->id;
    //     $dataUser = User::findOrFail($id);
    //     $penelitianBaru = DB::table('applications as one')
    //         ->select('*')
    //         ->join('users as us', 'one.id_user', '=', 'us.id')
    //         ->join('log_surats as two', 'one.id_application', '=', 'two.id_application')
    //         ->join(
    //             DB::raw('(select t.id_application, MAX(created_at) as maxt from log_surats t group by t.id_application) t'),
    //             function ($join) {
    //                 $join->on('t.id_application', '=', 'two.id_application');
    //                 $join->on('two.created_at', '=', 'maxt');
    //             }
    //         )
    //         ->where(['two.status_surat' => 'proses', 'two.role' => 'KASI'])
    //         ->whereNull('one.deleted_at')
    //         ->get();
    //     $penelitianProses = DB::table('applications as one')
    //         ->select('*')
    //         ->join('users as us', 'one.id_user', '=', 'us.id')
    //         ->join('log_surats as two', 'one.id_application', '=', 'two.id_application')
    //         ->join(
    //             DB::raw('(select t.id_application, MAX(created_at) as maxt from log_surats t group by t.id_application) t'),
    //             function ($join) {
    //                 $join->on('t.id_application', '=', 'two.id_application');
    //                 $join->on('two.created_at', '=', 'maxt');
    //             }
    //         )
    //         ->where(['two.status_surat' => 'proses', 'two.role' => 'PETUGAS'])
    //         ->orWhere(['two.status_surat' => 'sesuai', 'two.role' => 'PETUGAS'])
    //         ->whereNull('one.deleted_at')
    //         ->count();
    //     return view('pages.petugas.index', [
    //         'countmessage' => $countmessage,
    //         'messages' => $message,
    //         'dataUser' => $dataUser,
    //         'penelitianBaruSidebar' => $penelitianBaru->count(),
    //         'penelitianBaru' => $penelitianBaru,
    //         'penelitianProses' => $penelitianProses,
    //         'penelitianBaruDashboard' => $penelitianBaru->count(),
    //         'penelitianProsesDashboard' => $penelitianProses,
    //     ]);
    // }
    public function index()
    {
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');

        $totalpenelitian = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->count();
        $totalpengambilandata = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->count();
        $totalsurveyawal = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->count();
        $totalmagang = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->count();
        $totalpermohonan = ($totalpenelitian + $totalpengambilandata + $totalsurveyawal + $totalmagang);
        $chartPermohonan = json_encode(array($totalpenelitian, $totalpengambilandata, $totalsurveyawal, $totalmagang));

        // Penelitian
        $pljan = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 1)
            ->count();
        $plfeb = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 2)
            ->count();
        $plmar = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 3)
            ->count();
        $plapr = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 4)
            ->count();
        $plmei = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 5)
            ->count();
        $pljun = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 6)
            ->count();
        $pljul = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 7)
            ->count();
        $plags = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 8)
            ->count();
        $plsep = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 9)
            ->count();
        $plokt = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 10)
            ->count();
        $plnov = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 11)
            ->count();
        $pldes = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 12)
            ->count();
        //Pengambilan Data;
        $pdjan = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 1)
            ->count();
        $pdfeb = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 2)
            ->count();
        $pdmar = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 3)
            ->count();
        $pdapr = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 4)
            ->count();
        $pdmei = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 5)
            ->count();
        $pdjun = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 6)
            ->count();
        $pdjul = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 7)
            ->count();
        $pdags = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 8)
            ->count();
        $pdsep = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 9)
            ->count();
        $pdokt = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 10)
            ->count();
        $pdnov = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 11)
            ->count();
        $pddes = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 12)
            ->count();
        // Survey Awal
        $sajan = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 1)
            ->count();
        $safeb = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 2)
            ->count();
        $samar = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 3)
            ->count();
        $saapr = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 4)
            ->count();
        $samei = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 5)
            ->count();
        $sajun = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 6)
            ->count();
        $sajul = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 7)
            ->count();
        $saags = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 8)
            ->count();
        $sasep = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 9)
            ->count();
        $saokt = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 10)
            ->count();
        $sanov = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 11)
            ->count();
        $sades = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 12)
            ->count();
        // Magang
        $mgjan = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 1)
            ->count();
        $mgfeb = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 2)
            ->count();
        $mgmar = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 3)
            ->count();
        $mgapr = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 4)
            ->count();
        $mgmei = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 5)
            ->count();
        $mgjun = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 6)
            ->count();
        $mgjul = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 7)
            ->count();
        $mgags = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 8)
            ->count();
        $mgsep = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 9)
            ->count();
        $mgokt = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 10)
            ->count();
        $mgnov = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 11)
            ->count();
        $mgdes = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 12)
            ->count();
        $areapenelitian = json_encode(array($pljan, $plfeb, $plmar, $plapr, $plmei, $pljun, $pljul, $plags, $plsep, $plokt, $plnov, $pldes));
        $areapengambilandata = json_encode(array($pdjan, $pdfeb, $pdmar, $pdapr, $pdmei, $pdjun, $pdjul, $pdags, $pdsep, $pdokt, $pdnov, $pddes));
        $areasurvey = json_encode(array($sajan, $safeb, $samar, $saapr, $samei, $sajun, $sajul, $saags, $sasep, $saokt, $sanov, $sades));
        $areamagang = json_encode(array($mgjan, $mgfeb, $mgmar, $mgapr, $mgmei, $mgjun, $mgjul, $mgags, $mgsep, $mgokt, $mgnov, $mgdes));

        // Penelitian
        $allpl = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Penelitian')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', $month)
            ->count();
        // PengambilanData
        $allpd = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Pengambilan Data')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', $month)
            ->count();
        // SurveyAwal
        $allsa = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Survey Awal/Studi Pendahuluan')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', $month)
            ->count();
        // Magang
        $allmg = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', $month)
            ->count();
        $barpl = json_encode(array($allpl));
        $barpd = json_encode(array($allpd));
        $barsa = json_encode(array($allsa));
        $barmg = json_encode(array($allmg));


        $message = Contact::all()->sortByDesc('created_at');
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
        $penelitianProsesView = DB::table('applications as one')
            ->select('*')
            ->join('log_surats as two', 'one.id_application', '=', 'two.id_application')
            ->join(
                DB::raw('(select t.id_application, MAX(created_at) as maxt from log_surats t group by t.id_application) t'),
                function ($join) {
                    $join->on('t.id_application', '=', 'two.id_application');
                    $join->on('two.created_at', '=', 'maxt');
                }
            )
            ->where(['two.status_surat' => 'proses', 'two.role' => 'PETUGAS'])
            ->whereNull('one.deleted_at')
            ->orWhere(['two.status_surat' => 'tolak', 'two.role' => 'PETUGAS'])
            ->whereNull('one.deleted_at')
            // ->orWhere(['two.status_surat' => 'proses', 'two.role' => 'KASI'])
            // ->orWhere(['two.status_surat' => 'tolak', 'two.role' => 'KASI'])
            // ->orWhere(['two.status_surat' => 'proses', 'two.role' => 'PETUGAS'])
            // ->orWhere(['two.status_surat' => 'tolak', 'two.role' => 'PETUGAS'])
            // ->orWhere(['two.status_surat' => 'selesai', 'two.role' => 'PETUGAS'])
            ->count();
        return view('pages.petugas.index', [
            'countmessage' => $countmessage,
            'messages' => $message,
            'dataUser' => $dataUser,
            'penelitianProsesView' => $penelitianProsesView,
            'penelitianBaruView' => $penelitianBaru->count(),
            'penelitianBaruSidebar' => $penelitianBaru->count(),
            'penelitianBaru' => $penelitianBaru,
            'chartPermohonan' => $chartPermohonan,
            'totalPenelitian' => (($totalpenelitian / $totalpermohonan) * 100),
            'totalPengambilanData' => (($totalpengambilandata / $totalpermohonan) * 100),
            'totalSurveyAwal' => (($totalsurveyawal / $totalpermohonan) * 100),
            'totalMagang' => (($totalmagang / $totalpermohonan) * 100),
            'areapenelitian' => $areapenelitian,
            'areapengambilandata' => $areapengambilandata,
            'areasurvey' => $areasurvey,
            'areamagang' => $areamagang,
            'barpenelitian' => $barpl,
            'barpengambilandata' => $barpd,
            'barsurveyawal' => $barsa,
            'barmagang' => $barmg,
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