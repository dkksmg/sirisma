<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LastChanged;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Dd;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userPemohon = User::with(['lastchanged', 'lastchangedone'])->where('role', '=', 'USER')->withTrashed()->get();
        $messages = Contact::all()->sortByDesc('created_at');
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
            ->where(['two.status_surat' => 'proses', 'two.role' => 'KABID'])
            ->whereNull('one.deleted_at')
            ->get();
        $penelitianBaruSidebar = $penelitianBaru->count();
        return view('pages.admin.users.index', compact(['userPemohon', 'messages', 'countmessage', 'dataUser', 'penelitianBaruSidebar', 'penelitianBaru']));
    }
    public function pengguna()
    {
        $userPemohon = User::with(['lastchanged', 'lastchangedone'])->whereIn('role', ['CS', 'KABID', 'KASI', 'PETUGAS', 'SUPERADMIN'])->withTrashed()->get();
        $messages = Contact::all()->sortByDesc('created_at');
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
            ->where(['two.status_surat' => 'proses', 'two.role' => 'KABID'])
            ->whereNull('one.deleted_at')
            ->get();
        $penelitianBaruSidebar = $penelitianBaru->count();
        return view('pages.admin.users.index', compact(['userPemohon', 'messages', 'countmessage', 'dataUser', 'penelitianBaruSidebar', 'penelitianBaru']));
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
        $item = User::findOrFail($id);
        $name = $item->name;
        $arr = explode(' ', trim($name));
        // dd($request->all());
        if (Storage::disk('local')->exists('public/' . $item->foto_profile)) {
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'required|min:5',
                'email' => 'required|string|email:rfc,dns|max:255|unique:users,email,' . $item->id,
                'imageprofile' => 'image|mimes:jpeg,jpg,png|max:3072',
                'role' => 'required'
            ], [
                'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
                'nama_lengkap.min' => 'Nama Lengkap minimal 5 karakter',
                'email.required' => 'Alamat Email wajib diisi',
                'email.email' => 'Email harus merupakan alamat email yang valid',
                'email.unique' => 'Email sudah digunakan',
                'imageprofile.mimes' => 'Foto Profil harus berformat jpeg,jpg,png',
                'imageprofile.image' => 'Foto Profil harus berupa gambar',
                'imageprofile.max' => 'Foto Profil maksimal berukuran 3MB',
                'role.required' => 'Role Wajib dipilih'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'required|min:5',
                'email' => 'required|string|email:rfc,dns|max:255|unique:users,email,' . $item->id,
                'imageprofile' => 'required|image|mimes:jpeg,jpg,png|max:3072',
                'role' => 'required'
            ], [
                'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
                'nama_lengkap.min' => 'Nama Lengkap minimal 5 karakter',
                'email.required' => 'Alamat Email wajib diisi',
                'email.email' => 'Email harus merupakan alamat email yang valid',
                'email.unique' => 'Email sudah digunakan',
                'imageprofile.required' => 'Foto Profil wajib diisi',
                'imageprofile.image' => 'Foto Profil harus berupa gambar',
                'imageprofile.mimes' => 'Foto Profil harus berformat jpeg,jpg,png',
                'imageprofile.max' => 'Foto Profil maksimal berukuran 3MB',
                'role.required' => 'Role Wajib dipilih'

            ]);
        }
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->getMessageBag()->all()[0])->withInput();
        } else {
            if (!empty($request->file('imageprofile'))) {
                $file = $request->file('imageprofile');
                $filename = $arr[0] . '_' . time() . '.' . $file->getClientOriginalExtension();
                $img = Image::make($file);
                if (Image::make($file)->width() > 720) {
                    $img->resize(720, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $img->save(public_path('storage/assets/upload/profile/') . $filename);
                $image = 'assets/upload/profile/' . $img->basename;
                try {
                    Storage::disk('local')->delete('public/' . $item->foto_profile);
                } catch (\Throwable $th) {
                    return $th->getMessage();
                }
            } else {
                $image = $item->foto_profile;
            }
            if ($request->email == $item->email) {
                $email = $item->email_verified_at;
            } else {
                $email = null;
            }
            $data = [
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'foto_profile' => $image,
                'email_verified_at' => $email,
                'role' => $request->role,
            ];
            $lastchange = [
                'id_user' => $item->id,
                'nama_pengubah' => Auth::user()->name,
                'role' => Auth::user()->role,
                'aksi_dilakukan' => "Update data " . $item->name,
                'rincian' => json_encode($data),
            ];
            LastChanged::create($lastchange);
            $item->update($data);
            return redirect()->back()->withSuccess('Akun Profile ' . $item->nama . ' diupdate!');
        }
    }
    public function verifemail($id)
    {
        $item = User::findOrFail($id);
        $data = [
            'email_verified_at' => Carbon::now()->format("Y-m-d H:i:s"),
        ];
        $item->update($data);
        return redirect()->back()->withSuccess('Email ' . $item->email . ' berhasil terverifikasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $lastchange = [
            'id_user' => $user->id,
            'nama_pengubah' => Auth::user()->name,
            'role' => Auth::user()->role,
            'aksi_dilakukan' => "Delete Akun " . $user->name,
            'rincian' => "Delete Akun " . $user->name . " On " . Carbon::now()->format('d-m-Y H:i:s'),
        ];
        LastChanged::create($lastchange);
        $user->delete();
        return redirect()->back()->with(['success' => 'Akun berhasil di hapus']);
    }
    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $lastchange = [
            'id_user' => $user->id,
            'nama_pengubah' => Auth::user()->name,
            'role' => Auth::user()->role,
            'aksi_dilakukan' => "Restore Akun " . $user->name,
            'rincian' => "Restore Akun " . $user->name . " On " . Carbon::now()->format('d-m-Y H:i:s'),
        ];
        LastChanged::create($lastchange);
        $user->restore();
        return redirect()->back()->with(['success' => 'Akun berhasil di restore']);
    }
}