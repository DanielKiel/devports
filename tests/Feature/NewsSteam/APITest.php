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

        //now a fully qualified news
        $news = [
            'title' => 'I must get a valid response',
            'teaser' => 'Tell about ...',
            'content' => 'Okay, i will be great news here. Tell about ...',
            'status' => 30 //this is hard coded here as a part of this test
        ];

        $result = $this->json('POST', '/api/news', $news);

        $this->assertEquals(201, $result->getStatusCode());

        $content = json_decode($result->getContent())->data;

        $this->assertEquals('I must get a valid response', $content->title);

        //make an update
        $result = $this->json('PUT', '/api/news/' . $content->id, [
            'title' => 'updated'
        ]);

        $this->assertEquals(200, $result->getStatusCode());

        $content = json_decode($result->getContent())->data;

        $this->assertEquals('updated', $content->title);

        //test get an ddelete
        $result = $this->json('GET', '/api/news/' . $content->id);

        $this->assertEquals(200, $result->getStatusCode());

        $result = $this->json('DELETE', '/api/news/' . $content->id);

        $this->assertEquals(200, $result->getStatusCode());

        $result = $this->json('GET', '/api/news/' . $content->id);

        $this->assertEquals(404, $result->getStatusCode());
    }

    public function testGetCollection()
    {
        Passport::actingAs($this->admin);

        $news = [
            'title' => 'I must get a valid response',
            'teaser' => 'Tell about ...',
            'content' => 'Okay, i will be great news here. Tell about ...',
            'status' => 30 //this is hard coded here as a part of this test
        ];

        //make some inserts
        for ($i = 0; $i < 20; $i++) {
            $result = $this->json('POST', '/api/news', $news);
            $this->assertEquals(201, $result->getStatusCode());
        }

        $all = $this->json('GET', '/api/news');
        $this->assertEquals(200, $all->getStatusCode());

        $content = json_decode($all->getContent());
        $this->assertEquals(20, $content->meta->total);

        //test the ordering: newest news are first, so ID Desc is set as a global scope order

        $first = array_shift($content->data);

        $second = array_shift($content->data);

        $this->assertTrue($first->id > $second->id);

    }

    public function testPublishedAndNonPublishedGet()
    {
        Passport::actingAs($this->admin);

        $news = [
            'title' => 'I must get a valid response',
            'teaser' => 'Tell about ...',
            'content' => 'Okay, i will be great news here. Tell about ...',
            'status' => 30 //this is hard coded here as a part of this test
        ];

        //make some inserts
        for ($i = 0; $i < 20; $i++) {
            $result = $this->json('POST', '/api/news', $news);
            $this->assertEquals(201, $result->getStatusCode());
        }

        //now make some news with other status
        $news = [
            'title' => 'I must get a valid response',
            'teaser' => 'Tell about ...',
            'content' => 'Okay, i will be great news here. Tell about ...',
            'status' => 20 //this is hard coded here as a part of this test
        ];

        //make some inserts
        for ($i = 0; $i < 20; $i++) {
            $result = $this->json('POST', '/api/news', $news);
            $this->assertEquals(201, $result->getStatusCode());
        }

        $all = $this->json('GET', '/api/news');
        $this->assertEquals(200, $all->getStatusCode());

        $content = json_decode($all->getContent());
        $this->assertEquals(20, $content->meta->total);

        //when be an admin, the use ris interested in all

        $all = $this->json('GET', '/api/news/all');
        $this->assertEquals(200, $all->getStatusCode());

        $content = json_decode($all->getContent());
        $this->assertEquals(40, $content->meta->total);
    }
}
