<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialTypeAlocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_type_allocation_inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_finansial_alokasi_input');
            $table->string('nama_finansial_alokasi_input');
            $table->string('shadaqah_alokasi');
            $table->timestamps();
        });

        DB::table('financial_type_allocation_inputs')->insert([
            [
                'kode_finansial_alokasi_input'      => 'zakat-fithrah',
                'nama_finansial_alokasi_input'      => 'Zakat Fithrah',
                'shadaqah_alokasi'                  => 'alokasi',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_alokasi_input'      => 'pembayaran-pinjaman',
                'nama_finansial_alokasi_input'      => 'Pembayaran Pinjaman',
                'shadaqah_alokasi'                  => 'alokasi',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'kode_finansial_alokasi_input'      => 'dana-alokasi',
                'nama_finansial_alokasi_input'      => 'Dana Alokasi',
                'shadaqah_alokasi'                  => 'alokasi',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'kode_finansial_alokasi_input'      => 'tabungan-umat',
                'nama_finansial_alokasi_input'      => 'Tabungan Umat',
                'shadaqah_alokasi'                  => 'alokasi',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'kode_finansial_alokasi_input'      => 'cicilan-usaha',
                'nama_finansial_alokasi_input'      => 'Cicilan usaha',
                'shadaqah_alokasi'                  => 'alokasi',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'kode_finansial_alokasi_input'      => 'alokasi-lain-lain',
                'nama_finansial_alokasi_input'      => 'Lain Lain',
                'shadaqah_alokasi'                  => 'alokasi',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'kode_finansial_alokasi_input'      => 'syahriyah',
                'nama_finansial_alokasi_input'      => 'Syahriyah',
                'shadaqah_alokasi'                  => 'shadaqah',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'kode_finansial_alokasi_input'      => 'tahunan',
                'nama_finansial_alokasi_input'      => 'Tahunan',
                'shadaqah_alokasi'                  => 'shadaqah',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'kode_finansial_alokasi_input'      => 'infaq-anfus',
                'nama_finansial_alokasi_input'      => 'Infaq Anfus',
                'shadaqah_alokasi'                  => 'shadaqah',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'kode_finansial_alokasi_input'      => 'donasi-jariyah',
                'nama_finansial_alokasi_input'      => 'Donasi & Jariyah',
                'shadaqah_alokasi'                  => 'shadaqah',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'kode_finansial_alokasi_input'      => 'shadaqah-lain-lain',
                'nama_finansial_alokasi_input'      => 'Lain Lain',
                'shadaqah_alokasi'                  => 'shadaqah',
                'created_at'        => now(),
                'updated_at'        => now()
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
        Schema::dropIfExists('financial_type_allocation_inputs');
    }
}
