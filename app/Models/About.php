<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about'; // Đảm bảo tên bảng đúng với database

    protected $fillable = [
        'title', 'description', 'image', 
        'sub_content_1', 'sub_content_2', 'sub_content_3', 
        'sub_content_4', 'sub_content_5'
    ];
}

