<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder{

    public function run(){
        Role::create(['name' => 'admin', 'description' => 'Administrador']);
        Role::create(['name' => 'user', 'description' => 'Usuário']);
    }

}