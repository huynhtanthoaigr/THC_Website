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
        DB::statement("ALTER TABLE orders CHANGE COLUMN status status ENUM('pending', 'processing', 'shipped', 'delivered') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'");
    }
    
    public function down()
    {
        DB::statement("ALTER TABLE orders CHANGE COLUMN status status ENUM('pending', 'processing', 'shipped', 'delivered') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'");
    }
    
};
