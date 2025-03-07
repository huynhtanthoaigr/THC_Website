<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'image', 'category_id', 'status', 'author_id'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
