<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$faker = \Faker\Factory::create();

        for($i = 0; $i < 5; $i++){
        	App\Supplier::create([
            	'ruc' => $faker->isbn10,
                'telefono' => $faker->e164PhoneNumber,
                'nombre' => $faker->company,
                'descripcion' => $faker->sentence,
                'email' => $faker->companyEmail,
                ]);
        }
    }
}
