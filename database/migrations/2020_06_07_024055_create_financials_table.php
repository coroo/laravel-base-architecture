<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('approval_id');
            
            $table->enum('debit_kredit', ['debit','kredit'])->default('debit');
            $table->enum('financial_input_type', ['shadaqah','alokasi'])->nullable();
            $table->string('financial_tipe_alokasi_pendanaan')->nullable();
            $table->string('financial_tipe_alokasi_pengeluaran')->nullable();
            $table->string('financial_struktur')->nullable();
            $table->date('tanggal_finansial')->nullable();
            $table->enum('bulan_finansial', ['ramadhan','syawal','dzulqaidah','dzulhijjah','muharram','shafar','rabiul awal','rabiul akhir','jumadil awal','jumadil akhir','rajab','syaban'])->nullable();
            $table->enum('tahun_finansial', ['40/41','41/42','42/43','43/44','44/45','45/46','46/47','47/48','48/49','49/50','50/52','52/52'])->nullable();
            $table->enum('metode_finansial', ['transfer','cash'])->nullable();
            $table->string('no_rek')->nullable();
            $table->text('atas_nama')->nullable();
            $table->text('bank_code')->nullable();
            $table->text('bukti_transfer')->nullable();

            $table->decimal('nominal_finansial', 15, 2)->default(0);
            $table->text('catatan')->nullable();
            $table->enum('status_finansial', ['pending','verified','reject'])->default('pending');
            
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
        Schema::dropIfExists('financials');
    }
}
