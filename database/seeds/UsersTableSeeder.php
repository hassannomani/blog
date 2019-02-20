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
        $user = App\User::create([
        	'name' => 'Hassan Nomani',
        	'email' => 'nomanialvi@gmail.com',
        	'password' => bcrypt('123456'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.png',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil excepturi, nesciunt adipisci 
                        minima dolorem quidem, maxime dignissimos, laborum cupiditate aperiam vero consequatur dolor 
                        eius atque inventore placeat aspernatur ipsa voluptas!',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',

        ]);
    }
}
