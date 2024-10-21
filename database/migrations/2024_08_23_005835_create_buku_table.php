<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('idbuku'); 
            $table->string('kode', 20);
            $table->string('judul', 500);
            $table->string('pengarang', 200);
            $table->unsignedBigInteger('id_kategori'); 
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};

