<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
