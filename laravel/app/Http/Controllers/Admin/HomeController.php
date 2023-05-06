<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UsersModel;
use App\Models\BukuModel;
use App\Models\HistoryModel;

class HomeController extends Controller
{
    private $views      = 'admin/home';
    private $url        = 'admin/home';
    private $title      = 'Halaman Dashboard';

    public function __construct()
    {
        $this->mUsers           = new UsersModel();
        $this->mBuku            = new BukuModel();
        $this->mHistory         = new HistoryModel();
    }

    public function index()
    {
        $users = $this->mUsers->count();
        $buku   = $this->mBuku->count();
        $history = $this->mHistory->count();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Dashboard',
            // 'admin'         => $admin,
            'buku'          => $buku,
            'history'      => $history,
            'users'         => $users
        ];

        return view($this->views . "/index", $data);
    }
}
