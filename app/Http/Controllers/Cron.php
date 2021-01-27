<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Location_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Cron extends Controller
{

  public function updateLocationImage()
  {
    define("GOOGLE_PLACE_API", "AIzaSyCDlI0CzK16W_bJuVwFNu4_DKByK5fyjew");
    define("GOOGLE_PLACE_API_URL", "https://maps.googleapis.com/maps/api/place/");

    set_time_limit(0);

    // Get Locations
    $locations = Location::doesntHave('images')->get();

    foreach ($locations as $key => $location) {
      // Get Location and Place ID
      $lat                    = $location->latitude;
      $long                   = $location->longitude;
      $keyword                = $location->location;
      $nearby_search_url      = GOOGLE_PLACE_API_URL . "nearbysearch/json?location=$lat,$long&radius=1500&type=attraction&keyword=$keyword&key=" . GOOGLE_PLACE_API;
      $nearby_search_response = $this->curl($nearby_search_url);

      if (empty($nearby_search_response->results)) {
        continue;
      }

      // Get Place Details
      $place_id              = $nearby_search_response->results[0]->place_id;
      $place_detail_url      = GOOGLE_PLACE_API_URL . "details/json?place_id=$place_id&fields=photos,name,rating,formatted_phone_number&key=" . GOOGLE_PLACE_API;
      $place_detail_response = $this->curl($place_detail_url);

      // Get array of photos
      if (isset($place_detail_response->result->photos)) {
        $photos = $place_detail_response->result->photos;
        
        // Store Location Image
        $new_images = array();
        $index      = 1;
        foreach ($photos as $key => $photo) {
          $photo_reference  = $photo->photo_reference;
          $photo_detail_url = GOOGLE_PLACE_API_URL . "photo?maxwidth=1000&photoreference=$photo_reference&key=" . GOOGLE_PLACE_API;
          $photo            = file_get_contents($photo_detail_url);
          $filename         = "location/" . Str::random(40) . '.jpg';
          
          Storage::disk('public')->put($filename, $photo);

          $new_images[] = array(
            'location_id' => $location->id,
            'image_url'   => url(Storage::url($filename)),
            'order'       => $index++,
          );
        }

        // Insert new image locations
        Location_Image::insert($new_images);
      }
    }
  }

  public function clearLocationImages()
  {
    DB::table('location_images')->delete();
  }

  public function curl($url)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }
}
