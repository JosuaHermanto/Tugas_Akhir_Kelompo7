<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\UsersModel;

class TambahAdminController extends Controller
{
    private $views      = 'admin/tambahAdmin';
    private $url        = 'admin/tambah-admin';
    private $title      = 'Halaman Data Admin';

    public function __construct()
    {
        $this->mUsers          = new UsersModel();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whereAdmin = [
            'role'  => 1
        ];
        $users = $this->mUsers->where($whereAdmin)->get();
        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            'page'  => 'index admin',
            'users' => $users
        ];

        return view($this->views . "/index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users      = $this->mUsers->get();

        $datausers = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Tambah Admin Perpus',
            'users'     => $users,
        ];
        return view($this->views . "/create", $datausers);
        // echo json_encode($dataPeriode);
        // die;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataAdminPerpus = [
            'nama'              => $request->nama,
            'username'          => $request->username,
            'password'          => Hash::make($request->password),
            'sandi'             => $request->password,
            'role'              => 1,
            'status'            => 1
        ];
        $this->mUsers->create($dataAdminPerpus);

        return redirect("$this->url")->with('sukses', 'Data Periode Berhasil Ditambahkan');
        // echo json_encode($dataPeriode);
        // die;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users      = $this->mUsers->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Admin',
            'users'     => $users,
        ];
        return view($this->views . "/edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataAdmin = [
            'nama'              => $request->nama,
            'username'          => $request->username,
            'password'          => Hash::make($request->password),
            'sandi'             => $request->password,
            'role'              => 1,
            'status'            => 1
        ];
        $this->mUsers->where('id', $request->id)->update($dataAdmin);

        // echo json_encode($dataJabatan); die;
        return redirect("$this->url")->with('sukses', 'Data Admin berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->mUsers->where('id', $id)->delete();
        return redirect("$this->url")->with('sukses', 'Data Admin berhasil dihapus');
    }
}
