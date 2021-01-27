<?php

use App\User;
use App\Models\Categories;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(User::class, 5)->create();
        $faker = Faker::create();
        for ($index = 1; $index < 6; $index++) {
            $gender = 'male';
            if ($index === 2)
                $gender = 'female';

            $user_id = DB::table('users')->insertGetId([
                'first_name' => $faker->firstName($gender),
                'last_name' => $faker->lastName($gender),
                'username' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'photo_url' => 'assets/img/user' . $index . '.png',
                'birthday' => $faker->date('Y-m-d', '-20 years'),
                'gender' => $gender,
                'remember_token' => Str::random(10),
            ]);

            // add topics
            $topics_count = $faker->numberBetween(1, 2);
            for ($index1 = 0; $index1 < $topics_count; $index1++) {
                $topic_id = DB::table('topics')->insertGetId([
                    'topic' => $faker->sentence,
                    'owner_id' => $user_id,
                    'last_response' => date('Y-m-d H:i:s'),
                    'is_active' => 1
                ]);

                // add the topic to a few categories
                $categories_number = $faker->numberBetween(1, 2);
                $categories = Categories::all()->random($categories_number);
                foreach ($categories as $category) {
                    DB::table('topic_category')->insert(['topic_id' => $topic_id, 'category_id' => $category->id]);
                }

                // add question to topic
                $sentences = $faker->numberBetween(2, 10);
                $question = implode(' ', $faker->sentences($sentences));
                DB::table('topic_questions')->insert([
                    'topic_id' => $topic_id,
                    'user_id' => $user_id,
                    'question' => rtrim($question, '.') . '?',
                ]);
                
            }
        }
    }

}
