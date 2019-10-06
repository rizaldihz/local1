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
    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body class="hold-transition layout-top-nav" >
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-white navbar-light">
        <!-- Left Side Of Navbar -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item d-inline-block">
                    <a href="{{url('/home')}}" class="nav-link">Dashboard</a>
                </li>
                @if (Auth::check() && Auth::user()->name == 'Administrator')    
                <li class="nav-item d-inline-block">
                    <a href="{{route('production.create')}}" class="nav-link">Admin</a>
                </li>
                <li class="nav-item d-inline-block">
                    <a href="{{url('reset')}}" class="nav-link">Ganti Password</a>
                </li>
                @endif
            </ul>
        </div>
        <div class="navbar-custom-menu">
            @if(Auth::check())
            <ul class="navbar-nav">
                <li class="nav-item d-inline-block">
                    <a href="{{url('/logout')}}" class="nav-link">Logout</a>
                </li>
            </ul>                
            @else
            <ul class="navbar-nav">
                <li class="nav-item d-inline-block">
                    <a href="{{route('login')}}" class="nav-link">Login</a>
                </li>
            </ul>                
            @endif
        </div>
    </nav>
    <!-- /.Navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <main>
        @yield('content')
    </main>
    </div>
<!-- /.content-wrapper -->
</div>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>

        //Date range as a button
        $('#reportrange').daterangepicker(
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
                $('#reportrange span').html(start.format('D MMM YYYY'))
            }
        );
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
        //$('#expXLS').click(function () {
          //  {{url('production/{production}/export')}};
        //});
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
