<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_sub_title',
        'hero_title',
        'hero_description',
        'btn1_text',
        'btn1_link',
        'btn2_text',
        'btn2_link',
        'image',
    ];
}
