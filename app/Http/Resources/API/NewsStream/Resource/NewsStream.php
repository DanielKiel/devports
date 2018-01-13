<?php

namespace App\Http\Resources\API\NewsStream\Resource;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsStream extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
