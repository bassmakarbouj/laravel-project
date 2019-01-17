@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <button class="btn btn-default" onclick="efitProfile()">Eidt My profile</button>
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" id="profileEdit" action="update-my-profile/{{$i->id}}">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="staticName" value="{{$i->name}}" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Email    </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="staticEmail" value="{{$i->email}}" name="email">
                            </div>
                        </div>
                        <div class="form-group row" id="my-password" style="display:none">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password </label>
                                <div class="col-sm-10">
                                    <input type="password" readonly class="form-control" id="staticPassword"   name="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                    
                                    <div class="btn-group">
                                        <input type="submit" class="btn btn-danger" style="display: none" id="editButton">
                                        <button  href="profile" class="btn btn-default" style="display: none" id="cancelButton" >Cancel</button>
                                    </div>
                                </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function efitProfile() {
    div = document.getElementById('editButton');
    cancel = document.getElementById('cancelButton');
    pass = document.getElementById('my-password');
    
    $("#staticName").prop("readonly", false);
    $("#staticEmail").prop("readonly", false);
    $("#staticPassword").prop("readonly", false);

   
    div.style.display = "block";
    pass.style.display = "flex";
    cancel.style.display = "flex";
}
    </script>
@endsection