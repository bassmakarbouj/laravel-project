@extends('master')

@section('content')

 @foreach($page as $p )
    <li>{{$p->title}}</li>

 @endforeach

@stop