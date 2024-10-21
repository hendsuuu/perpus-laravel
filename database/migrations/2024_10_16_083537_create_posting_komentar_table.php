<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posting_komentar', function (Blueprint $table) {
            $table->string('KOMEN_ID', 30)->primary();
            $table->string('POSTING_ID', 30);
            $table->string('USER_ID', 30);
            $table->text('KOMENTAR_TEXT')->nullable();
            $table->string('KOMENTAR_GAMBAR', 200)->nullable();
            $table->string('CREATE_BY', 30);
            $table->timestamp('CREATE_DATE')->useCurrent();
            $table->char('DELETE_MARK', 1)->default('N');
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();

            // Foreign key constraint
            $table->foreign('POSTING_ID')->references('POSTING_ID')->on('posting')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting_komentar');
    }
};
