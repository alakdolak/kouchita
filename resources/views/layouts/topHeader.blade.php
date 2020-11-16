
<meta content="43970F70216852DDFADD70BBB51A6A8D" name="jetseo-site-verification" rel="verify" />

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="theme-color" content="#30b4a6"/>
<meta name="msapplication-TileColor" content="#30b4a6">
<meta name="msapplication-TileImage" content="{{URL::asset('images/icons/mainIcon.png')}}">
<meta name="twitter:card" content="summary"/>
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:site_name" content="سامانه جامع گردشگری کوچیتا" />
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<link rel="icon" href="{{URL::asset('images/icons/KOFAV0.svg')}}" sizes="any" type="image/svg+xml">
<link rel="apple-touch-icon-precomposed" href="{{URL::asset('images/icons/KOFAV0.svg')}}" sizes="any" type="image/svg+xml">

<link rel='stylesheet' type='text/css' href='{{URL::asset('css/fonts.css?v='.$fileVersions)}}' media="all"/>
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/bootstrap.min.css?v='.$fileVersions)}}'  media="all"/>
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/topHeaderStyles.css?v='.$fileVersions)}}'  media="all"/>
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v1='.$fileVersions)}}' media="all"/>
<link rel="stylesheet" type='text/css' href="{{URL::asset('css/theme2/swiper.css?v='.$fileVersions)}}" media="all">
<link rel="stylesheet" href="{{URL::asset('css/component/components.css?v='.$fileVersions)}}" media="all">

<script src="{{URL::asset('js/jquery-3.4.1.min.js')}}"></script>
<script async src="{{URL::asset('js/defualt/bootstrap.min.js')}}"></script>
<script async src="{{URL::asset('js/angular.js')}}"></script>
<script async src="{{URL::asset('js/swiper/swiper.min.js')}}"></script>
<script src="{{URL::asset('js/defualt/autosize.min.js')}}"></script>
<script async src="{{URL::asset('js/defualt/lazysizes.min.js')}}"></script>

{{--<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
{{--<script defer src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>--}}

<style>

@if(\App::getLocale() == 'en')

    *{
        font-family: enFonts;
        direction: ltr;
        text-align: left;
    }
@else
    *{
        font-family: IRANSansWeb;
    }
@endif
</style>


{{--<script src="https://apis.google.com/js/platform.js" async defer></script>--}}
{{--<meta name="google-signin-scope" content="profile email">--}}
{{--<meta name="google-signin-client_id" content="774684902659-1tdvb7r1v765b3dh7k5n7bu4gpilaepe.apps.googleusercontent.com">--}}

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158914626-1"></script>
<script>
    window.googleMapStyle = [
        {
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ebe3cd"
                }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#523735"
                }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#f5f1e6"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#c9b2a6"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#dcd2be"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#ae9e90"
                }
            ]
        },
        {
            "featureType": "landscape.natural",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "poi",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#93817c"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#a5b076"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#447530"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f5f1e6"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#fdfcf8"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f8c967"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#e9bc62"
                }
            ]
        },
        {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e98d58"
                }
            ]
        },
        {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#db8555"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#806b63"
                }
            ]
        },
        {
            "featureType": "transit",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#8f7d77"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#ebe3cd"
                }
            ]
        },
        {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#b9d3c2"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#92998d"
                }
            ]
        }
    ];

    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-158914626-1');

    var homeURL = "{{route('home')}}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function hideElement(e) {
        $(".dark").hide();
        $("#" + e).addClass("hidden");
    }

    function showElement(e) {
        $("#" + e).removeClass("hidden");
        $(".dark").show();
    }
</script>


