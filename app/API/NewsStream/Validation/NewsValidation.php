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
        return $this->onDefault();
    }

    public function onDefault(): array
    {
        return [
            'title' => 'required',
            'status' => 'required',
            'content' => 'required'
        ];
    }
}