{{--<link rel="stylesheet" href="{{URL::asset('css/pages/allCssForAllPages.css')}}">--}}

<div id="darkModal" class="display-none" role="dialog"></div>

{{--this dark modal with blur--}}
<div id="darkModeMainPage" class="ui_backdrop dark" ></div>

@include('general.loading')

@include('general.adminInPage')

@include('general.modalPhoto')

@include('general.searches.proSearch')

@include('general.searches.mainSearch')

@include('general.searches.globalInput')

@include('general.alerts')

@include('component.suggestionPack')

@include('general.addToTripModal')

@include('general.reportModal')

@if(!Auth::check())
    @include('layouts.loginPopUp')
@else
    @include('general.uploadPhoto')
@endif

<script>
    var hasLogin = {{auth()->check() ? 1 : 0}};

    function checkLogin(redirect = '{{Request::url()}}'){
        if (!hasLogin) {
            showLoginPrompt(redirect);
            return false;
        }
        else
            return true;
    }

    function resizeFitImg(_class) {
        let imgs = $('.' + _class);
        for(let i = 0; i < imgs.length; i++)
            fitThisImg(imgs[i]);
    }

    function fitThisImg(_element){
        var img = $(_element);
        var imgW = img.width();
        var imgH = img.height();

        var secW = img.parent().width();
        var secH = img.parent().height();

        if(imgH < secH){
            img.css('height', '100%');
            img.css('width', 'auto');
        }
        else if(imgW < secW){
            img.css('width', '100%');
            img.css('height', 'auto');
        }
    }

    function goToLanguage(_lang){
        if(_lang != 0)
            location.href = '{{url('language/')}}/' + _lang;
    }

    $(document).ready(function(){
        resizeFitImg('resizeImgClass');
    });
    $(window).resize(function(){
        resizeFitImg('resizeImgClass');
    });
</script>