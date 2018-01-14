<?php

namespace Tests\Feature\NewsSteam;

use GuzzleHttp\Client;
use Laravel\Passport\Passport;
use Tests\TestCase;

class APITest extends TestCase
{
    public function testStore()
    {
        $news = [
            'title' => 'I must get a not-valid response, cuase I have less attributes then needed'
        ];

        Passport::actingAs($this->admin);

        $result = $this->json('POST', '/api/news', $news);

        $this->assertEquals(422, $result->getStatusCode());
    }
}
