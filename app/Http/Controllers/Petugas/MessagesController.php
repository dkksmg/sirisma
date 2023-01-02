<?php

namespace App\Http\Controllers\Petugas;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countmessage = Contact::count();
        $message = Contact::all();
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
            ->whereNull('one.deleted_at')
            ->get();
        if ($request->ajax()) {
            $data = Contact::with(['data_user' => function ($q) {
                $q->select('name', 'email', 'role', 'foto_profile');
            }])->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('akun', function ($row) {
                    if (empty($row->data_user)) {
                        $modalakun = '-';
                        return $modalakun;
                    } else {
                        $modalakun = '<table><tbody><tr class="text-center">';
                        $modalakun = $modalakun . '<td class="text-center">
                            <button type="button" class="btn btn-info btn-sm me-2" data-coreui-toggle="modal" data-coreui-target="#exampleModal' . $row->id . '">Lihat Akun</button>
                            </td>';
                        $modalakun = $modalakun . '</tr></tbody></table>';
                        return $modalakun;
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<table><tbody><tr class="text-center">';
                    $actionBtn = $actionBtn . '<td class="text-center">
                    <button type="button" class="btn btn-success btn-sm me-2">Balas</button>
                    </td>
                    <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm me-2">Balas</button>
                    </td>';
                    $actionBtn = $actionBtn . '</tr></tbody></table>';

                    return $actionBtn;
                })
                ->editColumn('created_at', function ($data) {
                    $formatedDate = Carbon::parse($data->created_at)->translatedFormat('l, d F Y H:i:s');
                    return $formatedDate;
                })
                ->rawColumns(['akun', 'action'])
                ->make(true);
        }
        return view('pages.petugas.pesan.index', [
            'countmessage' => $countmessage,
            'messages' => $message,
            'dataUser' => $dataUser,
            'penelitianBaruSidebar' => $penelitianBaru->count(),
            'penelitianBaru' => $penelitianBaru,

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