<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/userreviewedit.css?v=1')}}">
    <link rel="stylesheet" href="{{URL::asset('css/theme2/help.css?v=1')}}">

    @include('layouts.topHeader')

    <title>شازده مسافر | نوشتن نقد</title>

</head>

<body id="BODY_BLOCK_JQUERY_REFLOW" class="ltr domn_en_US lang_en long_prices globalNav2011_reset rebrand_2017 war_usability war_usability_2 war_client_side_validation war_please_dont_go war_friendly_text war_green_button css_commerce_buttons flat_buttons sitewide xo_pin_user_review_to_top track_back" data-scroll='OVERVIEW' data-navArea-metaType="QC_Meta_Mini" data-navArea-placement="Unknown" style="position: relative;">

<div id="PAGE" class="user_review non_hotels_like desktop scopedSearch" style="">
    @include('layouts.placeHeader')
    <div id="MAINWRAP" style="">
        <div id="MAIN" style="position: relative;">
            <div id="BODYCON" class="col easyClear poolB adjust_padding new_meta_chevron_v2" style="position: relative;">
                <div class="wrpHeader" style="position: relative;"></div>
                <div id="MAIN_COL" class="balance" style="position: relative;">
                    <div class="war_balance" style="position: relative;">
                        <div class="bigPhotoContainer no_blurry_photo">
                            <div class="writeAReviewHeader">
                                <div class="reviewHeader Left">
                                    <div class="locationInfo wrap">
                                        <div class="thumbnail">
                                            <div class="sizedThumb" style="width: 100%;height: auto;">
                                                @if($placeMode == "hotel")
                                                    <img src="{{$placePic}}" onclick="document.location.href = '{{route('hotelDetails', ['placeId' => $placeId, 'placeName' => $placeName])}}'" class="photo_image" style="cursor: pointer; width: 100%;border-radius: 4px;" alt=""/>
                                                @elseif($placeMode == "amaken")
                                                    <img src="{{$placePic}}" onclick="document.location.href = '{{route('amakenDetails', ['placeId' => $placeId, 'placeName' => $placeName])}}'" class="photo_image" style="cursor: pointer; width: 100%;border-radius: 4px;" alt=""/>
                                                @elseif($placeMode == "restaurant")
                                                    <img src="{{$placePic}}" onclick="document.location.href = '{{route('restaurantDetails', ['placeId' => $placeId, 'placeName' => $placeName])}}'" class="photo_image" style="cursor: pointer; width: 100%;border-radius: 4px;" alt=""/>
                                                @elseif($placeMode == "adab")
                                                    <img src="{{$placePic}}" onclick="document.location.href = '{{route('adabDetails', ['placeId' => $placeId, 'placeName' => $placeName])}}'" class="photo_image" style="cursor: pointer; width: 100%;border-radius: 4px;" alt=""/>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="nameAndAddress">
                                            <h4 class="propertyaddress" style="font-size: 2em;">
                                                <span class="format_address">
                                                    @if($placeMode == "hotel")
                                                        <span style="cursor: pointer" onclick="document.location.href = '{{route('hotelDetails', ['placeId' => $placeId, 'placeName' => $placeName])}}'" class="street-address">{{$placeName}}</span>,
                                                    @elseif($placeMode == "amaken")
                                                        <span style="cursor: pointer" onclick="document.location.href = '{{route('amakenDetails', ['placeId' => $placeId, 'placeName' => $placeName])}}'" class="street-address">{{$placeName}}</span>,
                                                    @elseif($placeMode == "restaurant")
                                                        <span style="cursor: pointer" onclick="document.location.href = '{{route('restaurantDetails', ['placeId' => $placeId, 'placeName' => $placeName])}}'" class="street-address">{{$placeName}}</span>,
                                                    @elseif($placeMode == "adab")
                                                        <span style="cursor: pointer" onclick="document.location.href = '{{route('adabDetails', ['placeId' => $placeId, 'placeName' => $placeName])}}'" class="street-address">{{$placeName}}</span>,
                                                    @endif
                                                    <span class="locality">{{$city}}, </span>
                                                    @if($placeMode != "adab")
                                                        <span class="country-name">{{$state}}</span>
                                                    @endif
                                                </span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <fieldset style="position: relative; display: block;">
                            <div id="list-errors" class="almost hidden">
                                <b>لطفا همه فیلد هارا پر کنید</b>
                                <ul>
                                </ul>
                            </div>
                            <h2 class="pageTitle" style="color: #4DC7BC;">از اینکه تجربه خود را با ما و دوستانتان در میان می گذارید سپاس گزاریم ! </h2>
                            <div class="warRequiredOuter" style="position: relative;">
                                <div class="warRequiredSectionContainer  notLoggedIn " style="position: relative;">
                                    <div class="questionBlock requiredQuestions" style="position: relative;">
                                        <div class="writeAReviewHeader" style="position: relative;">
                                            <div class="question rating bigRating labelAndInput required " data-error="RATE_OVERALL" style="position: relative;">
                                                <div id="DQ_RATINGS" class="question subRatingsList striped spaced" style="position: relative;">
                                                    <div id="targetHelp_5" class="targets" >
                                                        <div class="labelHeader">امتیاز شما به این مکان چیست</div>
                                                        <div id="helpSpan_5" class="helpSpans hidden row">
                                                            <span class="introjs-arrow"></span>
                                                            <p>در این قسمت می توانید به مکان مورد رتبه دهید. با توجه به مفهوم هر قسمت از یک تا پنچ ستاره امتیاز شما خواهد بود.</p>
                                                            <button data-val="5" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_5">بعدی</button>
                                                            <button data-val="5" class="btn btn-primary backBtnsHelp" id="backBtnHelp_5">قبلی</button>
                                                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                        </div>
                                                    </div>
                                                    <div class="ratingBubbleTable">
                                                        @foreach($opinions as $opinion)
                                                            <div class="dq_allTravelers questionRow">
                                                                <div class="detailsQuestion question">{{$opinion->name}}</div>
                                                                <div class="answersBlock">
                                                                <div style="float: right;" class="detailsRatings">
                                                                    <label class="visuallyHidden">
                                                                        {{$opinion->name}}
                                                                    </label>
                                                                    <span class="answersBubbles ui_bubble_rating rate bubble_00 qid12" id="opinion_{{$opinion->id}}" onmouseleave="mouseLeaveRate('{{$opinion->id}}')" onmousemove="mouseMoveRate(event, '{{$opinion->id}}')" onclick="clickRate(event, '{{$opinion->id}}')"></span>
                                                                </div>
                                                                <div style="color: #4DC7BC; float: right;margin-right: 40px;" class="ratingText short" id="ratingText_{{$opinion->id}}"></div>
                                                            </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <input id="DQ_LIST" name="dqList" type="hidden" value="12,13,190,14,47,11">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="REVIEW_TITLE" class="question labelAndInput required " data-error="REVIEW_TITLE_ERROR" style="position: relative;">
                                            <div id="targetHelp_6" class="targets">
                                                <label for="ReviewTitle">عنوان </label>
                                                <div id="helpSpan_6" class="helpSpans hidden row">
                                                    <span class="introjs-arrow"></span>
                                                    <p>در این قسمت عنوان نقد شما وارد می گردد. دقت کنید اولین جمله ای کاربران از نقد شما می خوانند عنوان آن است که می بایست خلاصه بوده و به درستی مندرجات نقد را شامل شود.</p>
                                                    <button data-val="6" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_6">بعدی</button>
                                                    <button data-val="6" class="btn btn-primary backBtnsHelp" id="backBtnHelp_6">قبلی</button>
                                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                </div>
                                            </div>
                                            <input type="text" name="ReviewTitle" id="ReviewTitle" style="width: 100% !important;" class="text" maxlength="120" value="{{(isset($log)) ? $log->subject : ''}}" placeholder="نکات اصلی و یا کلیدی را به طور خلاصه بنویسید">
                                        </div>
                                        <div id="REVIEW_TEXT" class="question labelAndInput required " data-error="REVIEW_TEXT_ERROR" style="position: relative;">
                                            <div id="targetHelp_7" class="targets">
                                                <label style="float: none !important;" for="ReviewText">نقد شما</label>
                                                <div id="helpSpan_7" class="helpSpans hidden row">
                                                    <span class="introjs-arrow"></span>
                                                    <p>نقد شما در این قسمت وارد می شود. نقد شما می بایست حداقل متشکل از 50 کلمه باشد تا منتشر گردد.</p>
                                                    <button data-val="7" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_7">بعدی</button>
                                                    <button data-val="7" class="btn btn-primary backBtnsHelp" id="backBtnHelp_7">قبلی</button>
                                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                </div>
                                            </div>
                                            <textarea name="ReviewText" id="ReviewText" style="width: 100% !important;" class="text" placeholder="تجربیات خود را با دیگران به اشتراک بگذارید">{{(isset($log)) ? $log->text : ''}}</textarea><br>
                                            <span style="line-height: 3em;" id="CHAR_MIN" class="characterCounter">(حداقل 150 کاراکتر)</span>
                                        </div>
                                        <div id="TRIP_TYPE" style="direction: rtl;" class="question required " data-error="TRIP_TYPE" style="position: relative;">
                                            <div id="targetHelp_8" class="targets">
                                                <div class="labelHeader">چگونه این مکان را بازدید نمودید</div>
                                                <div id="helpSpan_8" class="helpSpans hidden row">
                                                    <span class="introjs-arrow"></span>
                                                    <p>از بین گزینه ها بهترین گزینه را که شرایط سفر شما را توصیف می کند انتخاب کنید.</p>
                                                    <button data-val="8" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_8">بعدی</button>
                                                    <button data-val="8" class="btn btn-primary backBtnsHelp" id="backBtnHelp_8">قبلی</button>
                                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                </div>
                                            </div>
                                            <div id="trip_type_table" class="p13n_tag_cloud war_smaller_buttons">
                                                @foreach($placeStyles as $placeStyle)
                                                    @if(isset($comment) && $comment->placeStyleId == $placeStyle->id)
                                                        <div class="c-cell jfy_cloud tag content category-Business placeStyle selected" id="placeStyle_{{$placeStyle->id}}" data-val="{{$placeStyle->id}}">{{$placeStyle->name}}</div>
                                                    @else
                                                        <div class="c-cell jfy_cloud tag content category-Business placeStyle" id="placeStyle_{{$placeStyle->id}}" data-val="{{$placeStyle->id}}">{{$placeStyle->name}}</div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="optionalHeader" style="position: relative;">
                                            <div id="targetHelp_9" class="targets">
                                                <div class="optionalHeaderCont optionalHeaderLabel">مبدا سفر خود را وارد کنید</div>
                                                <div id="helpSpan_9" class="helpSpans hidden row">
                                                    <span class="introjs-arrow"></span>
                                                    <p>مبدا سفر خود را وارد کنید. انتخاب درست شما به همشهری های شما کمک می کند.</p>
                                                    <button data-val="9" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_9">بعدی</button>
                                                    <button data-val="9" class="btn btn-primary backBtnsHelp" id="backBtnHelp_9">قبلی</button>
                                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                </div>
                                            </div>
                                            <div class="col-xs-12" style="margin-top: 20px;">
                                                <input style="padding: 5px;border-radius: 4px;width: 40%;" type="text" name="ReviewTitle" id="src" onkeyup="searchForCity()" class="text" value="{{(isset($comment)) ? $comment->src : ''}}" placeholder="لطفا نام محل را به طور کامل و صحیح وارد نمایید"  >
                                                <div id="result" class="data_holder" style="max-height: 160px; overflow: auto; margin-top: 10px;"></div>
                                            </div>
                                            <span style="line-height: 3em;" class="characterCounter">در صورتی که نام شما در منو ظاهر شد لطفا از آن استفاده کنید</span>
                                        </div>
                                        <div id="DATE_OF_VISIT" class="question labelAndInput required  prodp13nTagQuestions" data-error="DATE_OF_VISIT" style="position: relative;">
                                            <div id="targetHelp_10" class="targets">
                                                <div class="labelHeader">زمان سفر خوب را مشخص نمایید.</div>
                                                <div id="helpSpan_10" class="helpSpans hidden row">
                                                    <span class="introjs-arrow"></span>
                                                    <p>فصلی که در آن سفر خود را انجام داده اید انتخاب کنید.</p>
                                                    <button data-val="10" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_10">بعدی</button>
                                                    <button data-val="10" class="btn btn-primary backBtnsHelp" id="backBtnHelp_10">قبلی</button>
                                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                </div>
                                            </div>
                                            <div id="" class="p13n_tag_cloud war_smaller_buttons">
                                                @if(isset($comment) && $comment->seasonTrip == 1)
                                                    <div class="c-cell jfy_cloud tag content category-Business seasonTrip selected" id="seasonTrip1" data-val="1" onclick="">بهار </div>
                                                @else
                                                    <div class="c-cell jfy_cloud tag content category-Business seasonTrip" id="seasonTrip1" data-val="1" onclick="">بهار </div>
                                                @endif
                                                @if(isset($comment) && $comment->seasonTrip == 2)
                                                    <div class="c-cell jfy_cloud tag content category-withSpouse seasonTrip selected" id="seasonTrip2" data-val="2" onclick=""> تابستان</div>
                                                @else
                                                    <div class="c-cell jfy_cloud tag content category-withSpouse seasonTrip" id="seasonTrip2" data-val="2" onclick=""> تابستان</div>
                                                @endif
                                                @if(isset($comment) && $comment->seasonTrip == 3)
                                                    <div class="c-cell jfy_cloud tag content category-withSpouse seasonTrip selected" id="seasonTrip3" data-val="3" onclick=""> پاییز</div>
                                                @else
                                                    <div class="c-cell jfy_cloud tag content category-withSpouse seasonTrip" id="seasonTrip3" data-val="3" onclick=""> پاییز</div>
                                                @endif
                                                @if(isset($comment) && $comment->seasonTrip == 4)
                                                    <div class="c-cell jfy_cloud tag content category-withSpouse seasonTrip selected" id="seasonTrip4" data-val="4" onclick=""> زمستان</div>
                                                @else
                                                    <div class="c-cell jfy_cloud tag content category-withSpouse seasonTrip" id="seasonTrip4" data-val="4" onclick=""> زمستان</div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="questionBlock optionalQuestions" style="position: relative;">
                                <div class="optionalHeader" style="position: relative;">
                                    <div id="targetHelp_11" class="targets">
                                        <div class="optionalHeaderCont optionalHeaderLabel">موارد اختیاری</div>
                                        <div id="helpSpan_11" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p>شما مجبور به جواب به این سوالات نیستید ولی اگر تمامی سوالات را پاسخ دهید. ولی پاسخ شما امتیاز خاصی دارد که در پروفایل شما ثبت می شود.</p>
                                            <button data-val="11" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_11">بعدی</button>
                                            <button data-val="11" class="btn btn-primary backBtnsHelp" id="backBtnHelp_11">قبلی</button>
                                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                                        </div>
                                    </div>
                                    <div class="optionalCta">در صورت پر کردن موارد ذیل از امتیاز ویژه ای برخوردار خواهید شد</div>
                                </div>
                                <input type="hidden" name="reviewTagIDs" value="" id="reviewTagIDs">
                                <div id="DQ_TAGYESNO" class="question yesNoList striped">
                                    <div class="questionHeader labelHeader hide_in_overlay"></div>
                                    @foreach($questions as $question)
                                        <div class="questionRow">
                                            <div class="answersBlock p13n_tag_cloud war_smaller_buttons">
                                                <div class="wartag-PrivateBalcony  answersYesNo jfy_cloud jfy_cloud_{{$question->id}}" id="yes_question_{{$question->id}}" onclick="ansToQuestion('{{$question->id}}', 'yes')" >بله</div>
                                                <div class="wartag-PrivateBalcony  answersYesNo jfy_cloud jfy_cloud_{{$question->id}}" id="no_question_{{$question->id}}" onclick="ansToQuestion('{{$question->id}}', 'no')">خیر</div>
                                                <div class="wartag-PrivateBalcony  answersYesNo jfy_cloud jfy_cloud_{{$question->id}}" id="noIdea_question_{{$question->id}}" onclick="ansToQuestion('{{$question->id}}', 'noIdea')">نظری ندارم</div>
                                            </div>
                                            <div class="question ">
                                                <span>{{$question->description}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="questionBlock fraudCheck required" style="position: relative;">
                                <div id="targetHelp_12" class="targets">
                                    <div class="labelHeader">ارسال نقد</div>
                                    <div id="helpSpan_12" class="helpSpans hidden row">
                                        <span class="introjs-arrow"></span>
                                        <p>در این قسمت می توانید نقدتان را ارسال کنید و یا کلا حذف نمایید. همچنین اگر نیاز به وقت بیشتری دارید آن را ذخیره کنید تا بعدا انتشار دهید.</p>
                                        <button data-val="12" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_12">بعدی</button>
                                        <button data-val="12" class="btn btn-primary backBtnsHelp" id="backBtnHelp_12">قبلی</button>
                                        <button class="btn btn-danger exitBtnHelp">خروج</button>
                                    </div>
                                </div>
                                <div id="FRAUD_CONT" class="question">
                                    <div class="willing ">

                                        <div id="FRAUD_LABEL_FLY" class="checkboxLabel">
                                            <label style="text-align: justify;">
                                                با ارسال نقد تایید می نمایم که نقد بر پایه تجربیات من بوده و به هیچ عنوان به دلیل منفعت مالی و خصومت شخصی به ابراز عقیده نپرداخته ام.<br>
                                                دوستان شما به نقد شما اعتماد کرده وبر پایه آن تصمیم می گیرند و ما همواره از این اعتماد حمایت کرده و نقد های غیر صادقانه را حذف می کنیم.</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <fieldset class="submit">
                                <div id="SBMT_WRP">
                                    <div class="ui_button primary large" style="padding: 5px 22px 7px;">
                                        <span onclick="sendComment(1)">ارسال نقد</span>
                                    </div>
                                    <div class="btn btn-default">
                                        <span onclick="sendComment(2)">ذخیره برای تکمیل</span>
                                    </div>
                                    <div class="ui_button secondary large" style="padding: 5px 22px 7px;border-color:#963019; ">
                                        <a style="color: #963019;" href="{{route('hotelDetails', ['placeId' => $placeId, 'placeName' => $placeName])}}"><span>انصراف</span></a>
                                    </div>
                                    <div class="ui_button secondary large" style="padding: 5px 22px 7px;border-color:#963019; ">
                                        <span style="color: #963019;" onclick="removeReview()">حذف</span>
                                    </div>
                                </div>
                                <h4 id="errMsg" style="color: #963019"></h4>
                            </fieldset>

                            <div class="questionBlock question warUploader" style="position: relative;">
                                <div class="optionalHeader" style="position: relative;">
                                    <div id="targetHelp_13" class="targets">
                                        <div class="labelHeader">در صورت داشتن عکس از سفر خود دریغ نکنید<span class="optionalNote">(اختیاری)</span></div>
                                        <div id="helpSpan_13" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p>در این قسمت می توانید نقدتان را ارسال کنید و یا کلا حذف نمایید. همچنین اگر نیاز به وقت بیشتری دارید آن را ذخیره کنید تا بعدا انتشار دهید.</p>
                                            <button data-val="13" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_13">بعدی</button>
                                            <button data-val="13" class="btn btn-primary backBtnsHelp" id="backBtnHelp_13">قبلی</button>
                                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                                        </div>
                                    </div>
                                </div>

                                <form method="post" action="{{route('addPhotoToComment', ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId])}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input id="photo" onchange="writeFileName(this.value)" type="file" name="photo" style="display: none">
                                    <label style="float: right;" for="photo">
                                        <div class="ui_button primary">
                                            انتخاب فایل
                                        </div>
                                    </label>

                                    <div id="submitPhotoDiv" style="visibility: hidden;">
                                        <input id="submit" type="submit" name="submitPhoto" style="display: none">
                                        <label for="submit">
                                            <div style="margin-right: 15px;" class="ui_button primary">
                                                اضافه کردن عکس
                                            </div>
                                        </label>
                                    </div>
                                    <br>
                                    <div id="fileName" style="color: #963019">
                                        @if($err == "success")
                                            تصویر شما به درستی به نقد اضافه گردید
                                        @else
                                            {{$err}}
                                        @endif
                                    </div>
                                </form>
                                <br>
                                <div style="position: relative;">
                                    @if(isset($log) && !empty($log->pic))
                                        <img style="margin-right: 13px;width: 150px;" id="userPhoto" src="{{URL::asset('userPhoto/comments/' . $log->kindPlaceId . '/' . $log->pic)}}">
                                        <div id="close_btn">
                                            <div onclick='deleteUserPicFromComment()' style='cursor: pointer; color: #963019 !important;position: absolute;top: -18px;right: 0; background: url("{{URL::asset('images') . 'estelah.png'}}");background-position: -2px -49px;background-size: 44px; width: 35px;display: block;height: 35px;'></div>
                                        </div>
                                    @else
                                        <img style="margin-right: 13px;width: 150px;" id="userPhoto" src="" hidden>
                                        <div id="close_btn"></div>
                                    @endif
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div id="RECENT_REVIEWS_COL" class="sidebar">
                    {{--@if($sumTmp == 0)--}}
                    <a style="cursor: pointer; float: left;" class="link" onclick="initHelp(14, [1, 2, 3, 4], 'MAINWRAP', 80, 400)">
                        <div style="background-size: 28px;background-position:  0 -29px;width: 28px;height:  28px;background-image: url('{{URL::asset('images') . '/help_share.png'}}');background-repeat:  no-repeat;"></div>
                    </a>
                    {{--@else--}}
                    {{--<a style="cursor: pointer" class="link" onclick="initHelp(16, [], 'MAIN', 100, 400)">--}}
                            {{--<div style="background-size: 28px;background-position:  0 -29px;width: 28px;height:  28px;background-image: url('{{URL::asset('images') . 'help_share.png'}}');background-repeat:  no-repeat;"></div>--}}
                        {{--</a>--}}
                    {{--@endif--}}
                    <div class="war_sidebar" style="padding-top: 80px;">
                        <img src="{{URL::asset('images/adv1.gif')}}" style="width: 70%;"/>
                    </div>
                </div>
                {{--<div id="loadingRecentDraft" style="display:none;">--}}
                    {{--<div>--}}
                        {{--<div class="loadingDraft"> Loading your most recent draft... </div>--}}
                        {{--<div class="loadingDraft"> <img src="https://static.tacdn.com/img2/generic/site/loading_anim_gry_sml.gif"alt=""/> </div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div id="cachedReviewMsg" class="reviewMsgPlaceholder">--}}
                    {{--<div class="welcome">Hi, welcome back.</div>--}}
                    {{--<p>You started to review Hotel DO. Would you like to finish your review now?</p>--}}
                    {{--<div class="wrpBtn">--}}
                        {{--<div class="button">--}}
                            {{--<a href="#">Finish this review</a>--}}
                        {{--</div>--}}
                        {{--<div class="button taLnk">--}}
                            {{--Delete and start over--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <DIV ID="taplc_achievement_notifications_0" class="ppr_rup ppr_priv_achievement_notifications" data-placement-name="achievement_notifications">

                </DIV>

            </div>
        </div>
    </div>
    @include('layouts.placeFooter')
</div>

<span id="add-photo" class="ui_overlay ui_modal photoUploadOverlay" style="padding: 0px; width: 860px; height: 90%; top: 5%; position: fixed; left: 50%; margin-left: -430px;display: none;">
    <div class="body_text">
        <div class="photoUploader">
        <div class="headerBar">
            <h3 id="photoUploadHeader" class="photoUploadHeader" style="top: -20px">
               افزودن عکس
            </h3>

            <form method="post" enctype="multipart/form-data" action="{{route('addPhotoToComment', ['placeId' => $placeId, 'kindPlaceId' => $kindPlaceId])}}" >
                {{csrf_field()}}
                <fieldset id="memberTags">
                    <div id="photoFilters"></div>
                    <input id="photo" type="file" name="photo" style="display: none">
                    <label for="photo">
                        <div class="ui_button primary addPhotoBtn">انتخاب عکس از فایل </div>
                    </label>
                </fieldset>
            </form>

            <div id="photoUploadTipsLink" class="headerLink tipsLink" >
                شرایط و قوانین
            </div>
        </div>
    </div>
    </div>
    <div id="close-but" style="left: 0 !important;" class="ui_close_x"></div>
</span>

<div class="ui_backdrop dark" style="display: none;"></div>

<script>

    $(document).ready( function () {
        @foreach($opinions as $opinion)
            mouseLeaveRate('{{$opinion->id}}');
        @endforeach
        @foreach($questions as $question)
            showAns('{{$question->id}}');
        @endforeach
    });

</script>

<script>

    var kindPlaceId = '{{$kindPlaceId}}';
    var getOpinionRate = '{{route('getOpinionRate')}}';
    var placeId = '{{$placeId}}';
    var setPlaceRate = '{{route('setPlaceRate')}}';
    var descriptions = ['کلیک کنید', 'بسیار بد', 'بد', 'متوسط', 'خوب', 'عالی'];
    var survey = '{{route('survey')}}';
    var getSurvey = '{{route('getSurvey')}}';
    var sendCommentDir = '{{route('sendComment')}}';
    var getCommentDir = '{{route('getComment')}}';
    var deleteUserPicFromCommentDir = '{{route('deleteUserPicFromComment')}}';
    var searchForCityDir = '{{route('searchForCity')}}';

    var selectedPlaceStyle = '{{(isset($comment)) ? $comment->placeStyleId : -1}}';
    var selectedSeasonTrip = '{{(isset($comment)) ? $comment->seasonTrip : -1}}';

</script>

<script>
    $(document).ready(function(){

        $(".placeStyle").click(function () {
            selectedPlaceStyle = $(this).attr('data-val');
            $(".placeStyle").removeClass("selected");
            $(this).addClass('selected');
        });

//        getComment();

        $(".seasonTrip").click(function () {
            selectedSeasonTrip = $(this).attr('data-val');
            $(".seasonTrip").removeClass("selected");
            $(this).addClass('selected');
        });

        $("#close-but").click(function(){
            $("#add-photo").hide();
            $(".ui_backdrop").hide();
            $("#laws-box").hide();
        });

        $("#photoUploadTipsLink").click(function(){

            if($("#laws-box").is(":hidden")){
                $("#laws-box").show();

            }else{
                $("#laws-box").hide();
            }
        });

        $("#add-picture-but").click(function(){
            $("#add-photo").show();
            $(".ui_backdrop").show();
        });

        $("#close-laws").click(function(){
            $("#laws-box").hide();
        });

        $("#drop-area").on('dragenter', function (e){
            e.preventDefault();
            $(this).css('background', '#BBD5B8');
        });

        $("#drop-area").on('dragover', function (e){
            e.preventDefault();
        });

        $("#drop-area").on('drop', function (e){
            $(this).css('background', '#D8F9D3');
            e.preventDefault();
            var image = e.originalEvent.dataTransfer.files;
            createFormData(image);
        });
    });

    @if(isset($lig))
        function removeReview() {

            $.ajax({
                type: 'post',
                url: '{{route('removeReview')}}',
                data: {
                    'logId': '{{$log->id}}'
                },
                success: function(response) {
                    if(response == "ok")
                        document.location.href = '{{route('hotelDetails', ['placeId' => $placeId, 'placeName' =>
                        $placeName])}}';
                }
            });
        }
    @endif

    function sendComment(status) {

        $("#errMsg").empty();

        if($("#ReviewTitle").val() == "") {
            $("#errMsg").append("عنوان نقد خود را مشخص کنید");
            return;
        }

        if($("#ReviewText").val() == "") {
            $("#errMsg").append("متن نقد خود را مشخص کنید");
            return;
        }

        if($("#ReviewText").val().length < 150) {
            $("#errMsg").append("متن نقد شما باید حداقل 150 کاراکتر باشد");
            return;
        }

        if(selectedPlaceStyle == -1) {
            $("#errMsg").append("چگونگی بازدید مکان خود را مشخص کنید");
            return;
        }

        if($("#src").val() == -1) {
            $("#errMsg").append("مبدا سفر خود را مشخص کنید");
            return;
        }

        if(selectedSeasonTrip == -1) {
            $("#errMsg").append("فصل سفر خود را مشخص کنید");
            return;
        }

        $.ajax({
            type: 'post',
            url: sendCommentDir,
            data: {
                'placeId': placeId,
                'kindPlaceId': kindPlaceId,
                'reviewTitle': $("#ReviewTitle").val(),
                'reviewText': $("#ReviewText").val(),
                'placeStyle': selectedPlaceStyle,
                'src': $("#src").val(),
                'seasonTrip': selectedSeasonTrip,
                'status': status
            },
            success: function (response) {
                if(response == "-1") {
                    $("#errMsg").append("امتیاز خود به مکان را مشخص کنید");
                    return;
                }
                if(response == "-2") {
                    $("#errMsg").append("عنوان نقد خود را مشخص کنید");
                    return;
                }
                if(response == "-3") {
                    $("#errMsg").append("متن نقد خود را مشخص کنید");
                    return;
                }
                if(response == "-4") {
                    $("#errMsg").append("چگونگی بازدید مکان خود را مشخص کنید");
                    return;
                }
                if(response == "-5") {
                    $("#errMsg").append("مبدا سفر خود را مشخص کنید");
                    return;
                }
                if(response == "-7") {
                    $("#errMsg").append("مبدا سفر معتبر نمی باشد");
                    return;
                }
                if(response == "-6") {
                    $("#errMsg").append("فصل سفر خود را مشخص کنید");
                    return;
                }
                if(response == "ok") {
                    $("#errMsg").append("نقد شما با موفقیت اضافه گردید و پس از بررسی نمایش داده می شود.");
                }
            }
        });

    }

    function deleteUserPicFromComment() {
        $.ajax({
            type: 'post',
            url: deleteUserPicFromCommentDir,
            data: {
                'placeId': placeId,
                'kindPlaceId': kindPlaceId
            },
            success: function (response) {
                if(response == "ok")
                    getComment();
            }
        })
    }

    function searchForCity() {

        if($("#src").val().length < 2) {
            $("#result").empty();
            return;
        }

        $.ajax({
            type: 'post',
            url: searchForCityDir,
            data: {
                'key': $("#src").val()
            },
            success: function (response) {

                $("#result").empty();
                if(response.length != 0) {
                    response = JSON.parse(response);
                    newElement = "";
                    for(i = 0; i < response.length; i++) {
                        newElement += "<p style='cursor: pointer' onclick='setCityName(\"" + response[i].cityName + "\")'>" + response[i].cityName + " در " + response[i].stateName + "</p>";
                    }

                    $("#result").append(newElement);
                }

            }
        });
    }

    function setCityName(cityName) {
        if(cityName != "")
            $("#src").val(cityName);
        $("#result").empty();
    }

    function getComment() {
        $.ajax({
            type: 'post',
            url: getCommentDir,
            data: {
                'placeId': placeId,
                'kindPlaceId': kindPlaceId
            },
            success: function (response) {

                $("#userPhoto").empty();
                $("#close_btn").empty();

                if(response.length == 0)
                    return;

                response = JSON.parse(response);

                $("#ReviewTitle").val(response.reviewTitle);
                $("#ReviewText").val(response.reviewText);
                $("#src").val(response.src);
                selectedSeasonTrip = response.seasonTrip;
                $(".seasonTrip").removeClass("selected");
                $("#seasonTrip" + selectedSeasonTrip).addClass('selected');
                selectedPlaceStyle = response.placeStyle;
                $(".placeStyle").removeClass("selected");
                $("#placeStyle_" + selectedPlaceStyle).addClass('selected');

                if(response.reviewPic != -1) {
                    $("#close_btn").append("<div onclick='deleteUserPicFromComment()' style='cursor: pointer; color: #963019 !important;position: absolute;top: -18px;right: 0; background: url(\"{{URL::asset('images') . 'estelah.png'}}\");background-position: -2px -49px;background-size: 44px; width: 35px;display: block;height: 35px;'></div>");
                    $("#userPhoto").attr('src', response.reviewPic).show();
                }
                else {
                    $("#userPhoto").attr('src', '').hide();
                }
            }
        });
    }

    function createFormData(image) {
        var formImage = new FormData();
        formImage.append('userImage', image[0]);
        uploadFormData(formImage);
    }

    function uploadFormData(formData)  {
        $.ajax({
            url: "upload_image.php",
            type: "POST",
            data: formData,
            contentType:false,
            cache: false,
            processData: false,
            success: function(data){
                $('#drop-area').html(data);
            }
        });
    }

    function mouseMoveRate(event, opinionId) {
        var rect = document.getElementById("opinion_" + opinionId).getBoundingClientRect();

        oldRate = 0;
        var node = $("#opinion_" + opinionId);
        if(node.hasClass("bubble_50"))
            oldRate = 5;
        else if(node.hasClass("bubble_40"))
            oldRate = 4;
        else if(node.hasClass("bubble_30"))
            oldRate = 3;
        else if(node.hasClass("bubble_20"))
            oldRate = 2;
        else if(node.hasClass("bubble_10"))
            oldRate = 1;

        i = Math.floor((event.pageX - rect.left) / 24);
        i = 5 - i;
        if(i != oldRate)
            $("#opinion_" + opinionId).removeClass("bubble_" + oldRate + "0");

        node.addClass("bubble_" + i + "0");
        $("#ratingText_" + opinionId).empty().append(descriptions[i]);
    }

    function mouseLeaveRate(opinionId) {

        $.ajax({
            type: 'post',
            url: getOpinionRate,
            data: {
                'opinionId': opinionId,
                'kindPlaceId': kindPlaceId,
                'placeId': placeId
            },
            success: function (response) {

                $("#opinion_" + opinionId).removeClass("bubble_00").removeClass("bubble_10").removeClass("bubble_20")
                        .removeClass("bubble_30").removeClass("bubble_40").removeClass("bubble_50").addClass("bubble_" + response + "0");
                $("#ratingText_" + opinionId).empty().append(descriptions[response]);
            }
        });

    }

    function clickRate(event, opinionId) {
        var rect = document.getElementById("opinion_" + opinionId).getBoundingClientRect();
        i = Math.floor((event.pageX - rect.left) / 24);
        i = 5 - i;
        $("#opinion_" + opinionId).removeClass("bubble_00").removeClass("bubble_10").removeClass("bubble_20")
                .removeClass("bubble_30").removeClass("bubble_40").removeClass("bubble_50").addClass("bubble_" + i + "0");

        $("#ratingText_" + opinionId).empty().append(descriptions[i]);


        $.ajax({
            type: 'post',
            url: setPlaceRate,
            data: {
                'placeId': placeId,
                'kindPlaceId': kindPlaceId,
                'rate': i,
                'opinionId': opinionId
            }
        });
    }

    function ansToQuestion(id, ans) {
        $(".jfy_cloud_" + id).removeClass("selected");
        switch (ans) {
            case 'yes':
                $("#yes_question_" + id).addClass("selected");
                break;
            case 'no':
                $("#no_question_" + id).addClass("selected");
                break;
            default:
                $("#noIdea_question_" + id).addClass("selected");
        }

        $.ajax({
            type: 'post',
            url: survey,
            data: {
                'placeId': placeId,
                'kindPlaceId': kindPlaceId,
                'ans': ans,
                'questionId': id
            }
        });
    }

    function showAns(id) {

        $.ajax({
            type: 'post',
            url: getSurvey,
            data: {
                'placeId': placeId,
                'kindPlaceId': kindPlaceId,
                'questionId': id
            },
            success: function (response) {

                $(".jfy_cloud_" + id).removeClass("selected");
                switch (response) {
                    case 'yes':
                        $("#yes_question_" + id).addClass("selected");
                        break;
                    case 'no':
                        $("#no_question_" + id).addClass("selected");
                        break;
                    case "noIdea":
                        $("#noIdea_question_" + id).addClass("selected");
                }
            }
        });
    }

    function writeFileName(val) {
        $("#fileName").empty().append(val);
        $("#submitPhotoDiv").css('visibility', 'visible');
    }
</script>
<script>

    var total;
    var filters = [];
    var hasFilter = false;
    var topContainer;
    var marginTop;
    var helpWidth;
    var greenBackLimit = 5;
    var pageHeightSize = window.innerHeight;
    var additional = [];
    var indexes = [];

    $(".nextBtnsHelp").click(function () {
        show(parseInt($(this).attr('data-val')) + 1, 1);
    });

    $(".backBtnsHelp").click(function () {
        show(parseInt($(this).attr('data-val')) - 1, -1);
    });

    $(".exitBtnHelp").click(function () {
        myQuit();
    });

    function myQuit() {
        clear();
        $(".dark").hide();
        enableScroll();
    }

    function setGreenBackLimit(val) {
        greenBackLimit = val;
    }

    function initHelp(t, sL, topC, mT, hW) {
        total = t;
        filters = sL;
        topContainer = topC;
        marginTop = mT;
        helpWidth = hW;

        if(sL.length > 0)
            hasFilter = true;

        $(".dark").show();
        show(1, 1);
    }

    function initHelp2(t, sL, topC, mT, hW, i, a) {
        total = t;
        filters = sL;
        topContainer = topC;
        marginTop = mT;
        helpWidth = hW;
        additional = a;
        indexes = i;

        if(sL.length > 0)
            hasFilter = true;

        $(".dark").show();
        show(1, 1);
    }

    function isInFilters(key) {

        key = parseInt(key);

        for(j = 0; j < filters.length; j++) {
            if (filters[j] == key)
                return true;
        }
        return false;
    }

    function getBack(curr) {

        for(i = curr - 1; i >= 0; i--) {
            if(!isInFilters(i))
                return i;
        }
        return -1;
    }

    function getFixedFromLeft(elem) {

        if(elem.prop('id') == topContainer || elem.prop('id') == 'PAGE') {
            return parseInt(elem.css('margin-left').split('px')[0]);
        }

        return elem.position().left +
                parseInt(elem.css('margin-left').split('px')[0]) +
                getFixedFromLeft(elem.parent());
    }

    function getFixedFromTop(elem) {

        if(elem.prop('id') == topContainer) {
            return marginTop;
        }

        if(elem.prop('id') == "PAGE") {
            return 0;
        }

        return elem.position().top +
                parseInt(elem.css('margin-top').split('px')[0]) +
                getFixedFromTop(elem.parent());
    }

    function getNext(curr) {

        curr = parseInt(curr);

        for(i = curr + 1; i < total; i++) {
            if(!isInFilters(i))
                return i;
        }
        return total;
    }

    function bubbles(curr) {

        if(total <= 1)
            return "";

        t = total - filters.length;
        newElement = "<div class='col-xs-12' style='position: relative'><div class='col-xs-12 bubbles' style='padding: 0; margin-right: 0; margin-left: " + ((400 - (t * 18)) / 2) + "px'>";

        for (i = 1; i < total; i++) {
            if(!isInFilters(i)) {
                if(i == curr)
                    newElement += "<div style='border: 1px solid #ccc; background-color: #ccc; border-radius: 50%; margin-right: 2px; width: 12px; height: 12px; float: left'></div>";
                else
                    newElement += "<div onclick='show(\"" + i + "\", 1)' class='helpBubble' style='border: 1px solid #333; background-color: black; border-radius: 50%; margin-right: 2px; width: 12px; height: 12px; float: left'></div>";
            }
        }

        newElement += "</div></div>";

        return newElement;
    }

    function clear() {

        $('.bubbles').remove();

        $(".targets").css({
            'position': '',
            'border': '',
            'padding': '',
            'background-color': '',
            'z-index': '',
            'cursor': '',
            'pointer-events': 'auto'
        });

        $(".helpSpans").addClass('hidden');
        $(".backBtnsHelp").attr('disabled', 'disabled');
        $(".nextBtnsHelp").attr('disabled', 'disabled');
    }

    function show(curr, inc) {

        clear();

        if(hasFilter) {
            while (isInFilters(curr)) {
                curr += inc;
            }
        }

        if(getBack(curr) <= 0) {
            $("#backBtnHelp_" + curr).attr('disabled', 'disabled');
        }
        else {
            $("#backBtnHelp_" + curr).removeAttr('disabled');
        }

        if(getNext(curr) > total - 1) {
            $("#nextBtnHelp_" + curr).attr('disabled', 'disabled');
        }
        else {
            $("#nextBtnHelp_" + curr).removeAttr('disabled');
        }

        if(curr < greenBackLimit) {
            $("#targetHelp_" + curr).css({
                'position': 'relative',
                'border': '5px solid #333',
                'padding': '10px',
                'background-color': '#4dc7bc',
                'z-index': 1000001,
                'cursor': 'auto'
            });
        }
        else {
            $("#targetHelp_" + curr).css({
                'position': 'relative',
                'border': '5px solid #333',
                'padding': '10px',
                'background-color': 'white',
                'z-index': 100000001,
                'cursor': 'auto'
            });
        }

        var targetWidth = $("#targetHelp_" + curr).css('width').split('px')[0];

        var targetHeight = parseInt($("#targetHelp_" + curr).css('height').split('px')[0]);

        for(j = 0; j < indexes.length; j++) {
            if(curr == indexes[j]) {
                targetHeight += additional[j];
                break;
            }
        }

        if($("#targetHelp_" + curr).offset().top > 200) {
            $("html, body").scrollTop($("#targetHelp_" + curr).offset().top - 100);
            $("#helpSpan_" + curr).css({
                'left': $("#targetHelp_" + curr).offset().left + targetWidth / 2 - helpWidth / 2 + "px",
                'top': targetHeight + 120 + "px"
            }).removeClass('hidden').append(bubbles(curr));
        }
        else {
            $("#helpSpan_" + curr).css({
                'left': $("#targetHelp_" + curr).offset().left + targetWidth / 2 - helpWidth / 2 + "px",
                'top': ($("#targetHelp_" + curr).offset().top + targetHeight + 20) % pageHeightSize + "px"
            }).removeClass('hidden').append(bubbles(curr));
        }



        $(".helpBubble").on({

            mouseenter: function () {
                $(this).css('background-color', '#ccc');
            },
            mouseleave: function () {
                $(this).css('background-color', '#333');
            }

        });

        disableScroll();
    }

    // left: 37, up: 38, right: 39, down: 40,
    // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36

    var keys = {37: 1, 38: 1, 39: 1, 40: 1};

    function preventDefault(e) {
        e = e || window.event;
        if (e.preventDefault)
            e.preventDefault();
        e.returnValue = false;
    }

    function preventDefaultForScrollKeys(e) {
        if (keys[e.keyCode]) {
            preventDefault(e);
            return false;
        }
    }

    function disableScroll() {
        if (window.addEventListener) // older FF
            window.addEventListener('DOMMouseScroll', preventDefault, false);
        window.onwheel = preventDefault; // modern standard
        window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
        window.ontouchmove  = preventDefault; // mobile
        document.onkeydown  = preventDefaultForScrollKeys;
    }

    function enableScroll() {
        if (window.removeEventListener)
            window.removeEventListener('DOMMouseScroll', preventDefault, false);
        window.onmousewheel = document.onmousewheel = null;
        window.onwheel = null;
        window.ontouchmove = null;
        document.onkeydown = null;
    }

</script>
</body>
</html>

