<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'photo_url', 'name', 'branch_id', 'content'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
