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
            $table->bigIncrements('id');
            $table->string('nama_aslu');
            $table->string('nama_hijrah')->nullable();
            $table->string('username')->unique();
            $table->enum('user_type', ['sys-admin','reg-admin','reg-head', 'user'])->default('user');
            $table->string('password');
            $table->string('email')->nullable();
            $table->text('access_token')->nullable();
            $table->rememberToken();

            //user-profile
            $table->string('syubah')->nullable();
            $table->string('farah')->nullable();

            $table->string('image_path')->nullable();
            $table->enum('jenis_kelamin', ['male', 'female'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->enum('status_kawin', ['S', 'M', 'D'])->nullable();
            $table->string('ayah_kode_nas')->nullable();
            $table->string('ayah_nama_hijrah')->nullable();
            $table->string('ibu_kode_nas')->nullable();
            $table->string('ibu_nama_hijrah')->nullable();
            $table->string('wali_kode_nas')->nullable();
            $table->string('wali_nama_hijrah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('pin_bb')->nullable();
            $table->string('nama_akun_fb')->nullable();
            
            $table->string('tahun_taslim')->nullable();
            $table->string('syahid_1')->nullable();
            $table->string('syahid_2')->nullable();
            $table->string('tempat_taslim')->nullable();

            $table->enum('pendidikan', ['sd', 'smp', 'sma', 'd1', 'd2', 'd3', 's1', 's2', 's3'])->nullable();
            $table->string('nama_lembaga')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('gelar_akademik')->nullable();
            $table->enum('pendidikan_tamat', ['n', 'p', 'y'])->nullable();
            $table->integer('tamat_tahun')->nullable();

            $table->text('minat_hobi')->nullable();
            $table->text('bakat_keahlian')->nullable();
            $table->enum('jenis_penghasilan', ['tetap', 'tidak'])->nullable();
            $table->decimal('penghasilan_mulai', 15, 2)->default(0);
            $table->decimal('penghasilan_sampai', 15, 2)->default(0);
            $table->decimal('pengeluaran_mulai', 15, 2)->default(0);
            $table->decimal('pengeluaran_sampai', 15, 2)->default(0);
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
        Schema::dropIfExists('users');
    }
}
