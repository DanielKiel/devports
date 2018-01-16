@extends('layouts.material')

@section('content')

    <md-card  class="cont">
        <md-card-header>
            <div class="md-title port">
                dk@devports:8080 ~master php news: <span class="port-title">{{$news->title}}</span>
            </div>
            <div class="md-subtitle port">
                <span class="port-title">{{$news->subtitle}}</span>
            </div>
        </md-card-header>

        <md-card-content>
            {!! $news->content !!}
        </md-card-content>
    </md-card>

@endsection