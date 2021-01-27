<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            'name' => 'Insurance',
            'is_active' => 1
        ]);
        DB::table('product_types')->insert([
            'name' => 'Mobile & Internet',
            'is_active' => 1
        ]);
        DB::table('product_types')->insert([
            'name' => 'Banks',
            'is_active' => 1
        ]);
    }

}
