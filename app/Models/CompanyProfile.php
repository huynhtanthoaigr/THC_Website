<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'website', 'logo', 'opening_hours'];

}
