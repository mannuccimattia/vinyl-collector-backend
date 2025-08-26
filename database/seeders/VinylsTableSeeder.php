<?php

namespace Database\Seeders;

use App\Models\Vinyl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class VinylsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {

            $newVinyl = new Vinyl();

            $newVinyl->title = $faker->sentence(3);
            $newVinyl->artist = $faker->name();
            $newVinyl->country = $faker->country();
            $newVinyl->release_date = $faker->date("Y-m-d");
            $newVinyl->catalog_number = $faker->randomNumber(6, true);

            $newVinyl->save();
        }
    }
}
