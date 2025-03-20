<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run()
    {
        Slider::create([
            'hero_sub_title'    => 'Welcome To Motex!',
            'hero_title'        => 'We Offer Best Way To Find <span>Dream</span> Car',
            'hero_description'  => 'There are many variations of passages orem psum available but the majority have suffered alteration in some form the great explorer of the truth by injected humour.',
            'btn1_text'         => 'About More',
            'btn1_link'         => '#',
            'btn2_text'         => 'Learn More',
            'btn2_link'         => '#',
            'image'             => 'assets/img/slider/slider-1.jpg',
        ]);

        Slider::create([
            'hero_sub_title'    => 'Welcome To Motex!',
            'hero_title'        => 'We Offer Best Way To Find <span>Dream</span> Car',
            'hero_description'  => 'There are many variations of passages orem psum available but the majority have suffered alteration in some form the great explorer of the truth by injected humour.',
            'btn1_text'         => 'About More',
            'btn1_link'         => '#',
            'btn2_text'         => 'Learn More',
            'btn2_link'         => '#',
            'image'             => 'assets/img/slider/slider-2.jpg',
        ]);

        Slider::create([
            'hero_sub_title'    => 'Welcome To Motex!',
            'hero_title'        => 'We Offer Best Way To Find <span>Dream</span> Car',
            'hero_description'  => 'There are many variations of passages orem psum available but the majority have suffered alteration in some form the great explorer of the truth by injected humour.',
            'btn1_text'         => 'About More',
            'btn1_link'         => '#',
            'btn2_text'         => 'Learn More',
            'btn2_link'         => '#',
            'image'             => 'assets/img/slider/slider-3.jpg',
        ]);
    }
    
}
