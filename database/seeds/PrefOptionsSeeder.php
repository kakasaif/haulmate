<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefOptionsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pref_options')->insert([
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon1.png', 'preference' => 'Popular with locals'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon2.png', 'preference' => 'Quite'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon3.png', 'preference' => 'Low Rent'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon4.png', 'preference' => 'Families'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon5.png', 'preference' => 'Parks'],
            ['is_active' => 0, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon6.png', 'preference' => 'Pay for convenience'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon7.png', 'preference' => 'Single, ready to mingle'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon8.png', 'preference' => 'Bars'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon9.png', 'preference' => 'Library'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon10.png', 'preference' => 'Expat hotspot'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon11.png', 'preference' => 'Beach'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon12.png', 'preference' => 'Safe'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon13.png', 'preference' => 'Cafes'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon14.png', 'preference' => 'Students'],
            ['is_active' => 0, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon15.png', 'preference' => 'Religious'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon16.png', 'preference' => 'Exercise'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon17.png', 'preference' => 'Yoga'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon18.png', 'preference' => 'Public transport'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon19.png', 'preference' => 'Same Moving Origin'],
            ['is_active' => 1, 'icon_url' => 'https://www.haulmate.co/assets/img/icons/icon20.png', 'preference' => 'Local eats'],
        ]);
    }

}
