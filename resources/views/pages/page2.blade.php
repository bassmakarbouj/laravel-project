@extends('master')

@section('content')

 @foreach($page as $p )
    <a href="page/{{$p->id}}">
    {{$p->title}}
    <div><a href='page/{{$p->id}}/delete' class="btn btn-danger pull-right">Delete</a></div>
    </a>

 @endforeach

 <div>
  <form method="POST" action="pagestore">
  @csrf 
   <div class="input-group">
   <input type="text" name="title" value=" {{ old('title') }}">
   <button class="btn btn-default" type="submit">Add</button>
   </div>
  </form>
 </div>

 @if(count($errors))

   <ul>
   @foreach($errors->all() as $error)
   <li> {{$error}} </li>
   @endforeach
   </ul>
 @endif

@stop