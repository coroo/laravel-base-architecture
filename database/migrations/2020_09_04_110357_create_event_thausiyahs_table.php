<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventThausiyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_acara')->nullable();
            $table->time('jam_acara')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->string('bulan_hijriyah_id')->nullable();
            $table->string('tahun_amaliyah_id')->nullable();
            $table->string('kode_halaqah')->nullable();
            $table->string('kode_mudzakkir')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('nama_ustadz')->nullable();
            $table->string('event_category')->nullable();
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('events');
    }
}
