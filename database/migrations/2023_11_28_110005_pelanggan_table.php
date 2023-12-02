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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('id_pelanggan');
            $table->string('nama_pelanggan')->unique();
            $table->string('nomor_meja');
            $table->string('porsi_menu');
            $table->bigInteger('id_makanan')->unsigned();
            $table->foreign('id_makanan')->references('id_makanan')->on('menu')->onDelete('cascade');
            $table->integer('is_deleted')->length(1)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
