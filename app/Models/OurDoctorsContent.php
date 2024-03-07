<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurDoctorsContent extends Model
{
    use HasFactory;

    protected $fillable = ['primary_photo_url', 'primary_title', 'primary_writeup'];
}
