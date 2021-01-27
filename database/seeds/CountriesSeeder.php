<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['code' => 'HR', 'country' => 'Hungary', 'flag_url' => 'assets/img/flags/hr.svg', 'is_active' => 1],
            ['code' => 'UA', 'country' => 'Ukraine', 'flag_url' => 'assets/img/flags/ua.svg', 'is_active' => 1],
            ['code' => 'US', 'country' => 'USA', 'flag_url' => 'assets/img/flags/us.svg', 'is_active' => 1],
        ];
        DB::table('countries')->insert($countries);
    }
}
