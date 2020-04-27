<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User([
        	'id' => '1',
        	'name' => 'Admin',
        	'email' => 'admin@test.com',
            'password' => Hash::make('123123'),
        ]);
        $user1->save();

        $user2 = new User([
        	'id' => '2',
        	'name' => 'User',
        	'email' => 'user@gmail.com',
            'password' => Hash::make('123123'),
        ]);
        $user2->save();

    }
}
