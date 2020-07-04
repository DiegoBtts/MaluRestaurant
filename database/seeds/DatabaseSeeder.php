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
        DB::table('samplestype')->insert([
            'name' => 'Heces',
            'description'=>'Muestra de heces',
           
        ]);
        DB::table('samplestype')->insert([
            'name' => 'Orina',
            'description'=>'Muestra de orina',
           
        ]);
        DB::table('samplestype')->insert([
            'name' => 'Sangre',
            'description'=>'Muestra de sangre',
           
        ]);
        

        $this->command->info('Demo user Created -> demo@demo.com / demo');
        $this->command->info('Done!');
    }
}