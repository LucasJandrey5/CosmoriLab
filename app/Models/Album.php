<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = ['name_string', 'id_user', 'price_decimal', 'gender_enum', 'description_string', 'duration_time', 'release_date', 'tags_string', 'amount_purchases_int', 'amount_played_int', 'cover_uri_string','album_spotify_uri_string'];
}
