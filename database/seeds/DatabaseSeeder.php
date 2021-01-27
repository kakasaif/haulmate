<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PrefOptionsSeeder::class,
            LocationsSeeder::class,
            AdministratorSeeder::class,
            CategoriesSeeder::class,
            UsersSeeder::class,
            ServicesSeeder::class,
            CountriesSeeder::class,
            DashboardLinksSeeder::class,
            TestimonialsSeeder::class,
            PartnerSeeder::class,
        ]);
    }

}
