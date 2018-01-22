<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 17.01.18
 * Time: 20:27
 */

namespace App\API\TextQualifier\Regulations\Parser;



use Symfony\Component\DomCrawler\Crawler;

class ParseLinks extends AbstractParser
{

    /**
     *
     */
    public function handle()
    {
        $string = $this->text->getOriginal();

        $crawler = new Crawler($string);

        $nodeValues = $crawler->filter('a')->each(function (Crawler $node) {
            return [
                'text' => $node->text(),
                'href' => $node->attr('href')
            ];
        });

        $this->text->addToken([
            'links' => $nodeValues
        ]);
    }
}