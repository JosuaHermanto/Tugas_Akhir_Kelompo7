<?php

namespace App\Http\Controllers\Guest;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;
use File;
use DB;
use App\Models\BukuModel;
use App\Models\HistoryModel;
use App\Models\UsersModel;

class PinjamBukuController extends Controller
{
    private $views      = 'guest/PinjamBuku';
    private $url        = 'guest/pinjam-buku';
    private $title      = 'Halaman Pinjam Buku';

    public function __construct()
    {
        $this->mBuku          = new BukuModel();
        $this->mPinjam        = new HistoryModel();
        $this->mUsers         = new UsersModel();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $where = [
            'idUsers'   => session()->get('id')
        ];
        $pinjam     = $this->mPinjam->where($where)->get();
        $buku       = $this->mBuku->get();
        $users      = $this->mUsers->get();
        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'show',
            'pinjam'                => $pinjam,
            'buku'                  => $buku,
            'users'                 => $users
        ];
        return view($this->views . "/index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pinjam     = $this->mPinjam->get();
        $buku       = $this->mBuku->get();
        $users      = $this->mUsers->get();

        $databuku = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Buku Pinjam',
            'pinjam'        => $pinjam,
            'buku'          => $buku,
            'users'         => $users
        ];
        return view($this->views . "/create", $databuku);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dataBuku = [
            'idUsers'           => $request->idUsers,
            'idBuku'            => $request->idBuku,
            'tanggal_pinjam'    => $request->tanggal_pinjam,
            'alasan'            => $request->alasan,
            'status_kembali'    => 0
        ];
        $this->mPinjam->create($dataBuku);

        return redirect("$this->url" . "/create")->with('sukses', 'Data Buku Berhasil Ditambahkan');
        // echo json_encode($dataPeriode);
        // die;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pinjam     = $this->mPinjam->where('id', $id)->first();
        $buku       = $this->mBuku->get();
        $users      = $this->mUsers->get();
        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'show',
            'pinjam'                => $pinjam,
            'buku'                  => $buku,
            'users'                 => $users
        ];
        return view($this->views . "/show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
