<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateImagePath extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables_arr = [
            ['housing_images', ['image_url']],
            ['location_images', ['image_url']],
            ['partner', ['icon_url','banner_url']],
            ['pref_options', ['icon_url']],
            ['product', ['image','selected_image']],
            ['product_category', ['image','selected_image']],
            ['services', ['default_icon_url', 'active_icon_url']],
            ['testimonials', ['image_url']],
            ['users', ['photo_url']],
        ];

        foreach ($tables_arr as $table) {
            list($table_name, $columns) = $table;
            $table_data =  DB::table($table_name)->get();

            foreach ($table_data as $row) {
                $update = [];
                foreach ($columns as $column) {
                    $update[$column] = $this->newUrl($row->{$column});
                }
                DB::table($table_name)->where('id', $row->id)->update($update);
            }
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

    
    private function newUrl($url)
    {
        if (!empty($url)) {
            $url = str_replace("haulmate.appreneurs.co","www.haulmate.co",$url);
            $url = str_replace("http://", 'https://', $url);
        }

        return $url;
    }
}
