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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name')->nullable();
            $table->string('login')->after('email');
            $table->string('avatar')->after('password')->nullable();
            $table->foreignId('role_id')->references('id')->on('roles');
            $table->date('birth')->nullable();
            $table->string('experiens')->nullable();
            $table->string('about_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('login');
            $table->dropColumn('avatar');
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            $table->dropColumn('birth');
            $table->dropColumn('experiens');
            $table->dropColumn('about_user');
        });
    }
};
