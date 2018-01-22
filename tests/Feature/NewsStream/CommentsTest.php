<?php

namespace Tests\Feature\NewsStream;

use App\API\NewsStream\Models\News;
use App\API\Comments\Models\Comment;
use Laravel\Passport\Passport;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testWriteComment()
    {
        Passport::actingAs($this->admin);

        //now a fully qualified news
        $news = [
            'title' => 'I must get a valid response',
            'teaser' => 'Tell about ...',
            'content' => 'Okay, i will be great news here. Tell about ...',
            'status' => 30 //this is hard coded here as a part of this test
        ];

        $result = $this->json('POST', route('api.news.store'), $news);

        $this->assertEquals(201, $result->getStatusCode());

        $content = json_decode($result->getContent())->data;

        //write a comment - invalid cause a comment must have 20 signs
        $result = $this->json('POST', route('api.news.comment.store', [
            'news' => $content->id,
        ]), [
            'content' => 'I am a comment'
        ]);

        $this->assertEquals(422, $result->getStatusCode());

        $result = $this->json('POST', route('api.news.comment.store', [
            'news' => $content->id,
        ]), [
            'content' => 'I am a comment with a longer body, so it must be fine and the comment must be saved'
        ]);

        $this->assertEquals(201, $result->getStatusCode());

        $comment = json_decode($result->getContent())->data;

        $this->assertEquals('I am a comment with a longer body, so it must be fine and the comment must be saved', $comment->content);

        //now test the relation - a comment must be published before it will be a relation
        $news = News::find($content->id);

        $this->assertEquals(0, $news->comments()->count());

        //simulate a workflow - the comment will be published
        $commentObj = Comment::all()->first();
        $commentObj->update([
            'status' => 30
        ]);

        $this->assertEquals(1, $news->fresh()->comments()->count());
    }
}
