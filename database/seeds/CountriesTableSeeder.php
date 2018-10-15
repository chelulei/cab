<?php

use Illuminate\Database\Seeder;
Use App\Country;
class CountriesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     * @return void
     */
    public function run() {

        \Illuminate\Support\Facades\DB::table('countries')->delete();
        $json = \Illuminate\Support\Facades\File::get("database/data/countries.json");
        $data = json_decode($json);
        foreach ($data as $datum){
            Country::create(array(
                'iso'=>$datum->iso,
                'iso3'=>$datum->iso3,
                'fips'=>$datum->fips,
                'country_name'=>$datum->country_name,
                'continent'=>$datum->continent,
                'currency_code'=>$datum->currency_code,
                'currency_name'=>$datum->currency_name,
                'phone_prefix'=>$datum->phone_prefix,
                'postal_code'=>$datum->postal_code,
                'languages'=>$datum->languages,
                'geonameid'=>$datum->geonameid
            ));
        }
    }
}
