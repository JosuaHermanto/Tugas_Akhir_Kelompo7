<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('username', 255);
            $table->integer('role');
            $table->string('password', 255);
            $table->string('sandi', 255);
            $table->integer('status');
            $table->timestamp('last_login')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        (\Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'nama' => 'admin',
                'username'  => 'admin',
                'role'  => 1,
                'password'  => '$2y$10$qH2gz7KKunlPTr3cf.ApqOmySN2yTsDbirzwb4wM..98okgT3xOaa',
                'sandi' => 'katasandi',
                'status' => 1
            ]
        ]));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
