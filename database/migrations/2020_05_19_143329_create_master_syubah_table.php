<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterSyubahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_syubah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_syubah')->nullable();
            $table->string('nama_syubah')->nullable();
            $table->timestamps();
        });
        DB::table('master_syubah')->insert([
            [
                'kode_syubah'       => '01',
                'nama_syubah'       => '01. Ash Shiddiqien',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'kode_syubah'       => '02',
                'nama_syubah'       => '02. Asy Syuhada',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'kode_syubah'       => '03',
                'nama_syubah'       => '03. Ash Sholihin',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'kode_syubah'       => '04',
                'nama_syubah'       => '04. Al Muttaqien',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'kode_syubah'       => '05',
                'nama_syubah'       => '05. Al Muhsinin',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'kode_syubah'       => '06',
                'nama_syubah'       => '06. Ash Shobirin',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_syubah');
    }
}
