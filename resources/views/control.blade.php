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
            <div class="container" id="control_container" >
                <p> Manager Account Control </p>
                <div id="managerControl"></div>
               
            </div>
        </div>

        <!-- Courses Control -->
        <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container" id="control_container">
                <p> Courses Control </p>
                
                @foreach ($column as $c => $v)
                
                <form method="POST" >
                    {{$v}}
                    <input name="c" type="text" >
                </form>
                    
                @endforeach
                
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





@stop