<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 18.01.18
 * Time: 19:56
 */

namespace App\API\TextQualifier\Regulations\Parser;


use Symfony\Component\DomCrawler\Crawler;

class ParseBlade extends AbstractParser
{

    public function handle()
    {
        preg_match_all(
            '/\{{(.*)\}}/UsS',
            $this->text->getOriginal(),
            $matches
        );

        if (count($matches) !== 2) {
            return;
        }

        $original = array_shift($matches);
        $contents = array_shift($matches);

        $merged = [];

        foreach ($original as $key => $value) {
            $merged[] = [
                'roginal' => $value,
                'text' => array_get($contents, $key)
            ];
        }

        $this->text->addToken([
            'blade' => $merged
        ]);
    }

}