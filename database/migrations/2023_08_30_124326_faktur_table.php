<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('nomorInvoice');
            $table->unsignedBigInteger('barangId');
            $table->foreign('barangId') -> references('id') -> on('products') ->onUpdate('cascade')-> onDelete('cascade');
            $table->string('kategoriBarang');
            $table->string('namaBarang');
            $table->integer('jumlahBarang');
            $table->integer('subTotal');
            $table->string('alamatPengiriman');
            $table->string('kodePos');
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
        Schema::dropIfExists('invoices');
    }
};
