<?php

use App\Models\ProductCategory;
use App\Models\ProductSection;
use App\Models\ProductSectionItem;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_category = ProductCategory::all();
        $faker = Faker::create();
        
        foreach ($product_category as $category) {
            $section = array(
                ['category_id' => $category->id, 'name' => 'Lorem Ipsum Dolor imit', 'order' => 1, 'is_active' => 1],
                ['category_id' => $category->id, 'name' => 'Mucius Intellegebat te ius iriure', 'order' => 2, 'is_active' => 1]
            );
            ProductSection::insert($section);

            $product_section = ProductSection::where('category_id',$category->id)->get();
            foreach ($product_section as $section) {
                $item = array(
                    ['section_id' => $section->id, 'name' => $faker->sentence(4), 'order' => 1, 'is_active' => 1],
                    ['section_id' => $section->id, 'name' => $faker->sentence(4), 'order' => 2, 'is_active' => 1],
                    ['section_id' => $section->id, 'name' => $faker->sentence(4), 'order' => 3, 'is_active' => 1],
                    ['section_id' => $section->id, 'name' => $faker->sentence(4), 'order' => 4, 'is_active' => 1],
                );
                ProductSectionItem::insert($item);
            }
        }
    }
}
