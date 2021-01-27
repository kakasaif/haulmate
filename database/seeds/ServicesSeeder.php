<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'PROPERTY',
                'description' => 'Help me find a place to live',
                'default_icon_url' => 'assets/img/organise/icon1.png',
                'active_icon_url' => 'assets/img/organise/icon1_w.png',
                'order' => 1,
                'is_active' => 1
            ],
            [
                'name' => 'MOVERS',
                'description' => 'I need someone to move my things',
                'default_icon_url' => 'assets/img/organise/icon2.png',
                'active_icon_url' => 'assets/img/organise/icon2_w.png',
                'order' => 2,
                'is_active' => 1
            ],
            [
                'name' => 'INSURANCE',
                'description' => 'Help me find a place to live',
                'default_icon_url' => 'assets/img/organise/insurance.png',
                'active_icon_url' => 'assets/img/organise/insurance_w.png',
                'order' => 3,
                'is_active' => 1
            ],
            [
                'name' => 'BANK ACCOUNT',
                'description' => 'I will need a local bank account',
                'default_icon_url' => 'assets/img/organise/icon4.png',
                'active_icon_url' => 'assets/img/organise/icon4_w.png',
                'order' => 4,
                'is_active' => 1
            ],
            [
                'name' => 'ARRIVING',
                'description' => 'Find me things to see and do when I land',
                'default_icon_url' => 'assets/img/organise/icon5.png',
                'active_icon_url' => 'assets/img/organise/icon5_w.png',
                'order' => 5,
                'is_active' => 1
            ],
            [
                'name' => 'OTHER',
                'description' => 'There are other things that I need to organise',
                'default_icon_url' => 'assets/img/organise/mobile.png',
                'active_icon_url' => 'assets/img/organise/mobile_w.png',
                'order' => 6,
                'is_active' => 1
            ],
        ]);
    }

}
