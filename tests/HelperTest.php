<?php

namespace Tests;

use App\Models\Banner;
use App\Models\Category;
use App\Models\ProfessionalProfile;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

trait HelperTest
{
    public function simulateSeedInit()
    {
        $this->createRoleAdmin();
    }

    public function createRoleAdmin()
    {
        Role::create(['name' => 'admin']);
    }

    public function createUserAdmin()
    {
        $user = User::create([
            'first_name' => 'Admin',
            'email' => 'Dev',
            'last_name' => 'Admin',
            'password' => '$2y$10$c2UVQrmrYsnx9sjs11zlX.L2Zd/s2FPCZh7W7JA4aqnSgGWsUbExC',
            'remember_token' => str_random(10),
            'cpf' => '123.456.789-09',
            'function' => 'Administrador',
            'access' => 'Administrador',
            'first_access' => '2018-10-01 17:19:08',
        ]);

        $user->assignRole('admin');

        return $user;
    }

    public function generateUserData()
    {
        $password = $this->faker->password;

        $userData = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'password' => $password,
            'password_confirmation' => $password,
            'birth_date' => $this->faker->date('d/m/Y'),
            'genre' => 'Feminino',
            'photo' => '',
            'address' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'neighborhood' => 'Bairro',
            'zip_code' => '30180-100',
            'complement' => 'Complemento',
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'roles' => 'admin',
        ];
        return $userData;
    }

    public function createUser()
    {
        $dataUser = $this->generateUserData();
        $user = User::create($dataUser);

        return $user;
    }
}
