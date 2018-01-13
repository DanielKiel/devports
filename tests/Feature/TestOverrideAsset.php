<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestOverrideAsset extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAssetWithoutPublic()
    {
        $path = asset('/css/app.css');

        $this->assertTrue(str_is('*public*', $path));
    }
}
