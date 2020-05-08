@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Rooms
                                <button class="btn btn-info pull-right" data-toggle="modal" data-target="#addnewroom"><span class="glyphicon glyphicon-plus"></span> Add
                                    New Room +</button>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-striped" id="getallrooms">
                        <thead>
                            <tr>
                                <th scope="col">Room ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">owner id</th>
                                <th scope="col">Temp MAX</th>
                                <th scope="col">Humi MAX</th>                                 
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody v-for="room in rooms">
                            <tr>
                                <th scope="row">@{{room.room_id}}</th>
                                <td>@{{room.name}}</td>
                                <td>@{{room.user_id}}</td>
                                <td>@{{room.maxtemperature}} c°</td>
                                <td>@{{room.maxhumidity}}</td>
                                <td>
                                <button class="btn btn-danger " @click="passsid(room.room_id)" data-toggle="modal" data-target="#deleteroom"><i class='fas fa-trash'></i> Delete</button>
                                <button class="btn btn-success " @click="passsid(room.room_id)" data-toggle="modal" data-target="#editroom"><i class='fas fa-wrench'></i> Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------edit room modal------------------------- -->
<div class="modal fade" id="editroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Edit Room</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="md-form ">

                    <label data-error="wrong" data-success="right" for="form3">name</label>
                    <input type="text" v-model="name" class="form-control validate">
                </div>

                <div class="md-form ">

                    <label data-error="wrong" data-success="right" for="form3">Temperature MAX</label>
                    <input type="text" v-model="maxtemperature" class="form-control validate">
                </div>

                <div class="md-form ">

                    <label data-error="wrong" data-success="right" for="form2">Humidity MAX</label>
                    <input type="text" v-model="maxhumidity" class="form-control validate">
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-outline-warning waves-effect"  role="button"  @click="editroom()" aria-pressed="true" data-dismiss="modal">Edit</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</div>
</div>


<!--   ------------------------delete room moadal---------------------- -->
<div class="modal fade" id="deleteroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Delete Room</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <p class="font-weight-bold text-center">Are you sure that you want to delete this Room?</p>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a class="btn btn-danger btn-lg active"  role="button"  @click="removeroom()" aria-pressed="true" data-dismiss="modal">Yes</a>
                <a class="btn btn-success btn-lg active " role="button" aria-pressed="true" data-dismiss="modal">Cancel</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
</div>
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
                    <label data-error="wrong" data-success="right" for="form2">Owner ID</label>
                    <input type="text"v-model="user_id" id="owner" class="form-control validate">
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
                    <a class="btn btn-outline-warning waves-effect  " role="button"  @click="creatroom()" aria-pressed="true" data-dismiss="modal">Add</a>
                </div>
                @endsection