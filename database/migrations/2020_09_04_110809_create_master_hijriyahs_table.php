<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMasterHijriyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_hijriyahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bulan_hijriyah');
            $table->timestamps();
        });

        DB::table('master_hijriyahs')->insert([
            [
                'id'                => '1',
                'bulan_hijriyah'    => 'Ramadhan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '2',
                'bulan_hijriyah'    => 'Syawal',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '3',
                'bulan_hijriyah'    => 'Dzulqa’idah',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '4',
                'bulan_hijriyah'    => 'Dzulhijjah',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '5',
                'bulan_hijriyah'    => 'Muharram',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '6',
                'bulan_hijriyah'    => 'Shafar',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '7',
                'bulan_hijriyah'    => 'Rabi’ul Awal',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '8',
                'bulan_hijriyah'    => 'Rabi’ul Akhir',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '9',
                'bulan_hijriyah'    => 'Jumadil Awal',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '10',
                'bulan_hijriyah'    => 'Jumadil Akhir',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '11',
                'bulan_hijriyah'    => 'Rajab',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '12',
                'bulan_hijriyah'    => 'Sya’ban',
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
        Schema::dropIfExists('master_hijriyahs');
    }
}
