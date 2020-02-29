<style>
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
    .loader_200 {
        background-image: url("{{URL::asset('images/loading.svg')}}");
        width: 200px !important;
        height: 200px !important;
        background-size: 200px 200px;
    }
</style>

<div id="darkModal" class="display-none" role="dialog"></div>

<div class="loaderDiv" id="fullPageLoader" style="display: none">
    <div class="loader_200"></div>
</div>

@include('general.adminInPage')

@include('general.modalPhoto')

@include('general.proSearch')

@include('general.globalInput')

@include('general.alerts')

@include('layouts.recentlyViewAndMyTripsInMain')

@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif

<script>
    function checkLogin(){
        if (!hasLogin) {
            showLoginPrompt(requestUrl);
            return false;
        }
        else
            return true;
    }
</script>