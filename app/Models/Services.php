<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = ['photo_url', 'name', 'description', 'service_list_type', 'created_by'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
