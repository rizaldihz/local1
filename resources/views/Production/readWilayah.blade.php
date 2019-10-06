@extends ('layouts.app')

@php
    /** @var \App\Production $production */
    //echo $production;
@endphp

@section('content')

    <!-- Site wrapper -->
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 pt-3">

                            <div class="form-group row">
                                <div class="col-5">
                                    <div class="input-group">
                                        <div id="reportrangehome" class="btn btn-default float-right" >
                                            <i class="far fa-calendar-alt"></i>&nbsp;
                                            <span>Bulan ini</span> <i class="fa fa-caret-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <a href="{{route('home')}}"><i class="fas fa-arrow-left"></i> Semua Wilayah Kerja</a>
                                    <select class="form-control" id="selWilayahKerja">
                                        <option><a href="{{route('home')}}"></a>Semua Wilayah Kerja</option>
                                        <option selected>Cepu</option>
                                        <option>Madura Offshore</option>
                                        <option>Kangean</option>
                                        <option>Ketapang</option>
                                        <option>WMO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Gas, Oil, and Water <b>Production</b></h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="position-relative mb-4">
                                        <canvas id="production-chart" height="200"></canvas>
                                    </div>

                                    <div class="d-flex flex-row justify-content-end"><span class="mr-2">
                                            <i class="fas fa-square text-red"></i> Gas</span>
                                        <span class="mr-2"><i class="fas fa-square text-green"></i> Oil</span>
                                        <span><i class="fas fa-square text-primary"></i> Water</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->

                            <div class="card mt-3">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Gas and Water <b>Injection</b></h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="position-relative mb-4">
                                        <canvas id="injection-chart" height="200"></canvas>
                                    </div>

                                    <div class="d-flex flex-row justify-content-end"><span class="mr-2">
                                            <i class="fas fa-square text-red"></i> Gas</span><span>
                                            <i class="fas fa-square text-primary"></i> Water</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                            <div class="card mt-3">
                                <div class="card-body table-responsive p-0">
                                    <div class="row pl-2 pt-2 pr-2">
                                        <div class="col-12">
                                            <a href="{{route('production.export_view',$production[0]->id)}}" type="button" id="expXLS" class="btn btn-default btn-sm float-right ml-2"><i class="fa fa-download"></i> XLS</a>
                                            <div class="btn-group float-right">
                                                <button type="button" id="colAll" class="btn btn-default btn-sm">+</button>
                                                <button type="button" id="colProd" class="btn btn-default btn-sm">Produksi</button>
                                                <button type="button" id="colF" class="btn btn-default btn-sm">FG+F</button>
                                                <button type="button" id="colInject" class="btn btn-default btn-sm">Injeksi</button>
                                            </div>
                                        </div>
                                    </div>
                                    @include('Production.table', $production)
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
    <script>
        var url = "{{route('production.chart',$production[0]->id)}}";
        var tanggal = new Array();
        var produkAir = new Array();
        var produkGas = new Array();
        var produkMinyak = new Array();
        var injeksiGas = new Array();
        var injeksiAir = new Array();
        $(document).ready(function () {
            $.get(url, function (response) {
                response.forEach( function (data) {
                    tanggal.push(data.tanggal);
                    produkAir.push(data.produksi_air);
                    produkGas.push(data.produksi_gas);
                    produkMinyak.push(data.produksi_minyak);
                    injeksiGas.push(data.injeksi_gas);
                    injeksiAir.push(data.injeksi_air);
                });
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode      = 'index'
            var intersect = true

            var $productionChart = $('#production-chart');
            var productionChart  = new Chart($productionChart, {
                data   : {
                    labels  : tanggal,
                    datasets: [{
                        type                : 'line',
                        data                : produkAir,
                        backgroundColor     : 'transparent',
                        borderColor         : '#007bff',
                        pointBorderColor    : '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill                : false
                        // pointHoverBackgroundColor: '#007bff',
                        // pointHoverBorderColor    : '#007bff'
                    },
                        {
                            type                : 'line',
                            data                : produkMinyak,
                            backgroundColor     : 'transparent',
                            borderColor         : '#28a745',
                            pointBorderColor    : '#28a745',
                            pointBackgroundColor: '#28a745',
                            fill                : false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        },
                        {
                            type                : 'line',
                            data                : produkGas,
                            backgroundColor     : 'transparent',
                            borderColor         : '#dc3545',
                            pointBorderColor    : '#dc3545',
                            pointBackgroundColor: '#dc3545',
                            fill                : false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        }]
                },

                options: {
                    maintainAspectRatio: false,
                    tooltips           : {
                        mode     : mode,
                        intersect: intersect
                    },
                    hover              : {
                        mode     : mode,
                        intersect: intersect
                    },
                    legend             : {
                        display: false
                    },
                    scales             : {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display      : true,
                                lineWidth    : '4px',
                                color        : 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks    : $.extend({
                                beginAtZero : true,
                                suggestedMax: 200
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display  : true,
                            gridLines: {
                                display: false
                            },
                            ticks    : ticksStyle
                        }]
                    }
                }
            });


            var $injectionChart = $('#injection-chart');
            var injectionChart  = new Chart($injectionChart, {
                data   : {
                    labels  : tanggal,
                    datasets: [{
                        type                : 'line',
                        data                : injeksiAir,
                        backgroundColor     : 'transparent',
                        borderColor         : '#007bff',
                        pointBorderColor    : '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill                : false
                        // pointHoverBackgroundColor: '#007bff',
                        // pointHoverBorderColor    : '#007bff'
                    },
                        {
                            type                : 'line',
                            data                : injeksiGas,
                            backgroundColor     : 'tansparent',
                            borderColor         : '#28a745',
                            pointBorderColor    : '#28a745',
                            pointBackgroundColor: '#28a745',
                            fill                : false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips           : {
                        mode     : mode,
                        intersect: intersect
                    },
                    hover              : {
                        mode     : mode,
                        intersect: intersect
                    },
                    legend             : {
                        display: false
                    },
                    scales             : {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display      : true,
                                lineWidth    : '4px',
                                color        : 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks    : $.extend({
                                beginAtZero : true,
                                suggestedMax: 200
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display  : true,
                            gridLines: {
                                display: false
                            },
                            ticks    : ticksStyle
                        }]
                    }
                }
            })
        });
        });
    </script>

@endsection
