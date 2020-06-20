<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    SmarTF
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="red">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="home" class="simple-text logo-mini">
          SF
        </a>
        <a href="home" class="simple-text logo-normal">
          Smart Farm
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="home">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li>
            <a href="superviseurs">
              <i class='fas fa-user-friends' style='font-size:20px'></i>
              <p>Superviseurs</p>
            </a>
          </li>
          <li>
            <a href="chambres">
              <i class='fas fa-home' style='font-size:20px'></i>
              <p>Chambres</p>
            </a>
          </li>
          <li>
            <a href="capteurs">
              <i class='fas fa-microchip' style='font-size:20px'></i>
              <p>Capteurs</p>
            </a>
          </li>
          <li>
            <a href="notifications">
              <i class='fas fa-bell' style='font-size:20px'></i>
              <p>Notifications</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons ui-1_bell-53"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Notifications</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Notification 1</a>
                  <a class="dropdown-item" href="#">Notification 2</a>
                  <a class="dropdown-item" href="#">Notification 3</a>
                  <a class="dropdown-item" href="#">Notification 4</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_circle-08"></i>
                  <p>
                    <span class="d-none d-md-block">Hello, {{ Auth::user()->Firstname }}</span>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="user"><i class="now-ui-icons ui-2_settings-90"></i> Edit
                    Profile</a>
                  <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                    {{ __('Log-out') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      </div>
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
                                <th scope="col">Type</th>
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
                                <td>@{{ result.type }}</td>
                                <td>@{{ result.created_at }}</td>
                                <td>
                                <button class="btn btn-danger " @click="passid(result.id)" data-toggle="modal" data-target="#deleteuser"><i class='fas fa-trash'></i> </button>
                                <button class="btn btn-success " @click="passid(result.id)" data-toggle="modal" data-target="#edituser"><i class='fas fa-wrench'></i> </button>
                                <button class="btn btn-warning" @click="visualize_user_rooms(result.id)"  data-toggle="modal" data-target="#userrooms"><i class="fa fa-eye"></i></button>
                               
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
                    <label data-error="wrong" data-success="right" for="form2">Type</label>
                    <input type="text" v-model="type" id="type" class="form-control validate">
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

{{-- -----------------------------userrooms modal------------------------- --}}
<!-- Central Modal Small -->
<div class="modal fade" id="userrooms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">ROOMS</h4>
        <button type="button" class="btn btn-info "  data-toggle="modal" data-target="#addnewroom"><span class="glyphicon glyphicon-plus"></span> + New Room </button>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped" >
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
            <tbody v-for="userroom in userrooms">
                <tr>
                    <th scope="row">@{{userroom.room_id}}</th>
                    <td>@{{userroom.name}}</td>
                    <td>@{{userroom.user_id}}</td>
                    <td>@{{userroom.maxtemperature}} c°</td>
                    <td>@{{userroom.maxhumidity}} %</td>
                    <td>
                    <button class="btn btn-danger " @click="passRoomId(userroom.room_id)" data-toggle="modal" data-target="#deleteroom"><i class='fas fa-trash'></i></button>
                    <button class="btn btn-success " @click="passRoomId(userroom.room_id)" data-toggle="modal" data-target="#editroom"><i class='fas fa-wrench'></i></button>
                    <button class="btn btn-warning" @click="get_user_sensors(userroom.room_id)"  data-toggle="modal" data-target="#userrooms"><i class="fa fa-eye"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
      
    </div>
  </div>
</div>
<!-- Central Modal Small -->


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
                    <i class="fas fa-phone prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form2">Type</label>
                    <input v-model="type" type="text" id="type" class="form-control validate">
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
    <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>

        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <script src="https://unpkg.com/vue"></script>
  <script src="https://unpkg.com/vuex"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="assets/js/superviseurs.js"></script>
</body>

</html>