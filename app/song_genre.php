<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class song_genre extends Model
{
    protected $fillable=['song_id','genre_id'];
}
