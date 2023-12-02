<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id('id_makanan');
            $table->string('nama_makanan');
            $table->string('jenis_makanan');
            $table->string('harga_makanan');
            $table->bigInteger('id_stok')->unsigned();
            $table->foreign('id_stok')->references('id_stok')->on('stok')->onDelete('cascade');
            $table->integer('is_deleted')->length(1)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
