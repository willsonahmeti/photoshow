<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = array('name', 'description', 'cover_image');

    public function photo()
    {
        return $this->hasMany('App\Models\Photo');
    }
}
