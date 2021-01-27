<?php

use Illuminate\Database\Seeder;

class DashboardLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashboard_links = [
            ['title' => 'Visa & Immigration', 'url' => '#'],
            ['title' => 'How to get around', 'url' => '#'],
            ['title' => 'Typical expat lifestyle', 'url' => '#'],
            ['title' => 'Bank account', 'url' => '#'],
            ['title' => 'Tips for finding your perfect home', 'url' => '#'],
        ];
        DB::table('dashboard_links')->insert($dashboard_links);
    }
}
