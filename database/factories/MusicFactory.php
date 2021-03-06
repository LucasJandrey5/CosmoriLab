<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Album;

class MusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_album' => rand(1, Album::all()->count()),
            'name_string' => $this->faker->name(),
            'price_decimal' => mt_rand(1, 1000)/10,
            'gender_enum' => $this->faker->randomElement(['eletronica', 'rock', 'alternativo','pop', 'ambiente', 'filme', 'acustico', 'funk', 'classico', 'reggae', 'podcasts', 'sertanejo', 'blues', 'kids', 'audiobooks']),
            'description_string' => $this->faker->realText(),
            'duration_time' => $this->returnRandomTime(),
            'release_date' => $this->faker->dateTimeThisDecade(),
            'tags_string' => $this->faker->realText(),
            'amount_purchases_int' => $this->faker->randomNumber(4, false),
            'amount_played_int' => $this->faker->randomNumber(7, false),
            'cover_uri_string' => 'https://i1.sndcdn.com/artworks-7OzaunxRWGKtRzna-ussynQ-t500x500.jpg',
            'song_youtube_url_string' => 'https://www.youtube.com/watch?v=g8VSOYAnbEM&list=RDKY_6FYsX6wo&index=3&ab_channel=Mar%C3%ADliaMendon%C3%A7a',
        ];
    }

    function returnRandomTime(){
        $time = '00:10:00';
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
