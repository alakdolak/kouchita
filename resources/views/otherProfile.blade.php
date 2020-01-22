<?php $mode = "profile" ?>
@extends('layouts.bodyProfileOther')

@section('header')

    @parent

    <style>
        .left {
            float: left !important;
        }

    </style>

    <script>

        var getActivitiesNumPath = '{{route('ajaxRequestToGetActivitiesNum')}}';
        var getActivitiesPath = '{{route('ajaxRequestToGetActivities')}}';

        $(document).ready(function () {

            b = "{{$totalPoint / $userLevels[1]->floor}}";
            initialProgress(b * 100);

        });

        function initialProgress(b) {
            $("#progressId").css("width", b + "%");
        }

    </script>

@stop


@section('main')

    @if(!Auth::check())
        @include('layouts.loginPopUp')
    @endif

    <script>
        function showElement(id) {
            $(".item").addClass('hidden');
            $("#" + id).removeClass('hidden');
        }

        function hideElement(id) {
            $("#" + id).addClass('hidden');
        }

        function showElement2(id) {
            $("#" + id).show();
        }

        function hideElement2(id) {
            $("#" + id).hide();
        }

        var tripStyles = [];

        function toggleTripStyles(id) {

            for(i = 0; i < tripStyles.length; i++) {

                if(tripStyles[i] == id) {
                    $("#tripStyle_" + id).css("background-color", 'white').css("color", 'black');
                    $("#tripStylePic_" + id).css("visibility", 'hidden');
                    tripStyles.splice(i, 1);
                    if(tripStyles.length < 3) {
                        $("#submitBtnTripStyle").attr("disabled", true);
                    }
                    return;
                }

            }

            tripStyles[tripStyles.length] = id;
            $("#tripStyle_" + id).css("background-color", '#4dc7bc').css("color", 'white');
            $("#tripStylePic_" + id).css("visibility", 'visible');
            if(tripStyles.length >= 3) {
                $("#submitBtnTripStyle").attr("disabled", false);
            }
        }

        function closeTripStyles(element) {

            for(i = 0; i < tripStyles.length; i++) {
                $("#tripStylePic_" + tripStyles[i]).css("visibility", "hidden");
            }
            $('.dark').hide();
            hideElement(element);
        }

        function sendAjaxRequestToGiveTripStyles(uId, containerId) {

            $('.dark').show();

            $("#" + containerId).empty();

            $.ajax({
                type: 'post',
                url: 'getTripStyles',
                data: {
                    uId: uId
                },
                success: function (response) {

                    response = JSON.parse(response);

                    for (i = 0; i < response.length; i++) {

                        element = "<div class='tagContainer'>";
                        element += "<input class='tagSelection' name='memberTag' value='" + response[i].id + "' type='checkbox'>";
                        if (response[i].selected) {
                            element += "<label id='tripStyle_" + response[i].id + "' style='color: white; background-color: #4dc7bc;' class='tag tagBubble' onclick='toggleTripStyles(" + response[i].id + ")'>";

                            element += "<div class='tagText'  style='padding-left: 12px; padding-right: 12px'>" + response[i].name + "</div>";
                            tripStyles[tripStyles.length] = response[i].id;
                        }
                        else {
                            element += "<label id='tripStyle_" + response[i].id + "' class='tag tagBubble' onclick='toggleTripStyles(" + response[i].id + ")'>";

                            element += "<div class='tagText' style='padding-left: 12px; padding-right: 12px'>" + response[i].name + "</div>";
                        }
                        element += "</label>";
                        element += "</div>";

                        $("#" + containerId).append(element);
                    }


                    if (tripStyles.length >= 3) {
                        $("#submitBtnTripStyle").removeAttr("disabled");
                    }

                }
            });
        }

        function updateMyTripStyle(uId, element) {

            $.ajax({
                type: 'post',
                url: 'updateTripStyles',
                data: {
                    uId: uId,
                    tripStyles : tripStyles
                },
                success: function (response) {
                    closeTripStyles(element);
                }
            });
        }

        function sendCode() {

            if($("#phoneNum").val() == "")
                return;

            $.ajax({
                type: 'post',
                url: sendMyInvitationCode,
                data: {
                    'phoneNum': $("#phoneNum").val()
                },
                success: function (response) {

                    $("#msgContainer").removeClass('hidden');

                    if(response == "ok")
                        $("#sendMsg").empty().append("کد معرف شما به شماره مورد نظر ارسال شد");
                    else
                        $("#sendMsg").empty().append("از آخرین ارسال شما باید حداقل پنج دقیقه بگذرد");

                    $("#sendMsg").removeClass('hidden');
                }
            });

        }
    </script>

    <div id="MAIN" class="MemberProfile
               prodp13n_jfy_overflow_visible
               ">


        <div id="BODYCON" class="col easyClear poolB adjust_padding new_meta_chevron_v2">
            <div class="wrpHeader"></div>
            <div id="MODULES_MEMBER_CENTER" class="mc_achievements">

                <div class="leftProfile" style="position: relative">

                    <div id="infoDiv" style="visibility: hidden; position: absolute; right: 80px; top: 110px; min-width: 120px; font-size: 0.75em; z-index: 1001;" class="profileLinksDropdown overlay oldoly noBackdrop relative relAbove">

                        <div class="inner" id="overlayInnerDiv">
                            <a name="edit-profile" class="menu-link" href="{{route('accountInfo')}}">ویرایش اطلاعات کاربری</a>
                            <a name="edit-photo" class="menu-link" href="{{route('editPhoto')}}">ویرایش عکس</a>
                            <a name="subscriptions" class="menu-link" href="">اشتراک ها</a>
                        </div>
                    </div>

                    <div class="modules-membercenter-member-profile " data-backbone-name="modules.membercenter.MemberProfile" data-backbone-context="Social_CompositeMember, LoggedInMember, MemberCenter_ContributionView, Member, MemberCenter_MemberInteractionInfo, MemberCenter_ProfileData, Config, Social_SocialUser, features">

                        <div class="profileBlock">
                            @if(!$user->uploadPhoto)
                                <img class="avatarUrl" src="{{URL::asset('defaultPic') . '/' . $user->picture}}" height="60" width="60"/>
                            @else
                                <img class="avatarUrl" src="{{URL::asset('userProfile') . "/" . $user->picture}}" height="60" width="60"/>
                            @endif
                            <div class="ageSince">
                                <p style="font-size: 17px;margin-top: 23px;" class="since"><b>{{$user->first_name}}</b></p>
                            </div>
                            <div class="ageSince" style="float: right; margin-top: 30px">
                                <p class="since">تاریخ عضویت</p>
                                <p class="since">{{$user->created}}</p>
                            </div>
                            <div>
                                <button  style="color: #FFF; background-color: #4dc7bc; border-color: #4dc7bc;" onclick="sendMsg()" class="btn btn-primary">ارسال پیام</button>
                            </div>
                        </div>
                    </div>

                    <?php $i = 0; ?>
                    @foreach($activities as $activity)
                        @if($counts[$i] != 0)
                            <div class="modules-membercenter-content-summary ">
                                <div class="member-points">
                                    <ul class="counts">
                                        <li class="content-info">
                                            <img src="{{URL::asset("activities") . "/" . $activity->pic}}" class="content-icon">
                                            <a name="ratings" class="content-link" data-filter="RATINGS_ALL" href="#myActivitiesDiv" onclick="sendAjaxRequestToGiveActivity('{{$activity->id}}', '{{$user->id}}', -1, 'myActivities', 'myActivitiesContent', 1, '{{$counts[$i]}}')">
                                                <span>{{$counts[$i]}} </span>
                                                <span>{{$activity->name}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <?php $i++; ?>
                    @endforeach
                </div>

                <div class="rightContributions">

                    <div class="modules-membercenter-progress-header " data-backbone-name="modules.membercenter.ProgressHeader" data-backbone-context="Social_CompositeMember, Member">
                        <div class="title" style="text-align: right;right: 0;">افتخارات {{$user->username}} </div>
                        <a class="link" href="" target="_blank" style="">
                            <div style="background-size: 28px;background-position:  0 -29px;width: 28px;height:  28px;background-image: url('{{URL::asset('images') . '/help_share.png'}}');background-repeat:  no-repeat;"></div>
                        </a>
                    </div>

                    <div class="memberPointInfo">
                        <div class="modules-membercenter-total-points" onclick="showElement('activityDiv')">
                            <div class="points_info tripcollectiveinfo" data-info-id="tripcollectivePoints" data-info-layout="FlyoutRight" data-info-context="TotalPoints">
                                <div class="label"> امتیاز کل </div>
                                <div class="points"> {{$totalPoint}} </div>
                            </div>
                        </div>
                        <div class="modules-membercenter-level-progress ">
                            <div class="progress_info tripcollectiveinfo" onclick="showElement('levelDiv')">
                                <div class="labels">
                                    <div class="right label">مرحله فعلی</div>
                                    <div class="left label">مرحله بعدی</div>
                                </div>
                                <div class="progress_indicator">
                                    <div class="current_badge badge">{{$userLevels[0]->name}}</div>
                                    <div class="meter"><span id="progressId" class="progress"></span></div>
                                    <div class="next_badge badge"> {{$userLevels[1]->name}} </div>
                                </div>
                                <div class="points_to_go" style="margin-top: 20px"><span class="points"><b>{{$userLevels[1]->floor - $totalPoint}} </b>امتیاز  مانده به مرحله بعدی </span></div>
                                <div class="clear fix"> </div>
                            </div>
                        </div>
                    </div>

                    <div class="modules-membercenter-badge-teaser " data-backbone-name="modules.membercenter.BadgeTeaser" data-backbone-context="Achievements_BadgeFlyoutView, MemberCenter_ContributionView, Member, Achievements_Badges">
                        <div class="header">
                            <div class="name"> نشان های افتخار {{$user->username}} (<a style="color: #16174f" class="totalBadges" href="{{URL('badges')}}">{{count($recentlyBadges)}} عدد</a>)</div>
                            <div class="clear fix"></div>
                        </div>

                        <script>
                            function hideAllBadges() {
                                $(".badgeContainer").css("visibility", "hidden");
                            }
                        </script>

                        <div class="badgeList">
                            <div class="badgeItems noCurrent">
                                <?php $i = 0; ?>
                                @foreach($recentlyBadges as $badge)
                                    <div class="badgeItem clickableBadge" onclick="hideAllBadges(); showElement('badge_' + this.id)" id="{{$badge->id}}">
                                        <div style="background: url('{{URL::asset('badges') . '/' . $badge->pic_1}}')" class="sprite-badge_medium_grey_rev_01 mediumBadge"></div>
                                        <div class="badgeName"> {{$badge->activityId}} جدید</div>
                                    </div>
                                    <?php $i++; ?>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <?php $i = 0; ?>
                    @foreach($recentlyBadges as $badge)

                        <?php
                        $marginLeft = 0;
                        if($i % 3 == 0)
                            $marginLeft = 300;
                        else if($i % 3 == 1)
                            $marginLeft = 109;
                        $i++;
                        ?>

                        <span id="badge_{{$badge->id}}" class="ui_overlay ui_popover arrow_right badgeDesc badgeContainer" style="position: absolute; left: {{$marginLeft}}px; right: auto; top: 442px; bottom: auto; visibility: hidden">
                                <div class="arrow"></div>
                                <div class="header_text">
                                    <div class="text">{{$badge->activityId}}</div>
                                </div>
                                <div class="body_text">
                                    <div class="body_text">
                                        <div class="desc">
                                             این مدال بعد از{{$badge->floor}}  {{$badge->activityId}} بدست می آید
                                        </div>
                                        <div class="descLineTwo">
                                        </div>
                                    </div>
                                </div>
                                <div class="ui_close_x" onclick="hideElement('badge_{{$badge->id}}')"></div>
                            </span>
                    @endforeach


                    <div id="activityDiv" style="visibility: hidden; direction: ltr; position: absolute; left: 630px; top: -23px; font-size: 0.75em; z-index: 1001;" class="infoFlyout tripcollectivePoints overlay oldoly noBackdrop relative">
                        <div class="inner withClose" id="overlayInnerDiv">
                            <div class="overlaycontents">
                                <div class="title">How do I earn points? </div>
                                <div class="description">Every time you contribute to TripAdvisor, you earn TripCollective points. Here’s a list of what you can contribute, and how much it’s worth. </div>
                                <table class="score-legend">
                                    @foreach($activities as $activity)
                                        <tr>
                                            <td>
                                                <img src="{{URL::asset('activities') . '/' . $activity->pic}}" class="icon"/>
                                            <td> {{$activity->name}}</td>
                                            <td class="right-col" style="direction: rtl">
                                                <span class="number">{{$activity->rate}}</span>امتیاز
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <img src="{{URL::asset('images/close.svg')}}" class="closeBtn" onclick="hideElement('activityDiv')" style="cursor: pointer"/>
                            <div style="position: absolute; top: 188px;" class="arrow_left"></div>
                        </div>
                    </div>


                    <div id="levelDiv" style="visibility: hidden; direction: ltr; position: absolute; left: 530px; top: -11px; font-size: 0.75em; z-index: 1001;" class="infoFlyout tripcollectiveLevels overlay oldoly noBackdrop relative">

                        <div class="inner withClose" id="overlayInnerDiv">
                            <div class="overlaycontents">
                                <div class="title">
                                    <span class="t1">Earn points, </span>
                                    <span class="t2">reach new levels.</span>
                                </div>

                                <div class="description">The more points you earn, the higher your level – and the more you’re recognized in the travel community for your contributions. Your TripCollective level appears in your traveler profile. </div>

                                <table class="level-legend">
                                    @foreach($levels as $level)
                                        <tr>
                                            <td class="level"> سطح
                                                <span class="number">{{$level->name}}</span>
                                            </td>
                                            <td class="right-col">
                                                <span class="number"> {{$level->floor}} امتیاز</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <img src="{{URL::asset('images/close.svg')}}" class="closeBtn" onclick="hideElement('levelDiv')" style="cursor: pointer"/>
                        </div>
                        <div style="position: absolute; top: 140px" class="arrow_left"></div>
                    </div>
                </div>

                <div class="clearfix"> </div>

            </div>


            <div class="modules-membercenter-content-stream " data-backbone-name="modules.membercenter.ContentStream" data-backbone-context="Social_CompositeMember, Achievements_Counts, Member, MemberCenter_ContentStreamComposite">
                <div class="cs-points-bonus-description hidden"><span class="cs-points-bonus-title">Bonus points</span> are available on occasion across the site. Keep an eye out for opportunities to get extra points!</div>
            </div>
            <div id="myActivitiesDiv" class="modules-membercenter-content-stream ">

                <div class="cs-header">
                    <div class="cs-header-points"><span class="label">امتیاز کل</span> <span class="points">{{$totalPoint}}</span></div>
                    <p class="cs-header-title">فعالیت های {{$user->username}} </p>
                </div>

                <ul class="cs-contribution-bar">
                    <?php $i = 0; $allow = true; ?>
                    @foreach($activities as $activity)
                        @if($counts[$i] > 0)
                            <li style="cursor: pointer">
                                <a class="headerActivity" id='headerActivity_{{$activity->id}}' onclick="sendAjaxRequestToGiveActivity('{{$activity->id}}', '{{$user->id}}', -1, 'myActivities', 'myActivitiesContent', 1, '{{$counts[$i]}}')">

                                    @if($allow)
                                        <script>
                                            $(document).ready(function () {
                                                sendAjaxRequestToGiveActivity('{{$activity->id}}', '{{$user->id}}', -1, 'myActivities', 'myActivitiesContent', 1, '{{$counts[$i]}}');
                                            });
                                        </script>
                                        <?php $allow = false; ?>
                                    @endif
                                    <span> {{$activity->name}} </span>
                                    <span> ({{$counts[$i]}}) </span>
                                </a>
                            </li>
                        @endif
                        <?php $i++; ?>
                    @endforeach
                </ul>

                <div class="cs-filter-bar" id="myActivities"></div>


                <div class="cs-content-container" id="myActivitiesContent">
                </div>

            </div>

            <div class="ui_backdrop dark" style="display: none;"></div>

        </div>
    </div>

    <span class="ui_overlay ui_modal editTags item hidden" id="sendMsgPane" style="position: fixed; left: 37%; right: auto; top: 29%; bottom: auto;width: 26%;">
        <div class="body_text">
            <div class="form-group">
                <label class="control-label" style="float: right;">موضوع</label>
                <input id="subject" maxlength="40" type="text" placeholder="لطفا موضوع پیام خود را وارد نمایید" class="form-control input-md" required="">
            </div>
            <div class="form-group">
                <label class="control-label" style="float: right;">پیام</label>
                <textarea class="form-control" id="msg" id="msg" cols="8" rows="8" placeholder="حداکثر 1000 کاراکتر"></textarea>
            </div>
            <div class="submitOptions">
                <button style="color: #FFF; background-color: #4dc7bc; border-color: #4dc7bc;" onclick="doSend()" class="btn btn-success">ارسال </button>
                <input type="submit" onclick="hideElement()" value="خیر" class="btn btn-default">
            </div>
            <p style="color: red" id="errMsg"></p>
        </div>

        <div onclick="hideElement()" class="ui_close_x"></div>

    </span>

    <script>
        var sendMsgDir = '{{route('sendMsgAjax')}}';

        $(document).ready(function () {
            @if($mode2 == 'sendMsg')
                sendMsg();

            @endif
        });

        function hideElement(element) {
            $(".dark").hide();
            $(".item").addClass('hidden');
            if(element.length != 0)
                $("#" + element).addClass('hidden');
        }

        function showElement(element) {
            $(".pop-up").addClass('hidden');
            $("#" + element).removeClass('hidden');
        }

        function sendMsg() {
            $(".dark").show();

            @if(!Auth::check())
                url = '{{route('otherProfile', ['username' => $user->username, 'mode' => 'sendMsg'])}}';
                showLoginPrompt(url);

            @else
                $("#sendMsgPane").removeClass('hidden');
            @endif
        }

        function doSend() {
            
            if($("#msg").val() == "" || $("#subject").val() == "")
                return;

            $.ajax({
                type: 'post',
                url: sendMsgDir,
                data: {
                    'destUser': '{{$user->username}}',
                    'msg': $("#msg").val(),
                    'subject': $("#subject").val()
                },
                success: function (response) {
                    if(response == "ok") {
                        hideElement();
                    }
                    else if(response == "nok"){
                        $("#errMsg").empty().append('کاربر مقصد شما را بلاک کرده است');
                    }
                }
            });
        }
    </script>
@stop

