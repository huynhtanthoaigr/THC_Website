<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run()
    {
        About::create([
            'title' => 'About Our Company',
            'description' => 'We are the world’s largest car dealership, offering top-quality services with over 30 years of experience.',
            'image' => 'about.jpg', // Change this if needed
            'sub_content_1' => '30 Years of Experience',
            'sub_content_2' => 'Top-Quality Car Services',
            'sub_content_3' => 'Affordable Prices',
            'sub_content_4' => 'High Customer Satisfaction',
            'sub_content_5' => 'Long-Term Warranty'
        ]);
    }
}
