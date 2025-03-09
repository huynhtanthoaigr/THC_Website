<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->string('opening_hours')->nullable()->after('updated_at'); // Thêm cột mở cửa
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn('opening_hours');
        });
    }
};
