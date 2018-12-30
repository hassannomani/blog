<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => 'Hassan Nomani',
        	'email' => 'nomanialvi@gmail.com',
        	'password' => bcrypt('123456')
        ]);
    }
}
