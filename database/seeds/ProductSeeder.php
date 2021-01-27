<?php

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            array(
                'category_id'=> 4,
                'name'=> 'Chubb',
                'subtitle'=> '$180 / month',
                'image'=> 'https://www.haulmate.co/assets/img/comparison/chubb.svg',
                'selected_image'=> '',
                'order'=> 1,
                'is_active'=> 1,
            ),
            array(
                'category_id'=> 4,
                'name'=> 'Fwd',
                'subtitle'=> '$190 / month',
                'image'=> 'https://www.haulmate.co/assets/img/comparison/fwdfaq.svg',
                'selected_image'=> '',
                'order'=> 2,
                'is_active'=> 1,
            ),
            array(
                'category_id'=> 8,
                'name'=> 'DBS',
                'subtitle'=> 'Lorem Ipsum',
                'image'=> 'https://www.haulmate.co/assets/img/dbs.svg',
                'selected_image'=> '',
                'order'=> 1,
                'is_active'=> 1,
            ),
            array(
                'category_id'=> 8,
                'name'=> 'OCBC',
                'subtitle'=> 'Lorem Ipsum',
                'image'=> 'https://www.haulmate.co/assets/img/ocbc.svg',
                'selected_image'=> '',
                'order'=> 2,
                'is_active'=> 1,
            ),
            array(
                'category_id'=> 1,
                'name'=> 'Circles.Life',
                'subtitle'=> '$20 / month',
                'image'=> 'https://www.haulmate.co/assets/img/comparison/logo-circlelife.svg',
                'selected_image'=> '',
                'order'=> 1,
                'is_active'=> 1,
            ),
            array(
                'category_id'=> 1,
                'name'=> 'MyRepublic',
                'subtitle'=> '$22 / month',
                'image'=> 'https://www.haulmate.co/assets/img/comparison/myrepublic_logo.svg',
                'selected_image'=> '',
                'order'=> 2,
                'is_active'=> 1,
            ),
        ];

        $product_category = ProductCategory::whereNotIn('id', [4,8,1])->get();

        $faker = Faker::create();
        foreach ($product_category as $category) {
            for ($i=1; $i <= 2 ; $i++) { 
                $product[] = array(
                    'category_id'=> $category->id,
                    'name'=> $faker->company,
                    'subtitle'=> '$' . rand(20,200) . ' / month',
                    'image'=> $category->image,
                    'selected_image'=> '',
                    'order'=> $i,
                    'is_active'=> 1,
                );
            }
        }

        Product::insert($product);

        
        $product_detail = [
            array(
                'product_id' => 1,
                'section_item_id' => 25,
                'name' => 'Ne quo reque debet',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 1,
                'section_item_id' => 26,
                'name' => '$20 / month',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 1,
                'section_item_id' => 27,
                'name' => '<span class="cancel"></span>',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 1,
                'section_item_id' => 28,
                'name' => 'Ne quo reque debet',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 1,
                'section_item_id' => 29,
                'name' => 'Ne quo reque debet',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 1,
                'section_item_id' => 30,
                'name' => '<span class="cancel"></span>',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 1,
                'section_item_id' => 31,
                'name' => '<span class="ok"></span>',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 1,
                'section_item_id' => 32,
                'name' => '<span class="ok"></span>',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 2,
                'section_item_id' => 25,
                'name' => 'Ne quo reque debet',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 2,
                'section_item_id' => 26,
                'name' => '$20 / month',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 2,
                'section_item_id' => 27,
                'name' => '<span class="cancel"></span>',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 2,
                'section_item_id' => 28,
                'name' => 'Ne quo reque debet',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 2,
                'section_item_id' => 29,
                'name' => 'Ne quo reque debet',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 2,
                'section_item_id' => 30,
                'name' => '<span class="cancel"></span>',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 2,
                'section_item_id' => 31,
                'name' => '<span class="ok"></span>',
                'is_active'  => 1,
            ),
            array(
                'product_id' => 2,
                'section_item_id' => 32,
                'name' => '<span class="ok"></span>',
                'is_active'  => 1,
            ),
        ];

        $products = Product::all();
        $product_section = ProductSection::with('item')->get();

        foreach ($products as $product) {
            $sections = $product_section->where('category_id', $product->category_id);
            foreach ($sections as $section) {
                foreach ($section->item as $key => $item) {
                    $item_name = array(
                        $faker->sentence(rand(1,4)),
                        $faker->numerify('$'.rand(20,22).' / month'),
                        $faker->randomElement(['<span class="ok"></span>','<span class="cancel"></span>']),
                        $faker->sentence(rand(1,4)),
                    );
                    $product_detail[] =  array(
                        'product_id' => $product->id,
                        'section_item_id' => $item->id,
                        'name' => $item_name[$key],
                        'is_active'  => 1,
                    );
                }
            }
        }

        DB::table('product_detail')->insert($product_detail);
    }
}
