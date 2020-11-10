@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Capteurs
                                <button class="btn btn-info pull-right" data-toggle="modal" data-target="#addsensor"><span class="glyphicon glyphicon-plus"></span> Ajouter un nouvel capteur +</button>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                <table class="table table-striped" id="getallsensors">
                        <thead>
                        <th >Capteur ID</th>
                                <th scope="col">Type</th>
                                <th scope="col">Chart</th>
                                <th scope="col">PDF</th>
                                <th scope="col">Max_Valeur</th>
                                <th scope="col">Ajouter_le</th>                           
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody v-for="sensor in sensors">
                            <tr>
                                <th scope="row">@{{sensor.sensor_id}}</th>
                                <td>@{{sensor.type}}</td>
                                <td><button class="btn btn-warning" @click="get_1j_values(sensor.sensor_id)" data-toggle="modal" data-target="#showchart"><i style="font-size:20px" class="fa">&#xf080;</i> </button></td>
                                <td>
                                  <div class="dropdown no-arrow">
                                  <button class="btn btn-danger" @click="passsid(sensor.sensor_id)" data-toggle="dropdown"id="dropdownMenuLink" data-target="#showpdf"><i style="font-size:20px" class="fa">&#xf1c1;</i> </button>
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(74px, 31px, 0px);">
                                    <a class="dropdown-item" @click="get_1j_pdf(sensor.sensor_id)"  >Aujourd'hui<</a>
                                    <a class="dropdown-item" @click="get_7j_pdf(sensor.sensor_id)"  >Semaine</a>
                                    <a class="dropdown-item" @click="get_30j_pdf(sensor.sensor_id)" >Mois</a>
                                </div>
                                  {{-- <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle btn btn-primary btn-sm" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sélectionnez la Periode </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(74px, 31px, 0px);">
                                        <a class="dropdown-item" @click="get_1j_values()"  >Aujourd'hui<</a>
                                        <a class="dropdown-item" @click="get_7j_values()"  >Semaine</a>
                                        <a class="dropdown-item" @click="get_30j_values()" >Mois</a>
                                    </div>
                                  </div> --}}
                                </td>
                                <td>@{{sensor.max_value}}</td>
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
<!-- ----------------------show chart modal------------------------- -->
<div class="modal fade" id="showchart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Capteur de ID: @{{sensor_id}}---->@{{title}}</h4>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle btn btn-primary btn-sm" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sélectionnez la Periode </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(74px, 31px, 0px);">
              <a class="dropdown-item" @click="get_1j_values()"  >Aujourd'hui</a>
              <a class="dropdown-item" @click="get_7j_values()"  >Semaine</a>
              <a class="dropdown-item" @click="get_30j_values()" >Mois</a>
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
       <canvas id="myChart" style="display: block; width: 499px; height:250px;" width="600" height="300" class="chartjs-render-monitor"></canvas>
        
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
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Editer capteur de ID: @{{sensor_id}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="md-form ">

                    <label data-error="wrong" data-success="right" for="form3">Max_Valeur</label>
                    <input type="text" v-model="max_value" class="form-control validate">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect2" >Sélectionnez le Type</label>
                  <select class="form-control" id="exampleFormControlSelect2" v-model="type">
                    <option>Temperature</option>
                    <option>Humidité </option>
                    <option>Mouvement </option>
                  </select>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-outline-warning waves-effect"  role="button"  @click="editsensor()" aria-pressed="true" data-dismiss="modal">Edite</a>
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
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Supprimer le Capteur: @{{sensor_id}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <p class="font-weight-bold text-center">Etes-vous sùr de vouloir supprimer ce Capteur ?</p>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a class="btn btn-danger btn-lg active"  role="button"  @click="removesensor()" aria-pressed="true" data-dismiss="modal">Oui</a>
                <a class="btn btn-success btn-lg active" role="button" aria-pressed="true" data-dismiss="modal">Annuler</a>  
                
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
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Ajouter un nouvel capteur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">

                <div class="md-form ">
                    <label data-error="wrong" data-success="right" for="form2">Max Valeur</label>
                    <input type="float" v-model="max_value" class="form-control validate">
                </div>       

                <div class="form-group">
                  <label for="exampleFormControlSelect2" >Sélectionnez le Type</label>
                  <select class="form-control" id="exampleFormControlSelect2" v-model="type">
                    <option>Temperature</option>
                    <option>Humidité </option>
                    <option>Mouvement </option>
                  </select>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-outline-warning waves-effect"  role="button"  @click="creatsensor()" aria-pressed="true" data-dismiss="modal">Ajouter</a>
                </div>
@endsection