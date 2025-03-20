<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('breadcrumbs', function (Blueprint $table) {
            $table->id();
            $table->string('background_image'); // Chỉ lưu ảnh
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('breadcrumbs');
    }
};
