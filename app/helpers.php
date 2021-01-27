<?php

if (!function_exists('time_ago')) {


    function time_ago($date)
    {
        $timestamp = strtotime($date);

        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60", "60", "24", "30", "12", "10");

        $currentTime = time();
        if ($currentTime >= $timestamp) {
            $diff = time() - $timestamp;
            for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
                $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            return $diff . " " . $strTime[$i] . "(s) ago ";
        }
    }

}

if (!function_exists('get_countries')) {


    function get_countries($where = [], $first_countries = ['SG'])
    {
        $countries = DB::table('countries')
                ->when(!empty($where), function($query) use ($where)
                {
                    return $query->where($where);
                })
                ->orderBy('country', 'asc')
                ->get()->keyBy('code')->all();

        return reorder_countries($countries, $first_countries);
    }

}

if (!function_exists('reorder_countries')) {


    function reorder_countries($countries, $first_countries = [])
    {
        if (empty($countries))
            return [];
        if (empty($first_countries))
            return $countries;
        foreach ($first_countries as $country_code) {
            if (array_key_exists($country_code, $countries)) {
                $country = $countries[$country_code];
                unset($countries[$country_code]);
                array_unshift($countries, $country);
            }
        }
        return $countries;
    }

}

if (!function_exists('get_href_target')) {


    function get_href_target($target = "", $url = "")
    {
        $target_attr = "";
        switch ($target) {
            case 'Same Window':
                $target_attr = 'target="_self"';
                break;
            case 'New Tab':
                $target_attr = 'target="_blank"';
                break;
            case 'New Window':
                $target_attr = 'onclick=window.open("' . $url . '","","width=600,height=400")';
                break;

            default:
                $target_attr = "";
                break;
        }

        return $target_attr;
    }

}

if (!function_exists('get_lat_long')) {

    function get_lat_long($item = '')
    {
        if (!empty($item)) {
            $search = str_replace(' ', '+', $item);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://developers.onemap.sg/commonapi/search?searchVal=' . $search . '&returnGeom=Y&getAddrDetails=Y&pageNum=1');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $content = curl_exec($ch);
            if (curl_errno($ch)) {
//                echo 'Error:' . curl_error($ch);
                curl_close($ch);
                return [
                    'lat' => \App\User::DEFAULT_LATITUDE,
                    'long' => \App\User::DEFAULT_LONGITUDE,
                    'address' => \App\User::DEFAULT_ADDRESS
                ];
            }
            curl_close($ch);

            $object = json_decode($content);
            if (!empty($object->results)) {
                foreach ($object->results as $result) {
                    $address = [
                        'lat' => $result->LATITUDE,
                        'long' => $result->LONGITUDE,
                        'address' => $result->ADDRESS
                    ];
                    break;
                }
                if (!empty($address))
                    return $address;
            }
        }
        return [
            'lat' => \App\User::DEFAULT_LATITUDE,
            'long' => \App\User::DEFAULT_LONGITUDE,
            'address' => \App\User::DEFAULT_ADDRESS
        ];
    }

}

if (!function_exists('get_distance')) {

    function get_distance($remoteness = 15, $transport = 'public')
    {
        if (empty($remoteness))
            $remoteness = 15;
        $transport_multiplier = [
            'walking' => 0.2,
            'public' => 0.5,
            'drive' => 0.75,
        ];
        $multiplier = empty($transport_multiplier[$transport]) ? $transport_multiplier['public'] : $transport_multiplier[$transport];
        return $remoteness * $multiplier;
    }

}

if (!function_exists('get_time_by_distance')) {

    function get_time_by_distance($distance, $transport = 'public')
    {
        $transport_multiplier = [
            'walking' => 10,
            'public' => 3,
            'drive' => 1,
        ];
        $multiplier = empty($transport_multiplier[$transport]) ? $transport_multiplier['public'] : $transport_multiplier[$transport];
        return round($distance * $multiplier, 0);
    }

}

if (!function_exists('calc_distance')) {

    function calc_distance($lat1, $lon1, $lat2 = 1.290439, $lon2 = 103.845567, $unit = 'K')
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {// "M"
                return $miles;
            }
        }
    }

}

if (!function_exists('dateDifference')) {

    function dateDifference($date_1, $date_2, $differenceFormat = '%a')
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);
    }

}

if (!function_exists('getPercForLoc')) {

    function getPercForLoc($loc_prefs, $user_pref_ids = array())
    {
        $score = 0;
        $perc = 0;
        $count = 0;

        if (count($user_pref_ids)) {
            foreach ($user_pref_ids as $up) {
                $score += getScoreForPref($loc_prefs, $up);
                $count++;
            }
        } else {
            foreach ($loc_prefs as $lp) {
                $score += $lp->score;
                $count++;
            }
        }

        if ($score)
            $perc = $score * 100 / ($count * 5);

        return $perc;
    }

}

if (!function_exists('getScoreForPref')) {

    function getScoreForPref($loc_prefs, $pref_id)
    {
        if (!is_array($loc_prefs) || count($loc_prefs) === 0)
            return 0;

        foreach ($loc_prefs as $lp_id => $lp) {
            if ($lp_id === $pref_id)
                return $lp->score;
        }

        return 0;
    }

}
