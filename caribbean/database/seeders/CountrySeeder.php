<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $currencyCode = $faker->currencyCode;
    
            DB::table('tbl_country_reference')->insert([
                'name' => $faker->country,
                'currency_icon' => $this->getCurrencyIcon($currencyCode),
                'currency_name' => $faker->currency, // Corrected line
                'flag' => $faker->countryFlag,
                'country_code' => $currencyCode,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
    

protected function getCurrencyIcon($currencyCode)
{
    // You can implement logic here to retrieve the currency icon based on the currency code
    // Example: return an icon URL or code based on the currency code
    return 'public/assets/icons' . $currencyCode . '.png';
}

}
