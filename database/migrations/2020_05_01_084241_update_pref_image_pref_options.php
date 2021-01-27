<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePrefImagePrefOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $pref_options =  DB::table('pref_options')->get();
        foreach ($pref_options as $pref) {
            $update_pref = array(
                'is_active' => 0
            );
            DB::table('pref_options')->where('id', $pref->id)->update($update_pref);
        }

        $icon_url = "https://www.haulmate.co/assets/img/icons/";

        DB::table('pref_options')->insert([
             ['icon_url' => $icon_url . 'icon1.png' , 'preference'    => 'Popular with locals'],
             ['icon_url' => $icon_url . 'icon2.png' , 'preference'    => 'Quiet'],
             ['icon_url' => $icon_url . 'icon3.png' , 'preference'    => 'Low Rent'],
             ['icon_url' => $icon_url . 'icon4.png' , 'preference'    => 'Families'],
             ['icon_url' => $icon_url . 'icon5.png' , 'preference'    => 'Parks'],
             ['icon_url' => $icon_url . 'icon7.png' , 'preference' => 'Single, ready to mingle'],
             ['icon_url' => $icon_url . 'icon8.png' , 'preference'    => 'Bars'],
             ['icon_url' => $icon_url . 'icon9.png' , 'preference'    => 'Library'],
             ['icon_url' => $icon_url . 'icon10.png' , 'preference'    => 'Expat Hotspot'],
             ['icon_url' => $icon_url . 'icon11.png' , 'preference'    => 'Beach'],
             ['icon_url' => $icon_url . 'icon12.png' , 'preference'    => 'Safe'],
             ['icon_url' => $icon_url . 'icon13.png' , 'preference' => 'Cafes'],
             ['icon_url' => $icon_url . 'icon14.png' , 'preference' => 'Students'],
             ['icon_url' => $icon_url . 'icon16.png' , 'preference'=> 'Exercise'],
             ['icon_url' => $icon_url . 'icon17.png' , 'preference' => 'Yoga'],
             ['icon_url' => $icon_url . 'icon18.png' , 'preference'    => 'Public Transport'],
             ['icon_url' => $icon_url . 'icon19.png' , 'preference'    => 'Same Moving Origin'],
             ['icon_url' => $icon_url . 'icon20.png' , 'preference'    => 'Local Eats'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
