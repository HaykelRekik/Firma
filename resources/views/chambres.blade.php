<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/nx.png">
  <link rel="icon" type="image/png" href="assets/img/nx.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    NEXT MOVE
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
          NEXT MOVE
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
                                <button class="btn btn-danger " @click="passsid(room.room_id)" data-toggle="modal" data-target="#deleteroom"><i class='fas fa-trash'></i> </button>
                                <button class="btn btn-success " @click="passsid(room.room_id)" data-toggle="modal" data-target="#editroom"><i class='fas fa-wrench'></i> </button>
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
            </div>
        </div>
      </div>
    </div>
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
<script src="assets/js/Room.js"></script>
</body>

</html>