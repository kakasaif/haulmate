<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PartnerSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('partner')->update(['is_active' => 0]);
        DB::table('partner')->insert([
            'title' => '10% off international Relocation',
            'subtitle' => 'Attend a property inspection and film it',
            'category' => 'Category',
            'icon_url' => asset('assets/img/task1.svg'),
            'banner_url' => asset('assets/img/partner_bg.png'),
            'banner_title' => 'Banner Title',
            'banner_subtitle' => 'Banner Subtitle',
            'banner_button' => 'Banner Button',
            'banner_action' => 'relocation',
            'body' => $faker->text,
            'button_text' => 'Learn More',
            'action' => 'relocation',
            'type' => 'relocation',
            'views' => $faker->numberBetween(1, 10),
            'order' => 1,
            'is_active' => 1,
        ]);
        DB::table('partner')->insert([
            'title' => '10% off international Affiliate',
            'subtitle' => 'Conduct a video tour of areas I’m interested in',
            'category' => 'Category',
            'icon_url' => asset('assets/img/task2.svg'),
            'banner_url' => asset('assets/img/partner_bg.png'),
            'banner_title' => 'A PERFECT PLAN<br/>JUST FOR YOU',
            'banner_subtitle' => '20GB FOR $18/MO',
            'banner_button' => 'GET STARTED',
            'banner_action' => 'affiliate',
            'body' => "<h2>A plan that's not complicated</h2>
                <span class=\"promo\">We make it easy for you.</span>
                <div class=\"row justify-content-center\">
                    <div class=\"col-md-6 col-lg-4\">
                        <div class=\"partner-plans__item\">
                            <span class=\"partner-plans__item--label\">20GB FOR $18/MO</span>
                            <div class=\"partner-plans__item--content\">
                                <span>Some option here</span>
                                <span>Some option here</span>
                                <span>Some option here</span>
                                <span>Some option here</span>
                                <span>Some option here</span>
                                <span>Some option here</span>
                            </div>
                        </div>
                    </div>
                </div>",
            'button_text' => 'Learn More',
            'action' => 'affiliate',
            'type' => 'affiliate',
            'views' => $faker->numberBetween(1, 10),
            'order' => 2,
            'is_active' => 1,
        ]);
        DB::table('partner')->insert([
            'title' => '10% off international Relocation',
            'subtitle' => 'Shortlist the best 5 rentals in my top areas',
            'category' => 'Category',
            'icon_url' => asset('assets/img/task3.svg'),
            'banner_url' => asset('assets/img/partner_bg.png'),
            'banner_title' => 'Banner Title',
            'banner_subtitle' => 'Banner Subtitle',
            'banner_button' => 'Banner Button',
            'banner_action' => 'relocation',
            'body' => $faker->text,
            'button_text' => 'Learn More',
            'action' => 'relocation',
            'type' => 'relocation',
            'views' => $faker->numberBetween(1, 10),
            'order' => 3,
            'is_active' => 1,
        ]);
        DB::table('partner')->insert([
            'title' => '10% off international Affiliate',
            'subtitle' => 'Attend a property inspection and film it',
            'category' => 'Category',
            'icon_url' => asset('assets/img/task4.svg'),
            'banner_url' => asset('assets/img/partner_bg.png'),
            'banner_title' => 'A PERFECT PLAN<br/>JUST FOR YOUR BUSINESS',
            'banner_subtitle' => '30GB FOR $21/MO',
            'banner_button' => 'GET STARTED',
            'banner_action' => 'affiliate',
            'body' => "<h2>A plan that's not complicated</h2>
                <span class=\"promo\">We make it easy for you.</span>
                <div class=\"row justify-content-center\">
                    <div class=\"col-md-6 col-lg-4\">
                        <div class=\"partner-plans__item\">
                            <span class=\"partner-plans__item--label\">20GB FOR $18/MO</span>
                            <div class=\"partner-plans__item--content\">
                                <span>Some option here</span>
                                <span>Some option here</span>
                                <span>Some option here</span>
                                <span>Some option here</span>
                                <span>Some option here</span>
                                <span>Some option here</span>
                            </div>
                        </div>
                    </div>
                </div>",
            'button_text' => 'Learn More',
            'action' => 'affiliate',
            'type' => 'affiliate',
            'views' => $faker->numberBetween(1, 10),
            'order' => 4,
            'is_active' => 1,
        ]);
        DB::table('partner')->insert([
            'title' => '10% off international Relocation',
            'subtitle' => 'Create your own tasks',
            'category' => 'Category',
            'icon_url' => asset('assets/img/task2.svg'),
            'banner_url' => asset('assets/img/partner_bg.png'),
            'banner_title' => 'Banner Title',
            'banner_subtitle' => 'Banner Subtitle',
            'banner_button' => 'Banner Button',
            'banner_action' => 'relocation',
            'body' => $faker->text,
            'button_text' => 'Learn More',
            'action' => 'relocation',
            'type' => 'relocation',
            'views' => $faker->numberBetween(1, 10),
            'order' => 5,
            'is_active' => 1,
        ]);
    }

}
