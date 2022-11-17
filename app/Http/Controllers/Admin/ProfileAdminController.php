<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            ->where(['two.status_surat' => 'kirim', 'two.role' => 'USER'])
            ->whereNull('one.deleted_at')
            ->orWhere(['two.status_surat' => 'ubah', 'two.role' => 'USER'])
            ->whereNull('one.deleted_at')
            ->get();
        $penelitianProses = DB::table('applications as one')
            ->select('*')
            ->join('log_surats as two', 'one.id_application', '=', 'two.id_application')
            ->join(
                DB::raw('(select t.id_application, MAX(created_at) as maxt from log_surats t group by t.id_application) t'),
                function ($join) {
                    $join->on('t.id_application', '=', 'two.id_application');
                    $join->on('two.created_at', '=', 'maxt');
                }
            )
            ->where(['two.status_surat' => 'proses', 'two.role' => 'CS'])
            ->whereNull('one.deleted_at')
            ->count();
        return view('pages.admin.profile.index', [
            'countmessage' => $countmessage,
            'messages' => $message,
            'dataUser' => $dataUser,
            'penelitianBaru' => $penelitianBaru,
            'penelitianBaruSidebar' => $penelitianBaru->count(),
            'penelitianProses' => $penelitianProses,

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
        $name = Auth::user()->name;
        $arr = explode(' ', trim($name));
        $item = User::findOrFail($id);
        if (Storage::disk('local')->exists('public/' . $item->foto_profile)) {
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'required|min:5',
                'email' => 'required|string|email:rfc,dns|max:255|unique:users,email,' . $item->id,
                'imageprofile' => 'image|mimes:jpeg,jpg,png|max:3072'
            ], [
                'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
                'nama_lengkap.min' => 'Nama Lengkap minimal 5 karakter',
                'email.required' => 'Alamat Email wajib diisi',
                'email.email' => 'Email harus merupakan alamat email yang valid',
                'email.unique' => 'Email sudah digunakan',
                'imageprofile.mimes' => 'Foto Profil harus berformat jpeg,jpg,png',
                'imageprofile.image' => 'Foto Profil harus berupa gambar',
                'imageprofile.max' => 'Foto Profil maksimal berukuran 3MB',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'required|min:5',
                'email' => 'required|string|email:rfc,dns|max:255|unique:users,email,' . $item->id,
                'imageprofile' => 'required|image|mimes:jpeg,jpg,png|max:3072'
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
            $data = [
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'foto_profile' => $image,
                'email_verified_at' => $request->email != $item->email ? $item->email_verified_at : null,
            ];
            // dd($data);
            $item->update($data);
            return redirect()->route('profile-admin.index')->withSuccess('Akun Profile diupdate!');
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
