@extends('layouts.app')
@section('content')

    <!-- Show courses Category -->
    <div class="container" id="control_container">
        {{--<button class="btn btn-default" onclick="showCategory()" >Show course Category</button>--}}
        <div class="" id="show_category" >
            @foreach($category as $val)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="container" id="control_container">
                            {{--<button class="btn btn-default" onclick="editCategory()" >Edit</button>--}}
                            {{--<button class="btn btn-default" href="{{redirect("control")}}" >cancel</button>--}}
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

    <script>
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