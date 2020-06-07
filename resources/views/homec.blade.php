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
                        <a href="user">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>User Profile</p>
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

            <div class="content" id="getuserrooms">
                @if(Auth::check())
                <meta name="user-id" content="{{ Auth::user()->id }}">
                 @endif


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
                                <a class="dropdown-item text-danger" href="#" @click="passid(room.room_id)" data-toggle="modal" data-target="#deleteroomc">Remove Room</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">@{{ room.name }}</div>
                        </h5>
                    </div>
                    <a  class="btn btn-danger btn-icon-split" @click="getid(room.room_id)">
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
    <script src="assets/js/vueclientRoom.js"></script>
</body>

</html>