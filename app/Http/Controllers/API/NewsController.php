<?php

namespace App\Http\Controllers\API;

use App\API\NewsStream\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\NewsStream\Validation\NewsValidation as JSONRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return News::paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  JSONRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JSONRequest $request)
    {
        return News::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return $news;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  JSONRequest $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(JSONRequest $request, News $news)
    {
        $news->update($request->all());

        return $news->fresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        return $news->delete();
    }
}
