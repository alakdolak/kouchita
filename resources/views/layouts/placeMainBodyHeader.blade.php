
<div class="atf_header_wrapper">
    <div class="atf_header container is-mobile full_width" style="padding-top: 0px;">

        <div class="ppr_rup ppr_priv_location_detail_header" style="margin-top: 0px;">
            <h1 id="HEADING" class="heading_title" property="name">{{$place->name}}</h1>

            <div class="rating_and_popularity">
                <span class="header_rating">
                   <div class="rs rating" rel="v:rating">
                       <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-left">
                           <span class="ui_bubble_rating bubble_{{$avgRate}}0 font-size-16" property="ratingValue" content="{{$avgRate}}" alt='{{$avgRate}} of {{$avgRate}} bubbles'></span>
                       </div>
                       <div class="more" id="moreTaLnkReviewHeader" href="#REVIEWS">
                           <span property="v:count" id="commentCount"></span>
                           {{__('امتیاز')}}
                       </div>
                   </div>
                </span>
{{--                <span class="header_popularity popIndexValidation" id="scoreSpanHeader">--}}
{{--                    <span>--}}
{{--                        {{$place->reviewCount}}--}}
{{--                        {{__('دیدگاه')}}--}}
{{--                    </span>--}}
{{--                </span>--}}
            </div>

            <div>
                <span class="ui_button_overlay position-relative float-left">
                    <div id="targetHelp_7" class="targets position-relative float-right">
                        <span onclick="saveToTrip()" id="addToFavouriteTripsMainDiv" class="ui_button saves ui_icon">
                            <div class="circleBase type2 addToFavouriteTripsIcon {{($save) ? "red-heart-fill" : "red-heart"}}"></div>
                            <div class="addToFavouriteTripsLabel">
                                {{__('افزودن به لیست سفر')}}
                            </div>
                        </span>
                    </div>
                    <div id="targetHelp_8" class="targets float-left col-xs-6 pd-0 mobile-mode">
                        <span onclick="bookMark();" class="ui_button save-location-7306673 saveAsBookmarkMainDiv">
                            <div class="saveAsBookmarkIcon {{($bookMark) ? "castle-fill" : "castles"}} "></div>
                            <div class="saveAsBookmarkLabel">
                                {{__('ذخیره این صفحه')}}
                            </div>
                        </span>
                    </div>
nan
                    <div id="share_box_mobile" class="display-none">
                        <a target="_blank" class="link mg-tp-5" {{($config->facebookNoFollow) ? 'rel="nofollow"' : ''}}
                        href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}">
                            <img src="{{URL::asset("images/shareBoxImg/facebook.png")}}" class="display-inline-block float-right">
                            <div class="display-inline-block float-right mg-rt-5">{{__('اشتراک صفحه در فیسبوک')}}</div>
                        </a>
                        <a target="_blank" class="link mg-tp-5" {{($config->twitterNoFollow) ? 'rel="nofollow"' : ''}}
                        href="https://twitter.com/home?status={{Request::url()}}">
                            <img src="{{URL::asset("images/shareBoxImg/twitter.png")}}" class="display-inline-block float-right">
                            <div class="display-inline-block float-right mg-rt-5">{{__('اشتراک صفحه در توییتر')}}</div>
                        </a>
                        {{-- whatsapp link create in shareBox.blade.php--}}
                        <a target="_blank" class="link mg-tp-5 whatsappLink" {{($config->whatsAppFollow) ? 'rel="nofollow"' : ''}} href="#">
                                <img src="{{URL::asset("images/shareBoxImg/whatsapp.png")}}" class="display-inline-block float-right">
                                <div class="display-inline-block float-right mg-rt-5">{{__('اشتراک صفحه واتس اپ')}}</div>
                        </a>

                        <a target="_blank" class="link mg-tp-5" {{($config->telegramNoFollow) ? 'rel="nofollow"' : ''}}
                        href="https://telegram.me/share/url?url={{Request::url()}}">
                            <img src="{{URL::asset("images/shareBoxImg/telegram.png")}}" class="display-inline-block float-right">
                            <div class="display-inline-block float-right mg-rt-5">{{__('اشتراک صفحه تلگرام')}}</div>
                        </a>
                        <a target="_blank" class="link mg-tp-5" {{($config->instagramFollow) ? 'rel="nofollow"' : ''}}
                        href="https://instagram.com/share?url={{ str_replace('%20', '', Request::url())}}">
                            <img src="{{URL::asset("images/shareBoxImg/instagram.png")}}" class="display-inline-block float-right">
                            <div class="display-inline-block float-right mg-rt-5">{{__('اشتراک صفحه اینستاگرام')}}</div>
                        </a>
                        <a target="_blank" class="link mg-tp-5" {{($config->pinterestFollow) ? 'rel="nofollow"' : ''}}
                        href="https://pinterest.com/home?status={{Request::url()}}">
                            <img src="{{URL::asset("images/shareBoxImg/pinterest.png")}}" class="display-inline-block float-right">
                            <div class="display-inline-block float-right mg-rt-5">{{__('اشتراک صفحه پین ترست')}}</div>
                        </a>
                        <div class="position-relative inputBoxSharePage mg-tp-5">
                            <input id="shareLinkInputPlaceDetailsHeader" class="full-width inputBoxInputSharePage" value="{{Request::url()}}" readonly onclick="copyLinkAddress(this)" style="cursor: pointer;">
                            <img src="{{URL::asset("images/shareBoxImg/copy.png")}}" id="copyImgInputShareLink">
                        </div>
                    </div>
                    <div id="share_pic_mobile" class="targets float-left col-xs-6 pd-0">
                        <span class="ui_button save-location-7306673 sharePageMainDiv" onclick="toggleShareIcon(this)">
                            <div class="sharePageIcon first"></div>
                            <div class="sharePageLabel">
                                {{__('اشتراک‌گذاری صفحه')}}
                            </div>
                        </span>
                    </div>

                    <span class="btnoverlay loading">
                        <span class="bubbles small">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </span>
                </span>
                <div class="prw_rup prw_common_atf_header_bl headerBL">
                    <div class="blRow">
                            @if($placeMode != 'mahaliFood' && $placeMode != 'sogatSanaies')
                                <div class="blEntry blEn address  clickable colCnt3" onclick="showExtendedMap({{$place->C}}, {{$place->D}})" style="min-height: 20px">
                                <span class="ui_icon map-pin"></span>
                                    <span class="street-address">{{__('آدرس')}} : </span>
                                    @if($placeMode == 'majara')
                                        <span>
                                            {{$place->dastresi}}
                                        </span>
                                    @else
                                        <span>
                                            {{$place->address}}
                                        </span>
                                    @endif
                                </div>
                            @endif
                        @if(isset($place->phone) && is_array($place->phone) && count($place->phone) > 0)
                            <div class="blEntry blEn phone truePhone">
                                <span class="ui_icon phone"></span>
                                @foreach($place->phone as $key => $phone)
                                    <a href="tel:{{$phone}}">
                                        {{$phone}}
                                    </a>
                                    @if($key != count($place->phone)-1)
                                        -
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        @if(!empty($place->site))
                            <div class="blEntry blEn website">
                                <span class="ui_icon laptop"></span>
                                <?php
                                if (strpos($place->site, 'http') === false)
                                    $place->site = 'http://' . $place->site;
                                ?>
                                <a target="_blank" href="{{$place->site}}" {{($config->externalSiteNoFollow) ? 'rel="nofollow"' : ''}}>
                                    <span>{{$place->site}}</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    function changeBookmarkIcon() {
        var icon = $('.saveAsBookmarkIcon').hasClass('castles');

        if(icon)
            $('.saveAsBookmarkIcon').addClass('castle-fill').removeClass('castles');
        else
            $('.saveAsBookmarkIcon').addClass('castles').removeClass('castle-fill');
    }

    $('#share_pic_mobile').click(function () {
        if ($('#share_box_mobile').is(":hidden")) {
            $('#share_box_mobile').show();
        } else {
            $('#share_box_mobile').hide();
        }
    });
</script>