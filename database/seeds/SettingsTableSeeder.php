<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
        	'site_name' => 'Know the Technology',
        	'address' => 'Mirpur, Dhaka-1216, Bangladesh',
        	'contact_email' => 'info@knowthetech.com',
        	'contact_number' => '88	01675665030'
        ]);
    }
}
