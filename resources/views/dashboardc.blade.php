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
                    <div class="navbar-wrapper" id="app">
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
                                        <span class="d-none d-md-block">Hello, </span>
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


            <div class="panel-header panel-header-lg" id="testelem">
                <div class="row mx-4">
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Temperature</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">@{{ roomv.temperature }} c°</div>
                                        <div class="mt-2 mb-0 text-muted text-xs">
                                            <span>Max Temp </span>
                                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> @{{ roomd.maxtemperature }} c°</span>
                                            <input v-model="maxtemperature" class="quantity" min="0" value="35" type="number">
                                            <button type="button" class="btn btn-primary btn-sm" @click="updatetemp()">Save</button>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-thermometer-half fa-3x text-success"></i>


                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-switch mx-3">
                                <input type="checkbox" class="custom-control-input" id="tempSwitches">
                                <label class="custom-control-label" for="tempSwitches">Alert By Email</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Humidity</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">@{{ roomv.humidity }} %</div>
                                        <div class="mt-2 mb-0 text-muted text-xs">
                                            <span>Max Humd </span>
                                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> @{{ roomd.maxhumidity }}</span>
                                            <input v-model="maxhumidity" class="quantity" min="0" value="35" type="number">
                                            <button type="button" class="btn btn-primary btn-sm" @click="updatehumi()">Save</button>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-humidity-cart fa-2x text-success"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-switch mx-3">
                                <input type="checkbox" class="custom-control-input" id="humSwitches">
                                <label class="custom-control-label" for="humSwitches">Alert By Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">motion</div>
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">@{{ roomv.motion }}</div>
                                        <div class="mt-2 mb-0 text-muted text-xs">
                                            <span>Alert State</span>
                                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> true</span>
                                            <input  class="quantity" min="0" value="1" type="number">
                                            <button type="button" class="btn btn-primary btn-sm" @click="test()">Save</button>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-exclamation fa-3x text-danger"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-switch mx-3">
                                <input type="checkbox" class="custom-control-input" id="motSwitches">
                                <label class="custom-control-label" for="motSwitches">Alert By Email</label>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">650</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span>Since last years</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
                </div>
            </div>

            <div class="content">
                <div class="row mx-6" >
                    <div class="col-xl-6 col-lg-7">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Temperature Chart</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Periode </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(74px, 31px, 0px);">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Week</a>
                                        <a class="dropdown-item active" href="#">Month</a>
                                        <a class="dropdown-item" href="#">This Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="temperatureChart" style="display: block; width: 499px; height: 300px;" width="499" height="320" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-7">
                        <div class="card mb-4 bg-white">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Humidity Chart</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Periode <i class="fas fa-chevron-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(74px, 31px, 0px);">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Week</a>
                                        <a class="dropdown-item active" href="#">Month</a>
                                        <a class="dropdown-item" href="#">This Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="humiditychart" style="display: block; width: 499px; height: 300px;" width="499" height="320" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
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
    <script src="assets/js/vueclientApp.js"></script>
</body>

</html>