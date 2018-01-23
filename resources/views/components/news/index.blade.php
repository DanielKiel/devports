@extends('layouts.material')

@section('content')

    @foreach($news->items() as $el)
        <md-card  class="cont">
            <md-card-header>
                <div class="md-subtitle port">
                    dk@devports:8080 ~master php news: <span class="port-title">{{$el->title}}</span>
                </div>
            </md-card-header>

            <md-card-content>
                {{$el->teaser}}
            </md-card-content>

            <md-card-actions md-alignment="left">
                <md-button class="md-dense" href="{{route('frontend.news.show',['news' => $el->id])}}">php news:show_content</md-button>

            </md-card-actions>
        </md-card>
    @endforeach

    {{$news->links('components.pagination.default')}}

    <div class="pull-right">Total: {{$news->total()}}</div>


@endsection