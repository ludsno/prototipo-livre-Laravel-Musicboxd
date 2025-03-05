<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['title', 'artist'];

    // Mudei aqui. 21:21, 04/03/2025
    // protected $casts = [
    //     'created_at' => 'datetime',
    //     'updated_at' => 'datetime',
    // ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
