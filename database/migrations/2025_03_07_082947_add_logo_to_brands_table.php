<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoToBrandsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            // Thêm cột logo, kiểu string, cho phép null
            // Có thể dùng after('tên_cột_trước_đó') để sắp xếp vị trí
            $table->string('logo')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            // Xóa cột logo khi rollback migration
            $table->dropColumn('logo');
        });
    }
}
