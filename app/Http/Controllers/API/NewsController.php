<?php

namespace App\Http\Controllers\API;

use App\API\NewsStream\Models\News;
use App\API\NewsStream\Resources\NewsStreamCollectionResource;
use App\API\NewsStream\Resources\NewsStreamResource;
use App\Http\Controllers\Controller;
use App\API\NewsStream\Validation\NewsValidation as JSONRequest;

class NewsController extends Controller
{
    /**
     * @return NewsStreamCollectionResource
     */
    public function index()
    {
        return new NewsStreamCollectionResource(News::published()->paginate());
    }

    /**
     * @return NewsStreamCollectionResource
     */
    public function all()
    {
        return new NewsStreamCollectionResource(News::paginate());
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
     * @return NewsStreamResource
     */
    public function store(JSONRequest $request)
    {
        return new NewsStreamResource(News::create($request->all()));
    }

    /**
     * @param News $news
     * @return NewsStreamResource
     */
    public function show(News $news)
    {
        return new NewsStreamResource($news);
    }

    /**
     * @param JSONRequest $request
     * @param News $news
     * @return NewsStreamResource
     */
    public function update(JSONRequest $request, News $news)
    {
        $news->update($request->all());

        return new NewsStreamResource($news->fresh());
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
