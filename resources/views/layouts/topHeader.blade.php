
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109915445-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-109915445-1');
</script>

<link rel="icon" href="{{URL::asset('images/fav.png')}}" type="image/png"/>
<script src="{{URL::asset('js/jQuery.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<meta name="viewport" content="width=device-width"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>


{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/topHeaderStyles.css')}}' />
<link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/bootstrap.min.css')}}' />
<script src="{{URL::asset('js/angular.js')}}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>

<script>

    var homeURL = "{{route('home')}}";

    function hideElement(e) {
        $(".dark").hide();
        $("#" + e).addClass("hidden");
    }

    function showElement(e) {
        $("#" + e).removeClass("hidden");
        $(".dark").show();
    }

</script>

<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="{{URL::asset('css/theme2/swiper.css')}}">

<!-- Swiper JS -->
<script src="{{URL::asset('js/swiper/swiper.min.js')}}"></script>