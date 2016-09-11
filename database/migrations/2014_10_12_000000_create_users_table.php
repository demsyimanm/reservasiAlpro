<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('email');
            $table->string('facebook');
            $table->string('line');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_akhir');
            $table->string('nama_pemesan');
            $table->string('NRP_pemesan');
            $table->string('no_hp_pemesan');
            $table->integer('matkul_id');
            $table->string('materi');
            $table->integer('jumlah');
            $table->integer('admin_id');
            $table->string('penutor');
            $table->boolean('status');
            $table->string('keterangan');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('matakuliah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('admin');
        Schema::drop('reservation');
        Schema::drop('matakuliah');
    }
}
