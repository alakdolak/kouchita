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


        <div class="videoInfos">
            <div class="videoInfosVideoName">
                معرفی آئودی ای ترون اسپرت بک
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
        </div>
    </div>

@endsection

@section('script')

@endsection