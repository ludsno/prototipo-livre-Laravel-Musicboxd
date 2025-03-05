<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Review extends Model
// {
//     //
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['rating', 'review', 'date', 'user_id', 'song_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}