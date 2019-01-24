@extends('layouts.app')
@section('content')


    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist" style="text-align:center">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#add_category" role="tab"
                   aria-controls="home" aria-selected="true">Add Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#category_edit" role="tab"
                   aria-controls="profile" aria-selected="false">Edit Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#add_courses" role="tab"
                   aria-controls="profile" aria-selected="false">Add Course </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#courses_edit" role="tab"
                   aria-controls="profile" aria-selected="false">Edit Course </a>
            </li>

        </ul>


        <div class="tab-content" id="myTabContent">
            <!-- Category Control -->
            <div class="tab-pane fade show active" id="add_category" role="tabpanel" aria-labelledby="home-tab">
                <div class="container" id="control_container">
                    <!-- Add Course Category-->
                    <div class="container" id="control_container">
                        {{--<button class="btn btn-default" onclick="addCategory()" >Add Category</button>--}}
                        <form method="POST" action="createCategory" id="add_category">
                            @csrf
                            <div class="form-group row">
                                @foreach ($category_feild as $ca => $va)
                                    @if($va == 'id' || $va == 'created_at' || $va == 'updated_at')
                                        {{--// --}}
                                    @else
                                        <div class="col-sm-10">
                                            {{$va}}
                                            <input name="name" type="text" class="form-control">
                                        </div>
                                    @endif
                                @endforeach
                                <div class="btn-group">
                                    <input type="submit" class="btn btn-danger" value="add">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="category_edit" role="tabpanel" aria-labelledby="home-tab">
                <div class="container" id="control_container">
                    <!-- Show & edit courses Category -->
                    <div class="container" id="control_container">
                        {{--<button class="btn btn-default" onclick="showCategory()" >Show course Category</button>--}}
                        <div class="" id="show_category">
                            @foreach($category as $val)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="container" id="control_container">
                                            <button class="btn btn-default" onclick="editcategory('{{ $val->id }}','{{ $val->name }}')">Edit</button>
                                            <button class="btn btn-default" onclick="cancel('{{ $val->id }}','{{ $val->name }}')">cancel</button>
                                            <a href="deleteCategory/{{$val->id}}"> <button type="button" class="btn btn-danger">delete</button></a>
                                            <form method="POST" action="editCategory/{{$val->id}}">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-5">

                                                        <input type="text" readonly class="form-control"
                                                               id="{{$val->id}}" value="{{$val->name}}" name="name">
                                                        <input type="submit" class="btn btn-danger" id="{{ $val->name }}"
                                                               style="display: none">
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <!-- Courses Control -->
            <div class="tab-pane fade" id="add_courses" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container" id="control_container">
                    <!-- Add Course -->
                    <div class="container" id="control_container">
                        {{--<button class="btn btn-default" onclick="addCourse()" >Add course</button>--}}
                        <form method="POST" action="createCourse" id="add_course">
                            @csrf
                            @foreach ($cousre_feild as $c => $v)
                                @if($v == 'id' || $v == 'created_at' || $v == 'updated_at')
                                    {{----}}
                                @elseif($v == 'category_id')
                                    <p>Course Category</p>
                                    <select name="category_id" required class="form-control">

                                        @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                @elseif($v == 'start_date' || $v == 'end_date')
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            {{$v}}
                                            <input name="{{$v}}" type="date" class="form-control">
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            {{$v}}
                                            <input name="{{$v}}" type="text" class="form-control">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="form-group row">
                                <div class="btn-group">
                                    <input type="submit" class="btn btn-danger">
                                    {{--<button href="control" class="btn btn-default">Cancel</button>--}}
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="courses_edit" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container" id="control_container">
                    <!-- Show & Edit courses -->
                    <div class="container" id="control_container">
                        {{--<button class="btn btn-default" onclick="showCourse()" >Show course</button>--}}
                        <div class="" id="show_course">
                            @foreach($courses as $value)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="container" id="control_container">
                                            <button class="btn btn-default" onclick="editcourse('{{ $value->id }}')">Edit</button>
                                            <button class="btn btn-default" onclick="cancel('{{ $value->id }}','{{ $value->name }}')">cancel</button>
                                            <a href="deleteCourse/{{$value->id}}"> <button type="button" class="btn btn-danger">delete</button></a>
                                            <div><p>{{$value->name}}</p></div>
                                            <div id="{{$value->id}}" style="display: none">
                                            <form method="POST" action="editCourse/{{$value->id}}">
                                                @csrf
                                                @foreach($value as $cc)
                                                    <div class="form-group row">
                                                        <div class="col-sm-5">

                                                            <input type="text"  class="form-control"
                                                                    value="{{$cc}}" name="name">
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <input type="submit" class="btn btn-danger" id="edit_cat">
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <script>
            function managerFunction() {
                // $("#managerControl").load("editnote.blade.php");
            }

            window.onload = managerFunction();

        </script>

        <script>
            function addCourse() {
                div = document.getElementById('add_course');
                div.style.display = "block";
            }

            function showCourse() {
                show = document.getElementById('show_course');
                show.style.display = "block";
            }

            function addCategory() {
                category = document.getElementById('add_category');
                category.style.display = "block";
            }

            function showCategory() {
                categoryShow = document.getElementById('show_category');
                categoryShow.style.display = "block";
            }

            function editcategory(id, name) {
                let categoryedit = document.getElementById(name);
                categoryedit.style.display = "block";
                document.getElementById(id).removeAttribute("readonly");
            }

            function cancel(id ,name){
                let canceledit = document.getElementById(name);
                canceledit.style.display = "none";
                document.getElementById(id).readOnly = true;
            }

            function editcourse(id){
                courseedit=document.getElementById(id);
                courseedit.style.display = "block";
                document.getElementById(id).removeAttribute("readonly");
                button =document.getElementById('editCor');
                button. style.display = "block";
            }


        </script>








@stop