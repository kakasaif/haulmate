<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_category = [
            [
                'type_id' => 2,
                'name' => 'Mobile Plans',
                'title' => 'Circles.Life, MyRepublic',
                'subtitle' => 'Starting from $30',
                'image' => 'https://www.haulmate.co/assets/img/telco.svg',
                'selected_image' => '',
                'order' => 1,
                'is_active' => 1,
            ],
            [
                'type_id' => 2,
                'name' => 'Internet',
                'title' => 'MyRepublic',
                'subtitle' => 'Starting from $20',
                'image' => 'https://www.haulmate.co/assets/img/internet.svg',
                'selected_image' => '',
                'order' => 2,
                'is_active' => 1,
            ],
            [
                'type_id' => 2,
                'name' => 'Mobile & Internet Bundled',
                'title' => 'MyRepublic',
                'subtitle' => 'Starting from $40',
                'image' => 'https://www.haulmate.co/assets/img/telco-internet.svg',
                'selected_image' => '',
                'order' => 3,
                'is_active' => 1,
            ],
            [
                'type_id' => 1,
                'name' => 'Health',
                'title' => 'Chubb, FWD',
                'subtitle' => 'Starting from $200',
                'image' => 'https://www.haulmate.co/assets/img/health.svg',
                'selected_image' => '',
                'order' => 1,
                'is_active' => 1,
            ],
            [
                'type_id' => 1,
                'name' => 'Home',
                'title' => 'Chubb, FWD',
                'subtitle' => 'Starting from $200',
                'image' => 'https://www.haulmate.co/assets/img/home.svg',
                'selected_image' => '',
                'order' => 2,
                'is_active' => 1,
            ],
            [
                'type_id' => 1,
                'name' => 'Travel',
                'title' => 'Chubb, FWD',
                'subtitle' => 'Starting from $200',
                'image' => 'https://www.haulmate.co/assets/img/travel.svg',
                'selected_image' => '',
                'order' => 3,
                'is_active' => 1,
            ],
            [
                'type_id' => 1,
                'name' => 'Life',
                'title' => 'Chubb, FWD',
                'subtitle' => 'Starting from $200',
                'image' => 'https://www.haulmate.co/assets/img/life.svg',
                'selected_image' => '',
                'order' => 4,
                'is_active' => 1,
            ],
            [
                'type_id' => 3,
                'name' => '',
                'title' => '',
                'subtitle' => '<p class="mb-0">Start the process of opening a bank account with <b>DBS</b> and other popular banks even before you land</p>',
                'image' => '',
                'selected_image' => '',
                'order' => 1,
                'is_active' => 1,
            ],
 
        ];
        DB::table('product_category')->insert($product_category);
    }
}
