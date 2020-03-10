<div id="darkModal" class="display-none" role="dialog"></div>

{{--this dark modal with blur--}}
<div id="darkModeMainPage" class="ui_backdrop dark" ></div>

<div class="loaderDiv" id="fullPageLoader" style="display: none">
    <div class="loader_200" style="background-image: url('{{URL::asset('images/loading.svg')}}');"></div>
</div>

@include('general.adminInPage')

@include('general.modalPhoto')

@include('general.searches.proSearch')

@include('general.searches.mainSearch')

@include('general.searches.globalInput')

@include('general.alerts')


@if(!Auth::check())
    @include('layouts.loginPopUp')
@else
    @include('general.uploadPhoto')
@endif

<script>
    var hasLogin = {{auth()->check() ? 1 : 0}};

    function checkLogin(){
        if (!hasLogin) {
            showLoginPrompt('{{Request::url()}}');
            return false;
        }
        else
            return true;
    }
</script>