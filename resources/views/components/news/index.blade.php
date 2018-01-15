@extends('layouts.material')

@section('content')
    @auth()
        <newsstream-list api="{{$api}}" auth="{{true}}"></newsstream-list>
    @else
        <newsstream-list api="{{$api}}" auth="{{false}}"></newsstream-list>
    @endauth

@endsection