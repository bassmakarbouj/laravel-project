@extends('master')

@section('content')

 @foreach($page as $p )
    <li>{{$p->title}}</li>
    <div><a href='page/{{$p->id}}/delete' class="btn btn-danger pull-right">Delete</a></div>

 @endforeach

 <div>
  <form method="POST" action="pagestore">
  @csrf 
   <div class="input-group">
   <input type="text" name="title">
   <button class="btn btn-default" type="submit">Add</button>
   </div>
  </form>
 </div>

@stop