
@extends('layouts.material')

@section('content')
    <newsstream-list api="{{$api}}" auth="{{true}}"></newsstream-list>
@endsection