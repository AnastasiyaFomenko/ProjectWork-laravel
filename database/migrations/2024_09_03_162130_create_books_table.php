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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('name_id')->references('id')->on('name_books');
            $table->foreignId('age_limit_id')->references('id')->on('age_limits');
            $table->foreignId('annotation_id')->references('id')->on('annotations');
            $table->foreignId('year_id')->references('id')->on('publishing_years');
            $table->foreignId('house_id')->references('id')->on('publishing_houses');
            $table->foreignId('language_id')->references('id')->on('book_languages');
            $table->foreignId('binding_id')->references('id')->on('bindings');
            $table->foreignId('type_id')->references('id')->on('types');
            $table->string('ISBN')->references('id')->on('types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
