<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 14.01.18
 * Time: 11:05
 */

namespace App\Core\Validation;


use Illuminate\Foundation\Http\FormRequest;

abstract class Scenario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * we set it to true as default cause we use policies
     * @return bool
     */
    abstract  function authorize(): bool;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = strtolower($this->getMethod());

        if ($method === 'post') {
            return $this->onCreate();
        }

        if ($method === 'put') {
            return $this->onUpdate();
        }

        return $this->onDefault();
    }

    abstract  function onDefault(): array;

    abstract function onCreate():array;

    abstract function onUpdate(): array;
}