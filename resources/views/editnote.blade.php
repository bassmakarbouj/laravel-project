@extends('master')

<hr>
@section('content')



<div>
  <form method="POST" action="update">
  @csrf 
  
   <div class="input-group">
     mmm
   <input type="text" name="text" value="{{$not_id->text}}" >
   <button class="btn btn-default" type="submit">Edit</button>
   </div>
  </form>
 </div>

@stop