<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialTypeAlocationOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_type_allocation_outputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_finansial_alokasi_output');
            $table->string('nama_finansial_alokasi_output');
            $table->timestamps();
        });

        DB::table('financial_type_allocation_outputs')->insert([
            [
                'kode_finansial_alokasi_output'      => 'pinjaman-marhamah',
                'nama_finansial_alokasi_output'      => 'Pinjaman Marhamah',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_alokasi_output'      => 'bantuan-marhamah',
                'nama_finansial_alokasi_output'      => 'Bantuan Marhamah',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_alokasi_output'      => 'operasional-&-program',
                'nama_finansial_alokasi_output'      => 'Operasional & Program',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_alokasi_output'      => 'operatsional',
                'nama_finansial_alokasi_output'      => 'Operatsional',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_alokasi_output'      => 'program-krja',
                'nama_finansial_alokasi_output'      => 'Program Krja',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_alokasi_output'      => 'rumah-tangga',
                'nama_finansial_alokasi_output'      => 'Rumah Tangga',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_alokasi_output'      => 'pembinaan',
                'nama_finansial_alokasi_output'      => 'Pembinaan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_alokasi_output'      => 'dana-cadangan',
                'nama_finansial_alokasi_output'      => 'Dana Cadangan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_alokasi_output'      => 'pengambilan-tabungan',
                'nama_finansial_alokasi_output'      => 'Pengambilan Tabungan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'kode_finansial_alokasi_output'      => 'pinjaman-usaha',
                'nama_finansial_alokasi_output'      => 'Pinjaman Usaha',
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
        Schema::dropIfExists('financial_type_allocation_outputs');
    }
}
