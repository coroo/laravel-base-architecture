<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterAmaliyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_amaliyahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tahun_amaliyah');
            $table->timestamps();
        });

        DB::table('master_amaliyahs')->insert([
            [
                'id'                => '1',
                'tahun_amaliyah'    => '40/41',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '2',
                'tahun_amaliyah'    => '41/42',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '3',
                'tahun_amaliyah'    => '42/43',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '4',
                'tahun_amaliyah'    => '43/44',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '5',
                'tahun_amaliyah'    => '44/45',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '6',
                'tahun_amaliyah'    => '45/46',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '7',
                'tahun_amaliyah'    => '46/47',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '8',
                'tahun_amaliyah'    => '47/48',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '9',
                'tahun_amaliyah'    => '48/49',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '10',
                'tahun_amaliyah'    => '49/50',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '11',
                'tahun_amaliyah'    => '50/52',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id'                => '12',
                'tahun_amaliyah'    => '52/52',
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
        Schema::dropIfExists('master_amaliyahs');
    }
}
