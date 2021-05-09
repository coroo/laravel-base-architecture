<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogNewUserUploadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_new_user_uploaders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('uploaded_file')->nullable();
            $table->enum('status', ['success', 'failed', 'pending'])->default('pending');
            $table->text('result_info')->nullable();
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
        Schema::dropIfExists('log_new_user_uploaders');
    }
}
