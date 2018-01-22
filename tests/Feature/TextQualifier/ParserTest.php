<?php

namespace Tests\Feature\TextQualifier;

use App\API\TextQualifier\Objects\TextObject;
use App\API\TextQualifier\Regulations\Parser\ParseBlade;
use App\API\TextQualifier\Regulations\Parser\ParseLinks;
use App\API\TextQualifier\Regulations\Parser\ParseScript;
use Tests\TestCase;

class ParserTest extends TestCase
{
    public function testLinks()
    {
        $simpleText = file_get_contents(__DIR__ . '/data/simple.txt');
        $textObj = new TextObject($simpleText);

        (new ParseLinks($textObj))->handle();

        (new ParseScript($textObj))->handle();

        (new ParseBlade($textObj))->handle();

        $this->assertTrue($textObj->getTokens()->has('links'));

        $this->assertEquals(2, count($textObj->getTokens()->get('links')));

        $this->assertTrue($textObj->getTokens()->has('scripts'));

        $this->assertEquals(1, count($textObj->getTokens()->get('scripts')));

        $this->assertTrue($textObj->getTokens()->has('blade'));

        $this->assertEquals(2, count($textObj->getTokens()->get('blade')));
    }
}
