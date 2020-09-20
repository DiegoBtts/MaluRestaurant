<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        // DB::table('users')->insert([
        //     'name' => 'demo',
        //     'username'=>'demo',
        //     'role'=>'admin',
        //     'photo'=>'',
        //     'password' => bcrypt('demo'),
        // ]);
        DB::table('users')->insert([
              'name' => 'demo',
              'username'=>'demo',
              'role'=>'admin',
              'photo'=>'',
               'password' => bcrypt('demo'),
          ]);

          DB::table('products')->insert([
              'name' => 'Tacos de Asada',
              'price'=>'25',
          ]);
          DB::table('products')->insert([
              'name' => 'Caramelo (Grande)',
              'price'=>'70',
          ]);
          DB::table('products')->insert([
              'name' => 'Caramelo (Chico)',
              'price'=>'35',
          ]);
          DB::table('products')->insert([
              'name' => 'Burro Asada',
              'price'=>'80',
          ]);
          DB::table('products')->insert([
              'name' => 'Burro Macho',
              'price'=>'90',
          ]);
          DB::table('products')->insert([
              'name' => 'Burro Percheron',
              'price'=>'100',
          ]);
          DB::table('products')->insert([
              'name' => 'Burro Malu',
              'price'=>'125',
          ]);
          DB::table('products')->insert([
              'name' => 'Hamburguesa c/Papas',
              'price'=>'70',
          ]);
          DB::table('products')->insert([
              'name' => 'Hamburguesa Malu',
              'price'=>'85',
          ]);
          DB::table('products')->insert([
              'name' => 'Pechuga a la Parrilla',
              'price'=>'120',
          ]);
          DB::table('products')->insert([
              'name' => 'Parrillada (2 Personas)',
              'price'=>'300',
          ]);
          DB::table('products')->insert([
              'name' => 'Parrillada (3 Personas)',
              'price'=>'420',
          ]);
          DB::table('products')->insert([
              'name' => 'Molcajete',
              'price'=>'180',
          ]);
          DB::table('products')->insert([
              'name' => 'Torre Malu',
              'price'=> '150',
          ]);
          DB::table('products')->insert([
              'name' => 'Camarones Aguachile',
              'price'=>'160',
          ]);
          DB::table('products')->insert([
              'name' => 'Tacos de Camaron',
              'price'=>'25',
          ]);
          DB::table('products')->insert([
              'name' => 'Tacos de Pescado',
              'price'=>'20',
          ]);
          DB::table('products')->insert([
              'name' => 'Taco Güero',
              'price'=> '25',
          ]);
          DB::table('products')->insert([
              'name' => 'Tostada de Camaron',
              'price'=>'55',
          ]);
          DB::table('products')->insert([
              'name' => 'Tostada de Callo',
              'price'=>'85',
          ]);
          DB::table('products')->insert([
              'name' => 'Tostada de Pulpo',
              'price'=>'55',
          ]);
          DB::table('products')->insert([
              'name' => 'Tostada Malu',
              'price'=>'85',
          ]);
          DB::table('products')->insert([
              'name' => 'Charola Fria',
              'price'=>'450',
          ]);
          DB::table('products')->insert([
              'name' => 'Charola Caliente',
              'price'=>'300',
          ]);
          DB::table('products')->insert([
              'name' => 'Coctel de Camaron (Chico)',
              'price'=>'50',
          ]);
          DB::table('products')->insert([
              'name' => 'Coctel de Camaron (Mediano)',
              'price'=>'90',
          ]);
          DB::table('products')->insert([
              'name' => 'Coctel de Camaron (Grande)',
              'price'=>'145',
          ]);
          DB::table('products')->insert([
              'name' => 'Campechana (Chico)',
              'price'=>'75',
          ]);
          DB::table('products')->insert([
              'name' => 'Campechana (Mediano)',
              'price'=>'120',
          ]);
          DB::table('products')->insert([
              'name' => 'Campechana (Grande)',
              'price'=>'175',
          ]);
          DB::table('products')->insert([
              'name' => 'Coctel de Callo (Chico)',
              'price'=>'80',
          ]);
          DB::table('products')->insert([
              'name' => 'Coctel de Callo (Mediano)',
              'price'=>'125',
          ]);
          DB::table('products')->insert([
              'name' => 'Coctel de Callo (Grande)',
              'price'=>'180',
          ]);
          DB::table('products')->insert([
              'name' => 'Coctel de Pulpo (Chico)',
              'price'=>'50',
          ]);
          DB::table('products')->insert([
              'name' => 'Coctel de Pulpo (Mediano)',
              'price'=>'90',
          ]);
          DB::table('products')->insert([
              'name' => 'Coctel de Pulpo (Grande)',
              'price'=>'145',
          ]);
          DB::table('products')->insert([
              'name' => 'Ceviche de Camaron 1/2lt',
              'price'=>'60',
          ]);
          DB::table('products')->insert([
              'name' => 'Ceviche de Camaron 1lt',
              'price'=>'120',
          ]);
          DB::table('products')->insert([
              'name' => 'Ceviche de Pescado 1/2lt',
              'price'=>'40',
          ]);
          DB::table('products')->insert([
              'name' => 'Ceviche de Pescado 1lt',
              'price'=>'80',
          ]);
          DB::table('products')->insert([
              'name' => 'Vaso de Caguamanta 1/2lt',
              'price'=>'50',
          ]);
          DB::table('products')->insert([
              'name' => 'Litro de Caguamanta',
              'price'=>'100',
          ]);
          DB::table('products')->insert([
              'name' => 'Camaron Empanizado',
              'price'=>'120',
          ]);
          DB::table('products')->insert([
              'name' => 'Camaron al Mojo de Ajo',
              'price'=>'120',
          ]);
          DB::table('products')->insert([
              'name' => 'Camaron Relleno',
              'price'=>'120',
          ]);
          DB::table('products')->insert([
              'name' => 'Momias de Camaron',
              'price'=>'120',
          ]);
          DB::table('products')->insert([
              'name' => '2 tacos de pulpo',
              'price'=>'75',
          ]);
          DB::table('products')->insert([
              'name' => 'Filete de Pescado Empanizado',
              'price'=>'100',
          ]);
          DB::table('products')->insert([
              'name' => 'Soda de Bote',
              'price'=> '15',
          ]);
          DB::table('products')->insert([
              'name' => 'Soda de Botella',
              'price'=> '20',
          ]);
          DB::table('products')->insert([
              'name' => 'Aguas Frescas',
              'price'=> '15',
          ]);
          

        $this->command->info('Demo user Created -> demo@demo.com / demo');
        $this->command->info('Done!');
    }
}