<?php

use Illuminate\Database\Seeder;
use App\Models\Configuration;

class ConfigurationSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Configuration::create(['title' => 'Hackathon', 'logo' => 'backend/images/logo/logo.png', 'icon' => 'backend/images/ico/favicon.ico']);
    }
}