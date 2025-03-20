<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            // Nội dung hiển thị trên slider
            $table->string('hero_sub_title');  // VD: "Welcome To Motex!"
            $table->string('hero_title');      // VD: "We Offer Best Way To Find <span>Dream</span> Car"
            $table->text('hero_description')->nullable(); // Mô tả slider
            // Thông tin cho 2 nút (nếu cần tùy chỉnh)
            $table->string('btn1_text')->nullable(); // VD: "About More"
            $table->string('btn1_link')->nullable();
            $table->string('btn2_text')->nullable(); // VD: "Learn More"
            $table->string('btn2_link')->nullable();
            // Đường dẫn ảnh background slider
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
