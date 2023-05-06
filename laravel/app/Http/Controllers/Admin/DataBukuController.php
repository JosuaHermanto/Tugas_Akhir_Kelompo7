<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;
use File;
use DB;
use App\Models\BukuModel;

class DataBukuController extends Controller
{
    private $views      = 'admin/dataBuku';
    private $url        = 'admin/data-buku';
    private $title      = 'Halaman Data Buku';

    public function __construct()
    {
        $this->mBuku          = new BukuModel();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = $this->mBuku->get();
        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            'page'  => 'data buku',
            'buku' => $buku
        ];

        return view($this->views . "/index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku      = $this->mBuku->get();

        $databuku = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Tambah Buku Perpus',
            'buku'     => $buku,
        ];
        return view($this->views . "/create", $databuku);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $fileName   = Str::uuid() . "-" . time() . "." . $file->extension();
            $file->move("upload/buku/", $fileName);
        }

        $dataBuku = [
            'foto'              => $fileName,
            'judul_buku'        => $request->judul_buku,
            'sinopsis'          => $request->sinopsis,
            'pengarang_buku'    => $request->pengarang_buku,
            'penerbit_buku'     => $request->penerbit_buku,
            'tahun_buku'        => $request->tahun_buku,
            'alamat_penerbit'   => $request->alamat_penerbit
        ];
        $this->mBuku->create($dataBuku);

        return redirect("$this->url")->with('sukses', 'Data Buku Berhasil Ditambahkan');
        // echo json_encode($dataPeriode);
        // die;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buku = $this->mBuku->where('id', $id)->first();
        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'profile',
            'buku'                  => $buku,
        ];
        return view($this->views . "/show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku      = $this->mBuku->where('id', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Admin',
            'buku'     => $buku,
        ];
        return view($this->views . "/edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (isset($request->photo)) {
            if ($request->hasFile('photo')) {
                $file       = $request->file('photo');
                $fileName   = Str::uuid() . "-" . time() . "." . $file->extension();
                $file->move("upload/buku/", $fileName);
            }
            $dataBuku = [
                'foto'              => $fileName,
                'judul_buku'        => $request->judul_buku,
                'sinopsis'          => $request->sinopsis,
                'pengarang_buku'    => $request->pengarang_buku,
                'penerbit_buku'     => $request->penerbit_buku,
                'tahun_buku'        => $request->tahun_buku,
                'alamat_penerbit'   => $request->alamat_penerbit
            ];
            $this->mBuku->where('id', $request->id)->update($dataBuku);
            return redirect("$this->url")->with('sukses', 'Artikel berhasil di edit');
            // echo json_encode($dataBuku); die;
        } else {
            $dataBuku = [
                'foto'              => $fileName,
                'judul_buku'        => $request->judul_buku,
                'sinopsis'          => $request->sinopsis,
                'pengarang_buku'    => $request->pengarang_buku,
                'penerbit_buku'     => $request->penerbit_buku,
                'tahun_buku'        => $request->tahun_buku,
                'alamat_penerbit'   => $request->alamat_penerbit
            ];
            // dd($dataBuku);
            $this->mBuku->where('id', $request->id)->update($dataBuku);
            return redirect("$this->url")->with('gagal', 'Artikel gagal di edit');
            // echo json_encode($dataInfo); die;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->mBuku->where('id', $id)->delete();
        return redirect("$this->url")->with('sukses', 'Data Admin berhasil dihapus');
    }
}
