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
        Schema::dropIfExists('book_covers');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('book_covers', function (Blueprint $table) {
            $table->id();
            $table->string('cover');
            $table->foreignId('book_id')->references('id')->on('books');
            $table->timestamps();
        });
    }
};
