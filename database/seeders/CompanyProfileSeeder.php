<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyProfile;

class CompanyProfileSeeder extends Seeder
{
    public function run()
    {
        CompanyProfile::create([
            'name' => 'Trầm Hương Việt Nam',
            'email' => 'contact@tramhuong.vn',
            'phone' => '0123 456 789',
            'address' => '123 Đường ABC, Quận 1, TP. Hồ Chí Minh',
            'website' => 'https://tramhuong.vn',
            'logo' => null,
        ]);
    }
}
