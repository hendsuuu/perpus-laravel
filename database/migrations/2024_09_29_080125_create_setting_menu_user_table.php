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
        Schema::create('setting_menu_user', function (Blueprint $table) {
            $table->id('no_seting');
            $table->foreignId('id_jenis_user')->references('id_jenis_user')->on('jenis_user')->onDelete('cascade');
            $table->foreignId('menu_id')->references('menu_id')->on('menu')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_menu_user');
    }
};