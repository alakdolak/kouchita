<style>
    .menuIcon{
        background: url('{{URL::asset('images/menub.png')}}') no-repeat;
        background-size: 50px;
        height: 50px;
        width: 50px;
        cursor: pointer;
        margin-top: 10px;
    }

    .ui_icon.search:before {
        transform: rotate(90deg);
    }
</style>

<div class="masthead">
    <div id="taplc_global_nav_0" class="ppr_rup ppr_priv_global_nav">
        <div class="global-nav global-nav-single-line has-links ">
            <div class="global-nav-top">
                <div class="global-nav-bar global-nav-green" style="direction: rtl; background-color: #30b4a6">
                    <div class="ui_container global-nav-bar-container" style="height: 12vh!important;">
                        <div class="menuIcon"></div>
                        <a href="{{route('main')}}" class="global-nav-logo" style="margin: auto; height: 10vh !important;"><img src="{{URL::asset('images/logo.svg')}}" alt="شازده مسافر" class="global-nav-img global-nav-svg" style="height: 10vh !important;width: 210px !important;"/></a>
                        <span class="ui_icon search" onclick="$('#phoneProSearchPopUp').removeClass('hidden')" style="font-size: 50px; color: white; margin-top: 7px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>