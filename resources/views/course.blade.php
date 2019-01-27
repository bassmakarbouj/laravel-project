@extends('layouts.app')
@section('content')

    <!-- Show  courses -->
    <div class="container" id="control_container">
        {{--<button class="btn btn-default" onclick="showCourse()" >Show course</button>--}}
        <div class="" id="show_course">
            @foreach($filtered_courses as $value)
{{--                {{$bb= get_object_vars($value)}}--}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="container" id="control_container">
                            <button class="btn btn-default" onclick="editcourse('{{ $value['name'] }}')">Show</button>
                            <button class="btn btn-default" onclick="cancel('{{ $value['name'] }}')">cancel</button>
                            {{--<a href="deleteCourse/{{$value->id}}"> <button type="button" class="btn btn-danger">delete</button></a>--}}
                            <div><p>{{$value['name']}}</p></div>
                            <div id="{{$value['name']}}" style="display: none">
                                <form method="POST" action="">
                                    @csrf
                                    @foreach(array_keys($value) as $key)
                                        @if($key == 'category_id')

                                            {{$ii = $value['category_id']}}
                                        {{$o=collect($category)->where('id', $ii)->pluck('name')->first()}}
                                            <p>Course Category</p>
                                            <input name="{{$key}}" type="text" readonly class="form-control" value="{{$o}}">

                                        @elseif($key=='new')
                                            @if($value[$key] == 1)
                                                <input name="{{$key}}" type="text" readonly class="form-control" value="new course">
                                            @else
                                                <input name="{{$key}}" type="text" readonly class="form-control" value="old course">
                                            @endif
                                        @else
                                            {{$key}}
                                        <input name="{{$key}}" type="text" readonly class="form-control" value="{{$value[$key]}}">
                                        @endif

                                    @endforeach
                                    {{--<input type="submit" class="btn btn-danger" id="edit_cat">--}}
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    <script>
        function editcourse(name){
            courseedit=document.getElementById(name);
            courseedit.style.display = "block";
            document.getElementById(name).removeAttribute("readonly");
            button =document.getElementById('editCor');
            button. style.display = "block";
        }

        function cancel(name){
            let canceledit = document.getElementById(name);
            canceledit.style.display = "none";
            document.getElementById(name).readOnly = true;
        }
    </script>

@stop