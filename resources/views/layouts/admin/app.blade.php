<!DOCTYPE html>
<html lang="en">

<!--   Tue, 07 Jan 2020 03:33:27 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Frigo | @yield('title')</title>
    <!-- general CSS -->
    @include('layouts.admin.css')
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

</head>

<body class="sidebar-fixed">
    <div class="container-scroller">

        <!-- Start app top navbar -->
        @include('layouts.admin.nav')

        <div class="container-fluid page-body-wrapper">

            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close fa fa-times"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles primary"></div>
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
          
            <!-- Start main left sidebar menu -->
            @include('layouts.admin.sidebar')

            <!-- Start app main Content -->
            <div class="main-panel">
                @yield('content')

                @include('layouts.admin.footer')

            </div>

        </div>
    </div>

    @include('layouts.admin.js')

</body>

<!--   Tue, 07 Jan 2020 03:35:12 GMT -->

</html>