<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
    <link rel="icon" type="image/ico" href="{{ asset('assets') }}/img/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Extra details for Live View on GitHub Pages -->
    <title>
        @yield('tittle')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <!-- CSS Files -->
    {{-- <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link href="{{ asset('assets') }}/css/fontAwesome.css" rel="stylesheet" />
    <link href="{{ asset('js') }}/DataTables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/bootstrap-datepicker.css" rel="stylesheet" /><!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    @yield('css')

</head>
<!-- Call body-->

<body class="c-app">
    @auth
        @if ((Helper::call()->level() !== null && Helper::call()->level() === 0) || Helper::call()->level() > 1)
            @include('layout.sidebar.pita-cukai', [
                'foto' => ($foto = App\Models\profile::where('np_user', Auth::user()->np)->first()),
            ])
            <div class="c-wrapper">
                @include('layout.navbar')
                @yield('content')
                @include('layout.footer')
            </div>
        @else
            @include('layout.sidebar.user.pikai', [
                'foto' => ($foto = App\Models\profile::where('np_user', Auth::user()->np)->first()),
            ])
            <div class="c-wrapper">
                @include('layout.navbar')
                <div class="c-body">
                    <main class="c-main">
                        <div class="container-fluid">
                            <div class="fade-in">
                                @yield('content')
                            </div>
                        </div>
                    </main>
                </div>
                @include('layout.footer')
            </div>
        @endif
    @endauth
    <!--   Core JS Files   -->
    <script src="{{ asset('js') }}/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/bootstrap-datepicker.js"></script>
    <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('js/coreui-utils.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('js/plugins/chartjs-plugin-datalabels.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>
    {{-- <script type="module"></script> --}}
</body>

@yield('scriptchrt')
@yield('script-js')
@stack('js')

</html>
