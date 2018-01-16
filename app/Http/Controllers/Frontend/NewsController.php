<?php

namespace App\Http\Controllers\Frontend;

use App\API\NewsStream\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        if (! Auth::guest()) {
            return view('components.news.authenticated',[
                'api' => route('api.news.get')
            ]);
        }

        return view('components.news.index',[
            'title' => 'devports - news',
            'metaDescription' => 'Neuigkeiten aus dem Bereich IT, Neues von devports, allgemeine News.',
            'news' => News::published()->paginate()
        ]);
    }

    public function show(News $news)
    {
        return view('components.news.show',[
            'title' => 'devports - news: ' . $news->title,
            'metaDescription' => $news->teaser,
            'news' => $news
        ]);
    }
}
