<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 13.01.18
 * Time: 19:44
 */

namespace App\Core\LaravelExtends;


use Illuminate\Routing\UrlGenerator as BaseUrlGenerator;

class UrlGenerator extends BaseUrlGenerator
{
    public function asset($path, $secure = null)
    {
        return parent::asset('public/' . $path, $secure);
    }
}