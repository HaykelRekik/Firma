@extends('layouts.app2')
@section('content')

<div class="content" id="getuserrooms" >
    <!-- ROOM CARD  -->
    <div class="card bg-white mb-4 text-center" style="max-width: 20rem;" >  
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-danger ">Created at </h6>
            <div class="dropdown">
                <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Edit Name </a>
                    <a class="dropdown-item text-danger" href="#">Remove Romm</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <div class="h5 mb-0 font-weight-bold text-gray-800">room name</div>
            </h5>
        </div>
        <a href="#" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">GO THERE</span>
        </a>
    </div>
    <!-- END ROOM CARD  -->

    <!-- ROOM CARD  -->
    <div class="card bg-white mb-4 text-center" style="max-width: 20rem;">
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
                    <a class="btn btn-outline-warning waves-effect  " role="button"  @click="creatroom({{ Auth::user()->id }})" aria-pressed="true" data-dismiss="modal">Add</a>
                </div>
@endsection