@extends('layouts.app')
@section('content')

    <!-- Show  courses -->
    <div class="container" id="control_container">
        {{--<button class="btn btn-default" onclick="showCourse()" >Show course</button>--}}
        <div class="" id="show_course">
            @foreach($courses as $value)
                @if($value->new ==1)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="container" id="control_container">
                            <button class="btn btn-default" onclick="editcourse('{{ $value->id }}')">Show new</button>
                            <button class="btn btn-default" onclick="cancel('{{ $value->id }}','{{ $value->name }}')">cancel</button>
                            {{--<a href="deleteCourse/{{$value->id}}"> <button type="button" class="btn btn-danger">delete</button></a>--}}
                            <div><p>{{$value->name}}</p></div>
                            <div id="{{$value->id}}" style="display: none">
                                <form method="POST" action="editCourse/{{$value->id}}">
                                    @csrf
                                    @foreach($value as $cc)
                                        <div class="form-group row">
                                            <div class="col-sm-5">

                                                <input type="text" readonly class="form-control" value="{{$cc}}" name="name">
                                            </div>
                                        </div>
                                    @endforeach
                                    {{--<input type="submit" class="btn btn-danger" id="edit_cat">--}}
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                @endif
            @endforeach
        </div>
    </div>

    <script>
        function editcourse(id){
            courseedit=document.getElementById(id);
            courseedit.style.display = "block";
            document.getElementById(id).removeAttribute("readonly");
            button =document.getElementById('editCor');
            button. style.display = "block";
        }

        function cancel(id ,name){
            let canceledit = document.getElementById(id);
            canceledit.style.display = "none";
            document.getElementById(id).readOnly = true;
        }
    </script>

@stop