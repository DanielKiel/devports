<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 17.01.18
 * Time: 19:40
 */

namespace App\API\Comments\Validation;


use App\Core\Validation\Scenario;
use Illuminate\Support\Facades\Auth;

class CommentValidation extends Scenario
{
    public function authorize(): bool
    {
        return true;
    }

    public function onDefault(): array
    {
        $rules = [
            'content' => 'required|min:20'
        ];

        if (Auth::guest()) {
            array_set($rules, 'email', 'required');
        }

        return $rules;
    }

    public function onCreate(): array
    {
        return $this->onDefault();
    }

    public function onUpdate(): array
    {
        return $this->onDefault();
    }
}