<?php

use Illuminate\Database\Seeder;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->insert([
            [
                'name'        => 'Saanvi Sai',
                'country_id'  => 1, //India
                'testimonial' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.',
                'image_url'   => 'https://www.haulmate.co/assets/img/stories1.png',
                'order'       => 1,
                'is_active'   => 1,
            ],
            [
                'name'        => 'Hsiao-Han Deko',
                'country_id'  => 1, //Taiwan
                'testimonial' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.',
                'image_url'   => 'https://www.haulmate.co/assets/img/stories2.png',
                'order'       => 2,
                'is_active'   => 1,
            ],
            [
                'name'        => 'Mike Jones',
                'country_id'  => 1, //France
                'testimonial' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.',
                'image_url'   => 'https://www.haulmate.co/assets/img/stories3.png',
                'order'       => 3,
                'is_active'   => 1,
            ],
            [
                'name'        => 'Saanvi Sai',
                'country_id'  => 1,//India
                'testimonial' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.',
                'image_url'   => 'https://www.haulmate.co/assets/img/stories1.png',
                'order'       => 4,
                'is_active'   => 1,
            ],
        ]);
    }
}
