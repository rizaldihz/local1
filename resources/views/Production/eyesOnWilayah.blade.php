@php
    /** @var \App\Production $id */
use App\WilayahKerja;
$wilayah = DB::table('wilayah_kerjas')
        ->where('wilayah_kerjas.id', '=', $id)
        ->first();
$oil = DB::table('productions')
        ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
        ->where('productions.wilayah_kerja_id', '=', $id)
        ->sum('produksi_minyak');
$gas = DB::table('productions')
        ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
        ->where('productions.wilayah_kerja_id', '=', $id)
        ->sum('produksi_gas');
$water = DB::table('productions')
        ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
        ->where('productions.wilayah_kerja_id', '=', $id)
        ->sum('produksi_air');
$fuelGas = DB::table('productions')
        ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
        ->where('productions.wilayah_kerja_id', '=', $id)
        ->sum('fuel_gas');
$flare = DB::table('productions')
        ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
        ->where('productions.wilayah_kerja_id', '=', $id)
        ->sum('flare');
$injeksiGas = DB::table('productions')
        ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
        ->where('productions.wilayah_kerja_id', '=', $id)
        ->sum('injeksi_gas');
$injeksiWater = DB::table('productions')
        ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
        ->where('productions.wilayah_kerja_id', '=', $id)
        ->sum('injeksi_air');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name', 'Petrogas-Hulu')}}</title>
    <!-- Scripts -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('css/OverlayScrollbars.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="manifest" href="{{asset('mix-manifest.json')}}">
</head>
<body class="hold-transition layout-top-nav" >
<!-- Site wrapper -->
<div class="wrapper">

<!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-3">

                    <div class="form-group row">
                        <div class="col-5 text-center">
                            <h3 class="mb-2 mt-2"><span class="font-weight-bold display-3">25</span> September <span class="small text-muted">2019</span></h3>
                        </div>
                        <div class="col-7 text-center">
                            <div class="alert alert-info mt-4">
                                <h3 class="mb-2 mt-2"><span class="small">Wilayah Kerja:</span> <b>{{$wilayah->nama}}</b></h3>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-4">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Prod<div class="d-none d-md-inline">uksi</div> <span class="badge bg-green">Oil</span></span>
                                    <span class="info-box-number">{{$oil}} <span class="text-orange small"><small>BOPD</small></span></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4 col-sm-4 col-4">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Prod<div class="d-none d-md-inline">uksi</div> <span class="badge bg-red">Gas</span></span>
                                    <span class="info-box-number">{{$gas}} <span class="text-orange small"><small>MMSCF</small></span></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4 col-sm-4 col-4">
                            <div class="info-box">
                                <div class="info-box-content">
                          <span class="info-box-text">Prod<div class="d-none d-md-inline">uksi</div> <span class="badge bg-blue">Water</span>
                          <span class="info-box-number">{{$water}} <span class="text-orange small"><small>BWPD</small></span></span>
                          </span></div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-3 col-6">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Fuel Gas</span>
                                    <span class="info-box-number">{{$fuelGas}} <span class="text-orange small"><small>MMSCF</small></span></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-3 col-6">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Flare</span>
                                    <span class="info-box-number">{{$flare}}<span class="text-orange small"><small>MMSCF</small></span></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-3 col-6">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Injeksi <span class="badge bg-red">Gas</span></span>
                                    <span class="info-box-number">{{$injeksiGas}}<span class="text-orange small"><small>MMSCF</small></span></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-3 col-6">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Injeksi <span class="badge bg-blue">Water</span></span>
                                    <span class="info-box-number">{{$injeksiWater}}<span class="text-orange small"><small>BWPD</small></span></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>



                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('js/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('js/daterangepicker.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/Chart.min.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script>
    $(function () {
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode      = 'index'
        var intersect = true

        var $productionChart = $('#production-chart')
        var productionChart  = new Chart($productionChart, {
            data   : {
                labels  : ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                datasets: [{
                    type                : 'line',
                    data                : [100, 120, 170, 167, 180, 177, 160],
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
                        data                : [60, 80, 70, 67, 80, 77, 100],
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

        var $injectionChart = $('#injection-chart');
        var injectionChart  = new Chart($injectionChart, {
            data   : {
                labels  : ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                datasets: [{
                    type                : 'line',
                    data                : [100, 120, 170, 167, 180, 177, 160],
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
                        data                : [60, 80, 70, 67, 80, 77, 100],
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
        });
        //Date range as a button home
        $('#reportrangehome').daterangepicker(
            {
                ranges   : {
                    '7 hari terakhir' : [moment().subtract(6, 'days'), moment()],
                    'Hari ini'        : [moment(), moment()],
                    'Kemarin'         : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Bulan ini'       : [moment().startOf('month'), moment().endOf('month')],
                    'Bulan lalu'      : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'Tahun ini'       : [moment().startOf('year'), moment().endOf('year')],
                    'Tahun lalu'      : [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
                },
                startDate: moment().subtract(6, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrangehome span').html(start.format('D MMM YYYY') + ' - ' + end.format('D MMM YYYY'))
            }
        )
        //Date range as a button
        $('#reportrange1').daterangepicker(
            {
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10),
                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                },
                showCustomRangeLabel: false
            },
            function (start, end) {
                $('#reportrange1 span').html(start.format('D MMM YYYY'))
            }
        );
        $('#reportrange2').daterangepicker(
            {
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10),
                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                },
                showCustomRangeLabel: false
            },
            function (start, end) {
                $('#reportrange2 span').html(start.format('D MMM YYYY'))
            }
        );
        $('#reportrange3').daterangepicker(
            {
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10),
                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                },
                showCustomRangeLabel: false
            },
            function (start, end) {
                $('#reportrang3 span').html(start.format('D MMM YYYY'))
            }
        );
        $('#reportrange4').daterangepicker(
            {
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10),
                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                },
                showCustomRangeLabel: false
            },
            function (start, end) {
                $('#reportrange4 span').html(start.format('D MMM YYYY'))
            }
        );
        $('#reportrange5').daterangepicker(
            {
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10),
                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                },
                showCustomRangeLabel: false
            },
            function (start, end) {
                $('#reportrange5 span').html(start.format('D MMM YYYY'))
            }
        );

        $('#colAll').click(function() {
            $('#tabReport td,th').show();
        });
        $('#colProd').click(function() {
            $('#tabReport td,th').hide();
            $('#tabReport td:nth-child(1),th:nth-child(1),td:nth-child(2),th:nth-child(2),td:nth-child(3),th:nth-child(3),td:nth-child(4),th:nth-child(4)').show();
        });
        $('#colF').click(function() {
            $('#tabReport td,th').hide();
            $('#tabReport td:nth-child(1),th:nth-child(1),td:nth-child(5),th:nth-child(5),td:nth-child(6),th:nth-child(6)').show();
        });
        $('#colInject').click(function() {
            $('#tabReport td,th').hide();
            $('#tabReport td:nth-child(1),th:nth-child(1),td:nth-child(7),th:nth-child(7),td:nth-child(8),th:nth-child(8)').show();
        });

    });
    // Register service worker to control making site work offline

    if('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('service-worker.js?')
            .then(function() { console.log('Service Worker Registered'); });
    }

    // Code to handle install prompt on desktop

    let deferredPrompt;
    const addBtn = document.querySelector('.add-button');
    //addBtn.style.display = 'none';

    window.addEventListener('beforeinstallprompt', (e) => {
        // Prevent Chrome 67 and earlier from automatically showing the prompt
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt = e;
        // Update UI to notify the user they can add to home screen
        addBtn.style.display = 'block';

        addBtn.addEventListener('click', (e) => {
            // hide our user interface that shows our A2HS button
            addBtn.style.display = 'none';
            // Show the prompt
            deferredPrompt.prompt();
            // Wait for the user to respond to the prompt
            deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('User accepted the A2HS prompt');
                } else {
                    console.log('User dismissed the A2HS prompt');
                }
                deferredPrompt = null;
            });
        });
    });

    n =  new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("reportrange1").value = m + "/" + d + "/" + y;
    document.getElementById("reportrange2").value = m + "/" + d + "/" + y;
    document.getElementById("reportrange3").value = m + "/" + d + "/" + y;
    document.getElementById("reportrange4").value = m + "/" + d + "/" + y;
    document.getElementById("reportrange5").value = m + "/" + d + "/" + y;
</script>
</body>
</html>

