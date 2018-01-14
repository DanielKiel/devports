<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    public $admin;

    public $baseUrl;

    public function setUp()
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.help',
            'password' => bcrypt('nononono'),
            'profile' => []
        ]);

        $this->baseUrl = env('APP_URL');
    }
}
