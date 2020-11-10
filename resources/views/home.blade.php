@extends('layouts.app')
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h5 class="title">Dashboard</h5>
        </div>
        <div class="card-body ">
          <div class="row mx-4">
            <!-- ----------------------------------- -->
            <div class="col-md-6 text-center mb-4">
              <a href="superviseurs">
                <div class="card text-white bg-danger mb-3 py-5" style="max-width: 27rem;">
                  <div class="card-body">
                    <i class='fas fa-user-friends' style='font-size:24px'></i>
                    <h5 class="card-title">Utilisateurs</h5>
                    <p class="card-text">
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <!-- ----------------------------------- -->

            <div class="col-md-6 text-center mb-4 ">
              <a href="chambres">
                <div class="card text-white bg-success mb-3 py-5" style="max-width: 27rem;">
                  <div class="card-body">
                    <i class='fas fa-home' style='font-size:24px'></i>
                    <h5 class="card-title">chambres</h5>
                    <p class="card-text">
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <!-- ----------------------------------- -->
          <div class="row mx-4">
            <div class="col-md-6 text-center">
              <a href="capteurs">
                <div class="card text-white bg-info mb-3 py-5" style="max-width: 27rem;">
                  <div class="card-body">
                    <i class='fas fa-microchip' style='font-size:24px'></i>
                    <h5 class="card-title">capteurs</h5>
                    <p class="card-text">
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <!-- ----------------------------------- -->
            <div class="col-md-6 text-center">
              <a href="notifications">
                <div class="card text-white bg-warning mb-3 py-5" style="max-width: 27rem;">
                  <div class="card-body">
                    <i class='fas fa-bell' style='font-size:24px'></i>
                    <h5 class="card-title">notifications </h5>
                    <p class="card-text">
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>

          @endsection