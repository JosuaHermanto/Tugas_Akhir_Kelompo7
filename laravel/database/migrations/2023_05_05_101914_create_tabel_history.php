<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUsers');
            $table->unsignedBigInteger('idBuku');
            $table->date('tanggal_pinjam');
            $table->text('alasan');
            $table->integer('status_kembali');
            $table->timestamp('last_login')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->foreign('idUsers')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idBuku')->references('id')->on('tbl_buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_history');
    }
};
