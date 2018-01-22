<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 18.01.18
 * Time: 19:41
 */

namespace App\API\TextQualifier\Regulations\Parser;


use App\API\TextQualifier\Objects\TextObject;

abstract class AbstractParser
{
    /**
     * @var TextObject
     */
    protected $text;

    public function __construct(TextObject $text)
    {
        $this->text = $text;
    }

    abstract function handle();
}