@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Sensors
                                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addsensor"><span class="glyphicon glyphicon-plus"></span> Add
                                    New Sensor +</button>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-striped" id="getallsensors">
                        <thead>
                            <tr>
                                <th scope="col">Sensor ID</th>
                                <th scope="col">Reference</th>
                                <th scope="col">Room id</th>
                                <th scope="col">Type</th>
                                <th scope="col">Created At</th>                          
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody v-for="sensor in sensors">
                            <tr>
                                <th scope="row">@{{sensor.sensor_id}}</th>
                                <td>@{{sensor.reference}}</td>
                                <td>@{{sensor.room_id}}</td>
                                <td>@{{sensor.type}}</td>
                                <td>@{{sensor.created_at}}</td>
                                <td>
                                <button class="btn btn-danger" @click="passsid(sensor.sensor_id)" data-toggle="modal" data-target="#deletesensor"><i class='fas fa-trash'></i> Delete</button>
                                <button class="btn btn-success " @click="passsid(sensor.sensor_id)" data-toggle="modal" data-target="#editsensor"><i class='fas fa-wrench'></i> Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------edit sensor modal------------------------- -->
<div class="modal fade" id="editsensor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Edit Sensor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="md-form ">

                    <label data-error="wrong" data-success="right" for="form3">Reference</label>
                    <input type="text" v-model="Reference" class="form-control validate">
                </div>

                <div class="md-form ">

                    <label data-error="wrong" data-success="right" for="form3">Room ID</label>
                    <input type="text" v-model="room_id" class="form-control validate">
                </div>

                <div class="md-form ">

                    <label data-error="wrong" data-success="right" for="form2">Type</label>
                    <input type="text" v-model="type" class="form-control validate">
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-outline-warning waves-effect"  role="button"  @click="editsensor()" aria-pressed="true" data-dismiss="modal">Edit</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</div>
</div>


<!--   ------------------------delete sensor moadal---------------------- -->
<div class="modal fade" id="deletesensor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Delete Sensor</h4>
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
                <a class="btn btn-danger btn-lg active"  role="button"  @click="removesensor()" aria-pressed="true" data-dismiss="modal">Yes</a>
                <a class="btn btn-success btn-lg active" role="button" aria-pressed="true" data-dismiss="modal">Cancel</a>  
                
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
</div>
</div>


<!-- ----------------------add new sensor modal------------------------- -->
<div class="modal fade" id="addsensor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Add a new Sensor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">

                <div class="md-form ">
                    <label data-error="wrong" data-success="right" for="form3">Reference</label>
                    <input type="text" v-model="Reference" class="form-control validate">
                </div>

                <div class="md-form ">
                    <label data-error="wrong" data-success="right" for="form2">Room ID</label>
                    <input type="text"v-model="room_id" class="form-control validate">
                </div>

                

                <div class="md-form ">
                    <label data-error="wrong" data-success="right" for="form2">Type</label>
                    <input type="text" v-model="type" class="form-control validate">
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-outline-warning waves-effect"  role="button"  @click="creatsensor()" aria-pressed="true" data-dismiss="modal">Add</a>
                </div>
                @endsection