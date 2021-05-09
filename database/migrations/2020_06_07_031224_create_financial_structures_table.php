<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_structures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_finansial_struktur');
            $table->string('nama_finansial_struktur');
            $table->timestamps();
        });

        DB::table('financial_structures')->insert([
            [
                'kode_finansial_struktur'      => 'amaliyah-amam',
                'nama_finansial_struktur'      => 'Amaliyah Amam',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_struktur'      => 'marhamah-takwin',
                'nama_finansial_struktur'      => 'Marhamah (Takwin)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_struktur'      => 'amaliyah-jamiah',
                'nama_finansial_struktur'      => 'Amaliyah Jami\'ah',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_struktur'      => 'lanishod-kesejahteraan-tabungan',
                'nama_finansial_struktur'      => 'Lanishod Kesejahteraan & Tabungan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_struktur'      => 'amaliyah-syubah-ash-shiddiqien',
                'nama_finansial_struktur'      => 'Amaliyah Syu\'bah Ash Shiddiqien',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_struktur'      => 'amaliyah-syubah-asy-syuhada',
                'nama_finansial_struktur'      => 'Amaliyah Syu\'bah Asy Syuhada',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_struktur'      => 'amaliyah-syubah-ash-sholihin',
                'nama_finansial_struktur'      => 'Amaliyah Syu\'bah Ash Sholihin',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_struktur'      => 'amaliyah-syubah-al-muttaquen',
                'nama_finansial_struktur'      => 'Amaliyah Syu\'bah Al Muttaquen',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_struktur'      => 'amaliyah-syubah-al-muhsinin',
                'nama_finansial_struktur'      => 'Amaliyah Syu\'bah Al Muhsinin',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_struktur'      => 'amaliyah-syubah-ash-shobirin',
                'nama_finansial_struktur'      => 'Amaliyah Syu\'bah Ash Shobirin',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_structures');
    }
}
