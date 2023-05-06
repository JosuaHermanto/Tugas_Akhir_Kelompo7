<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;

use App\Models\UsersModel;

class AuthController extends Controller
{
    private $views      = 'auth';
    private $url        = '';
    private $title      = 'Halaman Login';

    public function __construct()
    {
        $this->mUser     = new UsersModel();
    }

    //LOGIN
    public function login()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
        ];
        // View
        return view($this->views . "/index", $data);
    }

    //proses
    public function loginProses(Request $request)
    {
        // Validate
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // Get Data
        $users = $this->mUser->where('username', $request->username)->first();

        // Check User
        if ($users == null) {
            return redirect()->back()->with('gagal', 'Pengguna Tidak Ditemukan');
        }

        // Check User Status
        if ($users->status == 0) {
            return redirect()->back()->with('gagal', 'Pengguna Tidak Aktif');
        }
        // Check User Password
        if (Hash::check($request->password, $users->password) == false) {
            return redirect()->back()->with('gagal', 'Kata Sandi Salah');
        }
        // Table user and Update Last Login
        $dataUser = [
            'last_login' => date('Y-m-d H:i:s'),
        ];
        $this->mUser->where('id', $users->id)->update($dataUser);
        // echo json_encode($users); die;
        // Create Session

        if ($users->role == 1) {
            $session = [
                'id'        => $users->id,
                'nama'      => $users->nama,
                'role'      => $users->role,
                'isLogin'   => true,
            ];
            // echo json_encode($session); die();
            session($session);
            return redirect('admin/home')->with('sukses', 'Berhasil Login');
        }
        if ($users->role == 2) {
            $session = [
                'id'        => $users->id,
                'nama'      => $users->nama,
                'role'      => $users->role,
                'isLogin'   => true,
            ];
            // echo json_encode($session); die();
            session($session);
            return redirect('guest/home')->with('sukses', 'Berhasil Login');
        }
        // Response
    }
    // register
    public function register()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
        ];
        // View
        return view($this->views . "/register", $data);
    }
    //proses
    public function registerProses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $dataUser = [
            'username'      => $request->username,
            'nama'          => $request->nama,
            'password'      => Hash::make($request->password),
            'sandi'         => $request->password,
            'role'          => 2,
            'status'        => 1,
        ];
        $users = $this->mUser->create($dataUser);
        return redirect('/')->with('success', 'Berhasil Daftar, Silahkan Login');
    }

    public function registerPaksa()
    {
        $dataAdmin = [
            'nama'          => 'test',
            'username'      => 'admin',
            'password'      => Hash::make('admin'),
            'idJabatan'     => 1,
            'status'        => 1,
        ];
        $users = $this->mUser->create($dataAdmin);
    }

    public function logout()
    {
        session()->flush();
        // session()->forget('idPPeriode');
        return redirect('/');
    }
}
