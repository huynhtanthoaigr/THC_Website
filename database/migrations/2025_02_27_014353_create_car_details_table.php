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
        Schema::create('car_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained()->onDelete('cascade');
            $table->string('engine')->nullable();
            $table->integer('horsepower')->nullable();
            $table->integer('torque')->nullable();
            $table->decimal('fuel_capacity', 5, 2)->nullable();
            $table->string('dimensions')->nullable();
            $table->integer('weight')->nullable();
            $table->text('warranty')->nullable();
            $table->text('features')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_details');
    }
};
