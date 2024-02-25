<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageWhyDentmate extends Model
{
    use HasFactory;

    protected $fillable = ['slot_number', 'photo_url', 'title', 'description', 'sort'];
}
