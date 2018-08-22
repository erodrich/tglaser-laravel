<?php

use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		App\ProductType::create([
			'nombre' => 'Montura'
		]);

		App\ProductType::create([
			'nombre' => 'Lente'
		]);
		App\ProductType::create([
			'nombre' => 'Lunas'
		]);
    }
}
