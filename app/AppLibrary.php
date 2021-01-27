<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class AppLibrary
{

  public static function uploadImage($id, $temp_path)
  {
    $image_upload = "";
    if ($temp_path) {
      if (is_array($temp_path)) {
        $image_upload = array();
        foreach ($temp_path as $image) {
          $image_path = $image->store($id, ['disk' => 'public']);
          $image_upload[] = url(Storage::url($image_path));
        }
      } else {
        $image_path = $temp_path->store($id, ['disk' => 'public']);
        return url(Storage::url($image_path));
      }
    }

    return $image_upload;
  }

  public static function addMailchimp($user)
  {
    $email  = $user->email;
    $fname  = $user->first_name;
    $lname  = $user->last_name;
    $apiKey = env('MAILCHIMP_API', '7c9a247de3e4e01c5b4fb0bae69e4e7c-us18');
    $listID = env('MAILCHIMP_LIST_ID', 'b57f436780');

    // MailChimp API URL
    $memberID   = md5(strtolower($email));
    $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
    $url        = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;

    // User Information
    $json = json_encode([
      'email_address' => $email,
      'status'        => 'subscribed',
      'merge_fields'  => [
        'FNAME' => $fname,
        'LNAME' => $lname
      ]
    ]);

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

    $result   = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpCode == 200) {
      return true;
    }

    return false;
  }

  public static function reOrderImage(Request $request, Model $model)
  {
    $order = 1;
    $image_ids = $request->input('image');
    if (!empty($image_ids)) {
        foreach ($image_ids as $image_id) {
            $model::where('id', $image_id)->update(['order'=>$order]);
            $order++;
        }
    }
  }

  public static function sortable(Request $request, Model $model)
  {
    if ($request->row_order) {
      foreach ($request->row_order as $key => $order) {
          $row = $model::find($key);
          $row->order = $order;
          $row->save();
      }
    }

    return response()->json([
        'success' => true,
    ]);
  }
}
