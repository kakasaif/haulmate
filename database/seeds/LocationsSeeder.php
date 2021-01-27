<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LocationsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $locations = [
            'Downtown' => 'assets/img/areas/area1.png',
            'Tiong Bahru' => 'assets/img/areas/area2.png',
            'Kallang' => 'assets/img/areas/area3.png',
            'Newton' => 'assets/img/areas/area4.png',
            'Orchard' => 'assets/img/areas/area5.png',
            'River Valley' => 'assets/img/areas/area6.png',
            'Tanglin' => 'assets/img/areas/area7.png',
            'Geylang' => 'assets/img/areas/area8.png',
        ];
        foreach ($locations as $location => $image) {
            // add locations
            $id = DB::table('locations')->insertGetId([
                'location' => $location,
                'seo_name' => strtolower(str_replace(' ', '-', $location)),
                'title' => 'Here is some title',
                'description' => $faker->text,
                'latitude' => $faker->latitude(1.28, 1.35),
                'longitude' => $faker->longitude(103.78, 103.86),
                'schools' => $faker->numberBetween(1, 100),
                'supermarkets' => $faker->numberBetween(1, 100),
                'restaurants' => $faker->numberBetween(1, 100),
                'parks' => $faker->numberBetween(1, 100),
                'source_url' => '',
                'is_active' => 1,
            ]);

            // add location images
            DB::table('location_images')->insert([
                'location_id' => $id,
                'image_url' => $image,
                'order' => 1,
            ]);
            $loc_images_count = $faker->numberBetween(3, 5);
            for ($index = 1; $index < $loc_images_count; $index++) {
                DB::table('location_images')->insert([
                    'location_id' => $id,
                    'image_url' => 'assets/img/place' . $index . '.png',
                    'order' => $index + 1,
                ]);
            }

            // add housing
            $housings = $faker->numberBetween(3, 6);
            for ($index = 0; $index < $housings; $index++) {
                $rooms = $faker->numberBetween(1, 4);
                if ($rooms > 1)
                    $rooms_text = "$rooms rooms flat with soft interior";
                else
                    $rooms_text = "$rooms room flat with soft interior";
                $housing_id = DB::table('housing')->insertGetId([
                    'title' => $rooms_text,
                    'rate' => $faker->numberBetween(200 * $rooms, 500 * $rooms),
                    'description' => $faker->text,
                    'location_id' => $id,
                    'bedrooms' => $rooms,
                    'persons' => $faker->numberBetween(1, 2 * $rooms),
                    'showers' => $faker->numberBetween(1, $rooms),
                    'area' => $faker->numberBetween(100, 400) . ' square feet',
                    'listed_date' => date('Y-m-d'),
                    'source_url' => '',
                    'is_active' => 1,
                ]);

                // add housing images
                $house_images_count = $faker->numberBetween(3, 5);
                for ($idx = 1; $idx < $house_images_count; $idx++) {
                    DB::table('housing_images')->insertGetId([
                        'housing_id' => $housing_id,
                        'image_url' => 'assets/img/property' . $idx . '.png',
                        'order' => $idx,
                    ]);
                }
            }
        }
    }

}
