@extends('layouts.app') 
@section('content')


<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="text-align:center">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#manager" role="tab" aria-controls="home" aria-selected="true">Add manager</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="profile" aria-selected="false">Course Management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#student" role="tab" aria-controls="contact" aria-selected="false">Student Account</a>
        </li>
    </ul>


    <div class="tab-content" id="myTabContent">
        <!-- Manager Account Control -->
        <div class="tab-pane fade show active" id="manager" role="tabpanel" aria-labelledby="home-tab">
            <div class="container" id="control_container">
                <p> Manager Account Control </p>
                <div id="managerControl"></div>

            </div>
        </div>

        <!-- Courses Control -->
        <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container" id="control_container">

                <!-- Add Course Category-->
                <div class="container" id="control_container">
                    <button class="btn btn-default" onclick="addCategory()" >Add Category</button>
                    <form method="POST" action="createCategory" id="add_category" style="display:none">
                        @csrf
                        @foreach ($category_feild as $ca => $va)
                            @if($va == 'id' || $va == 'created_at' || $va == 'updated_at')

                            @else
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        {{$va}}
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="form-group row">
                            <div class="btn-group">
                                <input type="submit" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Show courses Category -->
                <div class="container" id="control_container">
                    <button class="btn btn-default" onclick="showCategory()" >Show course Category</button>
                    <div class="" id="show_category" style="display: none">
                        @foreach($category as $val)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="container" id="control_container">
                                        <button class="btn btn-default" onclick="editCategory()" >Edit</button>
                                        <button class="btn btn-default" href="{{redirect("control")}}" >cancel</button>
                                        <form method="POST" action="editCategory">
                                            @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-5">
                                                <input type="text" readonly class="form-control" id="staticName" value="{{$val->name}}" name="name">

                                                <input type="submit" class="btn btn-danger" id="edit_cat" style="display: none">
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="panel-body">

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

                <!-- Add Course -->
                <div class="container" id="control_container">
                <button class="btn btn-default" onclick="addCourse()" >Add course</button>
                <form method="POST" action="createCourse" id="add_course" style="display:none">
                    @csrf
                    @foreach ($cousre_feild as $c => $v)
                        @if($v == 'id' || $v == 'created_at' || $v == 'updated_at')


                        @elseif($v == 'category_id')
                            <select name="category_id" required>

                                @foreach($category as $cat)
                                    <option value="{{$cat->id}}" >{{$cat->name}}</option>
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


                <!-- Show courses -->
                <div class="container" id="control_container">
                    <button class="btn btn-default" onclick="showCourse()" >Show course</button>
                    <div class="" id="show_course" style="display: none">
                        @foreach($courses as $value)
                            <div class="panel panel-default">
                                <div class="panel-heading">{{$value->name}}</div>
                                <div class="panel-body">
                                   <p>{{$value->time}}</p>
                                   <p>{{$value->period}}</p>
                                   <p>{{$value->lessons_number}}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>


            </div>
        </div>



        <!-- Student Account Control -->
        <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="contact-tab">
            <div class="container" id="control_container">
                <p> Student Account Control </p>

                <body>
                    <div data-include="editnote.blade.php"></div>
                </body>
            </div>
        </div>
    </div>
</div>

<script>
    function managerFunction() {
    $("#managerControl").load("editnote.blade.php"); 
}

window.onload=managerFunction();

</script>

<script>
    function addCourse() {
        div = document.getElementById('add_course');
        div.style.display = "block";
    }

    function showCourse(){
        show = document.getElementById('show_course');
        show.style.display = "block";
    }

    function addCategory(){
        category = document.getElementById('add_category');
        category.style.display = "block";
    }

    function showCategory(){
            categoryShow = document.getElementById('show_category');
        categoryShow.style.display = "block";
    }
    function editCategory(){
        categoryedit = document.getElementById('edit_cat');
        categoryedit.style.display = "block";
        $("#staticName").prop("readonly", false);
        }



</script>








@stop