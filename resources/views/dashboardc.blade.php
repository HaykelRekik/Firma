@extends('layouts.app2')

@section('content')
<div class="panel-header panel-header-lg" >
    <div class="row mx-4">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">vvvvv</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">27l c°</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Max Temp </span>
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 35 c°</span>
                                <input class="quantity" min="0" value="35" type="number">
                                <button type="button" class="btn btn-primary btn-sm">Save</button>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">70 %</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Max Humd </span>
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 90%</span>
                                <input class="quantity" min="0" value="35" type="number">
                                <button type="button" class="btn btn-primary btn-sm">Save</button>
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
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">False</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Alert State</span>
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> true</span>
                                <input class="quantity" min="0" value="1" type="number">
                                <button type="button" class="btn btn-primary btn-sm">Save</button>
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

<div class="content" >
    <div class="row mx-6">
        <div class="col-xl-6 col-lg-7">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">hhhhh</h6>
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
                        <canvas id="myAreaChart" style="display: block; width: 499px; height: 300px;" width="499" height="320" class="chartjs-render-monitor"></canvas>
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
                        <canvas id="myAreaChart" style="display: block; width: 499px; height: 300px;" width="499" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection