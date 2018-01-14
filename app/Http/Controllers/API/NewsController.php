<?php

namespace App\Http\Controllers\API;

use App\API\NewsStream\Models\News;
use App\Http\Resources\ModelCollectionResource;
use App\Http\Resources\ModelResource;
use App\Http\Controllers\Controller;
use App\API\NewsStream\Validation\NewsValidation as JSONRequest;

class NewsController extends Controller
{
    /**
     * @return ModelCollectionResource
     */
    public function index()
    {
        return new ModelCollectionResource(News::paginate());
    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * @param JSONRequest $request
     * @return ModelResource
     */
    public function store(JSONRequest $request)
    {
        return new ModelResource(News::create($request->all()));
    }

    /**
     * @param News $news
     * @return ModelResource
     */
    public function show(News $news)
    {
        return new ModelResource($news);
    }

    /**
     * @param JSONRequest $request
     * @param News $news
     * @return ModelResource
     */
    public function update(JSONRequest $request, News $news)
    {
        $news->update($request->all());

        return new ModelResource($news->fresh());
    }

    /**
     * @param News $news
     * @return array
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        return [
            'success' => $news->delete()
        ];
    }
}
