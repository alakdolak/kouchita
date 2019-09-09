
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109915445-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-109915445-1');
</script>

<link rel="icon" href="{{URL::asset('images/fav.png')}}" type="image/png"/>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<script src="{{URL::asset('js/jQuery.js')}}"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

<style>

    @font-face {
        font-weight: normal;
        font-style: normal;
        font-family: 'Shazde_Regular2';
        src: url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer.eot?v003.200')}}');
        src: url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer.eot?v003.200#iefix')}}') format('embedded-opentype'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer.woff2?v003.200')}}') format('woff2'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer.woff?v003.200')}}') format('woff'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer.ttf?v003.200')}}') format('truetype'), url('') format('svg');
    }

    @font-face {
        font-weight: normal;
        font-style: normal;
        font-family: 'Shazde_Regular';
        src: url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer_Regular.eot?v003.200')}}');
        src: url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer_Regular.eot?v003.200#iefix')}}') format('embedded-opentype'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer_Regular.woff2?v003.200')}}') format('woff2'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer_Regular.woff?v003.200')}}') format('woff'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer_Regular.ttf?v003.200')}}') format('truetype'), url('') format('svg');
    }

    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: 900;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Black.eot')}}');
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Black.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Black.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Black.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Black.ttf')}}') format('truetype');
    }
    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: bold;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Bold.eot')}}');
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Bold.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Bold.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Bold.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Bold.ttf')}}') format('truetype');
    }
    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: 500;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Medium.eot')}}');
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Medium.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Medium.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Medium.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Medium.ttf')}}') format('truetype');
    }
    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: 300;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Light.eot')}}');
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Light.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Light.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Light.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Light.ttf')}}') format('truetype');
    }
    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: 200;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_UltraLight.eot')}}');
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_UltraLight.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_UltraLight.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_UltraLight.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_UltraLight.ttf')}}') format('truetype');
    }
    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: normal;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum).eot')}}');
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum).eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum).woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum).woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum).ttf')}}') format('truetype');
    }

</style>

<style>
    /*in Phone*/
    @media only screen and (max-width:600px) {
        .hideOnPhone {
            display: none;
            width: 0;
            height: 0;
        }
    }
    /*in Screen*/
    @media only screen and (min-width:601px) {
        .hideOnScreen {
            display: none;
            width: 0;
            height: 0;
        }
    }
    .hidden {
        display: none !important;
    }
</style>

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
{{--<script src="{{URL::asset('js/persianumber.js')}}"></script>--}}

{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$(document.body).persiaNumber();--}}
    {{--});--}}
{{--</script>--}}