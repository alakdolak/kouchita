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

<link rel="icon" href="{{URL::asset('images/icons/mainIcon.svg')}}" sizes="any" type="image/svg+xml">
<link rel="apple-touch-icon-precomposed" href="{{URL::asset('images/icons/mainIcon.svg')}}" sizes="any" type="image/svg+xml">

<link rel='stylesheet' type='text/css' href='{{URL::asset('css/fonts.css?v=1')}}' />
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/bootstrap.min.css?v=1')}}' />
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/topHeaderStyles.css?v=1')}}' />
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/icons.css?v1=1')}}'/>
<link rel="stylesheet" type='text/css' href="{{URL::asset('css/theme2/swiper.css?v=1')}}">
<link rel="stylesheet" href="{{URL::asset('css/component/components.css?v1=2')}}">

<script src="{{URL::asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{URL::asset('js/angular.js')}}"></script>
<script src="{{URL::asset('js/swiper/swiper.min.js')}}"></script>
<script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>

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


