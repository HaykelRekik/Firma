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
        <img src="assets/img/nx.png" alt="next move logo" width="100" height="35">
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
            <a href="user">
              <i class='fas fa-user-friends' style='font-size:20px'></i>
              <p>Modifier le profile</p>
            </a>
          </li>
          <li>
            <a href="superviseurs">
              <i class='fas fa-user-friends' style='font-size:20px'></i>
              <p>Utilisateur</p>
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
                  <a class="dropdown-item" href="user"><i class="now-ui-icons ui-2_settings-90"></i> Modifier le profile</a>
                  <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                    {{ __('Déconnexion') }}
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