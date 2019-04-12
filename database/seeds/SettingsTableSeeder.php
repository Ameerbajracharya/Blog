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
        	'site_name' => "Laravel's Blog",
        	'address' => 'Bkt',
        	'contact_number' => '  0987654321 ',
        	'contact_email' => 'meer@gmail.com'
        ]);
    }
}
