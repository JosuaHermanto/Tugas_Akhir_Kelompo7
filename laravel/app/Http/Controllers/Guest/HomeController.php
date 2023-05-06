<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UsersModel;
use App\Models\BukuModel;
use App\Models\HistoryModel;

class HomeController extends Controller
{
    private $views      = 'guest/home';
    private $url        = 'guest/home';
    private $title      = 'Halaman Dashboard';

    public function __construct()
    {
        $this->mUsers           = new UsersModel();
        $this->mBuku            = new BukuModel();
        $this->mHistory         = new HistoryModel();
    }

    public function index()
    {

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Dashboard',
        ];

        return view($this->views . "/index", $data);
    }
}
