<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterFarahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_farah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_farah')->nullable();
            $table->string('nama_farah')->nullable();
            $table->timestamps();
        });
        DB::table('master_farah')->insert([
            [
                'kode_farah'       => '01',
                'nama_farah'       => 'Far\'ah 01',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'kode_farah'       => '02',
                'nama_farah'       => 'Far\'ah 02',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'kode_farah'       => '03',
                'nama_farah'       => 'Far\'ah 03',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'kode_farah'       => '04',
                'nama_farah'       => 'Far\'ah 04',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'kode_farah'       => '05',
                'nama_farah'       => 'Far\'ah 05',
                'created_at'       => now(),
                'updated_at'       => now()
            ],
            [
                'kode_farah'       => '06',
                'nama_farah'       => 'Far\'ah 06',
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
        Schema::dropIfExists('master_farah');
    }
}
