<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEntranceChannelDescAtUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('entrance_channel', ['import-excel', 'admin-page', 'others'])->default('admin-page')->after('pengeluaran_sampai');
            $table->text('entrance_desc')->after('entrance_channel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('entrance_channel');
            $table->dropColumn('entrance_desc');
        });
    }
}
