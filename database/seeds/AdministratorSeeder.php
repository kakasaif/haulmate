<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrator')->insert([
            'name' => 'administrator',
            'email' => 'admin@admin.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('password'),
        ]);
    }
}
