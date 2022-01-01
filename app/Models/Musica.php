<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $fillable = ['name_string', 'price_decimal', 'gender_enum', 'description_string', 'duration_time', 'release_date', 'tags_string', 'amount_purchases_int', 'amount_played_int', 'cover_uri_string','song_spotify_uri_string'];
}
