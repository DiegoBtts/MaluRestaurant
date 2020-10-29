<?php

use Illuminate\Database\Seeder;
use App\models\ProductsModel;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
              'name' => 'Tacos de Asada',
              'price'=>'25',
            ],
            [
              'name' => 'Caramelo (Grande)',
              'price'=>'70',
            ],
            [
              'name' => 'Caramelo (Chico)',
              'price'=>'35',
            ],
            [
              'name' => 'Burro Asada',
              'price'=>'80',
            ],
            [
              'name' => 'Burro Macho',
              'price'=>'90',
            ],
            [
              'name' => 'Burro Percheron',
              'price'=>'100',
            ],
            [
              'name' => 'Burro Malu',
              'price'=>'125',
            ],
            [
              'name' => 'Hamburguesa c/Papas',
              'price'=>'70',
            ],
            [
              'name' => 'Pechuga a la Parrilla',
              'price'=>'120',
            ],
            [
              'name' => 'Hamburguesa Malu',
              'price'=>'85',
            ],
            [
              'name' => 'Parrillada (2 Personas)',
              'price'=>'300',
            ],
            [
              'name' => 'Parrillada (3 Personas)',
              'price'=>'420',
            ],
            [
              'name' => 'Molcajete',
              'price'=>'180',
            ],
            [
              'name' => 'Torre Malu',
              'price'=> '150',
            ],
            [
              'name' => 'Camarones Aguachile',
              'price'=>'160',
            ],
            [
              'name' => 'Tacos de Camaron',
              'price'=>'25',
            ],[
              'name' => 'Tacos de Pescado',
              'price'=>'20',
            ],[
              'name' => 'Taco Güero',
              'price'=> '25',
            ],[
              'name' => 'Tostada de Camaron',
              'price'=>'55',
            ],[
              'name' => 'Tostada de Callo',
              'price'=>'85',
            ],[
              'name' => 'Tostada de Pulpo',
              'price'=>'55',
            ],[
              'name' => 'Tostada Malu',
              'price'=>'85',
            ],[
              'name' => 'Charola Fria',
              'price'=>'450',
            ],[
              'name' => 'Coctel de Camaron (Chico)',
              'price'=>'50',
            ],[
              'name' => 'Coctel de Camaron (Mediano)',
              'price'=>'90',
            ],[
              'name' => 'Coctel de Camaron (Grande)',
              'price'=>'145',
            ],[
              'name' => 'Campechana (Chico)',
              'price'=>'75',
            ],[
              'name' => 'Campechana (Mediano)',
              'price'=>'120',
            ],[
              'name' => 'Campechana (Grande)',
              'price'=>'175',
            ],[
              'name' => 'Coctel de Callo (Chico)',
              'price'=>'80',
            ],[
              'name' => 'Coctel de Callo (Mediano)',
              'price'=>'125',
            ],[
              'name' => 'Coctel de Callo (Grande)',
              'price'=>'180',
            ],[
              'name' => 'Coctel de Pulpo (Chico)',
              'price'=>'50',
            ],[
              'name' => 'Coctel de Pulpo (Mediano)',
              'price'=>'90',
            ],[
              'name' => 'Coctel de Pulpo (Grande)',
              'price'=>'145',
            ],[
              'name' => 'Ceviche de Camaron 1/2lt',
              'price'=>'60',
            ],[
              'name' => 'Ceviche de Camaron 1lt',
              'price'=>'120',
            ],[
              'name' => 'Ceviche de Pescado 1/2lt',
              'price'=>'40',
            ],[
              'name' => 'Ceviche de Pescado 1lt',
              'price'=>'80',
            ],[
              'name' => 'Vaso de Caguamanta 1/2lt',
              'price'=>'50',
            ],[
              'name' => 'Litro de Caguamanta',
              'price'=>'100',
            ],[
              'name' => 'Camaron Empanizado',
              'price'=>'120',
            ],[
              'name' => 'Camaron al Mojo de Ajo',
              'price'=>'120',
            ],[
              'name' => 'Camaron Relleno',
              'price'=>'120',
            ],[
              'name' => 'Momias de Camaron',
              'price'=>'120',
            ],[
              'name' => '2 tacos de pulpo',
              'price'=>'75',
            ],[
              'name' => 'Filete de Pescado Empanizado',
              'price'=>'100',
            ],[
              'name' => 'Soda de Bote',
              'price'=> '15',
            ],[
              'name' => 'Soda de Botella',
              'price'=> '20',
            ],[
              'name' => 'Aguas Frescas',
              'price'=> '15',
            ]];

            foreach ($data as $instituto) 
            {
                ProductsModel::create($instituto);
            }
          $this->command->info("List Products Created -> ".count($data)." Products");
          $this->command->info('Done!');
    }
}