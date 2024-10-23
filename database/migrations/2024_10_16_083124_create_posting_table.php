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
        Schema::create('posting', function (Blueprint $table) {
            $table->string('POSTING_ID', 30)->primary();
            $table->foreignId('SENDER')->references('id_user')->on('users')->onDelete('cascade');
            $table->text('MESSAGE_TEXT')->nullable();
            $table->string('MESSAGE_GAMBAR', 200)->nullable();
            $table->string('CREATE_BY', 30)->nullable();
            $table->timestamp('CREATE_DATE')->useCurrent();
            $table->char('DELETE_MARK', 1)->default('N');
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting');
    }
};
