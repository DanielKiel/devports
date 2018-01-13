@extends('layouts.material')

@section('content')
    <md-card md-with-hover class="md-primary">
        <md-ripple>
            <md-card-header>
                <div class="md-title">devports</div>
            </md-card-header>

            <md-card-content>
                About me: developer with focus on backend development, but also having skills in coding frontend stuff.
            </md-card-content>

            <md-card-actions md-alignment="left">
                <md-button href="https://github.com/DanielKiel">github</md-button>
                <md-button href="https://www.xing.com/profile/Daniel_Koch190">xing</md-button>
            </md-card-actions>

        </md-ripple>
    </md-card>
@endsection

