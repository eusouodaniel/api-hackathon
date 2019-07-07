<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->delete();

        $user = new User();
        $user->email = 'admin';
        $user->first_name = 'Admin';
        $user->last_name = 'Dev';
        $user->address = 'Rua 1';
        $user->city = "Beo Horizonte";
        $user->state = "Minas Gerais";
        $user->password = bcrypt('123456');
        $user->save();

        $user->guard_name = 'web';
        $user->assignRole('admin');

        $user = new User();
        $user->email = 'User';
        $user->first_name = 'User';
        $user->last_name = 'Dev';
        $user->address = 'Rua 2';
        $user->city = "Beo Horizonte";
        $user->state = "Minas Gerais";
        $user->password = bcrypt('123456');
        $user->save();

        $user->guard_name = 'web';
        $user->assignRole('user');
    }
}
