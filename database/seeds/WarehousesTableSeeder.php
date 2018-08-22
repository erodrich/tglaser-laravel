<?php

use Illuminate\Database\Seeder;

class WarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	
		App\Warehouse::create([
			'nombre'=> 'Tienda',
			'descripcion' => 'Productos que se encuentran en el puesto de venta'
		]);

		App\Warehouse::create([
			'nombre'=> 'Almacen Clinica',
			'descripcion' => 'Productos que se encuentran en almacen central de la clinica'
		]);
	}
}
