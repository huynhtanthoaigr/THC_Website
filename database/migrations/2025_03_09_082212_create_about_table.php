<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề lớn
            $table->text('description'); // Nội dung chính
            $table->string('image')->nullable(); // Ảnh đại diện
            $table->string('sub_content_1')->nullable(); // Nội dung con 1
            $table->string('sub_content_2')->nullable(); // Nội dung con 2
            $table->string('sub_content_3')->nullable(); // Nội dung con 3
            $table->string('sub_content_4')->nullable(); // Nội dung con 4
            $table->string('sub_content_5')->nullable(); // Nội dung con 5
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
