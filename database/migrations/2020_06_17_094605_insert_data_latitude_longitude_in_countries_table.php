<?php

use App\Models\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertDataLatitudeLongitudeInCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $csvFile = base_path('database/csv/countries.csv');
        $countries_csv = $this->readCSV($csvFile,array('delimiter' => ';'));

        array_shift($countries_csv);

        $countries = Country::all();
        foreach ($countries as $country) {
            Country::where('code', $country->code)->update([
                'latitude' => $countries_csv[$country->code][1] ?? 0,
                'longitude' => $countries_csv[$country->code][2] ?? 0,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            //
        });
    }
    
    public function readCSV($csvFile, $array)
    {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $parse_text = fgetcsv($file_handle, 0, $array['delimiter']);
            $line_of_text[$parse_text[0]] = $parse_text;
        }
        fclose($file_handle);
        return $line_of_text;
    }
}
