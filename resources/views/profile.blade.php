<?php $mode = "profile"; $user = Auth::user(); ?>
@extends('layouts.bodyProfile')

    @section('main')

        <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/profile.css?v=1')}}">
        <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/usersActivities.css?v=1')}}">
        <link rel="stylesheet" href="{{URL::asset('css/shazdeDesigns/abbreviations.css?v=1')}}">

        <script>

            var getActivitiesNumPath = '{{route('ajaxRequestToGetActivitiesNum')}}';
            var getActivitiesPath = '{{route('ajaxRequestToGetActivities')}}';
            var sendMyInvitationCode = '{{route('sendMyInvitationCode')}}';

            $(document).ready(function () {
                b = "{{$totalPoint / $userLevels[1]->floor}}";
                initialProgress(b * 100);
            });

            function initialProgress(b) {
                $("#progressId").css("width", b + "%");
            }

            function getFixedFromLeftBODYCON(elem) {

                if(elem.prop('id') == 'BODYCON' || elem.prop('id') == 'PAGE') {
                    return parseInt(elem.css('margin-left').split('px')[0]);
                }

                return elem.position().left +
                        parseInt(elem.css('margin-left').split('px')[0]) +
                        getFixedFromLeftBODYCON(elem.parent());
            }

        </script>

        <div id="MAIN" class="MemberProfile prodp13n_jfy_overflow_visible">

            <div id="BODYCON" class="col easyClear poolB adjust_padding new_meta_chevron_v2">
                <div class="wrpHeader"></div>
                <div id="MODULES_MEMBER_CENTER" class="mc_achievements">

                    <div class="leftProfile">
                        <div id="infoDiv" class="profileLinksDropdown overlay oldoly noBackdrop relative relAbove item hidden">

                            <div class="inner" id="overlayInnerDiv">
                                <a name="edit-profile" class="menu-link" href="{{route('profile.accountInfo')}}">ویرایش اطلاعات کاربری</a>
                                <a name="edit-photo" class="menu-link" href="{{route('profile.editPhoto')}}">ویرایش عکس</a>
                                <a name="subscriptions" class="menu-link" href="{{route('soon')}}">اشتراک ها</a>
                            </div>
                        </div>

                        <div class="modules-membercenter-member-profile position-relative">

                            <div class="profileBlock">

                                <div id="targetHelp_6" class="targets col-xs-8 pd-lt-0">

                                    <p class="since"><b>{{(!empty($user->first_name)) ? $user->first_name : $user->username}}</b></p>
                                    <div class="ageSince">
                                        <div class="since" style="margin-left: 10px">عضو شده از</div>
                                        <div class="since">{{$user->created}}</div>
                                    </div>
                                    <div id="helpSpan_6" class="helpSpans hidden">
                                        <span class="introjs-arrow"></span>
                                        <p>
                                            دوستانتان فعالیت های شما را با این نام و عکس گاربری می بینند.شما می توانید به راحتی اقدام به تعویض ان ها نمایید. از منوی زیر اقدام کنید.
                                        </p>
                                        <button data-val="6" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_6">بعدی</button>
                                        <button data-val="6" class="btn btn-primary backBtnsHelp" id="backBtnHelp_6">قبلی</button>
                                        <button class="btn btn-danger exitBtnHelp">خروج</button>
                                    </div>
                                </div>


                                <div class="col-xs-4">
                                    @if(!$user->uploadPhoto)
                                        <img class="avatarUrl" src="{{URL::asset('defaultPic') . '/' . $user->picture}}" height="60" width="60"/>
                                    @else
                                        <img class="avatarUrl" src="{{URL::asset('userProfile') . "/" . $user->picture}}" height="60" width="60"/>
                                    @endif
                                </div>

                                <div class="nameContent">
                                    <div class="name">
                                        <div data-direction="right" id="targetHelp_7" class="targets profileLinks">

                                            <div data-val="off" onclick="if($(this).attr('data-val') == 'off') { showElement('infoDiv'); $('#arrowUp').removeClass('display-none');
                                                $('#arrowDown').addClass('display-none'); $(this).attr('data-val', 'on'); } else  { hideElement('infoDiv'); $('#arrowUp').addClass('display-none');
                                                $('#arrowDown').removeClass('display-none'); $(this).attr('data-val', 'off'); }" class="editInfosBoxTextMainDiv">
                                                {{--<img id="arrowDown" src="{{URL::asset('images/arrow_down.png')}}" class="profLinksArrowUp" height="15" width="15"/>--}}
                                                <div class="editInfosBoxText">ویرایش اطلاعات</div>
                                                <div id="arrowDown" class="glyphicon glyphicon-chevron-down"></div>

                                                {{--<img id="arrowUp" src="{{URL::asset('images/arrow_up.png')}}" class="profLinksArrowDown" hidden="hidden" height="15" width="15"/>--}}
                                                <div id="arrowUp" class="glyphicon glyphicon-chevron-up display-none"></div>
                                                <div class="overlayContents item">
                                                    <a name="edit-profile" class="menu-link" href="{{route('profile.accountInfo')}}">ویرایش اطلاعات کاربری</a>
                                                    <a name="edit-photo" class="menu-link" href="{{route('profile.editPhoto')}}">ویرایش عکس</a>
                                                    <a name="subscriptions" class="menu-link" href="">اشتراک ها</a>
                                                </div>
                                            </div>

                                            <div id="helpSpan_7" class="helpSpans hidden">
                                                <span class="introjs-arrow"></span>
                                                <p class="font-size-12">
                                                    از طریق این منو می توانید در هر لحظه اطلاعات کاربری خود را تغییر دهید.
                                                </p>
                                                <button data-val="7" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_7">بعدی</button>
                                                <button data-val="7" class="btn btn-primary backBtnsHelp" id="backBtnHelp_7">قبلی</button>
                                                <button class="btn btn-danger exitBtnHelp">خروج</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="aboutMeDesc">
                                    <a href="{{route('profile.accountInfo')}}" class="update">به روز رسانی اطلاعات </a>
                                </div>


                            </div>

{{--                            <div class="profInfo">--}}


{{--                                <div class="hometown"></div>--}}
{{--                            </div>--}}
                        </div>


                        <div class="userProfileActivitiesMainDiv rightColBoxes">
                            <div class="mainDivHeaderText">
                                <h3>شرح فعالیت‌ها</h3>
                            </div>
                            <div class="activitiesMainDiv">
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">گذاشتن پست</div>
                                    <div class="activityNumbers">پست 21</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">آپلود عکس</div>
                                    <div class="activityNumbers">عکس 365</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">آپلود فیلم</div>
                                    <div class="activityNumbers">فیلم 6</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">آپلود فیلم 360</div>
                                    <div class="activityNumbers">فیلم 2</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">پرسیدن سؤال</div>
                                    <div class="activityNumbers">سؤال 5</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">پاسخ به سؤال دیگران</div>
                                    <div class="activityNumbers">پاسخ 15</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">امتیازدهی</div>
                                    <div class="activityNumbers">مکان 14</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">پاسخ به سؤالات اختیاری</div>
                                    <div class="activityNumbers">پاسخ 145</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">ویرایش مکان</div>
                                    <div class="activityNumbers">مکان 13</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">پیشنهاد مکان جدید</div>
                                    <div class="activityNumbers">مکان 10</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">نوشتن مقاله</div>
                                    <div class="activityNumbers">مقاله 3</div>
                                </div>
                                <div class="activitiesLinesDiv">
                                    <div class="activityTitle">معرفی دوستان</div>
                                    <div class="activityNumbers">معرفی 7</div>
                                </div>
                            </div>
                        </div>

{{--                        <?php $i = 0; $allow = true; ?>--}}
{{--                        @foreach($activities as $activity)--}}

{{--                            @if($counts[$i] != 0)--}}
{{--                                @if($allow)--}}
{{--                                    <?php $allow = false; ?>--}}
{{--                                    <div id="targetHelp_12" class="targets modules-membercenter-content-summary">--}}

{{--                                        <div id="helpSpan_12" class="helpSpans hidden">--}}
{{--                                            <span class="introjs-arrow"></span>--}}
{{--                                            <p>--}}
{{--                                                تمامی فعالیت های شما به صورت خلاصه در این قسمت قابل رویت است.--}}
{{--                                            </p>--}}
{{--                                            <button data-val="12" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_12">بعدی</button>--}}
{{--                                            <button data-val="12" class="btn btn-primary backBtnsHelp" id="backBtnHelp_12">قبلی</button>--}}
{{--                                            <button class="btn btn-danger exitBtnHelp">خروج</button>--}}
{{--                                        </div>--}}

{{--                                        <div class="member-points">--}}
{{--                                            <ul class="counts">--}}
{{--                                                <li class="content-info">--}}
{{--                                                    <img src="{{URL::asset("activities") . "/" . $activity->pic}}" class="content-icon">--}}
{{--                                                    <a name="ratings" class="content-link" data-filter="RATINGS_ALL" href="#myActivitiesDiv" onclick="sendAjaxRequestToGiveActivity('{{$activity->id}}', '{{$user->id}}', -1, 'myActivities', 'myActivitiesContent', 1, '{{$counts[$i]}}')">--}}
{{--                                                        <span>{{$counts[$i]}} </span>--}}
{{--                                                        <span>{{$activity->name}}</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <div class="targets modules-membercenter-content-summary">--}}

{{--                                        <div class="member-points">--}}
{{--                                            <ul class="counts">--}}
{{--                                                <li class="content-info">--}}
{{--                                                    <img src="{{URL::asset("activities") . "/" . $activity->pic}}" class="content-icon">--}}
{{--                                                    <a name="ratings" class="content-link" data-filter="RATINGS_ALL" href="#myActivitiesDiv" onclick="sendAjaxRequestToGiveActivity('{{$activity->id}}', '{{$user->id}}', -1, 'myActivities', 'myActivitiesContent', 1, '{{$counts[$i]}}')">--}}
{{--                                                        <span>{{$counts[$i]}} </span>--}}
{{--                                                        <span>{{$activity->name}}</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            @endif--}}
{{--                            <?php $i++; ?>--}}
{{--                        @endforeach--}}

                        <div class="modules-membercenter-member-tag">
                            <div id="targetHelp_13" class="memberTags targets">

                                <div id="helpSpan_13" class="helpSpans hidden">
                                    <span class="introjs-arrow"></span>
                                    <p>
                                        با انتخاب سبک سفر از بین گزینه های موجود گزینه هایی که بیشتر شما را توصیف می کند انتخاب کنید تا دوستانتان شما را بهتر بشناسند. همچنین ما هم به شما پیشنهادات ویژه ارایه کنیم.
                                    </p>
                                    <button data-val="13" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_13">بعدی</button>
                                    <button data-val="13" class="btn btn-primary backBtnsHelp" id="backBtnHelp_13">قبلی</button>
                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                </div>

                                <div class="tripTasteTitle">
                                    <div id="tagHeader" class="header">سبک سفر </div>
                                    <div class="editTags" onclick="showElement('tagPrompt'); sendAjaxRequestToGiveTripStyles('{{$user->id}}', 'stylesTag')"><span class="sprite-addCities buttonIcon"></span>انواع سبک </div>
                                </div>

                                <div class="separator"></div>
                                <div id="tagDisplay" class="tagBlock">
                                    <div id="tagSuggest" class="tagPrompt" name="add-tags">
                                        <span>من چه گردشگری هستم ؟</span>
                                        <span>برای آشنایی بیشتر مردم با شما ، عادات سفر خود را مشخص کنید.</span>
                                    </div>
                                </div>
                            </div>
                            <div id="targetHelp_14" class="targets col-xs-12 invitationFriendsMainDiv">
                                <div class="invitationFriendsTitle">معرفی دوستان</div>
                                <p>دوستان خود را به کوچیتا معرفی کنید و امتیاز بگیرید</p>
                                <div class="phoneNumMainDiv">
                                    <input autocomplete="off" id="phoneNum" type="text" placeholder="09xxxxxxxxx">
                                    <div class="sendInvitationCodeMainDiv">
                                        <div onclick="sendCode()" class="btn btn-primary sendInvitationCode">ارسال</div>
                                    </div>
                                    <div class="inputBorderBottom"></div>
                                </div>
                                <div id="msgContainer" class="col-xs-12 hidden">
                                    <center>
                                        <p id="sendMsg"></p>
                                    </center>
                                </div>

                                <div id="helpSpan_14" class="helpSpans hidden">
                                    <span class="introjs-arrow"></span>
                                    <p>
                                        سایت را به دوستنات معرفی کنید. با وارد کردن شماره همراه دوستانتان پیامی برای عضویت به آنها فرستاده می شود. در صورتی که دوستانتان پس از عضویت کد معرف را وارد کنند شما از امتیاز ویژه ای برخوردار خواهید شد.
                                    </p>
                                    <button data-val="14" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_14">بعدی</button>
                                    <button data-val="14" class="btn btn-primary backBtnsHelp" id="backBtnHelp_14">قبلی</button>
                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rightContributions">
                        <div class="modules-membercenter-progress-header " data-backbone-name="modules.membercenter.ProgressHeader" data-backbone-context="Social_CompositeMember, Member">
                            <div class="title" id="myHonorsText">امتیازات من</div>
                            <?php
                                $sumTmp = 0;
                                for ($i = 0; $i < count($counts); $i++)
                                    $sumTmp += $counts[$i];
                            ?>
                            @if($sumTmp == 0)
                                <a class="link" onclick="initHelp(16, [12], 'MAIN', 100, 400)">
                                    <div style="background-image: url('{{URL::asset('images') . '/help_share.png'}}');"></div>
                                </a>
                            @else
                                <a class="link" onclick="initHelp(16, [], 'MAIN', 100, 400)">
                                    <div style="background-image: url('{{URL::asset('images') . '/help_share.png'}}')"></div>
                                </a>
                            @endif
                        </div>

                        <div class="memberPointInfo">
                            <div class="modules-membercenter-total-points">
                                <div data-direction="left" id="targetHelp_8" class="targets">
                                    <div class="points_info tripCollectiveInfo" onclick="showElement('activityDiv')">
                                        <div class="label"> امتیاز کل شما </div>
                                        <div class="points"> {{$totalPoint}} </div>
                                        <a>مشاهده سیستم امتیازدهی</a>
                                    </div>

                                    <div id="helpSpan_8" class="helpSpans hidden">
                                        <span class="introjs-arrow"></span>
                                        <p>
                                            این امتیازاتی است که توسط شما کسب شده است. با کسب امتیازات لازم می‌توانید به مرحله بعدی صعود کنید و اعتبار شما نزد ما و دوستانتان افزایش یابد. هر فعالیتی که در سایت انجام می‌دهید امتیاز خاصی دارد برای اطلاع از مقدار امتیاز هر فعالیت بر روی امتیاز خود کلیک کنید.
                                        </p>
                                        <button data-val="8" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_8">بعدی</button>
                                        <button data-val="8" class="btn btn-primary backBtnsHelp" id="backBtnHelp_8">قبلی</button>
                                        <button class="btn btn-danger exitBtnHelp">خروج</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modules-membercenter-level-progress">
                                <div data-direction="left" id="targetHelp_9" class="targets progress_info tripcollectiveinfo">
                                    <div onclick="showElement('levelDiv')">
                                        <div class="labels">
                                            <div class="right label">مرحله فعلی</div>
                                            <div class="float-leftImp label">مرحله بعدی</div>
                                        </div>
                                        <div class="progress_indicator">
                                            <div class="current_badge myBadge">{{$userLevels[1]->name}}</div>
                                            <div class="meter">
                                                <span id="progressId" class="progress"></span>
                                            </div>
                                            <div class="next_badge myBadge"> {{$userLevels[0]->name}} </div>
                                        </div>
                                        <div style="text-align: center; margin-top: 15px">
                                            <a>مشاهده سیستم سطح‌بندی</a>
                                            <div class="points_to_go mg-tp-20">
                                                <span class="points">
                                                    <b>{{$userLevels[1]->floor - $totalPoint}} </b>امتیاز  مانده به مرحله بعدی
                                                </span>
                                            </div>
                                        </div>
                                        <div class="clear fix"></div>
                                    </div>

                                    <div id="helpSpan_9" class="helpSpans hidden">
                                        <span class="introjs-arrow"></span>
                                        <p>
                                            شما با کسب امتیاز به مرحله بعد صعود می کنید. هر مرحله امتیازات خاصی را طلب می کند. علاوه بر آنکه امتیازات مورد نیاز برای مرحله بعد را می بینید می توانید با کلیک بر روی مرحله فعلی از سقف امتیزات سایر مراحل نیز مطلع شوید.
                                        </p>
                                        <button data-val="9" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_9">بعدی</button>
                                        <button data-val="9" class="btn btn-primary backBtnsHelp" id="backBtnHelp_9">قبلی</button>
                                        <button class="btn btn-danger exitBtnHelp">خروج</button>
                                    </div>
                                </div>
                                <div id="levelDiv" class="infoFlyout tripcollectiveLevels overlay oldoly noBackdrop relative item hidden">

                                    <div class="inner withClose" id="overlayInnerDiv">
                                        <img src="{{URL::asset('images/close.svg')}}" class="closeBtn" onclick="hideElement('levelDiv')"/>
                                        <center class="overlaycontents">
                                            <div class="title mg-tp-25imp">برای هر مرحله امتیاز مشخصی می‌خواهید.</div>

                                            <div class="description" id="levelUpDesc">هرچه بیشتر امتیاز کسب کنید، اعتبار بیشتری پیدا خواهید کرد. و معروف‌تر می‌شوید. مرحله‌ای که در آن هستید برای دیگران نمایش داده می‌شود تا بدانند شما چقدر حرفه‌ای هستید.</div>

                                            <table class="level-legend">
                                                @foreach($levels as $level)
                                                    <tr>
                                                        <td class="myLevel">
                                                            <span class="number">{{$level->name}}</span>
                                                        </td>
                                                        <td class="right-col lastBoxLevelTable">
                                                            <span> {{$level->floor}} امتیاز</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </center>
                                    </div>
                                    <div class="arrow_left"></div>
                                </div>
                            </div>
                        </div>

                        <div class="modules-membercenter-badge-teaser">

                            <div id="targetHelp_10" class="targets header trophyCaseHeaderMainDiv">

                                <div id="helpSpan_10" class="helpSpans hidden">
                                    <span class="introjs-arrow"></span>
                                    <p>
                                        برای فعالیت‌های خاص نشان‌های خاصی در نظر گرفته شده است. این نشان‌ها به تناسب افتخارات شما به شما تعلق می‌گیرد. برای دانستن فعالیت‌های لازم برای کسب هر نشان افتخار به صفحه نشان‌ها بروید و بروی هر نشان کلیک کنید. نشان‌های زیر نشان هایی است که به کسب آن‌ها نزدیکید.
                                    </p>
                                    <button data-val="10" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_10">بعدی</button>
                                    <button data-val="10" class="btn btn-primary backBtnsHelp" id="backBtnHelp_10">قبلی</button>
                                    <button class="btn btn-danger exitBtnHelp">خروج</button>
                                </div>

                                <div class="name trophyCaseTitle">نشان‌های افتخار من
                                    <a class="totalBadges" href="{{URL('badges')}}">({{$medals}} عدد)</a>
                                </div>
                                <a class="trophyCase" href="{{route('badge')}}">مشاهده تمام نشان‌های موجود</a>
                                <div class="clear fix"></div>
                            </div>

                            <div class="recentBadges">
                                <div id="" class="targets header recentBadgesTitleMainDiv">

                                    <div class="name recentBadgesTitle">
                                        تمامی نشان‌های کسب شده اخیر
                                    </div>
                                    <a class="allPropertyBadges" href="">مشاهده همه</a>
                                </div>

                                <script>
                                    function hideAllBadges() {
                                        $(".badgeContainer").addClass('hidden');
                                    }
                                </script>

                                <div class="badgeList">
                                    <div class="badgeItems noCurrent">
                                        <?php $i = 0; ?>

                                        @foreach($nearestMedals as $nearestMedal)
                                            <div class="badgeItem clickableBadge" onclick="hideAllBadges(); $('#badge_' + this.id).css('left', parseInt($(this).css('width').split('px')[0]) / 2 + getFixedFromLeftBODYCON($(this)) - 25 + 'px'); showElement('badge_' + this.id)" id="{{$nearestMedal["medal"]->id}}">
                                                <div style="background-image: url('{{URL::asset('_images/badges' . '/' . $nearestMedal["medal"]->pic_1)}}')" class="sprite-badge_medium_grey_rev_01 mediumBadge"></div>
                                                <div class="badgeName"> {{$nearestMedal["medal"]->activityId}} جدید</div>
                                                <div class="badgeSubtext"> {{$nearestMedal["needed"]}}
                                                    <span>{{$nearestMedal["medal"]->activityId}}</span>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="futureBadges">
                                <div id="targetHelp_11" class="header targets badgeListTitleMainDiv">

                                    <div id="helpSpan_11" class="helpSpans hidden">
                                        <span class="introjs-arrow"></span>
                                        <p>
                                            نشان های کسب شده جدید توسط شما دراین بخش نمایش داده می شود. در صفحه نشان ها نیز می توانید نشان های کسب شده خود را ببینید. توجه کنید نشان های کسب شده رنگی می باشند و نشان های سیاه سفید هنوز توسط شما کسب نشده اند.
                                        </p>
                                        <button data-val="11" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_11">بعدی</button>
                                        <button data-val="11" class="btn btn-primary backBtnsHelp" id="backBtnHelp_11">قبلی</button>
                                        <button class="btn btn-danger exitBtnHelp">خروج</button>
                                    </div>

                                    <div class="name futureBadgesTitle">با کمی تلاش می‌توانید کسب کنید</div>
                                    <div class="clear fix"></div>
                                </div>
{{--                                <div>--}}
{{--                                    <div class="medalMainBox">--}}
{{--                                        <div class="medalEachBox"></div>--}}
{{--                                        <div class="medalEachBox"></div>--}}
{{--                                        <div class="medalEachBox"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="badgeList">
                                    <div class="badgeItems noCurrent">
                                        @if(count($recentlyBadges) > 0)
                                            <?php $i = 0; ?>
                                            @foreach($recentlyBadges as $recentlyBadge)
                                                    <div class="badgeItem clickableBadge" id="{{$recentlyBadge->id}}">
                                                    <div style="background: url('{{URL::asset('_images/badges' . '/' . $recentlyBadge->pic_1)}}'); background-size: 100% 100%; width: 100px; height: 100px; " class="sprite-badge_medium_grey_rev_01 mediumBadge"></div>
                                                    <div class="badgeName"> {{$recentlyBadge->activityId}} جدید</div>
                                                    <div class="badgeSubtext"> {{$recentlyBadge->floor}} <span>{{$recentlyBadge->activityId}}</span></div>
                                                </div>
                                                <?php $i++; ?>
                                            @endforeach
                                        @else
                                            <div>
                                                متاسفانه در حال حاضر شما نشانی کسب نکرده اید.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                        <?php $i = 0; ?>
                        @foreach($nearestMedals as $nearestMedal)

                            <?php
                            $marginLeft = 0;
                            if($i % 3 == 0)
                                $marginLeft = 300;
                            else if($i % 3 == 1)
                                $marginLeft = 109;
                            $i++;
                            ?>

                            <span id="badge_{{$nearestMedal["medal"]->id}}" class="item hidden ui_overlay ui_popover arrow_right badgeDesc badgeContainer badgeStyles">
                                <div class="header_text">
                                    <div class="text">{{$nearestMedal["medal"]->activityId}}</div>
                                </div>
                                <div class="body_text ">
                                    <div class="body_text">
                                        <div class="desc badgeDesc">
                                            @if($nearestMedal["kindPlaceId"] == -1)
                                                این مدال بعد از{{$nearestMedal["needed"]}}  {{$nearestMedal["medal"]->activityId}} بدست می آید
                                            @else
                                                <p>
                                                    <span class="badgeAchievementHelpText">این مدال بعد از&nbsp;</span>
                                                    <span class="badgeAchievementHelpText">{{$nearestMedal["needed"]}}</span>
                                                    <span class="badgeAchievementHelpText">&nbsp;</span>
                                                    <span class="badgeAchievementHelpText">&nbsp;</span>
                                                    <span class="badgeAchievementHelpText">{{$nearestMedal["medal"]->activityId}}</span>
                                                    <span class="badgeAchievementHelpText">&nbsp;در&nbsp;</span>
                                                    <span class="badgeAchievementHelpText">{{$nearestMedal["kindPlaceId"]}}</span>
                                                    <span class="badgeAchievementHelpText">&nbsp;</span>
                                                    <span class="badgeAchievementHelpText">بدست می آید</span>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="ui_close_x" onclick="hideElement('badge_{{$nearestMedal["medal"]->id}}')"></div>
                            </span>
                        @endforeach

                        <div id="activityDiv" class="infoFlyout tripcollectivePoints overlay oldoly noBackdrop relative item hidden">
                            <div class="inner withClose" id="overlayInnerDiv">
                                <img src="{{URL::asset('images/close.svg')}}" class="closeBtn" onclick="hideElement('activityDiv')"/>
                                <div class="overlaycontents">
                                    <div class="title mg-tp-25imp">چگونه امتیاز جمع آوری کنم؟</div>
                                    <div class="description" id="earnPointDesc">هر اقدام شما در سایت، علاوه بر اینکه به ما و دوستانتان کمک می کند امتیاز ویژه ای نیز دارد. لیست امتیازات زیر را از دست ندهید. جمع آوری امتیاز نتایج شگفت انگیزی خواهد داشت.</div>
                                    <table class="score-legend">
                                        @foreach($activities as $activity)
                                            <tr>
                                                <td class="scoreLegendFirstBox">
                                                    <img width="22px" src="{{URL::asset('activities') . '/' . $activity->pic}}" class="icon"/>
                                                </td>
                                                <td class="scoreLegendSecondBox"> {{$activity->name}}</td>
                                                <td class="scoreLegendThirdBox right-col">
                                                    <span class="number">{{$activity->rate}} امتیاز</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="arrow_left"></div>
                            </div>
                        </div>

                    </div>

                    <div class="clearFix"></div>

                </div>


                <div class="modules-membercenter-content-stream " data-backbone-name="modules.membercenter.ContentStream"
                     data-backbone-context="Social_CompositeMember, Achievements_Counts, Member, MemberCenter_ContentStreamComposite">
                    <div class="cs-points-bonus-description hidden">
                        <span class="cs-points-bonus-title">Bonus points</span>
                        are available on occasion across the site. Keep an eye out for opportunities to get extra points!
                    </div>
                </div>
                <div id="" class="modules-membercenter-content-stream myActivitiesMainDiv">

                    <div class="myActivitiesMainDiv">

                        <div id="targetHelp_15" class="targets cs-header">
                            <div class="myActivitiesHeaderMainDiv">
                                <div class="cs-header-points">
                                    <span class="label">امتیاز کسب شده :</span>
                                    <span class="points">{{$totalPoint}}</span>
                                </div>
                                <p class="cs-header-title">فعالیت های من</p>
                            </div>

                            <div id="helpSpan_15" class="helpSpans hidden">
                                <span class="introjs-arrow"></span>
                                <p>شما می توانید تمامم فعالیت های خود در سایت را در این قسمت مشاهده نمایید. از فیلتر های موجود نیز برای دسترسی راحت تر به فعالیت های خود استفاده کنید.</p>
                                <button data-val="15" class="btn btn-success nextBtnsHelp" id="nextBtnHelp_15">بعدی</button>
                                <button data-val="15" class="btn btn-primary backBtnsHelp" id="backBtnHelp_15">قبلی</button>
                                <button class="btn btn-danger exitBtnHelp" id="exitBtnHelp_15">خروج</button>
                            </div>
                        </div>

                        <div class="postsMainFiltrationBar">
                            <span class="showUsersPostsLink changeModeBtn" onclick="activitiesChangeMode(); postsChangeMode()">پست‌ها</span>
                            <span class="showUsersPhotosAndVideosLink changeModeBtn" onclick="activitiesChangeMode(); photosChangeMode()">عکس و فیلم</span>
                            <span class="showUsersQAndAsLink changeModeBtn" onclick="activitiesChangeMode(); questionsChangeMode()">سؤال‌ها و پاسخ‌ها</span>
                            <span class="showUsersArticlesLink changeModeBtn" onclick="activitiesChangeMode(); articleChangeMode()">مقاله‌ها</span>
                            <span class="showUsersScores changeModeBtn" onclick="activitiesChangeMode(); scoresChangeMode()">امتیاز‌ها</span>
                            <span class="otherActivitiesChoices changeModeBtn" onclick="activitiesChangeMode(); othersChangeMode()">سایر موارد</span>
                        </div>

                        <div>
                            @include('notUse.userActivities.innerParts.userPostsInner')
                            @include('notUse.userActivities.innerParts.userPhotosAndVideosInner')
                            @include('notUse.userActivities.innerParts.userQuestionsInner')
                            @include('notUse.userActivities.innerParts.userArticlesInner')
                        </div>

                        <script>

                            function activitiesChangeMode() {
                                $('.userProfileActivitiesDetailsMainDiv').css('display' , 'none');
                                $('.changeModeBtn').css('border-color' , 'white');
                            }

                            function postsChangeMode() {
                                $('.userActivitiesPosts').css('display' , 'block');
                                $('.showUsersPostsLink').css('border-color' , 'var(--koochita-blue)');
                            }

                            function photosChangeMode() {
                                $('.userActivitiesPhotos').css('display' , 'block');
                                $('.showUsersPhotosAndVideosLink').css('border-color' , 'var(--koochita-blue)');
                            }

                            function questionsChangeMode() {
                                $('.userActivitiesQuestions').css('display' , 'block');
                                $('.showUsersQAndAsLink').css('border-color' , 'var(--koochita-blue)');
                            }

                            function articleChangeMode() {
                                $('.userActivitiesArticles').css('display' , 'block');
                                $('.showUsersArticlesLink').css('border-color' , 'var(--koochita-blue)');
                            }

                            function scoresChangeMode() {
                                // $('.userActivitiesScores').css('display' , 'block');
                                $('.showUsersScores').css('border-color' , 'var(--koochita-blue)');
                            }

                            function othersChangeMode() {
                                // $('.userActivitiesOthers').css('display' , 'block');
                                $('.otherActivitiesChoices').css('border-color' , 'var(--koochita-blue)');
                            }

                        </script>

    {{--                    <ul class="cs-contribution-bar">--}}
    {{--                        <?php $i = 0; $allow = true; ?>--}}
    {{--                        @foreach($activities as $activity)--}}
    {{--                            @if($counts[$i] > 0)--}}
    {{--                                <li class="cursor-pointer">--}}
    {{--                                    <a class="headerActivity" id='headerActivity_{{$activity->id}}' onclick="sendAjaxRequestToGiveActivity('{{$activity->id}}', '{{$user->id}}', -1, 'myActivities', 'myActivitiesContent', 1, '{{$counts[$i]}}')">--}}

    {{--                                        @if($allow)--}}
    {{--                                            <script>--}}
    {{--                                                $(document).ready(function () {--}}
    {{--                                                    sendAjaxRequestToGiveActivity('{{$activity->id}}', '{{$user->id}}', -1, 'myActivities', 'myActivitiesContent', 1, '{{$counts[$i]}}');--}}
    {{--                                                });--}}
    {{--                                            </script>--}}
    {{--                                            <?php $allow = false; ?>--}}
    {{--                                        @endif--}}
    {{--                                        <span> {{$activity->name}} </span>--}}
    {{--                                        <span> ({{$counts[$i]}}) </span>--}}
    {{--                                    </a>--}}
    {{--                                </li>--}}
    {{--                            @endif--}}
    {{--                            <?php $i++; ?>--}}
    {{--                        @endforeach--}}
    {{--                    </ul>--}}

    {{--                    <div class="cs-filter-bar" id="myActivities">--}}
    {{--                    </div>--}}


    {{--                    <div class="cs-content-container" id="myActivitiesContent">--}}
    {{--                    </div>--}}
                    </div>

                </div>


                <span id="tagPrompt" class="ui_overlay ui_modal editTags item hidden">
                    <div class="header_text">من چه گردشگری هستم ؟</div>
                    <div class="subheader_text mg-tp-10">
                       سه مورد یا بیشتر را انتخاب کنید
                    </div>
                    <div class="body_text">
                        <fieldset id="memberTags">

                            <input name="action" value="" type="hidden">
                            <input name="token" value="" type="hidden">
                            <input id="memberTagPid" name="memberTagPid" value="39041" type="hidden">
                            <input id="tagCancel" name="Cancel" value="" type="hidden">

                            <div class="tags" id="stylesTag">
                            </div>
                        </fieldset>
                        <div class="submitOptions">
                            <button id="submitBtnTripStyle" onclick="updateMyTripStyle('{{$user->id}}', 'tagPrompt')" class="btn btn-success" disabled>تایید</button>
                            <input type="submit" onclick="closeTripStyles('tagPrompt')" id="skipBtn" value="خیر" class="btn btn-default">
                        </div>
                    </div>
                    <div onclick="closeTripStyles('tagPrompt')" class="ui_close_x"></div>
                </span>

                <div class="ui_backdrop dark display-none"></div>
            </div>
        </div>

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
                newElement = "<div class='col-xs-12 position-relative'><div class='col-xs-12 bubbles padding-0 mg-rt-0' style='margin-left: " + ((400 - (t * 18)) / 2) + "px'>";

                for (i = 1; i < total; i++) {
                    if(!isInFilters(i)) {
                        if(i == curr)
                            newElement += "<div class='filtersBoxProfilePage'></div>";
                        else
                            newElement += "<div onclick='show(\"" + i + "\", 1)' class='helpBubble filtersBoxProfilePageElse'></div>";
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
                        'background-color': 'var(--koochita-light-green)',
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
    @stop