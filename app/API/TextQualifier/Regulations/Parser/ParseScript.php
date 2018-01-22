<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 18.01.18
 * Time: 19:51
 */

namespace App\API\TextQualifier\Regulations\Parser;


use Symfony\Component\DomCrawler\Crawler;

class ParseScript extends AbstractParser
{
    public function handle()
    {
        $crawler = new Crawler($this->text->getOriginal());

        $nodeValues = $crawler->filter('script')->each(function (Crawler $node) {
            return [
                'text' => $node->text()
            ];
        });

        $this->text->addToken([
            'scripts' => $nodeValues
        ]);
    }
}