<?php

use Illuminate\Database\Seeder;
use App\models\UserModel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::create(
            [
              'name' => 'demo',
              'username'=>'demo',
              'role'=>'admin',
              'photo'=>'',
               'password' => bcrypt('demo'),
          ]);
          $this->command->info('Demo user Created -> demo@demo.com / demo');
          $this->command->info('Done!');
    }
}