<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test http page index User.
     *
     * @return void
     */
    public function testUserIndex()
    {
        $user = $this->createUserAdmin();
        $this->actingAs($user)
            ->get(route('backend.users.index'))
            ->assertStatus(200)
            ->assertViewIs('backend.user.index');
    }

    /**
     * A basic test http page create Testimonial.
     *
     * @return void
     */
    public function testUserCreate()
    {
        $user = $this->createUserAdmin();

        $this->actingAs($user)
            ->get(route('backend.users.create'))
            ->assertStatus(200)
            ->assertViewIs('backend.user.new');
    }

    /**
     * A basic test http store Testimonial.
     *
     * @return void
     */
    public function testUserStore()
    {
        $user = $this->createUserAdmin();

        $dataRequest = $this->generateUserData();

        $this->actingAs($user)
            ->post(route('backend.users.store'), $dataRequest)
            ->assertStatus(302)
            ->assertSessionHasNoErrors()
            ->assertRedirect('/administrativo/usuarios');
    }

    /**
     * A basic test http page edit User.
     *
     * @return void
     */
    public function testUserEdit()
    {
        $userAdmin = $this->createUserAdmin();
        $user = factory(\App\Models\User::class)->create();

        $this->actingAs($userAdmin)
            ->get(route('backend.users.update', array('id' => $user->id)))
            ->assertStatus(200)
            ->assertViewIs('backend.user.edit')
            ->assertSee('Editar');
    }

    /**
     * A basic test http page update User.
     *
     * @return void
     */
    public function testUserUpdate()
    {
        $userAdmin = $this->createUserAdmin();
        $user = factory(\App\Models\User::class)->create();

        $dataRequest = $this->generateUserData();

        $this->actingAs($userAdmin)
            ->put(route('backend.users.update', array('id' => $user->id)), $dataRequest) 
            ->assertStatus(302)
            ->assertSessionHasNoErrors()
            ->assertRedirect('/administrativo/usuarios');
    }

    public function testActionDelete()
    {
        $userAdmin = $this->createUserAdmin();
        $user = factory(\App\Models\User::class)->create();

        $this->actingAs($userAdmin)
            ->delete(route('backend.users.destroy', array('id' => $user->id)))
            ->assertStatus(302)
            ->assertRedirect('/administrativo/usuarios');
    }
}
