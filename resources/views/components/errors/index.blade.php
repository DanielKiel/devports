@extends('layouts.material')

@section('content')
    <div class="container">
        <div class="row">
            <md-card>
                <md-card-header>
                    <div class="md-title">
                        ... something went wrong ...
                    </div>
                </md-card-header>

                <md-card-content>
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                </md-card-content>

            </md-card>
        </div>
    </div>
@endsection
