<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Housing extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'housing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'type_id', 'rate', 'description', 'meta_title', 'meta_description', 'meta_keyword', 'location_id', 'bedrooms', 'persons',
        'showers', 'area', 'postal_code', 'latitude', 'longitude', 'listed_date', 'source_url', 'partner_id', 'is_active'
    ];

    public function images()
    {
        return $this->hasMany('App\Models\Housing_Image');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Housing_Type');
    }

    public static function saveUserFave($user, $request)
    {
        if (empty($user))
            return;

        if (empty($request->fave))
            DB::table('user_housing')->where(['user_id' => $user->id, 'housing_id' => $request->housing_id])->delete();
        else
            DB::table('user_housing')->insert(['user_id' => $user->id, 'housing_id' => $request->housing_id]);
    }

    public static function getUserFave($user)
    {
        $query = DB::table('user_housing')
                ->selectRaw('GROUP_CONCAT(housing_id) as faves')
                ->where('user_id', $user->id)
                ->groupBy('user_id')
                ->get()->first();
        if (empty($query->faves))
            return [];

        return explode(',', $query->faves);
    }
}
