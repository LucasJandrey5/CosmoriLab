<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => rand(1, User::all()->count()),
            'name_string' => $this->faker->name(),
            'albumType_string' => $this->faker->randomElement(['single', 'ep', 'album', 'cd']),
            'price_decimal' => mt_rand(1, 1000)/10,
            'gender_enum' => $this->faker->randomElement(['eletronica', 'rock', 'alternativo','pop', 'ambiente', 'filme', 'acustico', 'funk', 'classico', 'reggae', 'podcasts', 'sertanejo', 'blues', 'kids', 'audiobooks']),
            'description_string' => $this->faker->realText(),
            'duration_time' => $this->returnRandomTime(),
            'release_date' => $this->faker->dateTimeThisDecade(),
            'tags_string' => $this->faker->realText(),
            'amount_purchases_int' => $this->faker->randomNumber(4, false),
            'amount_played_int' => $this->faker->randomNumber(7, false),
            'cover_uri_string' => 'https://cdn.awsli.com.br/600x700/1610/1610163/produto/62282865/poster-donkey-kong-h-bd757a31.jpg',
            'album_spotify_uri_string' => 'https://open.spotify.com/album/4K3E5bhJb92E7eyeIJ16QR?si=MWZkwBXSSjOqaxx4PZzdIw',
        ];
    }

    function returnRandomTime(){
        $time = '01:00:00';
        list($h, $m, $s) = explode(":", $time);
        $seconds = $s + ($m * 60) + ($h * 3600);

        $seconds -= rand(0, $seconds); //set desired min and max values

        // now back to time format
        $hours = floor($seconds / 3600);
        $mins = floor($seconds / 60 % 60);
        $secs = floor($seconds % 60);

        return $timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
    }
}
