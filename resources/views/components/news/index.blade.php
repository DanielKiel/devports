@extends('layouts.material')

@section('content')
    <newsstream-list api="{{$api}}"></newsstream-list>
@endsection