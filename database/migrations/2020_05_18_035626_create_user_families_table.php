<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('nama')->nullable();
            $table->string('kode_nas')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('hubungan', ['suami', 'istri', 'anak'])->nullable();
            $table->enum('taslim_futuh', ['Y', 'T'])->nullable();
            $table->string('sakanu_syubah')->nullable();
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
        Schema::dropIfExists('user_families');
    }
}
