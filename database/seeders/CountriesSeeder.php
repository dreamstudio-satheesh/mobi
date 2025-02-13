<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Empty the countries table
        DB::table('countries')->delete();
      

        DB::table('countries')->insert(
            array('id' => '356','name' => 'India','currency' => 'Indian rupee','currency_symbol' => '₹','iso_3166_2' => 'IN','iso_3166_3' => 'IND','calling_code' => '91','flag' => 'IN.png','currency_code' => 'INR')
          );
    }
}
