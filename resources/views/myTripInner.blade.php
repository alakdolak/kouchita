<?php $mode = "profile"; $user = Auth::user(); ?>

@extends('layouts.bodyProfile')

@section('header')

    @parent
    <link rel="stylesheet" href="{{URL::asset('css/theme2/saves-rest-client.css?v=1')}}">
@stop

@section('main')

    @include('layouts.pop-up-create-trip')

    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/myTripsInner.css?v=1')}}'/>
    <link rel='stylesheet' type='text/css' href='{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}'/>

    <div id="MAIN" class="Saves prodp13n_jfy_overflow_visible position-relative">
        <div id="BODYCON" class="col easyClear poolB adjust_padding new_meta_chevron_v2 position-relative">
            <div class="wrpHeader"></div>
            <div id="saves-body" class="styleguide position-relative">
                <div id="saves-root-view" class="position-relative">
                    <div class="position-relative">
                        <div id="saves-single-trip-container" class="position-relative">
                            <div id="trip-header-region" class="trip-header">
                                <div class="saves-title title has-text-centered position-relative">
                                    <div class="position-relative">
                                        <a  class="text-decoration-none saves-back-button is-hidden-mobile ui_button secondary" href="{{route('myTrips')}}">← بازگشت به سفرهای من</a>
                                        <span class="trip-title">{{$trip->name}}</span>
                                        <div id="targetHelp_6" class="targets">
                                            @if($changeTripDate == 1)
                                                <span onclick="showEditTrip('{{$trip->from_}}', '{{$trip->to_}}')" class="ui_icon settings-fill mg-lt-0Imp"></span>
                                            @endif
                                            <div id="helpSpan_6" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>در این قسمت می توانید تاریخ شروع و پایان سفرو نام سفر را ویرایش کنید. همچنین می توانید اقدام به حذف سفر اقدام کنید.</p>
                                                <button data-val="6" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_6">بعدی</button>
                                                <button data-val="6" class="btn btn-primary backBtnsHelp" id="backBtnHelp_6">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                        @if(count($tripPlaces) == 0)
                                            <a class="cursor-pointer float-right link" onclick="initHelp(18, [1, 2, 3, 4, 5, 14, 15, 16, 17], 'MAIN', 100, 400)">
                                                <div class="helpBtnTimeChange"></div>
                                            </a>
                                        @else
                                            @if($owner || $addPlace)
                                                <a class="cursor-pointer float-right link" onclick="initHelp(18, [1, 2, 3, 4, 5], 'MAIN', 100, 400)">
                                                    <div class="helpBtnTimeChange"></div>
                                                </a>
                                            @else
                                                <a class="cursor-pointer float-right link" onclick="initHelp(18, [1, 2, 3, 4, 5, 16], 'MAIN', 100, 400)">
                                                    <div class="helpBtnTimeChange"></div>
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="saves-header-buttons">
                                    <div id="targetHelp_11" class="targets">
                                        <div onclick="showMembers('{{$owner}}')" class="saves-invite-friends  saves-header-button">
                                            <div class="ui_icon friend-fill"></div>
                                            اعضا
                                        </div>
                                        <div id="helpSpan_11" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p>در این قسمت می توانید دوستانتان را که در این لیست عضو هستند مشاهده کنید. همچنین اگر ادمین سفرباشید (کسی که لیست را ایجاد کرده است.) می توانید به مدیریت دسترسی اعضا با فشردن دکمه جزئیات در زیر نام آن ها بپردازید. همچنین می توانید اعضا را حذف کنید.</p>
                                            <button data-val="11" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_11">بعدی</button>
                                            <button data-val="11" class="btn btn-primary backBtnsHelp" id="backBtnHelp_11">قبلی</button>
                                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                                        </div>
                                    </div>
                                    @if($addFriend == 1)
                                        <div id="targetHelp_12" class="targets">
                                            <div  onclick="showElement('invitePane')" class="saves-print saves-header-button">
                                                <div class="ui_icon add-friend-fill"></div>
                                                دعوت از دوستان
                                            </div>
                                            <div id="helpSpan_12" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>در این قسمت می توانید به سفر دوست جدیدی اضافه کنید. درخواست شما برای دوستتان فرستاده می شود تا در صورت تمایل عضو شود. توجه کنید این امکان برای ادمین و یا کسانی که ادمین به آن ها اجازه داده است میسر می شود.</p>
                                                <button data-val="12" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_12">بعدی</button>
                                                <button data-val="12" class="btn btn-primary backBtnsHelp" id="backBtnHelp_12">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    @endif
                                    <div id="targetHelp_13" class="targets">
                                        <a target="_blank" href="{{route('printPage', ['tripId' => $trip->id])}}" class="color-black saves-print saves-header-button">
                                            <div class="ui_icon printer"></div>
                                            <span>چاپ</span>
                                        </a>
                                        <div id="helpSpan_13" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p>در این قسمت می توانید به سفر دوست جدیدی اضافه کنید. درخواست شما برای دوستتان فرستاده می شود تا در صورت تمایل عضو شود. توجه کنید این امکان برای ادمین و یا کسانی که ادمین به آن ها اجازه داده است میسر می شود.</p>
                                            <button data-val="13" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_13">بعدی</button>
                                            <button data-val="13" class="btn btn-primary backBtnsHelp" id="backBtnHelp_13">قبلی</button>
                                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="trip-action is-hidden-mobile width-autoImp">
                                    @if($addPlace == 1)
                                        <div id="targetHelp_7" class="targets">
                                            <div onclick="searchPlace('addPlacePrompt')" class="z-index-1 ui_button primary add_more">
                                                <div class="ui_icon plus"></div>
                                            </div>
                                            <div id="helpSpan_7" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>در این قسمت می توانید به صورت سریع اقدام به اضافه کردن مکان های جدید به لیست خود کنید.</p>
                                                <button data-val="7" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_7">بعدی</button>
                                                <button data-val="7" class="btn btn-primary backBtnsHelp" id="backBtnHelp_7">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    @endif
                                    @if($changeTripDate == 1)
                                        <div id="targetHelp_8" class="targets">
                                            <div onclick="editDateTrip('{{$trip->from_}}', '{{$trip->to_}}')" class="z-index-1 ui_button secondary trip-add-dates">
                                                <div class="ui_icon calendar"></div>
                                            </div>
                                            <div id="helpSpan_8" class="helpSpans hidden row">
                                                <span class="introjs-arrow"></span>
                                                <p>در این قسمت می توانید تاریخ شروع و پایان سفر را ویرایش کنید.</p>
                                                <button data-val="8" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_8">بعدی</button>
                                                <button data-val="8" class="btn btn-primary backBtnsHelp" id="backBtnHelp_8">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    @endif
                                    <div id="targetHelp_9" class="targets">
                                        <div onclick="addNote()" class="z-index-1 ui_button secondary trip-add-dates">
                                            <div class="ui_icon custom-note"></div>
                                        </div>
                                        <div id="helpSpan_9" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p>در این قسمت می توانید به کل سفر یادداشت اضافه کنید. این یادداشت با نام کاربری شما در بالای لیست نمایش داده می شود.</p>
                                            <button data-val="9" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_9">بعدی</button>
                                            <button data-val="9" class="btn btn-primary backBtnsHelp" id="backBtnHelp_9">قبلی</button>
                                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                                        </div>
                                    </div>
                                    <div id="targetHelp_10" class="targets">
                                        <div onclick="sortBaseOnPlaceDate('{{$sortMode}}')" class="z-index-1 ui_button secondary trip-add-dates">
                                            <div class="ui_icon seat-regular"></div>
                                        </div>
                                        <div id="helpSpan_10" class="helpSpans hidden row">
                                            <span class="introjs-arrow"></span>
                                            <p>شما می توانید به هر مکان موجود در لیست سفر تاریخی به عنوان تاریخ بازدید اضافه کید. این دکمه برای مدیریت نمایش مکان ها بر اساس تاریخ بازدید است.</p>
                                            <button data-val="10" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_10">بعدی</button>
                                            <button data-val="10" class="btn btn-primary backBtnsHelp" id="backBtnHelp_10">قبلی</button>
                                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="saves-body" class="styleguide position-relative">
                                <div id="saves-root-view" class="position-relative">
                                    @if($tripNote != "")
                                        <p id="tripNotePElement">{{$tripNote}}</p>
                                    @endif
                                    @if($tripPlaces == null || count($tripPlaces) == 0)
                                        <div id="saves-itinerary-container">
                                            <div id="trip-dates-region" style="display: none;"></div>
                                            <div id="trip-side-by-side">
                                                <div class="ui_columns">
                                                    <div id="trip-items-region" class="ui_column " data-column-name="items">
                                                        <div id="trip-item-collection-container" data-bucket-id="unscheduled" class="drag_container">
                                                            <div class="no-saves-container">
                                                                <div class="no-saves-content content">
                                                                    <div class="ui_icon heart"></div>
                                                                    <div class="cta-header">هنوز چیزی ذخیره نشده است</div>
                                                                    <div class="cta-text"></div>
                                                                    <a onclick="searchPlace('addPlacePrompt')" class="ui_button primary browse_ta">جستجو در کوچیتا</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div id="saves-all-trips" class="position-relative">
                                            <div id="saves-view-tabs-container" class=" position-relative">
                                                <div class="trips-container ui_container position-relative">
                                                    <div class="trips-container-inner ui_columns is-multiline position-relative">
                                                        <?php $i = 0; ?>
                                                        @foreach($tripPlaces as $tripPlace)
                                                            <div class="trip-tile-container ui_column is-3 position-relative">
                                                                <div class="trip-tile ui_card is-fullwidth position-relative">
                                                                    <div class="trip-header position-relative">
                                                                        <div class="full-width position-relative">
                                                                            @if($i == 0)
                                                                                <div id="targetHelp_14" class="targets">
                                                                                    <button data-toggle="tooltip" title="افزودن به سفر دیگر" onclick="addToTrip('{{$tripPlace->placeId}}', '{{$tripPlace->kindPlaceId}}')" class="pd-3-13 ui_button secondary trip-add-dates">
                                                                                        <span class="color-green ui_icon my-trips"></span>
                                                                                    </button>
                                                                                    <div id="helpSpan_14" class="helpSpans hidden row">
                                                                                        <span class="introjs-arrow"></span>
                                                                                        <p>با این امکان می توانید مکان های موجود در این لیست را به صورت سریع به سایر لیست های خود منتقل کنید.</p>
                                                                                        <button data-val="14" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_14">بعدی</button>
                                                                                        <button data-val="14" class="btn btn-primary backBtnsHelp" id="backBtnHelp_14">قبلی</button>
                                                                                        <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="targetHelp_15" class="targets">
                                                                                    <button data-toggle="tooltip" title="افزودن تاریخ به سفر" onclick="assignDateToPlace('{{$tripPlace->id}}', '{{$trip->from_}}', '{{$trip->to_}}')" class="pd-3-13 ui_button secondary trip-add-dates">
                                                                                        <span class="color-green ui_icon calendar"></span>
                                                                                    </button>
                                                                                    <div id="helpSpan_15" class="helpSpans hidden row">
                                                                                        <span class="introjs-arrow"></span>
                                                                                        <p>برای برنامه ریزی دقیق تر می توانید به مکان ها تاریخی برای بازدید اختصاص دهید.</p>
                                                                                        <button data-val="15" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_15">بعدی</button>
                                                                                        <button data-val="15" class="btn btn-primary backBtnsHelp" id="backBtnHelp_15">قبلی</button>
                                                                                        <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <button data-toggle="tooltip" title="افزودن به سفر دیگر" onclick="addToTrip('{{$tripPlace->placeId}}', '{{$tripPlace->kindPlaceId}}')" class="pd-3-13 ui_button secondary trip-add-dates">
                                                                                    <span class="color-green ui_icon my-trips"></span>
                                                                                </button>
                                                                                <button data-toggle="tooltip" title="افزودن تاریخ به سفر" onclick="assignDateToPlace('{{$tripPlace->id}}', '{{$trip->from_}}', '{{$trip->to_}}')" class="pd-3-13 ui_button secondary trip-add-dates">
                                                                                    <span class="color-green ui_icon calendar"></span>
                                                                                </button>
                                                                            @endif
                                                                            @if($owner == 1 || $addPlace)
                                                                                @if($i == 0)
                                                                                    <div id="targetHelp_16" class="targets">
                                                                                        <button data-toggle="tooltip" title="حذف مکان" onclick="deletePlace('{{$tripPlace->id}}')" class="ui_button removeBtnTargetHelp_16"></button>
                                                                                        <div id="helpSpan_16" class="helpSpans hidden row">
                                                                                            <span class="introjs-arrow"></span>
                                                                                            <p>با این دکمه مکان مورد نظر از لیست شما حذف می شود.</p>
                                                                                            <button data-val="16" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_16">بعدی</button>
                                                                                            <button data-val="16" class="btn btn-primary backBtnsHelp" id="backBtnHelp_16">قبلی</button>
                                                                                            <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                                                        </div>
                                                                                    </div>
                                                                                @else
                                                                                    <button data-toggle="tooltip" title="حذف مکان" onclick="deletePlace('{{$tripPlace->id}}')" class="ui_button removeBtnTargetHelp_16"></button>
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                        <div class="mg-tp-5 height-18">
                                                                            @if($tripPlace->date != "")
                                                                                <p>{{$tripPlace->date}}</p>
                                                                            @else
                                                                                بدون تاریخ
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <img class="cursor-pointer" onclick="document.location.href = '{{$tripPlace->url}}'" src='{{$tripPlace->pic}}' width="230px">
                                                                    @if($i == 0)
                                                                        <div id="targetHelp_17" class="targets trip-details ui_columns is-mobile is-fullwidth">
                                                                            <button data-toggle="tooltip" title="نمایش جزئیات" class="btn btn-default showDetailsBtnTargetHelp_17" id="showPlaceInfo_{{$tripPlace->id}}" onclick="showPlaceInfo(this.id, '{{$tripPlace->placeId}}', '{{$tripPlace->kindPlaceId}}', '{{$tripPlace->x}}', '{{$tripPlace->y}}', '{{$tripPlace->id}}', '{{floor($i / 4)}}')"></button>
                                                                            <div id="helpSpan_17" class="helpSpans hidden row">
                                                                                <span class="introjs-arrow"></span>
                                                                                <p>می توانید جزئیات مکان را مشاهده کنید. همچنین در مورد مکان یادداشتی بنویسید مانند توضیحی که نمی خواهید فراموش کنید.</p>
                                                                                <button data-val="17" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_17">بعدی</button>
                                                                                <button data-val="17" class="btn btn-primary backBtnsHelp" id="backBtnHelp_17">قبلی</button>
                                                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="targets trip-details ui_columns is-mobile is-fullwidth showDetailsBtnTargetHelp_17MainDiv">
                                                                            <button data-toggle="tooltip" title="نمایش جزئیات" class="btn btn-default showDetailsBtnTargetHelp_17" id="showPlaceInfo_{{$tripPlace->id}}" onclick="showPlaceInfo(this.id, '{{$tripPlace->placeId}}', '{{$tripPlace->kindPlaceId}}', '{{$tripPlace->x}}', '{{$tripPlace->y}}', '{{$tripPlace->id}}', '{{floor($i / 4)}}')"></button>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @if($i % 4 == 3 || $i == count($tripPlaces) - 1)
                                                                <div class="trip-tile-container ui_column is-12 hidden placeDetailsToggleBar" id="row_{{floor($i / 4)}}"></div>
                                                            @endif
                                                            <?php $i++; ?>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="notification-container"></div>
                </div>
            </div>
            <link rel='stylesheet' type='text/css' href='{{URL::asset('css/theme2/saves-rest-client.css?v=1')}}' data-rup='saves-rest-client'/>
        </div>
    </div>

    <span id="addPlacePrompt" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in item hidden">
        <div class="body_text">
            <div>
                <div class="find_location_modal">
                    <div class="header_text addPlacePromptTitle">به سفر {{$trip->name}} اضافه کن</div>
                    <div class="ui_typeahead" id="parameters">
                    </div>

                    <p id="placePromptError"></p>
                </div>
            </div>
        </div>
        <div class="ui_close_x" onclick="myHideElement()"></div>
    </span>

    <span id="membersPane" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in item hidden">
        <div class="body_text">
            <div>
                <div class="find_location_modal">
                    <div class="header_text membersPaneTitle">اعضای سفر</div>
                    <div class="ui_typeahead" id="members">
                    </div>
                </div>
            </div>
        </div>
        <div class="ui_close_x" onclick="myHideElement()"></div>
    </span>

    <div class="ui_backdrop dark darkModeOption"></div>

    <span id="note" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in item hidden">
        <div class="body_text">
            <div>
                <div class="find_location_modal">
                    <div class="header_text addNoteTitle">یادداشت سفر</div>
                    <div class="ui_typeahead" id="notePrompt">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="submitOptions direction-rtl">
            <button onclick="doAddNote()" class="btn btn-success successBtn">تایید</button>
            <input type="submit" onclick="myHideElement()" value="خیر" class="btn btn-default">
        </div>

        <div class="ui_close_x" onclick="myHideElement()"></div>
    </span>

    <span id="addPlaceToTripPrompt" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in item hidden">
        <div class="body_text">
            <div>
                <div class="find_location_modal">
                    <div class="header_text addPlaceToTripPromptTitle">مدیریت مکان</div>
                    <div class="ui_typeahead direction-rtl" id="tripsForPlace">
                    </div>
                </div>
            </div>
        </div>
        <div class="submitOptions direction-rtl">
            <button onclick="assignPlaceToTrip('{{$trip->from_}}', '{{$trip->to_}}')" class="btn btn-success successBtn">تایید</button>
            <input type="submit" onclick="myHideElement()" value="خیر" class="btn btn-default">
            <p id="errorAssignPlace"></p>
        </div>
        <div class="ui_close_x" onclick="myHideElement()"></div>
    </span>

    <span id="invitePane" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in item hidden">
        <div class="body_text">
            <div>
                <div class="find_location_modal">
                    <div class="header_text invitePaneTitle">دعوت از دوستان</div>
                    <div class="ui_typeahead direction-rtl">
                        <p>از کی دعوت می کنید</p>
                        <input type="text" id="friendId" placeholder="نام کاربری">
                        <p class="mg-tp-10">نام شما</p>
                        <input type="text" id="nickName" value="{{$user->username}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="submitOptions direction-rtl mg-tp-20">
            <button onclick="inviteFriend()" class="btn btn-success successBtn">ارسال</button>
            <input type="submit" onclick="myHideElement()" value="بازگشت" class="btn btn-default">
            <p id="errorInvite"></p>
        </div>
        <div class="ui_close_x" onclick="myHideElement()"></div>
    </span>

    <span id="addDateToPlace" class="pop-up ui_overlay ui_modal find-location-modal-container fade_short fade_in item hidden">
        <div class="body_text">
            <div>
                <div class="find_location_modal">
                    <div class="header_text addDateToPlaceTitle">اختصاص زمان به مکان</div>
                    <div class="ui_typeahead direction-rtl" id="calendar-container-edit-placeDate">
                        <input type="text" name="date" id="date_input">
                    </div>
                </div>
            </div>
        </div>
        <div class="submitOptions direction-rtl mg-tp-20">
            <button onclick="doAssignDateToPlace()" class="btn btn-success successBtn">تایید</button>
            <input type="submit" onclick="myHideElement()" value="خیر" class="btn btn-default">
        </div>
        <div id="errorText"></div>
        <div class="ui_close_x" onclick="myHideElement()"></div>
    </span>

    <span id="editDateTripPrompt" class="ui_overlay ui_modal editTags item hidden">
        <div class="modal-card">
            <div class="ui_close_x" onclick="myHideElement()"></div>
            <div class="modal-card-head">
                <p class="modal-card-title editTripDateLabel">ویرایش تاریخ سفر</p>
            </div>
            <div class="trip-dates ui_columns">
             <div class="ui_column">
                 <div id="date_btn_start_edit">تاریخ شروع</div>
                 <label id="date_btn_start_edit_label">
                     <span class="ui_icon calendar" id="date_btn_start_edit_span"></span>
                     <input id="date_input_start_edit_2" placeholder="روز/ماه/سال" value="{{$trip->from_}}" required readonly type="text">
                 </label>
              </div>
             <div class="ui_column">
                 <div id="date_btn_end_edit">تاریخ اتمام</div>
                 <label id="date_btn_end_edit_label">
                     <span class="ui_icon calendar" id="date_btn_end_edit_span"></span>
                     <input id="date_input_end_edit_2" placeholder="روز/ماه/سال" value="{{$trip->to_}}" required readonly type="text">
                 </label>
             </div>
         </div>
            <div class="modal-card-foot">
                <button onclick="changeDate()" id="editBtn" class="saves-settings-save ui_button first-button primary">ذخیره</button>
            </div>
            <br>
            <p class="color-red mg-10">توجه داشته باشید که با تغییر تاریخ سفر چنانچه مکانی از سفر شما تاریخی داشته باشد که در بازه ی جدید قرار نگیرد آن تاریخ پاک می شود</p>
            <p id="error2"></p>
        </div>
    </span>

    <span id="editTripPrompt" class="ui_overlay ui_modal editTags item hidden">
        <div class="header_text editTripPromptTitle">ویرایش سفر</div>
        <div class="body_text">
            <div id="trip-title-input-region">
                <div>
                    <label class="label">نام سفر</label>
                    <div class="control trip-title-control">
                        <input onkeyup="checkBtnDisable()" id="tripNameEdit" class="trip-title ui_input_text" type="text" maxlength="40" placeholder="حداکثر 40 کاراکتر" value="{{$trip->name}}">
                    </div>
                </div>
        </div>
            <div class="trip-dates ui_columns">
             <div class="ui_column">
                 <div id="date_btn_start_edit">تاریخ شروع</div>
                 <label id="date_btn_start_label">
                     <span class="ui_icon calendar" id="date_btn_start"></span>
                     <input type="text" id="date_input_start_edit" placeholder="روز/ماه/سال" value="{{$trip->from_}}" required readonly type="text">
                 </label>
              </div>
             <div class="ui_column">
                 <div id="date_btn_end_edit">تاریخ اتمام</div>
                 <label id="date_btn_end_label">
                     <span class="ui_icon calendar" id="date_btn_start"></span>
                     <input type="text" id="date_input_end_edit" placeholder="روز/ماه/سال" value="{{$trip->to_}}" required readonly type="text">
                 </label>
             </div>
         </div>

            @if($trip->to_ != "" && $trip->from_ != "")
                <div class="control clear-dates">
                    <div class='ui_input_checkbox'>
                        <input id="clearDateId" onclick="changeClearCheckBox('{{$trip->from_}}', '{{$trip->to_}}')" type="checkbox">
                        <label for="clearDateId" class="labelForCheckBox"><span></span>  حذف تاریخ  </label>
                    </div>
                </div>
            @endif

            <p class="color-red mg-10">توجه داشته باشید که با تغییر تاریخ سفر چنانچه مکانی از سفر شما تاریخی داشته باشد که در بازه ی جدید قرار نگیرد آن تاریخ پاک می شود</p>

            <div class="mg-tp-10">
                <div id="error"></div>
            </div>

        </div>

        <div class="submitOptions direction-rtl mg-tp-20">
            <button onclick="editTrip()" id="editBtn" class="saves-settings-save ui_button first-button primary">ذخیره</button>
            <button onclick="deleteTrip()" class="saves-settings-delete ui_button last-button danger">حذف سفر</button>
        </div>

        <div onclick="hideElement2('deleteTrip')" class="ui_close_x"></div>
    </span>

    <span class="ui_overlay ui_modal editTags item hidden" id="deleteTrip">
        <p>آیا از پاک کردن سفر اطمینان دارید ؟</p>
        <br><br>
        <div class="body_text">
            <div class="submitOptions">
                <button onclick="doDeleteTrip()" class="btn btn-success successBtn">بله </button>
                <input type="submit" onclick="myHideElement()" value="خیر" class="btn btn-default">
            </div>
        </div>

        <div onclick="hideElement2('deleteTrip')" class="ui_close_x"></div>

    </span>

    <span class="ui_overlay ui_modal editTags item hidden" id="deleteTripPlace">
        <p>آیا از پاک کردن مکان مورد نظر از سفر اطمینان دارید ؟</p>
        <br><br>
        <div class="body_text">
            <div class="submitOptions">
                <button onclick="doDeleteTripPlace()" class="btn btn-success successBtn">بله </button>
                <input type="submit" onclick="myHideElement()" value="خیر" class="btn btn-default">
            </div>
        </div>

        <div onclick="hideElement2('deleteTrip')" class="ui_close_x"></div>

    </span>

    <span class="ui_overlay ui_modal editTags item hidden" id="deleteMember">
        <p>آیا از حذف عضو مورد نظر از سفر اطمینان دارید ؟</p>
        <br><br>
        <div class="body_text">
            <div class="submitOptions">
                <button onclick="doDeleteMember()" class="btn btn-success successBtn">بله </button>
                <input type="submit" onclick="myHideElement()" value="خیر" class="btn btn-default">
            </div>
        </div>

        <div onclick="hideElement2('deleteTrip')" class="ui_close_x"></div>

    </span>

    <script async src="{{URL::asset("js/bootstrap-datepicker.js")}}"></script>

    <link rel="stylesheet" href="{{URL::asset('css/theme2/bootstrap-datepicker.css?v=1')}}">
    <script>
        var getStates = '{{route('getStates')}}';
        var getCitiesDir = '{{route('getCitiesDir')}}';
        var getPlaceKindsDir = '{{route('getPlaceKinds')}}';
        var searchPlaceDir = '{{route('searchPlace')}}';
        var tripId = '{{$trip->id}}';
        var addTripPlace = '{{route('addTripPlace')}}';
        var tripPlaces = '{{route('tripPlaces', ['tripId' => $trip->id])}}';
        var editTripDir = '{{route('editTrip')}}';
        var getPlaceTrips = '{{route('placeTrips')}}';
        var assignPlaceToTripDir = '{{route('assignPlaceToTrip')}}';
        var myTrips = '{{route('myTrips')}}';
        var placeInfo = '{{route('placeInfo')}}';
        var changeDateTripDir = '{{route('changeDateTrip')}}';
        var deleteTripDir = '{{route('deleteTrip')}}';
        var getNotes = '{{route('getNotes')}}';
        var addNoteDir = '{{route('addNote')}}';
        var assignDateToPlaceDir = '{{route('assignDateToPlace')}}';
        var inviteFriendDir = '{{route('inviteFriend')}}';
        var getMembers = '{{route('getTripMembers')}}';
        var deleteMemberDir = '{{route('deleteMember')}}';
        var getMemberAccessLevel = '{{route('getMemberAccessLevel')}}';
        var changeAddPlaceDir = '{{route('changeAddPlace')}}';
        var changeTripDateDir = '{{route('changeTripDate')}}';
        var changePlaceDateDir = '{{route('changePlaceDate')}}';
        var changeAddFriendDir = '{{route('changeAddFriend')}}';
        var deletePlaceDir = '{{route('deletePlace')}}';
        var addCommentDir = '{{route('addComment')}}';
    </script>

    <script>
        var selectedPlaceId = -1;
        var selectedKindPlaceId = -1;
        var selectedX;
        var selectedY;
        var selectedTripPlace;
        var selectedUsername;
        var currButtomInfoPlace;
        var currButtomInfoKindPlace;
        var oldButtonId = -1;

        function showElement(element) {
            $(".pop-up").addClass('hidden');
            $(".item").addClass("hidden");
            $("#" + element).removeClass('hidden');
            $('.dark').show();
        }

        function myHideElement() {
            $(".item").addClass('hidden');
            $('.dark').hide();
        }

        function hideElement2(id) {
            $("#" + id).addClass('hidden');
            $('.dark').hide();
        }

        function searchPlace(element) {

            $.ajax({
                type: 'post',
                url: getStates,
                success: function (response) {

                    $("#parameters").empty();

                    response = JSON.parse(response);

                    newElement = "<div class='row direction-rtl'><div class='float-right col-xs-4'><select id='stateId' onchange='getCities(this.value)'>";

                    newElement += "<option selected value='-1'>استان</option>";

                    for(i = 0; i < response.length; i++) {
                        newElement += "<option value = '" + response[i].id + "'>" + response[i].name + "</option>";
                    }

                    newElement += "</select></div>";

                    newElement += "<div class='col-xs-4 float-right'><select id='cityId'></select></div>";
                    newElement += "<div class='col-xs-4'><select onchange='search()' id='placeKind'></select></div>";

                    newElement += "<div class='col-xs-12' id='mainDivKeyAndResults'>";
                    newElement += "<input id='key' onkeyup='search()' type='text' maxlength='50' placeholder='هتل ، رستوران و اماکن'>";
                    newElement += "<div id='result' class='data_holder'></div>";
                    newElement += "</div>";


                    newElement += "</div>";

                    if(response.length > 0)
                        getCities(response[0].id);

                    getPlaceKinds();

                    $("#parameters").append(newElement);

                    showElement(element);

                }
            });
        }

        function search() {

            key = $("#key").val();

            if(key == null || key.length < 3) {
                $("#result").empty();
                return;
            }

            cityId = $("#cityId").val();
            placeKind = $("#placeKind").val();

            if(placeKind == -1) {
                $("#result").empty().append("<p class='dark-red'>لطفا مکان مورد نظر خود را مشخص کنید</p>");
                return;
            }

            $.ajax({
                type: 'post',
                url: searchPlaceDir,
                data: {
                    "stateId": $("#stateId").val(),
                    "cityId": cityId,
                    "key": key,
                    "placeKind": placeKind
                },
                success: function (response) {

                    response = JSON.parse(response);
                    $("#result").empty();
                    newElement = "";

                    if(response.length == 0) {
                        $("#placeId").val("");
                        newElement = 'موردی یافت نشد';
                    }

                    else {
                        suggestions = response;
                        currIdx = -1;

                        for(i = 0; i < response.length; i++) {
                            newElement += "<div class='suggest' id='suggest_" + i + "'  onclick='addPlace(\"" + response[i].id + "\")'> " + response[i].name + "<span> - </span><span>در</span><span>&nbsp;</span>" + response[i].cityName + "<span>&nbsp;در</span>" + response[i].stateName + "<span>&nbsp;آدرس</span><span>&nbsp;</span>" + response[i].address + "</div>";
                        }

                        $("#result").append(newElement);
                    }
                }
            });
        }

        function addPlace(val) {

            placeKind = $("#placeKind").val();

            $.ajax({
                type: 'post',
                url: addTripPlace,
                data: {
                    "tripId": tripId,
                    "placeId": val,
                    "kindPlaceId": placeKind
                },
                success: function (response) {

                    if(response == "ok")
                        document.location.href = tripPlaces;
                    else {
                        $("#placePromptError").empty();
                        $("#placePromptError").append('مکان مورد نظر در سفر شما موجود است');
                    }
                }
            });
        }

        function getCities(stateId) {

            $.ajax({
                type: 'post',
                url: getCitiesDir,
                data: {
                    stateId: stateId
                },
                success: function (response) {
                    $("#cityId").empty();
                    response = JSON.parse(response);

                    newElement = "";

                    if(response.length == 0)
                        newElement = "نتیجه ای حاصل نشد";

                    else
                        newElement += "<option selected value = '-1'>شهر</option>";

                    for(i = 0; i < response.length; i++) {
                        newElement += "<option value='" + response[i].id + "'>" + response[i].name + "</option>";
                    }

                    search();
                    $("#cityId").append(newElement);

                }
            });
        }

        function getPlaceKinds() {

            $.ajax({
                type: 'post',
                url: getPlaceKindsDir,
                success: function (response) {
                    $("#placeKind").empty();
                    response = JSON.parse(response);

                    newElement = "";
                    newElement += "<option selected value = '-1'>مکان مورد نظر</option>";
                    for(i = 0; i < response.length; i++) {
                        newElement += "<option value='" + response[i].id + "'>" + response[i].name + "</option>";
                    }

                    $("#placeKind").append(newElement);

                }
            });
        }

        function changeClearCheckBox(from, to) {

            val = $("#clearDateId").is(":checked");

            if(val == true) {
                $("#date_input_start_edit").val("");
                $("#date_input_end_edit").val("");
            }
            else {
                $("#date_input_start_edit").val(from);
                $("#date_input_end_edit").val(to);
            }

            val = $("#clearDateId_2").is(":checked");

            if(val == true) {
                $("#date_input_start_edit_2").val("");
                $("#date_input_end_edit_2").val("");
            }
            else {
                $("#date_input_start_edit_2").val(from);
                $("#date_input_end_edit_2").val(to);
            }
        }

        function checkBtnDisable() {

            if($("#tripNameEdit").val() == "")
                $("#editBtn").addClass("disabled");
            else
                $("#editBtn").removeClass("disabled");
        }

        function showEditTrip(from, to) {

            $("#date_input_start_edit").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                minDate: 0,
                dateFormat: "yy/mm/dd"
            });
            $("#date_input_end_edit").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                minDate: 0,
                dateFormat: "yy/mm/dd"
            });

            $("#date_input_start_edit").val(from);
            $("#date_input_end_edit").val(to);
            $("#error").empty();
            showElement('editTripPrompt');
        }

        function editTrip() {

            date_input_start = $("#date_input_start_edit").val();
            date_input_end = $("#date_input_end_edit").val();
            tripName = $("#tripNameEdit").val();

            if(tripName != "" && date_input_start != "" && date_input_start != "") {

                if(date_input_start > date_input_end) {
                    $("#error").empty();
                    newElement = "<p class='color-red'>تاریخ پایان از تاریخ شروع باید بزرگ تر باشد</p>";
                    $("#error").append(newElement);
                    return;
                }

                $.ajax({
                    type: 'post',
                    url: editTripDir,
                    data: {
                        'tripName': tripName,
                        'dateInputStart' : date_input_start,
                        'dateInputEnd' : date_input_end,
                        'tripId' : tripId
                    },
                    success: function (response) {
                        if(response == "ok") {
                            document.location.href = tripPlaces;
                        }
                        else if(response == "nok3") {
                            $("#error").empty();
                            newElement = "<p class='color-red'>تاریخ پایان از تاریخ شروع باید بزرگ تر باشد</p>";
                            $("#error").append(newElement);
                        }
                    }
                });
            }
            else
                editTripWithOutDate();

        }

        function editTripWithOutDate() {

            tripName = $("#tripNameEdit").val();

            if(tripName != "") {

                $.ajax({
                    type: 'post',
                    url: editTripDir,
                    data: {
                        'tripName': tripName,
                        'tripId' : tripId
                    },
                    success: function (response) {
                        if(response == "ok") {
                            document.location.href = tripPlaces;
                        }
                    }
                });
            }
        }

        function addToTrip(placeId, kindPlaceId) {

            selectedPlaceId = placeId;
            selectedKindPlaceId = kindPlaceId;

            $.ajax({
                type: 'post',
                url: getPlaceTrips,
                data: {
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId
                },
                success: function (response) {

                    $("#tripsForPlace").empty();

                    response = JSON.parse(response);
                    newElement = "<div class='row'>";

                    for(i = 0; i < response.length; i++) {

                        newElement += "<div class='col-xs-12'>";
                        newElement += "<div class='ui_input_checkbox'>";

                        if(response[i].select == "0")
                            newElement += "<input type='checkbox' name='selectedTrips[]' id='trip_" + response[i].id + "' value='" + response[i].id + "'>";
                        else
                            newElement += "<input type='checkbox' name='selectedTrips[]' checked id='trip_" + response[i].id + "' value='" + response[i].id + "'>";

                        newElement += "<label class='labelForCheckBox' for='trip_" + response[i].id + "'><span></span>&nbsp;&nbsp;" + response[i].name;
                        newElement += "</label></div></div>";
                    }

                    newElement += "</div>";

                    $("#tripsForPlace").append(newElement);
                    showElement('addPlaceToTripPrompt');

                }
            });
        }

        function assignPlaceToTrip() {

            if(selectedPlaceId != -1) {
                var checkedValuesTrips = $("input:checkbox[name='selectedTrips[]']:checked").map(function () {
                    return this.value;
                }).get();

                if(checkedValuesTrips == null || checkedValuesTrips.length == 0)
                    checkedValuesTrips = "empty";

                $.ajax({
                    type: 'post',
                    url: assignPlaceToTripDir,
                    data: {
                        'checkedValuesTrips': checkedValuesTrips,
                        'placeId': selectedPlaceId,
                        'kindPlaceId': selectedKindPlaceId
                    },
                    success: function (response) {
                        if (response == "ok")
                            document.location.href = tripPlaces;
                        else {
                            err = "<p>به جز سفر های زیر که اجازه ی افزودن مکان به آنها را نداشتید بقیه به درستی اضافه شدند</p>";

                            response = JSON.parse(response);

                            for(i = 0; i < response.length; i++)
                                err += "<p>" + response[i] + "</p>";

                            $("#errorAssignPlace").append(err);

                        }
                    }

                });
            }
        }

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 14,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(selectedX, selectedY), // New York

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                    "featureType":"landscape",
                    "stylers":[
                        {"hue":"#FFA800"},
                        {"saturation":0},
                        {"lightness":0},
                        {"gamma":1}
                    ]}, {
                    "featureType":"road.highway",
                    "stylers":[
                        {"hue":"#53FF00"},
                        {"saturation":-73},
                        {"lightness":40},
                        {"gamma":1}
                    ]},	{
                    "featureType":"road.arterial",
                    "stylers":[
                        {"hue":"#FBFF00"},
                        {"saturation":0},
                        {"lightness":0},
                        {"gamma":1}
                    ]},	{
                    "featureType":"road.local",
                    "stylers":[
                        {"hue":"#00FFFD"},
                        {"saturation":0},
                        {"lightness":30},
                        {"gamma":1}
                    ]},	{
                    "featureType":"water",
                    "stylers":[
                        {"hue":"#00BFFF"},
                        {"saturation":6},
                        {"lightness":8},
                        {"gamma":1}
                    ]},	{
                    "featureType":"poi",
                    "stylers":[
                        {"hue":"#679714"},
                        {"saturation":33.4},
                        {"lightness":-25.4},
                        {"gamma":1}
                    ]}
                ]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6700, -73.9400),
                map: map,
                title: 'Shazdemosafer!'
            });
        }

        function showPlaceInfo(id, placeId, kindPlaceId, x, y, tripPlaceId, rowId) {

            if(currButtomInfoKindPlace == kindPlaceId && currButtomInfoPlace == placeId) {
                if (!$("#row_" + rowId).hasClass('hidden')) {
                    $("#row_" + rowId).empty().addClass('hidden');
                    oldButtonId = -1;
                    $("#" + id).css('background-position-y', '0');
                    return;
                }
            }

            if(oldButtonId != -1)
                $("#" + oldButtonId).css('background-position-y', '0');

            $("#" + id).css('background-position-y', '-23px');
            oldButtonId = id;

            currButtomInfoPlace = placeId;
            currButtomInfoKindPlace = kindPlaceId;

            if(!tripPlaceId)
                tripPlaceId = -1;

            selectedX = x;
            selectedY = y;

            $.ajax({
                type: 'post',
                url: placeInfo,
                data: {
                    'placeId': placeId,
                    'kindPlaceId': kindPlaceId,
                    'tripPlaceId': tripPlaceId
                },
                success: function (response) {

                    response = JSON.parse(response);
                    $("#row_" + rowId).empty();

                    newElement = "<div class='col-xs-12 direction-rtl'>";


                    newElement += "<div class='col-xs-6'>";
                    if(response["date"] != null)
                        newElement += "<p id='visitTimeLabel'>تاریخ بازدید: " + response["date"] + "</p>";
                    newElement += "</div>";
                    newElement += "<div class='col-xs-6'>";
                    newElement += "<p onclick='document.location.href = \""+ response['url'] +"\"' class='cursor-pointer font-size-15em pd-5-0'>" + response["name"] + "</p>";
                    newElement += "</div>";
                    newElement += "<div class='col-xs-4' id='map'></div>";

                    newElement += '<div class="col-xs-4"><DIV class="prw_rup prw_common_bubble_rating overallBubbleRating">';
                    if(response["point"] == 5)
                        newElement += '<span class="ui_bubble_rating bubble_50 font-size-16" property="ratingValue" content="5" alt="5 of 5 bubbles"></span>';
                    else if(response["point"] == 4)
                        newElement += '<span class="ui_bubble_rating bubble_40 font-size-16" property="ratingValue" content="5" alt="4 of 5 bubbles"></span>';
                    else if(response["point"] == 3)
                        newElement += '<span class="ui_bubble_rating bubble_30 font-size-16" property="ratingValue" content="5" alt="3 of 5 bubbles"></span>';
                    else if(response["point"] == 2)
                        newElement += '<span class="ui_bubble_rating bubble_20 font-size-16" property="ratingValue" content="5" alt="2 of 5 bubbles"></span>';
                    else
                        newElement += '<span class="ui_bubble_rating bubble_10 font-size-16" property="ratingValue" content="5" alt="1 of 5 bubbles"></span>';
                    newElement += "</DIV>";

                    newElement += "<p>" + response["city"] + "/" + response["state"] + "</p>";
                    newElement += "<p>" + response["address"] + "</p>";
                    newElement += "</div>";
                    newElement += "<div class='col-xs-4'>";
                    newElement += "<div><img onclick='document.location.href = \""+ response['url'] +"\"' width='200px' height='200px' class='cursor-pointer' src='" + response["pic"] +  "'></div>";
                    newElement += "</div>";
                    newElement += "</div>";

                    if(tripPlaceId != -1) {

                        comments = response["comments"];

                        for(i = 0; i < comments.length; i++) {
                            newElement += "<div class='col-xs-12'>";
                            newElement += "<p>" + comments[i].uId + " میگه : " + comments[i].description + "</p>";

                            newElement += "</div>";
                        }

                        newElement += "<div class='col-xs-2 mg-tp-10'>";
                        newElement += "<button class='btn btn-primary' id='sendCommentBtn' onclick='addComment(\"" + tripPlaceId + "\")' data-toggle='tooltip' title='ارسال نظر'>ارسال</button>";
                        newElement += "</div>";

                        newElement += "<div class='col-xs-10 ma-tp-10'>";
                        newElement += "<textarea id='newComment' placeholder='یادداشت خود را وارد نمایید (حداکثر 300 کارکتر)' maxlength='300'></textarea>";
                        newElement += "</div>";
                    }

                    $("#row_" + rowId).append(newElement).removeClass('hidden');

                    init();
                }
            });
        }

        function addComment(tripPlaceId) {
            if($("#newComment").val() == "")
                return;
            $.ajax({
                type: 'post',
                url: addCommentDir,
                data: {
                    'tripPlaceId': tripPlaceId,
                    'comment': $("#newComment").val()
                },
                success: function (response) {

                    if(response == "ok")
                        document.location.href = tripPlaces;
                }
            });
        }

        function changeDate() {

            date_input_start = $("#date_input_start_edit_2").val();
            date_input_end = $("#date_input_end_edit_2").val();

            if(date_input_start != "" && date_input_start != "") {

                if(date_input_start > date_input_end) {
                    newElement = "<p class='color-red'>تاریخ پایان از تاریخ شروع باید بزرگ تر باشد</p>";
                    $("#error2").empty().append(newElement);
                    return;
                }
            }

            $.ajax({
                type: 'post',
                url: changeDateTripDir,
                data: {
                    'dateInputStart' : date_input_start,
                    'dateInputEnd' : date_input_end,
                    'tripId' : tripId
                },
                success: function (response) {
                    if(response == "ok") {
                        document.location.href = tripPlaces;
                    }
                    else if(response == "nok3") {
                        newElement = "<p class='color-red'>تاریخ پایان از تاریخ شروع باید بزرگ تر باشد</p>";
                        $("#error2").empty().append(newElement);
                    }
                }
            });
        }

        function deleteTrip() {

            $(".dark").show();
            $("#deleteTrip").removeClass('hidden');
        }

        function doDeleteTrip() {

            $.ajax({
                type: 'post',
                url: deleteTripDir,
                data: {
                    'tripId': tripId
                },
                success: function (response) {
                    if(response == "ok")
                        document.location.href = myTrips;
                }
            });
        }

        function addNote() {

            $.ajax({
                type: 'post',
                url: getNotes,
                data: {
                    'tripId': tripId
                },
                success: function (response) {

                    if(response != "empty") {
                        newElement = "<textarea id='tripNote'>";
                        newElement += response;
                    }
                    else {
                        newElement = "<textarea id='tripNote' placeholder='یادداشتی موجود نیست'>";
                    }

                    newElement += "</textarea>";



                    $("#notePrompt").empty().append(newElement);

                    showElement('note');
                }
            });

        }

        // XMaUcwm2WjjV9WpT

        function doAddNote() {

            $.ajax({
                type: 'post',
                url: addNoteDir,
                data: {
                    'tripId': tripId,
                    'note': $("#tripNote").val()
                },
                success: function (response) {
                    if(response == "ok") {
                        hideElement2('note');
                        $("#tripNotePElement").empty().append(($("#tripNote").val()));
                    }
                }
            });

        }

        function editDateTrip(from, to) {

            $("#date_input_start_edit_2").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                minDate: 0,
                dateFormat: "yy/mm/dd"
            });
            $("#date_input_end_edit_2").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                minDate: 0,
                dateFormat: "yy/mm/dd"
            });

            $("#date_input_start_edit_2").val(from);
            $("#date_input_end_edit_2").val(to);
            $("#error2").empty();

            showElement('editDateTripPrompt');
        }

        function assignDateToPlace(tripPlaceId, from, to) {
            selectedPlaceId = tripPlaceId;
            $("#calendar-container-edit-placeDate").css("visibility", "visible");
            $("#date_input").datepicker({
                numberOfMonths: 2,
                showButtonPanel: true,
                minDate: from,
                maxDate: to,
                dateFormat: "yy/mm/dd"
            });
            showElement('addDateToPlace');
        }

        function doAssignDateToPlace() {

            if($("#date_input").val() != "") {
                $.ajax({
                    type: 'post',
                    url: assignDateToPlaceDir,
                    data: {
                        'tripPlaceId': selectedPlaceId,
                        'date': $("#date_input").val()
                    },
                    success: function (response) {
                        if(response == "ok")
                            document.location.href = tripPlaces;
                        else if(response == "nok3") {
                            $("#errorText").empty().append("تاریخ مورد نظر در بازه ی سفر قرار ندارد");
                        }
                    }
                });
            }
        }

        function sortBaseOnPlaceDate(sortMode) {
            if(sortMode == "DESC")
                document.location.href = tripPlaces + "/ASC";
            else
                document.location.href = tripPlaces + "/DESC";
        }

        function inviteFriend() {

            if($("#nickName").val() == "" || $("#friendId").val() == "")
                return;

            $.ajax({
                type: 'post',
                url: inviteFriendDir,
                data: {
                    'nickName' : $("#nickName").val(),
                    'friendId' : $("#friendId").val(),
                    'tripId' : tripId
                },
                success: function(response) {
                    if(response == "ok") {
                        $("#nickName").empty();
                        $("#friendId").empty();
                        $("#errorInvite").empty();
                        hideElement2('invitePane');
                    }
                    else if(response == "nok") {
                        $("#errorInvite").empty().append('نام کاربری وارد شده نامعتبر است');
                    }
                    else if(response == "err4") {
                        $("#errorInvite").empty().append('شما هم اکنون عضو این سفر هستید');
                    }
                }
            });
        }

        function showMembers(owner) {

            $.ajax({
                type: 'post',
                url: getMembers,
                data: {
                    'tripId': tripId
                },
                success: function (response) {

                    response = JSON.parse(response);
                    newElement = "";

                    for(i = 0; i < response.length; i++) {
                        newElement += "<div class='col-xs-12'>";
                        newElement += "<span>" + response[i]['username'] + "</span>";
                        if(response[i]["delete"] == 1) {
                            newElement += "<button class='mg-rt-10 pd-0-9 ui_button secondary' onclick='deleteMember(\"" + response[i]['username'] + "\")' data-toggle='tooltip' title='حذف عضو'><span class=''><img src='" + homeURL + "/images/deleteIcon.gif'/> </span></button>";
                            if (owner == 1) {
                                newElement += "<br><a onclick='memberDetails(\"" + response[i]['username'] + "\")' class='cursor-pointer text-align-center dark-blue'>جزئیات<img src='" + homeURL + "/images/blackNavArrowDown.gif' width='7' height='4' hspace='10' border='0' align='absmiddle'/></a>";
                                newElement += "<div class='hidden' id='details_" + response[i]['username'] + "'></div>"
                            }
                        }
                        newElement += "</div>";
                    }

                    $("#members").empty().append(newElement);

                    showElement('membersPane');
                }
            });
        }

        function deleteMember(username) {

            selectedUsername = username;
            $(".dark").show();
            $("#deleteMember").removeClass('hidden');
        }

        function doDeleteMember() {
            $.ajax({
                type: 'post',
                url: deleteMemberDir,
                data: {
                    'username': selectedUsername,
                    'tripId': tripId
                },
                success: function (response) {
                    if(response == "ok")
                        document.location.href = tripPlaces;
                }
            });
        }

        function memberDetails(username) {

            if(!$("#details_" + username).hasClass('hidden')) {
                $("#details_" + username).addClass('hidden');
                return;
            }


            $.ajax({
                type: 'post',
                url: getMemberAccessLevel,
                data: {
                    'username': username,
                    'tripId': tripId
                },
                success: function (response) {

                    response = JSON.parse(response);

                    newElement = "<div class='row'>";
                    newElement += "<div class='col-xs-12 mg-tp-10'>";
                    newElement += "<div class='ui_input_checkbox'>";
                    if(response.addPlace == 1)
                        newElement += "<input id='addPlaceLevel' onclick='changeAddPlace(\"" + username + "\")' checked type='checkbox'>";
                    else
                        newElement += "<input id='addPlaceLevel' onclick='changeAddPlace(\"" + username + "\")' type='checkbox'>";

                    newElement += "<label for='addPlaceLevel' class='labelForCheckBox'><span></span>&nbsp;&nbsp;افزودن مکان</label>";
                    newElement += "</div></div>";

                    newElement += "<div class='col-xs-12 mg-tp-10'>";
                    newElement += "<div class='ui_input_checkbox'>";
                    if(response.addFriend == 1)
                        newElement += "<input id='addFriendLevel' onclick='changeAddFriend(\"" + username + "\")' checked type='checkbox'>";
                    else
                        newElement += "<input id='addFriendLevel' onclick='changeAddFriend(\"" + username + "\")' type='checkbox'>";

                    newElement += "<label class='labelForCheckBox' for='addFriendLevel'><span></span>&nbsp;&nbsp;دعوت دوستان</label></div></div>";

                    newElement += "<div class='col-xs-12 mg-tp-10'>";
                    newElement += "<div class='ui_input_checkbox'>";
                    if(response.changePlaceDate == 1)
                        newElement += "<input id='changePlaceDateLevel' onclick='changePlaceDate(\"" + username + "\")' checked type='checkbox'>";
                    else
                        newElement += "<input id='changePlaceDateLevel' onclick='changePlaceDate(\"" + username + "\")' type='checkbox'>";
                    newElement += "<label class='labelForCheckBox' for='changePlaceDateLevel'><span></span>&nbsp;&nbsp;تغییر زمان مکان های سفر</label></div></div>";

                    newElement += "<div class='col-xs-12 mg-tp-10'>";
                    newElement += "<div class='ui_input_checkbox'>";
                    if(response.changeTripDate == 1)
                        newElement += "<input id='changeDate' onclick='changeTripDate(\"" + username + "\")' checked type='checkbox'>";
                    else
                        newElement += "<input id='changeDate' onclick='changeTripDate(\"" + username + "\")' type='checkbox'>";
                    newElement += "<label class='labelForCheckBox' for='changeDate'><span></span>&nbsp;&nbsp;تغییر زمان سفر</label></div></div>";

                    newElement += "</div>";
                    $("#details_" + username).empty().append(newElement).removeClass('hidden');
                }
            });
        }

        function changeAddPlace(username) {

            $.ajax({
                type: 'post',
                url: changeAddPlaceDir,
                data: {
                    'username': username,
                    'tripId': tripId
                }
            });
        }

        function changeAddFriend(username) {

            $.ajax({
                type: 'post',
                url: changeAddFriendDir,
                data: {
                    'username': username,
                    'tripId': tripId
                }
            });
        }

        function changePlaceDate(username) {

            $.ajax({
                type: 'post',
                url: changePlaceDateDir,
                data: {
                    'username': username,
                    'tripId': tripId
                }
            });
        }

        function changeTripDate(username) {

            $.ajax({
                type: 'post',
                url: changeTripDateDir,
                data: {
                    'username': username,
                    'tripId': tripId
                }
            });
        }

        function deletePlace(tripPlaceId) {
            selectedTripPlace = tripPlaceId;
            $(".dark").show();
            $("#deleteTripPlace").removeClass('hidden');
        }

        function doDeleteTripPlace() {
            $.ajax({
                type: 'post',
                url: deletePlaceDir,
                data: {
                    'tripPlaceId': selectedTripPlace
                },
                success: function (response) {
                    if(response == "ok")
                        document.location.href = tripPlaces;
                }
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpeBLW4SWeWuDKKAT0uF7bATx8T2rEiXE&callback=init"></script>
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
            newElement = "<div class='col-xs-12 position-relative'><div class='col-xs-12 bubbles pd-0 mg-rt-0' style='margin-left: " + ((400 - (t * 18)) / 2) + "px'>";

            for (i = 1; i < total; i++) {
                if(!isInFilters(i)) {
                    if(i == curr)
                        newElement += "<div class='isNotInFilterCurrent'></div>";
                    else
                        newElement += "<div class='isNotInFilter helpBubble' onclick='show(\"" + i + "\", 1)'></div>";
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
    <script>
        $(document).ready(function () {
            checkBtnDisable();
        });
    </script>

@stop