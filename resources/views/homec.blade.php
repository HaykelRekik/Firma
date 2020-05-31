@extends('layouts.app2')
@section('content')
<div class="panel-header panel-header-sm">

</div>

<div class="content" id="getuserrooms">
    @if(Auth::check())
    <meta name="user-id" content="{{ Auth::user()->id }}"> @endif
    <!-- ROOM CARD  -->
    <div class="card bg-white mb-4 mx-2 text-center" style="max-width: 20rem;" v-for="room in rooms">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-danger ">Created at :</h6>
            <h6>@{{ room.created_at }} </h6>
            <div class="dropdown">
                <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" @click="passid(room.room_id)" data-toggle="modal" data-target="#editeroom">Edit Name </a>
                    <a class="dropdown-item text-danger" href="#" @click="passid(room.room_id)"data-toggle="modal" data-target="#deleteroomc">Remove Room</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <div class="h5 mb-0 font-weight-bold text-gray-800">@{{ room.name }}</div>
            </h5>
        </div>
        <a href="/dash" class="btn btn-danger btn-icon-split"  @click="getid(room.room_id)">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">GO THERE</span>
        </a>
    </div>
    <!-- END ROOM CARD  -->

    <!-- ROOM CARD  -->
    <div class="card bg-white mb-4 mx-2 text-center" style="max-width: 20rem;">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success ">Add New Room </h6>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <h1> <i class="now-ui-icons ui-1_simple-add"></i></h1>
            </h5>
        </div>
        <button class="btn btn-success " data-toggle="modal" data-target="#addnewroom"><span class="glyphicon glyphicon-plus"></span> Add New Room +</button>
    </div>
    <!-- END ROOM CARD  -->
</div>

<!-- ----------------------addnewroom modal------------------------- -->
<div class="modal fade" id="addnewroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Add a new Room</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="md-form ">
                    <label data-error="wrong" data-success="right" for="form3">Room Name</label>
                    <input type="text" v-model="name" id="roomname1" class="form-control validate">
                </div>

                <div class="md-form ">
                    <label data-error="wrong" data-success="right" for="form3">Temperature MAX</label>
                    <input type="text" v-model="maxtemperature" value="-100" class="form-control validate">
                </div>

                <div class="md-form ">
                    <label data-error="wrong" data-success="right" for="form2">Humidity MAX</label>
                    <input type="text" v-model="maxhumidity" value="-100" class="form-control validate">
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-outline-warning waves-effect  " role="button" @click="creatroom({{ Auth::user()->id }})" aria-pressed="true" data-dismiss="modal">Add</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <------------------------delete modal---------------------- -->

<div class="modal fade" id="deleteroomc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                 are you sure you want to delete this room
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="deleteroom()" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- <------------------------edite modal---------------------- -->

<div class="modal fade" id="editeroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edite Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <input type="text" class="form-control" id="Inputname" aria-describedby="room name" placeholder="Room Name" v-model="name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="editroom()" data-dismiss="modal">Edit</button>
            </div>
        </div>
    </div>
</div>
@endsection