<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAbsoluteUrlImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users =  DB::table('users')->get();
        foreach ($users as $user) {
            $update_user = array(
                'photo_url' => $this->relativeToAbsUrl($user->photo_url)
            );
            DB::table('users')->where('id', $user->id)->update($update_user);
        }

        $housing_images =  DB::table('housing_images')->get();
        foreach ($housing_images as $row) {
            $update_data = array(
                'image_url' => $this->relativeToAbsUrl($row->image_url)
            );
            DB::table('housing_images')->where('id', $row->id)->update($update_data);
        }

        $location_images =  DB::table('location_images')->get();
        foreach ($location_images as $row) {
            $update_data = array(
                'image_url' => $this->relativeToAbsUrl($row->image_url)
            );
            DB::table('location_images')->where('id', $row->id)->update($update_data);
        }
    
        $pref_options =  DB::table('pref_options')->get();
        foreach ($pref_options as $row) {
            $update_data = array(
                'icon_url' => $this->relativeToAbsUrl($row->icon_url)
            );
            DB::table('pref_options')->where('id', $row->id)->update($update_data);
        }
    
        $services =  DB::table('services')->get();
        foreach ($services as $row) {
            $update_data = array(
                'default_icon_url' => $this->relativeToAbsUrl($row->default_icon_url),
                'active_icon_url' => $this->relativeToAbsUrl($row->active_icon_url),
            );
            DB::table('services')->where('id', $row->id)->update($update_data);
        }
      
        $countries =  DB::table('countries')->get();
        foreach ($countries as $row) {
            $update_data = array(
                'flag_url' => $this->relativeToAbsUrl($row->flag_url),
            );
            DB::table('countries')->where('id', $row->id)->update($update_data);
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

    private function relativeToAbsUrl($url)
    {
        if (substr($url, 0, 4) != "http" && !empty($url)) {
            $append = "https://www.haulmate.co";
            if (substr($url, 0, 1) != '/') {
                $append .= '/';
            }
            $url = $append . $url;
        }

        return $url;
    }
}
