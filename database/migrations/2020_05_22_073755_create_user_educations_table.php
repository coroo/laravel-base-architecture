<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->enum('pendidikan', ['sd', 'smp', 'sma', 'd1', 'd2', 'd3', 's1', 's2', 's3'])->nullable();
            $table->string('nama_lembaga')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('gelar_akademik')->nullable();
            $table->enum('pendidikan_tamat', ['n', 'p', 'y'])->nullable();
            $table->integer('tamat_tahun')->nullable();

            $table->timestamps();
        });

            
        $existingLatestEdu = DB::connection('mysql')->table('users')->whereNotNull('nama_lembaga')->get();
        foreach($existingLatestEdu as $education){
            DB::table('user_educations')->insert([
                [
                    'user_id'               => $education->id,
                    'pendidikan'            => $education->pendidikan,
                    'nama_lembaga'          => $education->nama_lembaga,
                    'jurusan'               => $education->jurusan,
                    'gelar_akademik'        => $education->gelar_akademik,
                    'pendidikan_tamat'      => $education->pendidikan_tamat,
                    'tamat_tahun'           => $education->tamat_tahun,

                    'created_at'            => now(),
                    'updated_at'            => now()
                ],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_educations');
    }
}
