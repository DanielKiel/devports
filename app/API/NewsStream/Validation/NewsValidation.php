<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 14.01.18
 * Time: 11:07
 */

namespace App\API\NewsStream\Validation;


use App\Core\Validation\Scenario;

class NewsValidation extends Scenario
{
    public function authorize(): bool
    {
        return true;
    }

    public function onCreate(): array
    {
        return $this->onDefault();
    }

    public function onUpdate(): array
    {
        //when making an update, we do not need all the attributes - they are there, we do not force send the whole object to update
        //only a part of it
        return [

        ];
    }

    public function onDefault(): array
    {
        return [
            'title' => 'required',
            'status' => 'required',
            'content' => 'required',
            'teaser' => 'required'
        ];
    }
}