<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientTestimonial extends Model
{
    use HasFactory;

    protected $fillable = ['photo_url', 'testimonial', 'name', 'created_by'];
}
