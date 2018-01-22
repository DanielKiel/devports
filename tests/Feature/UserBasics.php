<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class UserBasics extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGod()
    {
        $this->assertTrue($this->admin->is_god);

        $user = User::create([
            'name' => 'admin',
            'email' => 'test@admin.help',
            'password' => bcrypt('nononono'),
            'profile' => [],
            'is_god' => false
        ]);

        $this->assertFalse($user->is_god);
    }
}
