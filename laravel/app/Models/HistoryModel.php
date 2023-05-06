<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    use HasFactory;
    // Nama tabel
    protected $table = 'tbl_history';
    protected $guarded = ['id'];
    public function buku()
    {
        return $this->belongsTo(BukuModel::class, 'idBuku', 'id');
    }
    public function users()
    {
        return $this->belongsTo(UsersModel::class, 'idUsers', 'id');
    }
}
