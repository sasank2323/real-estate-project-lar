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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('password');
            $table->string('token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // when you do php artisan migration:refresh --path=database/migrations/2025_12_25_100426_create_admin_table.php
        //now this will drop this column from admin table but not drop the whole table because we have some data in this table and if we drop the whole table then we will lose all the data in this table so we will drop only the column which we have added in this migration file
        Schema::table('admin', function (Blueprint $table) {
            $table->dropColumn(['name', 'token']);
        });
        //Schema::dropIfExists('admin');
    }
};
