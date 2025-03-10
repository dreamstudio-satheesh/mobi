<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    private $states = array(
    	array('name' => "Andaman and Nicobar Islands",'country_id' => 356),
		array('name' => "Andhra Pradesh",'country_id' => 356),
		array('name' => "Arunachal Pradesh",'country_id' => 356),
		array('name' => "Assam",'country_id' => 356),
		array('name' => "Bihar",'country_id' => 356),
		array('name' => "Chandigarh",'country_id' => 356),
		array('name' => "Chhattisgarh",'country_id' => 356),
		array('name' => "Dadra and Nagar Haveli",'country_id' => 356),
		array('name' => "Daman and Diu",'country_id' => 356),
		array('name' => "Delhi",'country_id' => 356),
		array('name' => "Goa",'country_id' => 356),
		array('name' => "Gujarat",'country_id' => 356),
		array('name' => "Haryana",'country_id' => 356),
		array('name' => "Himachal Pradesh",'country_id' => 356),
		array('name' => "Jammu and Kashmir",'country_id' => 356),
		array('name' => "Jharkhand",'country_id' => 356),
		array('name' => "Karnataka",'country_id' => 356),
		array('name' => "Kenmore",'country_id' => 356),
		array('name' => "Kerala",'country_id' => 356),
		array('name' => "Lakshadweep",'country_id' => 356),
		array('name' => "Madhya Pradesh",'country_id' => 356),
		array('name' => "Maharashtra",'country_id' => 356),
		array('name' => "Manipur",'country_id' => 356),
		array('name' => "Meghalaya",'country_id' => 356),
		array('name' => "Mizoram",'country_id' => 356),
		array('name' => "Nagaland",'country_id' => 356),
		array('name' => "Narora",'country_id' => 356),
		array('name' => "Natwar",'country_id' => 356),
		array('name' => "Odisha",'country_id' => 356),
		array('name' => "Paschim Medinipur",'country_id' => 356),
		array('name' => "Pondicherry",'country_id' => 356),
		array('name' => "Punjab",'country_id' => 356),
		array('name' => "Rajasthan",'country_id' => 356),
		array('name' => "Sikkim",'country_id' => 356),
		array('name' => "Tamil Nadu",'country_id' => 356),
		array('name' => "Telangana",'country_id' => 356),
		array('name' => "Tripura",'country_id' => 356),
		array('name' => "Uttar Pradesh",'country_id' => 356),
		array('name' => "Uttarakhand",'country_id' => 356),
		array('name' => "Vaishali",'country_id' => 356),
		array('name' => "West Bengal",'country_id' => 356)

    );
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->states as $key => $state) {
           if(!State::where('name', $state['name'])->first())
           State::create([
                'name' => $state['name'],
                'country_id' => $state['country_id']
            ]);
        }
    }
}
