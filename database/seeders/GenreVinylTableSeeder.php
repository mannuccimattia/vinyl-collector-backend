<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Vinyl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class GenreVinylTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vinylsIds = Vinyl::pluck("id")->toArray();
        $genresIds = Genre::pluck("id")->toArray();

        foreach ($vinylsIds as $vinylId) {
            $randomGenre = Arr::random($genresIds, 1);

            Vinyl::find($vinylId)->genres()->attach($randomGenre);
        }
    }
}
