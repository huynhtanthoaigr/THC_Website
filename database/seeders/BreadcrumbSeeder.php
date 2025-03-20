<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Breadcrumb;

class BreadcrumbSeeder extends Seeder
{
    public function run()
    {
        $images = [
            'assets/img/breadcrumb/01.jpg',
            'assets/img/breadcrumb/02.jpg',
            'assets/img/breadcrumb/03.jpg',
            'assets/img/breadcrumb/04.jpg',
        ];

        foreach ($images as $image) {
            Breadcrumb::create(['background_image' => $image]);
        }
    }
}
