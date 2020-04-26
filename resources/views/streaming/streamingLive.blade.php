@extends('streaming.streamingLayout')

@section('head')
    <link rel="stylesheet" href="{{URL::asset('css/streaming/mainStreaming.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/streaming/showStreaming.css')}}">

    <script>
        if(!location.hash.replace('#', '').length) {
            location.href = location.href.split('#')[0] + '#' + (Math.random() * 100).toString().replace('.', '');
            location.reload();
        }
    </script>

    <style>
        video{
            width: 100%;
        }
    </style>

    <!-- This Library is used to detect WebRTC features -->
    <script src="https://www.webrtc-experiment.com/DetectRTC.js"></script>
    <script src="https://www.webrtc-experiment.com/socket.io.js"> </script>
    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <script src="https://www.webrtc-experiment.com/IceServersHandler.js"></script>
    <script src="https://www.webrtc-experiment.com/CodecsHandler.js"></script>
    <script src="https://www.webrtc-experiment.com/RTCPeerConnection-v1.5.js"> </script>
{{--    <script src="https://www.webrtc-experiment.com/webrtc-broadcasting/broadcast.js"> </script>--}}
    <script src="{{URL::asset('js/stream/broadcast.js')}}"></script>
@endsection

@section('body')

    <div class="mainDivStream">
        <div class="container mainShowBase">

            <div class="videoInfos">
                <div class="videoInfosVideoName">
                    معرفی آئودی ای ترون اسپرت بک
                    <img class="float-left" src="{{URL::asset('images/streaming/live.png')}}">
                </div>
                <div class="row mainUserPicSection">
                    <div class="userPicDiv">
                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                    </div>
                    <div class="mainUserInfos">
                        <div class="mainUseruserName">
                            shazdesina
                        </div>
                        <div class="videoUploadTime">
                            هم اکنون
                        </div>
                    </div>
                </div>
            </div>

            <div class="liveComments">
                <div class="liveCommentsFirstLine">
                    <div class="liveCommentsTitle">
                        در گفتگو شرکت کنید
                    </div>
                    <div class="liveCommentStatistics">
                        <div class="liveCommentsQuantity liveCommentStatisticsDivs">
                            <div class="liveCommentsNums">31</div>
                            <div class="liveCommentsQuantityIcon"></div>
                        </div>
                        <div class="liveCommentWriters liveCommentStatisticsDivs">
                            <div class="liveCommentsNums">31</div>
                            <div class="liveCommentsWriterIcon"></div>
                        </div>
                    </div>
                </div>

                <div class="liveCommentsMainDiv">
                    <div class="eachLiveCommentMainDiv">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                        </div>
                        <div class="liveCommentContents">
                            شیا شتنیل نشت یای نشان ایش سنتیا نشت سای نتشاس نت یاشن تسای نتشسا نیتاشن تسای نتا منشای نتسا شنت یاشن تسا ینت شسا یمن
                        </div>
                    </div>
                    <div class="eachLiveCommentMainDiv">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                        </div>
                        <div class="liveCommentContents">
                            شیا شان ایش سنتیا نشت سای نتشاس نت یاشن تسای نتشسا نیتاشن
                        </div>
                    </div>
                    <div class="eachLiveCommentMainDiv">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                        </div>
                        <div class="liveCommentContents">
                            نت یاشن تسا ینت شسا یمن
                        </div>
                    </div>
                    <div class="eachLiveCommentMainDiv">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                        </div>
                        <div class="liveCommentContents">
                            تسا ینت شسا یمن
                        </div>
                    </div>
                    <div class="eachLiveCommentMainDiv">
                        <div class="userPicDiv">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                        </div>
                        <div class="mainUserInfos">
                            <div class="mainUseruserName">
                                shazdesina
                            </div>
                        </div>
                        <div class="liveCommentContents">
                            شیا شتنیل نشت یای نشان
                        </div>
                    </div>
                </div>

                <div class="commentInputSection">
                    <div class="userPicDiv">
                        <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita">
                    </div>
                    <textarea class="commentInput" name="comment" id="comment" placeholder="شما چه نظری دارید؟" rows="1"></textarea>
                    <div class="commentInputSendButton">ارسال</div>
                </div>
            </div>

            <div class="moreInfoMainDiv">
                <div class="headerWithLine">
                    <div class="headerWithLineText">
                        اطلاعات بیشتر
                    </div>
                    <div class="headerWithLineLine"></div>
                </div>
                <div class="moreInfoEachItem">
                    <div class="mainDivImgMoreInfoItems">
                        <img>
                    </div>
                    <div class="moreInfoItemsDetails">
                        <div class="placeName">هتل کوثر</div>
                        <div class="placeRates">
                            <div class="rating_and_popularity">
                                <span class="header_rating">
                                   <div class="rs rating" rel="v:rating">
                                       <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-left">
                                               <span class="ui_bubble_rating bubble_30
{{--                                                    {{$avgRate}}0 --}}
                                                    font-size-16" property="ratingValue"
{{--                                                     content="{{$avgRate}}" alt='{{$avgRate}} of {{$avgRate}} bubbles'--}}
                                               ></span>
                                       </div>
                                   </div>
                                </span>
                                <span class="header_popularity popIndexValidation" id="scoreSpanHeader">
                                    <a>
{{--                                        {{$reviewCount}}--}}0
                                        نقد
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="placeState">استان:
                            <span>اصفهان</span>
                        </div>
                        <div class="placeCity">شهر:
                            <span>اصفهان</span>
                        </div>

                    </div>
                </div>
                <div class="moreInfoEachItem">
                    <div class="mainDivImgMoreInfoItems">
                        <img>
                    </div>
                    <div class="moreInfoItemsDetails">
                        <div class="placeName">هتل کوثر</div>
                        <div class="placeRates">
                            <div class="rating_and_popularity">
                                <span class="header_rating">
                                   <div class="rs rating" rel="v:rating">
                                       <div class="prw_rup prw_common_bubble_rating overallBubbleRating float-left">
                                               <span class="ui_bubble_rating bubble_30
{{--                                                    {{$avgRate}}0 --}}
                                                    font-size-16" property="ratingValue"
{{--                                                     content="{{$avgRate}}" alt='{{$avgRate}} of {{$avgRate}} bubbles'--}}
                                               ></span>
                                       </div>
                                   </div>
                                </span>
                                <span class="header_popularity popIndexValidation" id="scoreSpanHeader">
                                    <a>
{{--                                        {{$reviewCount}}--}}0
                                        نقد
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="placeState">استان:
                            <span>اصفهان</span>
                        </div>
                        <div class="placeCity">شهر:
                            <span>اصفهان</span>
                        </div>

                    </div>
                </div>

                <div class="moreBtn">بیشتر</div>
            </div>

            <div class="fromThisPerson">
                <div class="headerWithLine">
                    <div class="headerWithLineText">
                        از همین کاربر
                    </div>
                    <div class="headerWithLineLine"></div>
                </div>

                <div class="videoSuggestion">
                    <a href="#" class="videoSugPicSection">
                        <img src="https://static.koochita.com/_images/posts/5/mainPic.jpg" class="resizeImgClass videoSugPic">
                        <div class="overPicSug likeOverPic">
                            <div style="display: flex; margin-left: 10px;">
                                <span class="likeOverPicNum">100</span>
                                <span class="DisLikeIcon likeOverPicIcon"></span>
                            </div>
                            <div style="display: flex;">
                                <span class="likeOverPicNum">100</span>
                                <span class="LikeIcon likeOverPicIcon"></span>
                            </div>
                        </div>
                        <div class="overPicSug seenOverPic">
                            <span>100,000</span>
                            <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
                        </div>
                        <div class="playIconDiv display-none">
                            <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
                        </div>
                        <div class="liveIconDiv">
                            <img class="liveIconOnVids" src="{{URL::asset('images/streaming/live.png')}}">
                        </div>

                    </a>
                    <div class="videoSugInfo">
                        <div class="videoSugUserPic">
                            <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita" style="width: 100%; height: 100%;">
                        </div>
                        <div class="videoSugUserInfo">
                            <a href="#" class="videoSugName">
                                صحبت های زنده ی محمد جواد
                            </a>
                            <div class="videoSugUserName">
                                shazdesina
                            </div>
                            <div class="videoSugTime">
                                هم‌اکنون - 10 ساعت پیش
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="container mainShowBase">

            <div class="showVideo">
                <article>

                    <!-- copy this <section> and next <script> -->
                    <section class="experiment" >
                        <section style="display: none">
                            <select id="broadcasting-option">
                                <option>Audio + Video</option>
                                <option>Only Audio</option>
                                <option>Screen</option>
                            </select>
                            <input type="text" id="broadcast-name" value="{{$room}}">
                            <button id="setup-new-broadcast" class="setup">Setup New Broadcast</button>
                        </section>

                        <!-- list of all available broadcasting rooms -->
                        <table style="width: 100%;" id="rooms-list"></table>

                        <!-- local/remote videos container -->
                        <div id="videos-container"></div>
                    </section>

                    <script>
                        // Muaz Khan     - https://github.com/muaz-khan
                        // MIT License   - https://www.webrtc-experiment.com/licence/
                        // Documentation - https://github.com/muaz-khan/WebRTC-Experiment/tree/master/webrtc-broadcasting

                        var config = {
                            openSocket: function(config) {
                                var SIGNALING_SERVER = 'https://socketio-over-nodejs2.herokuapp.com:443/';

                                config.channel = config.channel || location.href.replace(/\/|:|#|%|\.|\[|\]/g, '');
                                var sender = Math.round(Math.random() * 999999999) + 999999999;

                                io.connect(SIGNALING_SERVER).emit('new-channel', {
                                    channel: config.channel,
                                    sender: sender
                                });

                                var socket = io.connect(SIGNALING_SERVER + config.channel);
                                socket.channel = config.channel;
                                socket.on('connect', function () {
                                    if (config.callback) config.callback(socket);
                                });

                                socket.send = function (message) {
                                    socket.emit('message', {
                                        sender: sender,
                                        data: message
                                    });
                                };

                                socket.on('message', config.onmessage);
                            },
                            onRemoteStream: function(htmlElement) {
                                videosContainer.appendChild(htmlElement);
                                rotateInCircle(htmlElement);
                            },
                            onRoomFound: function(room) {
                                console.log(room)

                                var alreadyExist = document.querySelector('button[data-broadcaster="' + room.broadcaster + '"]');
                                if (alreadyExist) return;

                                if (typeof roomsList === 'undefined') roomsList = document.body;

                                var tr = document.createElement('tr');
                                tr.innerHTML = '<td><strong>' + room.roomName + '</strong> is broadcasting his media!</td>' +
                                    '<td><button class="join">Join</button></td>';
                                roomsList.appendChild(tr);

                                var joinRoomButton = tr.querySelector('.join');
                                joinRoomButton.setAttribute('data-broadcaster', room.broadcaster);
                                joinRoomButton.setAttribute('data-roomToken', room.broadcaster);
                                joinRoomButton.onclick = function() {
                                    this.disabled = true;

                                    var broadcaster = this.getAttribute('data-broadcaster');
                                    var roomToken = this.getAttribute('data-roomToken');
                                    broadcastUI.joinRoom({
                                        roomToken: roomToken,
                                        joinUser: broadcaster
                                    });
                                    hideUnnecessaryStuff();
                                };
                            },
                            onNewParticipant: function(numberOfViewers) {
                                document.title = 'Viewers: ' + numberOfViewers;
                            },
                            onReady: function() {
                                console.log('now you can open or join rooms');
                            }
                        };

                        function setupNewBroadcastButtonClickHandler() {
                            document.getElementById('broadcast-name').disabled = true;
                            document.getElementById('setup-new-broadcast').disabled = true;

                            DetectRTC.load(function() {
                                captureUserMedia(function() {
                                    var shared = 'video';
                                    if (window.option == 'Only Audio') {
                                        shared = 'audio';
                                    }
                                    if (window.option == 'Screen') {
                                        shared = 'screen';
                                    }

                                    broadcastUI.createRoom({
                                        roomName: (document.getElementById('broadcast-name') || { }).value || 'Anonymous',
                                        isAudio: shared === 'audio'
                                    });
                                });
                                hideUnnecessaryStuff();
                            });
                        }

                        function captureUserMedia(callback) {
                            var constraints = {
                                audio: true,
                                video: true
                            };

                            window.option = 'Audio + Video';
                            if (option === 'Only Audio') {
                                constraints = {
                                    audio: true,
                                    video: false
                                };

                                if(DetectRTC.hasMicrophone !== true) {
                                    alert('DetectRTC library is unable to find microphone; maybe you denied microphone access once and it is still denied or maybe microphone device is not attached to your system or another app is using same microphone.');
                                }
                            }
                            if (option === 'Screen') {
                                var video_constraints = {
                                    mandatory: {
                                        chromeMediaSource: 'screen'
                                    },
                                    optional: []
                                };
                                constraints = {
                                    audio: false,
                                    video: video_constraints
                                };

                                if(DetectRTC.isScreenCapturingSupported !== true) {
                                    alert('DetectRTC library is unable to find screen capturing support. You MUST run chrome with command line flag "chrome --enable-usermedia-screen-capturing"');
                                }
                            }

                            if (option != 'Only Audio' && option != 'Screen' && DetectRTC.hasWebcam !== true) {
                                alert('DetectRTC library is unable to find webcam; maybe you denied webcam access once and it is still denied or maybe webcam device is not attached to your system or another app is using same webcam.');
                            }

                            var htmlElement = document.createElement(option === 'Only Audio' ? 'audio' : 'video');

                            htmlElement.muted = false;
                            htmlElement.volume = 1;

                            try {
                                htmlElement.setAttributeNode(document.createAttribute('autoplay'));
                                htmlElement.setAttributeNode(document.createAttribute('playsinline'));
                                htmlElement.setAttributeNode(document.createAttribute('controls'));
                            } catch (e) {
                                htmlElement.setAttribute('autoplay', true);
                                htmlElement.setAttribute('playsinline', true);
                                htmlElement.setAttribute('controls', true);
                            }

                            var mediaConfig = {
                                video: htmlElement,
                                onsuccess: function(stream) {
                                    config.attachStream = stream;

                                    videosContainer.appendChild(htmlElement);
                                    rotateInCircle(htmlElement);

                                    callback && callback();
                                },
                                onerror: function() {
                                    if (option === 'Only Audio') alert('unable to get access to your microphone');
                                    else if (option === 'Screen') {
                                        if (location.protocol === 'http:') alert('Please test this WebRTC experiment on HTTPS.');
                                        else alert('Screen capturing is either denied or not supported. Are you enabled flag: "Enable screen capture support in getUserMedia"?');
                                    } else alert('unable to get access to your webcam');
                                }
                            };
                            if (constraints) mediaConfig.constraints = constraints;
                            getUserMedia(mediaConfig);
                        }

                        var broadcastUI = broadcast(config);

                        /* UI specific */
                        var videosContainer = document.getElementById('videos-container') || document.body;
                        var setupNewBroadcast = document.getElementById('setup-new-broadcast');
                        var roomsList = document.getElementById('rooms-list');

                        var broadcastingOption = document.getElementById('broadcasting-option');

                        function hideUnnecessaryStuff() {
                            var visibleElements = document.getElementsByClassName('visible'),
                                length = visibleElements.length;
                            for (var i = 0; i < length; i++) {
                                visibleElements[i].style.display = 'none';
                            }
                        }

                        function rotateInCircle(video) {
                            video.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(0deg)';
                            setTimeout(function() {
                                video.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(360deg)';
                            }, 1000);
                        }

                        var kind = '{{$kind}}';
                        var room = '{{$room}}';

                        if(kind == 'streamer')
                            setupNewBroadcastButtonClickHandler();

                    </script>

                </article>


    {{--            <div id="videos-container"></div>--}}
    {{--            <div id="thumbVideo" class="videoShow"></div>--}}
            </div>

            <table style="width: 100%;" id="rooms-list"></table>

            <div class="toolSection">
                <div class="toolSectionButtons">
                    <div class="toolSectionButtonsCircle">
                        <span class="DisLikeIcon"></span>
                    </div>
                    <div class="toolSectionButtonsCircle">
                        <span class="LikeIcon"></span>
                    </div>
                    <div class="toolSectionButtonsCircle">
                        <span class="CommentIcon CommentIconSett"></span>
                    </div>
                    <div class="toolSectionButtonsCircle">
                        <span class="ShareIcon ShareIconSett"></span>
                    </div>
                    <div class="toolSectionButtonsCircle">
                        <span class="HeartIcon HeartIconSett"></span>
                    </div>
                    <div class="toolSectionButtonsCircle">
                        <span class="BookMarkIcon BookMarkIconSett"></span>
                    </div>
                </div>
                <div class="toolSectionInfos">
                    <div class="toolSectionInfosTab">
                        <span class="CommentIcon commentInfoTab"></span>
                        <span class="toolSectionInfosTabNumber">100,000</span>
                    </div>
                    <div class="toolSectionInfosTab">
                        <span class="LikeIcon likeInfoTab"></span>
                        <span class="toolSectionInfosTabNumber">100</span>
                    </div>
                    <div class="toolSectionInfosTab">
                        <span class="DisLikeIcon disLikeInfoTab"></span>
                        <span class="toolSectionInfosTabNumber">100,000,000</span>
                    </div>
                    <div class="toolSectionInfosTab">
                        <i class="fa fa-eye"></i>
                        {{--                    <span class="ViewIcon viewInfoTab"></span>--}}
                        <span class="toolSectionInfosTabNumber">100</span>
                    </div>
                </div>
            </div>

            <div class="descriptionSection">
                <div class="headerWithLine">
                    <div class="headerWithLineText">
                        معرفی کلی
                    </div>
                    <div class="headerWithLineLine"></div>
                </div>
                <div class="descriptionSectionBody">
                    لورم ایپسوم متن ساختگی
                    با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها
                    و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                    فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                    کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و م
                    تخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                    الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت
                    می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط
                    سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و
                    جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </div>

                <div class="moreBtn">بیشتر</div>
            </div>

            <div class="maybeInterestingLives">
                <div class="headerWithLine">
                    <div class="headerWithLineText">
                        شاید جالب باشد
                    </div>
                    <div class="headerWithLineLine"></div>
                </div>

                <div class="interestingSlider">
                    <div class="videoSuggestion">
                        <a href="#" class="videoSugPicSection">
                            <img src="https://static.koochita.com/_images/posts/5/mainPic.jpg" class="resizeImgClass videoSugPic">
                            <div class="overPicSug likeOverPic">
                                <div style="display: flex; margin-left: 10px;">
                                    <span class="likeOverPicNum">100</span>
                                    <span class="DisLikeIcon likeOverPicIcon"></span>
                                </div>
                                <div style="display: flex;">
                                    <span class="likeOverPicNum">100</span>
                                    <span class="LikeIcon likeOverPicIcon"></span>
                                </div>
                            </div>
                            <div class="overPicSug seenOverPic">
                                <span>100,000</span>
                                <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
                            </div>
                            <div class="playIconDiv display-none">
                                <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
                            </div>
                            <div class="liveIconDiv">
                                <img class="liveIconOnVids" src="{{URL::asset('images/streaming/live.png')}}">
                            </div>

                        </a>
                        <div class="videoSugInfo">
                            <div class="videoSugUserPic">
                                <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita" style="width: 100%; height: 100%;">
                            </div>
                            <div class="videoSugUserInfo">
                                <a href="#" class="videoSugName">
                                    صحبت های زنده ی محمد جواد
                                </a>
                                <div class="videoSugUserName">
                                    shazdesina
                                </div>
                                <div class="videoSugTime">
                                    هم‌اکنون - 10 ساعت پیش
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="videoSuggestion">
                        <a href="#" class="videoSugPicSection">
                            <img src="https://static.koochita.com/_images/posts/5/mainPic.jpg" class="resizeImgClass videoSugPic">
                            <div class="overPicSug likeOverPic">
                                <div style="display: flex; margin-left: 10px;">
                                    <span class="likeOverPicNum">100</span>
                                    <span class="DisLikeIcon likeOverPicIcon"></span>
                                </div>
                                <div style="display: flex;">
                                    <span class="likeOverPicNum">100</span>
                                    <span class="LikeIcon likeOverPicIcon"></span>
                                </div>
                            </div>
                            <div class="overPicSug seenOverPic">
                                <span>100,000</span>
                                <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
                            </div>
                            <div class="playIconDiv display-none">
                                <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
                            </div>
                            <div class="liveIconDiv">
                                <img class="liveIconOnVids" src="{{URL::asset('images/streaming/live.png')}}">
                            </div>

                        </a>
                        <div class="videoSugInfo">
                            <div class="videoSugUserPic">
                                <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita" style="width: 100%; height: 100%;">
                            </div>
                            <div class="videoSugUserInfo">
                                <a href="#" class="videoSugName">
                                    صحبت های زنده ی محمد جواد
                                </a>
                                <div class="videoSugUserName">
                                    shazdesina
                                </div>
                                <div class="videoSugTime">
                                    هم‌اکنون - 10 ساعت پیش
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="videoSuggestion">
                        <a href="#" class="videoSugPicSection">
                            <img src="https://static.koochita.com/_images/posts/5/mainPic.jpg" class="resizeImgClass videoSugPic">
                            <div class="overPicSug likeOverPic">
                                <div style="display: flex; margin-left: 10px;">
                                    <span class="likeOverPicNum">100</span>
                                    <span class="DisLikeIcon likeOverPicIcon"></span>
                                </div>
                                <div style="display: flex;">
                                    <span class="likeOverPicNum">100</span>
                                    <span class="LikeIcon likeOverPicIcon"></span>
                                </div>
                            </div>
                            <div class="overPicSug seenOverPic">
                                <span>100,000</span>
                                <img src="{{URL::asset('images/streaming/eye.png')}}" class="eyeClass">
                            </div>
                            <div class="playIconDiv display-none">
                                <img src="{{URL::asset('images/streaming/play.png')}}" class="playIconDivIcon">
                            </div>
                            <div class="liveIconDiv">
                                <img class="liveIconOnVids" src="{{URL::asset('images/streaming/live.png')}}">
                            </div>

                        </a>
                        <div class="videoSugInfo">
                            <div class="videoSugUserPic">
                                <img src="{{URL::asset('_images/nopic/blank.jpg')}}" alt="koochita" style="width: 100%; height: 100%;">
                            </div>
                            <div class="videoSugUserInfo">
                                <a href="#" class="videoSugName">
                                    صحبت های زنده ی محمد جواد
                                </a>
                                <div class="videoSugUserName">
                                    shazdesina
                                </div>
                                <div class="videoSugTime">
                                    هم‌اکنون - 10 ساعت پیش
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')



    {{--    <script src="https://cdn.pubnub.com/pubnub.min.js"></script>--}}
{{--    <script src="{{URL::asset('js/stream/wertc.js')}}"></script>--}}

{{--    <script !src="">--}}

{{--        let kind = '{{$kind}}';--}}
{{--        let room = '{{$room}}';--}}
{{--        let name = '{{$name}}';--}}

{{--        (function () {--}}
{{--// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--// WebRTC Simple Calling API + Mobile--}}
{{--// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--            var PHONE = window.PHONE = function (config) {--}}
{{--                var PHONE = function () {--}}
{{--                };--}}
{{--                var pubnub = PUBNUB(config);--}}
{{--                var pubkey = config.publish_key || 'demo';--}}
{{--                var snapper = function () {--}}
{{--                    return ' '--}}
{{--                }--}}
{{--                var subkey = config.subscribe_key || 'demo';--}}
{{--                var sessionid = PUBNUB.uuid();--}}
{{--                var mystream = null;--}}
{{--                var myvideo = document.createElement('video');--}}
{{--                var myconnection = false;--}}
{{--                var mediaconf = config.media || {audio: true, video: true};--}}
{{--                var conversations = {};--}}
{{--                var oneway = config.oneway || false--}}
{{--                var broadcast = config.broadcast || false;--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // RTC Peer Connection Session (one per call)--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                var PeerConnection =--}}
{{--                    window.RTCPeerConnection ||--}}
{{--                    window.mozRTCPeerConnection ||--}}
{{--                    window.webkitRTCPeerConnection;--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // ICE (many route options per call)--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                var IceCandidate =--}}
{{--                    window.mozRTCIceCandidate ||--}}
{{--                    window.RTCIceCandidate;--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Media Session Description (offer and answer per call)--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                var SessionDescription =--}}
{{--                    window.RTCSessionDescription ||--}}
{{--                    window.mozRTCSessionDescription ||--}}
{{--                    window.webkitRTCSessionDescription;--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Local Microphone and Camera Media (one per device)--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                if(kind == 'sender'){--}}
{{--                    navigator.getUserMedia =--}}
{{--                        navigator.getUserMedia ||--}}
{{--                        navigator.webkitGetUserMedia ||--}}
{{--                        navigator.mozGetUserMedia ||--}}
{{--                        navigator.msGetUserMedia;--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // STUN Server List Configuration (public STUN list)--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                --}}{{--var configes = {!! $urls !!};--}}
{{--                var rtcconfig = {--}}
{{--                    iceServers: [--}}
{{--                        {url: "stun:stun.l.google.com:19302"},--}}
{{--                        {url: "stun:stun1.l.google.com:19302"},--}}
{{--                        {url: "stun:stun2.l.google.com:19302"},--}}
{{--                        {url: "stun:stun3.l.google.com:19302"},--}}
{{--                        {url: "stun:stun4.l.google.com:19302"},--}}
{{--                        {url: "stun:23.21.150.121"},--}}
{{--                        {url: "stun:stun01.sipphone.com"},--}}
{{--                        {url: "stun:stun.ekiga.net"},--}}
{{--                        {url: "stun:stun.fwdnet.net"},--}}
{{--                        {url: "stun:stun.ideasip.com"},--}}
{{--                        {url: "stun:stun.iptel.org"},--}}
{{--                        {url: "stun:stun.rixtelecom.se"},--}}
{{--                        {url: "stun:stun.schlund.de"},--}}
{{--                        {url: "stun:stunserver.org"},--}}
{{--                        {url: "stun:stun.softjoys.com"},--}}
{{--                        {url: "stun:stun.voiparound.com"},--}}
{{--                        {url: "stun:stun.voipbuster.com"},--}}
{{--                        {url: "stun:stun.voipstunt.com"},--}}
{{--                        {url: "stun:stun.voxgratia.org"},--}}
{{--                        {url: "stun:stun.xten.com"},--}}
{{--                    ]--}}
{{--                } ;--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Custom STUN Options--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // add_servers(configes.v.iceServers);--}}
{{--                function add_servers(servers) {--}}

{{--                    if (servers.constructor === Array)--}}
{{--                        [].unshift.apply(rtcconfig.iceServers, servers);--}}
{{--                    else rtcconfig.iceServers.unshift(servers);--}}
{{--                }--}}

{{--                if ('servers' in config) add_servers(config.servers);--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // PHONE Events--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                var messagecb = function () {--}}
{{--                };--}}
{{--                var readycb = function () {--}}
{{--                };--}}
{{--                var unablecb = function () {--}}
{{--                };--}}
{{--                var debugcb = function () {--}}
{{--                };--}}
{{--                var connectcb = function () {--}}
{{--                };--}}
{{--                var disconnectcb = function () {--}}
{{--                };--}}
{{--                var reconnectcb = function () {--}}
{{--                };--}}
{{--                var callstatuscb = function () {--}}
{{--                };--}}
{{--                var receivercb = function () {--}}
{{--                };--}}

{{--                PHONE.message = function (cb) {--}}
{{--                    messagecb = cb--}}
{{--                };--}}
{{--                PHONE.ready = function (cb) {--}}
{{--                    readycb = cb--}}
{{--                };--}}
{{--                PHONE.unable = function (cb) {--}}
{{--                    unablecb = cb--}}
{{--                };--}}
{{--                PHONE.callstatus = function (cb) {--}}
{{--                    callstatuscb = cb--}}
{{--                };--}}
{{--                PHONE.debug = function (cb) {--}}
{{--                    debugcb = cb--}}
{{--                };--}}
{{--                PHONE.connect = function (cb) {--}}
{{--                    connectcb = cb--}}
{{--                };--}}
{{--                PHONE.disconnect = function (cb) {--}}
{{--                    disconnectcb = cb--}}
{{--                };--}}
{{--                PHONE.reconnect = function (cb) {--}}
{{--                    reconnectcb = cb--}}
{{--                };--}}
{{--                PHONE.receive = function (cb) {--}}
{{--                    receivercb = cb--}}
{{--                };--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Add/Get Conversation - Creates a new PC or Returns Existing PC--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function get_conversation(number, isAnswer) {--}}
{{--                    var talk = conversations[number] || (function (number) {--}}
{{--                        var talk = {--}}
{{--                            number: number,--}}
{{--                            status: '',--}}
{{--                            image: document.createElement('img'),--}}
{{--                            started: +new Date,--}}
{{--                            imgset: false,--}}
{{--                            imgsent: 0,--}}
{{--                            pc: new PeerConnection(rtcconfig),--}}
{{--                            closed: false,--}}
{{--                            usermsg: function (val1, val2) {--}}
{{--                            },--}}
{{--                            thumb: null,--}}
{{--                            connect: function () {--}}
{{--                                console.log('connect')--}}
{{--                            },--}}
{{--                            end: function () {--}}
{{--                                console.log('end')--}}
{{--                            }--}}
{{--                        };--}}

{{--                        // Setup Event Methods--}}
{{--                        talk.pc.onaddstream = config.onaddstream || onaddstream;--}}
{{--                        talk.pc.onicecandidate = onicecandidate;--}}
{{--                        talk.pc.number = number;--}}

{{--                        // Disconnect and Hangup--}}
{{--                        talk.hangup = function (signal) {--}}
{{--                            if (talk.closed) return;--}}

{{--                            talk.closed = true;--}}
{{--                            talk.imgset = false;--}}
{{--                            clearInterval(talk.snapi);--}}

{{--                            if (signal !== false) transmit(number, {hangup: true});--}}

{{--                            talk.end(talk);--}}
{{--                            talk.pc.close();--}}
{{--                            close_conversation(number);--}}
{{--                        };--}}

{{--                        // Sending Messages--}}
{{--                        talk.send = function (message) {--}}
{{--                            transmit(number, {usermsg: message});--}}
{{--                        };--}}

{{--                        // Sending Stanpshots--}}
{{--                        talk.snap = function () {--}}
{{--                            var pic = snapper();--}}
{{--                            if (talk.closed) clearInterval(talk.snapi);--}}
{{--                            transmit(number, {thumbnail: pic});--}}
{{--                            var img = document.createElement('img');--}}
{{--                            img.src = pic;--}}
{{--                            return {data: pic, image: img};--}}
{{--                        };--}}
{{--                        talk.snapi = setInterval(function () {--}}
{{--                            if (talk.imgsent++ > 5) return clearInterval(talk.snapi);--}}
{{--                            talk.snap();--}}
{{--                        }, 1500);--}}
{{--                        talk.snap();--}}

{{--                        // Nice Accessor to Update Disconnect & Establis CBs--}}
{{--                        talk.thumbnail = function (cb) {--}}
{{--                            talk.thumb = cb;--}}
{{--                            return talk--}}
{{--                        };--}}
{{--                        talk.ended = function (cb) {--}}
{{--                            talk.end = cb;--}}
{{--                            return talk--}}
{{--                        };--}}
{{--                        talk.connected = function (cb) {--}}
{{--                            talk.connect = cb;--}}
{{--                            return talk--}}
{{--                        };--}}
{{--                        talk.message = function (cb) {--}}
{{--                            talk.usermsg = cb;--}}
{{--                            return talk--}}
{{--                        };--}}

{{--                        // Add Local Media Streams Audio Video Mic Camera--}}
{{--                        //  If answering and oneway streaming, do not attach stream--}}

{{--                        // if (!isAnswer || !oneway) talk.pc.addStream(mystream);   // Add null here on the receiving end of streaming to go one-way.--}}

{{--                        // Notify of Call Status--}}
{{--                        update_conversation(talk, 'connecting');--}}

{{--                        // Return Brand New Talk Reference--}}
{{--                        conversations[number] = talk;--}}
{{--                        return talk;--}}
{{--                    })(number);--}}

{{--                    // Return Existing or New Reference to Caller--}}
{{--                    return talk;--}}
{{--                }--}}

{{--                function setMsg(msg) {--}}
{{--                    console.log('msg receive:')--}}
{{--                    console.log(msg)--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Remove Conversation--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function close_conversation(number) {--}}
{{--                    conversations[number] = null;--}}
{{--                    delete conversations[number];--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Notify of Call Status Events--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function update_conversation(talk, status) {--}}
{{--                    talk.status = status;--}}
{{--                    callstatuscb(talk);--}}
{{--                    return talk;--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Get Number--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                PHONE.number = function () {--}}
{{--                    return config.number;--}}
{{--                };--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Get Call History--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                PHONE.history = function (settings) {--}}
{{--                    pubnub.history({--}}
{{--                        channel: settings[number],--}}
{{--                        callback: function (call_history) {--}}
{{--                            settings['history'](call_history[0]);--}}
{{--                        }--}}
{{--                    })--}}
{{--                };--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Make Call - Create new PeerConnection--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                PHONE.dial = function (number, servers) {--}}
{{--                    console.log('PHONE.dial')--}}
{{--                    if (!!servers) add_servers(servers);--}}
{{--                    var talk = get_conversation(number);--}}
{{--                    var pc = talk.pc;--}}

{{--                    // Prevent Repeat Calls--}}
{{--                    if (talk.dialed) return false;--}}
{{--                    talk.dialed = true;--}}

{{--                    // Send SDP Offer (Call)--}}
{{--                    pc.createOffer(function (offer) {--}}
{{--                        transmit(number, {hangup: true});--}}
{{--                        transmit(number, offer, 2);--}}
{{--                        pc.setLocalDescription(offer, debugcb, debugcb);--}}
{{--                    }, debugcb);--}}

{{--                    // Return Session Reference--}}
{{--                    return talk;--}}
{{--                };--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Send Image Snap - Send Image Snap to All Calls or a Specific Call--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                PHONE.snap = function (message, number) {--}}
{{--                    if (number) return get_conversation(number).snap(message);--}}
{{--                    var pic = {};--}}
{{--                    PUBNUB.each(conversations, function (number, talk) {--}}
{{--                        pic = talk.snap();--}}
{{--                    });--}}
{{--                    return pic;--}}
{{--                };--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Send Message - Send Message to All Calls or a Specific Call--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                PHONE.send = function (message, number) {--}}
{{--                    console.log('PHONE.send')--}}
{{--                    if (number) return get_conversation(number).send(message);--}}
{{--                    PUBNUB.each(conversations, function (number, talk) {--}}
{{--                        talk.send(message);--}}
{{--                    });--}}
{{--                };--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // End Call - Close All Calls or a Specific Call--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                PHONE.hangup = function (number) {--}}
{{--                    if (number) return get_conversation(number).hangup();--}}
{{--                    PUBNUB.each(conversations, function (number, talk) {--}}
{{--                        talk.hangup();--}}
{{--                    });--}}
{{--                };--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Expose local stream and pubnub object--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                PHONE.mystream = mystream;--}}
{{--                PHONE.pubnub = pubnub;--}}
{{--                PHONE.oneway = oneway;--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Auto-hangup on Leave--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                PUBNUB.bind('unload,beforeunload', window, function () {--}}
{{--                    if (PHONE.goodbye) return true;--}}
{{--                    PHONE.goodbye = true;--}}

{{--                    PUBNUB.each(conversations, function (number, talk) {--}}
{{--                        var mynumber = config.number;--}}
{{--                        var packet = {hangup: true};--}}
{{--                        var message = {packet: packet, id: sessionid, number: mynumber};--}}
{{--                        var client = new XMLHttpRequest();--}}
{{--                        var url = 'http://pubsub.pubnub.com/publish/'--}}
{{--                            + pubkey + '/'--}}
{{--                            + subkey + '/0/'--}}
{{--                            + number + '/0/'--}}
{{--                            + JSON.stringify(message);--}}

{{--                        client.open('GET', url, false);--}}
{{--                        client.send();--}}
{{--                        talk.hangup();--}}
{{--                    });--}}

{{--                    return true;--}}
{{--                });--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Grab Local Video Snapshot--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function snapshots_setup(stream) {--}}
{{--                    var video = myvideo;--}}
{{--                    var canvas = document.createElement('canvas');--}}
{{--                    var context = canvas.getContext("2d");--}}
{{--                    var snap = {width: 240, height: 180};--}}

{{--                    // Video Settings--}}
{{--                    video.width = snap.width;--}}
{{--                    video.height = snap.height;--}}
{{--                    video.srcObject = stream;--}}
{{--                    video.volume = 0.0;--}}
{{--                    video.play();--}}

{{--                    // Canvas Settings--}}
{{--                    canvas.width = snap.width;--}}
{{--                    canvas.height = snap.height;--}}

{{--                    // Capture Local Pic--}}
{{--                    snapper = function () {--}}
{{--                        try {--}}
{{--                            context.drawImage(video, 0, 0, snap.width, snap.height);--}}
{{--                        } catch (e) {--}}
{{--                        }--}}
{{--                        return canvas.toDataURL('image/jpeg', 0.30);--}}
{{--                    };--}}

{{--                    PHONE.video = video;--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Visually Display New Stream--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function onaddstream(obj) {--}}
{{--                    console.log('onaddstream')--}}

{{--                    var vid = document.createElement('video');--}}
{{--                    var stream = obj.stream;--}}
{{--                    var number = (obj.srcElement || obj.target).number;--}}
{{--                    var talk = get_conversation(number);--}}

{{--                    vid.setAttribute('autoplay', 'autoplay');--}}
{{--                    vid.setAttribute('data-number', number);--}}
{{--                    vid.srcObject = stream;--}}

{{--                    talk.video = vid;--}}
{{--                    talk.connect(talk);--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // On ICE Route Candidate Discovery--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function onicecandidate(event) {--}}
{{--                    if (!event.candidate) return;--}}
{{--                    transmit(this.number, event.candidate);--}}
{{--                };--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Listen For New Incoming Calls--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function subscribe() {--}}
{{--                    console.log("Subscribed to " + config.number);--}}
{{--                    pubnub.subscribe({--}}
{{--                        restore: true,--}}
{{--                        channel: config.number,--}}
{{--                        message: receive,--}}
{{--                        disconnect: disconnectcb,--}}
{{--                        reconnect: reconnectcb,--}}
{{--                        connect: function () {--}}
{{--                            onready(true)--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // When Ready to Receive Calls--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function onready(subscribed) {--}}
{{--                    console.log('onready')--}}
{{--                    if (subscribed) myconnection = true;--}}
{{--                    if (!((mystream || oneway) && myconnection)) return;--}}

{{--                    connectcb();--}}
{{--                    readycb();--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Prepare Local Media Camera and Mic--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function getusermedia() { //Do something if not requesting any media?--}}
{{--                    if (oneway && !broadcast) {--}}
{{--                        if (!PeerConnection) {--}}
{{--                            return unablecb();--}}
{{--                        }--}}
{{--                        onready();--}}
{{--                        subscribe();--}}
{{--                        return;--}}
{{--                    }--}}
{{--                    navigator.getUserMedia(mediaconf, function (stream) {--}}
{{--                        if (!stream) return unablecb(stream);--}}
{{--                        mystream = stream;--}}
{{--                        phone.mystream = stream;--}}
{{--                        snapshots_setup(stream);--}}
{{--                        onready();--}}
{{--                        subscribe();--}}
{{--                    }, function (info) {--}}
{{--                        debugcb(info);--}}
{{--                        return unablecb(info);--}}
{{--                    });--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Send SDP Call Offers/Answers and ICE Candidates to Peer--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function transmit(phone, packet, times, time) {--}}
{{--                    // console.log(phone, packet, times, time);--}}
{{--                    if (!packet) return;--}}

{{--                    var number = config.number;--}}
{{--                    var message = {packet: packet, id: sessionid, number: number};--}}
{{--                    debugcb(message);--}}
{{--                    pubnub.publish({channel: phone, message: message});--}}

{{--                    // Recurse if Requested for--}}
{{--                    // if (!times) return;--}}
{{--                    // time = time || 1;--}}
{{--                    // if (time++ >= times) return;--}}
{{--                    // setTimeout(function () {--}}
{{--                    //     transmit(phone, packet, times, time);--}}
{{--                    // }, 150);--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // SDP Offers & ICE Candidates Receivable Processing--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function receive(message) {--}}
{{--                    // Debug Callback of Data to Watch--}}
{{--                    debugcb(message);--}}

{{--                    // Get Call Reference--}}
{{--                    var talk = get_conversation(message.number, true);--}}

{{--                    // Ignore if Closed--}}
{{--                    if (talk.closed) return;--}}
{{--                    // User Message--}}

{{--                    if (message.packet.usermsg) {--}}
{{--                        messagecb(talk, message.packet.usermsg);--}}
{{--                        setMsg(message.packet.usermsg);--}}
{{--                        return talk.usermsg(talk, message.packet.usermsg);--}}
{{--                    }--}}

{{--                    // Thumbnail Preview Image--}}
{{--                    if (message.packet.thumbnail) return create_thumbnail(message);--}}

{{--                    // If Hangup Request--}}
{{--                    if (message.packet.hangup) return talk.hangup(false);--}}

{{--                    // If Peer Calling Inbound (Incoming) - Can determine stream + receive here.--}}
{{--                    if (message.packet.sdp && !talk.received) {--}}
{{--                        talk.received = true;--}}
{{--                        receivercb(talk);--}}
{{--                    }--}}

{{--                    // Update Peer Connection with SDP Offer or ICE Routes--}}
{{--                    if (message.packet.sdp) add_sdp_offer(message);--}}
{{--                    else add_ice_route(message);--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Create Remote Friend Thumbnail--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function create_thumbnail(message) {--}}
{{--                    var talk = get_conversation(message.number);--}}
{{--                    talk.image.src = message.packet.thumbnail;--}}
{{--                    // Call only once--}}
{{--                    if (!talk.thumb) return;--}}
{{--                    if (!talk.imgset) talk.thumb(talk);--}}
{{--                    talk.imgset = true;--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Add SDP Offer/Answers--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function add_sdp_offer(message) {--}}
{{--                    // Get Call Reference--}}
{{--                    var talk = get_conversation(message.number, message.packet.type == 'answer');--}}
{{--                    var pc = talk.pc;--}}
{{--                    var type = message.packet.type == 'offer' ? 'offer' : 'answer';--}}

{{--                    // Deduplicate SDP Offerings/Answers--}}
{{--                    if (type in talk) return;--}}
{{--                    talk[type] = true;--}}
{{--                    talk.dialed = true;--}}

{{--                    // Notify of Call Status--}}
{{--                    update_conversation(talk, 'routing');--}}

{{--                    // Add SDP Offer/Answer--}}
{{--                    pc.setRemoteDescription(--}}
{{--                        new SessionDescription(message.packet), function () {--}}
{{--                            // Set Connected Status--}}
{{--                            update_conversation(talk, 'connected');--}}

{{--                            // Call Online and Ready--}}
{{--                            if (pc.remoteDescription.type != 'offer') return;--}}

{{--                            // Create Answer to Call--}}
{{--                            pc.createAnswer(function (answer) {--}}
{{--                                pc.setLocalDescription(answer, debugcb, debugcb);--}}
{{--                                transmit(message.number, answer, 2);--}}
{{--                            }, debugcb);--}}
{{--                        }, debugcb--}}
{{--                    );--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Add ICE Candidate Routes--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                function add_ice_route(message) {--}}
{{--                    // Leave if Non-good ICE Packet--}}
{{--                    if (!message.packet) return;--}}
{{--                    if (!message.packet.candidate) return;--}}

{{--                    // Get Call Reference--}}
{{--                    var talk = get_conversation(message.number);--}}
{{--                    var pc = talk.pc;--}}

{{--                    // Add ICE Candidate Routes--}}
{{--                    pc.addIceCandidate(--}}
{{--                        new IceCandidate(message.packet),--}}
{{--                        debugcb,--}}
{{--                        debugcb--}}
{{--                    );--}}
{{--                }--}}

{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}
{{--                // Main - Request Camera and Mic--}}
{{--                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=---}}

{{--                // if(kind == 'sender')--}}
{{--                    getusermedia();--}}

{{--                return PHONE;--}}
{{--            };--}}
{{--        })();--}}

{{--    </script>--}}

{{--    <script type="text/javascript">--}}
{{--        var vid_thumb = document.getElementById("thumbVideo");--}}
{{--        var vidCount = 0;--}}
{{--        var numberPhone;--}}
{{--        var onewayVar;--}}
{{--        var broadcastvar;--}}
{{--        var mystreamVar;--}}

{{--        if(kind == 'see'){--}}
{{--            broadcastvar = false;--}}
{{--            onewayVar = true;--}}
{{--        }--}}
{{--        else{--}}
{{--            broadcastvar = true;--}}
{{--            onewayVar = false;--}}
{{--        }--}}


{{--        function loginStream(_name) {--}}

{{--            var phone = window.phone = PHONE({--}}
{{--                number: _name || "Anonymous", // listen on username line else Anonymous--}}
{{--                publish_key: 'pub-c-561a7378-fa06-4c50-a331-5c0056d0163c', // Your Pub Key--}}
{{--                subscribe_key: 'sub-c-17b7db8a-3915-11e4-9868-02ee2ddab7fe', // Your Sub Key--}}
{{--                oneway: onewayVar,--}}
{{--                broadcast: broadcastvar--}}
{{--            });--}}
{{--            var ctrl = window.ctrl = CONTROLLER(phone);--}}

{{--            ctrl.ready(function () {--}}
{{--                if(kind ==  'see')--}}
{{--                    makeCall(room);--}}
{{--                else--}}
{{--                    ctrl.addLocalStream(vid_thumb);--}}
{{--            });--}}
{{--            ctrl.receive(function (session) {--}}
{{--                session.connected(function (session) {--}}
{{--                    if(kind == 'sender')--}}
{{--                        $('#thumbVideo').append(session.video);--}}
{{--                    else {--}}
{{--                        $('#thumbVideo').append(session.video);--}}
{{--                        vidCount++;--}}
{{--                    }--}}
{{--                });--}}
{{--                session.ended(function (session) {--}}
{{--                    ctrl.getVideoElement(session.number).remove();--}}
{{--                    vidCount--;--}}
{{--                });--}}

{{--            });--}}
{{--            ctrl.videoToggled(function (session, isEnabled) {--}}
{{--                ctrl.getVideoElement(session.number).toggle(isEnabled);--}}
{{--            });--}}
{{--            ctrl.audioToggled(function (session, isEnabled) {--}}
{{--                ctrl.getVideoElement(session.number).css("opacity", isEnabled ? 1 : 0.75);--}}
{{--            });--}}
{{--            return false;--}}
{{--        }--}}

{{--        function makeCall(_room) {--}}
{{--            if (!window.phone) alert("Login First!");--}}
{{--            var num = _room;--}}
{{--            if (phone.number() == num) return false; // No calling yourself!--}}
{{--            ctrl.isOnline(num, function (isOn) {--}}
{{--                if (isOn) {--}}
{{--                    ctrl.dial(num);--}}
{{--                } else alert("User if Offline");--}}
{{--            });--}}
{{--            return false;--}}
{{--        }--}}

{{--        function end() {--}}
{{--            ctrl.hangup();--}}
{{--        }--}}

{{--        function pause() {--}}
{{--            var video = ctrl.toggleVideo();--}}
{{--            if (!video) $('#pause').html('Unpause');--}}
{{--            else $('#pause').html('Pause');--}}
{{--        }--}}

{{--        function getVideo(number) {--}}
{{--            return $('*[data-number="' + number + '"]');--}}
{{--        }--}}

{{--        function errWrap(fxn, form) {--}}
{{--            try {--}}
{{--                return fxn(form);--}}
{{--            } catch (err) {--}}
{{--                alert("WebRTC is currently only supported by Chrome, Opera, and Firefox");--}}
{{--                return false;--}}
{{--            }--}}
{{--        }--}}

{{--        if(kind == 'sender')--}}
{{--            loginStream(room);--}}
{{--        else--}}
{{--            loginStream(name)--}}
{{--    </script>--}}
@endsection