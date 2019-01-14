@extends('master')

<hr>
@section('content')

@foreach($mypage->notes as $note)
 
 {{$note->text}}
 <a href='{{$note->id}}/deleten' class="btn btn-danger pull-right">Delete</a>
 <a href='{{$note->id}}/editn' class="btn btn-danger pull-right">Edit</a>



@endforeach


<div>
  <form method="POST" action="{{$mypage->id}}/thenote">
  @csrf 
   <div class="input-group">
   <input type="text" name="text" value="{{ old('text') }}">
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