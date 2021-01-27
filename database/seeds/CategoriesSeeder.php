<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category' => 'Categories', 'seo_name' => 'categories', 'is_active' => 1],
            ['category' => 'Movers', 'seo_name' => 'movers', 'is_active' => 1],
            ['category' => 'Arriving', 'seo_name' => 'arriving', 'is_active' => 1],
            ['category' => 'Jobs', 'seo_name' => 'jobs', 'is_active' => 1],
            ['category' => 'New friends', 'seo_name' => 'new-friends', 'is_active' => 1],
            ['category' => 'School', 'seo_name' => 'school', 'is_active' => 1],
            ['category' => 'Bank account', 'seo_name' => 'bank-account', 'is_active' => 1],
            ['category' => 'Other', 'seo_name' => 'other', 'is_active' => 1],
        ];
        DB::table('categories')->insert($categories);
    }
}
