<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsContent extends Model
{
    use HasFactory;

    protected $fillable = ['our_story_photo_url', 'our_story_writeup', 'founders_photo_url', 'founders_writeup'];
}
