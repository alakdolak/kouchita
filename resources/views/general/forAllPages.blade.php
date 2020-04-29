
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

    function resizeFitImg(_class) {
        var imgs = $('.' + _class);
        for(i = 0; i < imgs.length; i++){
            var img = $(imgs[i]);
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
    }

    $(document).ready(function(){
        resizeFitImg('resizeImgClass');
    });
    $(window).resize(function(){
        console.log('in')
        resizeFitImg('resizeImgClass');
    });
</script>