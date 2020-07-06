<!DOCTYPE html>
<html>

<head>
    @section('header')

        @include('layouts.topHeader')

        <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}' data-rup='long_lived_global_legacy'/>
        <link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/hr_north_star.css?v=1')}}' data-rup='hr_north_star_v1'/>

        @yield('title')

        @yield('meta')

        @yield('head')

        <style>
            .glyphicon {
                font-family: 'Glyphicons Halflings' !important;
            }

            .loaderDiv{
                position: fixed;
                width: 100%;
                height: 100%;
                z-index: 99999;
                left: 0px;
                top: 0px;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #000000c7;
            }
        </style>
    @show
</head>

    <body data-spy="scroll" data-target=".navbar-nav" data-offset="50">

        @include('general.forAllPages')

        <div id="PAGE">

            @include('layouts.header1')

            @yield('main')

            @include('layouts.placeFooter')

        </div>
    </body>
</html>