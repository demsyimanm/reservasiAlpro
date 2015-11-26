<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->forceDelete();

        for($i=1;$i<=1;$i++)
        {
            User::create(array(
                'username'  =>  'alpro',
                'name'      =>  'Alpro Laboratory',
                'password'  =>  Hash::make('alpro')
                ));
        }
    }
}
