@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Supervisors
                                <button class="btn btn-info pull-right" data-toggle="modal" data-target="#adduser"><span class="glyphicon glyphicon-plus"></span> Add
                                    new client +</button>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body " id="getusers">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody v-for="result in results">
                            <tr>
                                <th scope="row">@{{ result.id }}</th>
                                <td>@{{ result.Firstname }}</td>
                                <td>@{{ result.Lastname }}</td>
                                <td>@{{ result.email }}</td>
                                <td>@{{ result.phone }}</td>
                                <td>@{{ result.created_at }}</td>
                                <td>
                                <button class="btn btn-danger " @click="passid(result.id)" data-toggle="modal" data-target="#deleteuser"><i class='fas fa-trash'></i> Delete</button>
                                <button class="btn btn-success " @click="passid(result.id)" data-toggle="modal" data-target="#edituser"><i class='fas fa-wrench'></i> Edit</button>
                               
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ----------------------edit modal------------------------- -->
<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">edit supervisor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="md-form ">
                    <i class="fas fa-user prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form3">First name</label>
                    <input type="text" id="firstname" class="form-control validate" v-model="Firstname">
                </div>

                <div class="md-form ">
                    <i class="fas fa-user prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form3">Last name</label>
                    <input type="text" v-model="Lastname" id="lastname" class="form-control validate">
                </div>

                <div class="md-form ">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form2">Email</label>
                    <input type="email" v-model="email" id="email" class="form-control validate">
                </div>

                <div class="md-form ">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form2">Phone Number</label>
                    <input type="text" v-model="phone" id="PhoneN" class="form-control validate">
                </div>

                <div class="md-form ">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form2">Password</label>
                    <input type="text" v-model="password" id="Password" class="form-control validate">
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a class="btn btn-outline-warning waves-effect  " role="button"  @click="edituser()" aria-pressed="true" data-dismiss="modal">Edit</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>



<!-- <------------------------delete moadal---------------------- -->

 <div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        Content
        <div class="modal-content"> 
<!--Header-->
<div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">delete supervisor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div> 

<!--Body-->
<div class="modal-body">
                <p class="font-weight-bold text-center">Are you sure that you want to delete this supervisor?</p>
            </div> 

<!--Footer-->
 <div class="modal-footer justify-content-center">
                <a class="btn btn-danger btn-lg active"  role="button"  @click="removeuser()" aria-pressed="true" data-dismiss="modal">Yes</a>
                <a class="btn btn-success btn-lg active " role="button" aria-pressed="true" data-dismiss="modal">Cancel</a>
            </div>
        </div> 
<!--/.Content-->
 </div>
</div>
</div>
</div>


<!-- ----------------------addnewclient modal------------------------- -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Add a new supervisor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="md-form ">
                    <i class="fas fa-user prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form3">First name</label>
                    <input v-model="firstname" type="text" id="firstname1" class="form-control validate">
                </div>

                <div class="md-form ">
                    <i class="fas fa-user prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form3">Last name</label>
                    <input v-model="lastname" type="text" id="lastname1" class="form-control validate">
                </div>

                <div class="md-form ">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form2">Email</label>
                    <input v-model="email" type="email" id="email1" class="form-control validate">
                </div>

                <div class="md-form ">
                    <i class="fas fa-phone prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form2">Phone Number</label>
                    <input v-model="phone" type="text" id="PhoneN1" class="form-control validate">
                </div>
                <div class="md-form ">
                    <i class="fas fa-key prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form2">password</label>
                    <input v-model="password" type="password" id="password" class="form-control validate">
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a class="btn btn-outline-warning waves-effect  " role="button"  @click="creatuser()" aria-pressed="true" data-dismiss="modal">Add</a>
            </div>
            @endsection