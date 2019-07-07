<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\HelperTest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use HelperTest;

    public function testUserCreate()
    {
        $userDomain = app('App\Domains\UserDomain');
        $userData = $this->generateUserData();
        $user = $userDomain->create($userData);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($user->first_name, $userData['first_name']);
        $this->assertEquals($user->email, $userData['email']);
        $this->assertTrue(!empty($user->password));
    }

    public function testUserEdit()
    {
        $userDomain = app('App\Domains\UserDomain');
        $userData = $this->generateUserData();
        $user = $userDomain->create($userData);

        $newUserData = $this->generateUserData();
        $updatedUser = $userDomain->update($newUserData, $user->id);

        $this->assertInstanceOf(User::class, $updatedUser);
        $this->assertEquals($updatedUser->first_name, $newUserData['first_name']);
        $this->assertEquals($updatedUser->email, $newUserData['email']);
        $this->assertTrue(!empty($updatedUser->password));
    }

    public function testUserDelete()
    {
        $userDomain = app('App\Domains\UserDomain');
        $userData = $this->generateUserData();
        $user = $userDomain->create($userData);

        $result = $userDomain->delete($user->id);

        $this->assertTrue($result);
    }
}
