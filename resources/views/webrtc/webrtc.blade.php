<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>Class room {{$kind}}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{URL::asset('webrtc/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('webrtc/fonts/font-awesome-4.3.0/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/peerjs@1.0.0/dist/peerjs.min.js"></script>


    <style>
        *{
            direction: rtl;
            text-align: right;
        }
        body{
            background-color: #f1f1f1;
            padding: 10px;
        }
        .row{
            width: 100%;
            margin: 0px;
        }
        .fullCenter {
            display: flex;
            justify-content: center;
            align-content: center;
        }
        video{
            /*position: absolute;*/
            max-width: 100%;
            max-height: 100%;
        }
        .videoBox {
            width: 100%;
            border: solid 5px;
            height: 70vh;
            position: relative;
        }
        .commonVideo{
            height: 100% !important;
            width: 100% !important;
            display: flex;
            justify-content: center;
            align-content: center;
        }
        .successLogin{
            background-color: #12de00;
            padding: 10px 12px;
            color: white;
        }
        .converstionSection{
            background-color: #d6d6d6;
            border-radius: 10px;
            padding: 9px;
            height: 50vh;
        }
        .convDiv{
            height: 88%;
            width: 100%;
            overflow: auto;
            background-color: #ffb5b5;
            border-radius: 10px;
        }
        .convText{
            margin: 8px;
            background-color: white;
            padding: 5px 15px;
            border-radius: 10px;
        }
        .inputText{
            margin-top: 10px;
            position: relative;
        }
        .sendButton{
            position: absolute;
            left: 0px;
            top: 0px;
            border-radius: 70px;
        }
        @media (max-width: 767px) {
            .videoBox {
                height: 48vh;
            }
        }
    </style>

    @if($kind == 'teacher')
        <style>
            .studentDivVideo{
                background: green;
                height: 100px;
                border-radius: 10px;
                cursor: pointer;
                position: relative;
                display: flex;
                justify-content: center;
                align-content: center;
            }
            .studentName{
                position: absolute;
                display: flex;
                top: 0px;
                right: 0px;
                border-radius: 10px;
                justify-content: center;
                align-items: center;
                color: white;
                width: 100%;
                height: 0%;
                transition: .3s;
                overflow: hidden;
                background: #000000b5;
            }
            .studentDivVideo:hover .studentName{
                height: 100%;
            }
            .teacherDivVideo{
                background: yellow;
                height: 40vh;
            }
            .studentSection{
                display: flex;
                flex-wrap: wrap;
            }
            .topStudent{
                margin-bottom: 11px;
                padding: 0px 5px;
            }

            .fileSection{
                background: white;
                border: solid gray 1px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
                border-radius: 10px;
            }
            .teacherVideo, .pdfSection{
                height: 100%;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                background: white;
                border-radius: 10px;
                border: solid lightgrey 1px;
            }
            .topSection{
                height: 50vh;
            }
        </style>
    @else
        <style>
            .mainStudentSection, .fileSection{
                height: 50vh;
                width: 100%;
                background: white;
                border: solid lightgrey 1px;
                border-radius: 15px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .sideSection{
                width: 100%;
                margin-top: 10px;
                height: 14vh;
                display: flex;
                justify-content: space-evenly;
                align-items: center;
            }
            .sideDiv{
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                background: white;
                border: solid 1px lightgray;
                width: 40%;
                border-radius: 10px;
            }
            .fileSection{
                margin-top: 10px;
                height: 24vh;
            }
            .converstionSection{
                height: 90vh;
            }
            .convDiv{
                height: 93%;
            }
            .youVideo{
                width: 100%;
                margin-top: 10px;
                height: 14vh;
                display: flex;
                justify-content: space-evenly;
                align-items: center;

            }
        </style>
    @endif
</head>
<body>

<h1>
    Hello {{$kind}}
</h1>

@if($kind == 'teacher')
    <div class="row topSection">
        <div class="col-6">
            <div class="row" style="height: 69%">
                <div class="col-6">
                    <div id="vid-thumb" class="teacherVideo"></div>
                </div>
                <div class="col-6">
                    <div id="my_pdf_viewer" class="pdfSection">
{{--                        <div id="canvas_container">--}}
{{--                            <canvas id="pdf_renderer"></canvas>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="row" style="height: 29%; margin-top: 1%">
                <div class="col-12 ">

                    <div class="fileSection">
                        File Section
                    </div>

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="converstionSection">
                <div class="convDiv">
                    <div class="convText">hello</div>
                    <div class="convText">kiavash</div>
                    <div class="convText">by by</div>
                    <div class="convText">loram ipson good by</div>
                    <div class="convText">hello</div>
                    <div class="convText">kiavash</div>
                    <div class="convText">by by</div>
                    <div class="convText">loram ipson good by</div>
                    <div class="convText">hello</div>
                    <div class="convText">kiavash</div>
                    <div class="convText">by by</div>
                    <div class="convText">loram ipson good by</div>
                    <div class="convText">hello</div>
                    <div class="convText">kiavash</div>
                    <div class="convText">by by</div>
                    <div class="convText">loram ipson good by</div>
                </div>
                <div class="inputText">
                    <input type="text" class="form-control" placeholder="پیام خود را اینحا وارد کنید" style="border-radius: 20px 10px 10px 20px;">
                    <button class="btn btn-success sendButton">ارسال</button>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="row studentSection">
        @for($i = 0; $i < 30; $i++)
            <div class="col-1 topStudent">
                <div id="student_{{$i}}" class="studentDivVideo">
                    <div class="studentName">
                        کیاوش زارع پور
                    </div>
                </div>
            </div>
        @endfor
    </div>


@else

    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="mainStudentSection">
                    <div id="teacherVideo" style="max-width: 100%; max-height: 100%;"></div>
                </div>
            </div>

            <div class="row">
                <div class="sideSection">
                    <div class="sideDiv">
                        <div id="vid-thumb" class="youVideo"></div>
                    </div>
                    <div class="sideDiv">
                        <div class="pdfDiv">
                            PDF
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="fileSection">
                    File
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="converstionSection">
                <div class="convDiv">
                    <div class="convText">hello</div>
                    <div class="convText">kiavash</div>
                    <div class="convText">by by</div>
                    <div class="convText">loram ipson good by</div>
                    <div class="convText">hello</div>
                    <div class="convText">kiavash</div>
                    <div class="convText">by by</div>
                    <div class="convText">loram ipson good by</div>
                    <div class="convText">hello</div>
                    <div class="convText">kiavash</div>
                    <div class="convText">by by</div>
                    <div class="convText">loram ipson good by</div>
                    <div class="convText">hello</div>
                    <div class="convText">kiavash</div>
                    <div class="convText">by by</div>
                    <div class="convText">loram ipson good by</div>
                </div>
                <div class="inputText">
                    <input type="text" class="form-control" placeholder="پیام خود را اینحا وارد کنید" style="border-radius: 20px 10px 10px 20px;">
                    <button class="btn btn-success sendButton">ارسال</button>
                </div>
            </div>
        </div>
    </div>

@endif


</body>

<script>
    let kind = '{{$kind}}';
    let name = '{{$name}}';
    let teacherId = 'teacher';

    let webrtcTurnServer = '{{url("webrtcTurn")}}'
    function detectMob() {
        const toMatch = [
            /Android/i,
            /webOS/i,
            /iPhone/i,
            /iPad/i,
            /iPod/i,
            /BlackBerry/i,
            /Windows Phone/i
        ];

        return toMatch.some((toMatchItem) => {
            return navigator.userAgent.match(toMatchItem);
        });
    }
</script>

<script src="https://cdn.pubnub.com/pubnub.min.js"></script>

<script src="{{URL::asset('webrtc/js/rtc-controller.js')}}"></script>

<script !src="">
    (function () {
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// WebRTC Simple Calling API + Mobile
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        var PHONE = window.PHONE = function (config) {
            var PHONE = function () {
            };
            var pubnub = PUBNUB(config);
            var pubkey = config.publish_key || 'demo';
            var snapper = function () {
                return ' '
            }
            var subkey = config.subscribe_key || 'demo';
            var sessionid = PUBNUB.uuid();
            var mystream = null;
            var myvideo = document.createElement('video');
            var myconnection = false;
            var mediaconf = config.media || {audio: true, video: true};
            var conversations = {};
            var oneway = config.oneway || false
            var broadcast = config.broadcast || false;

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // RTC Peer Connection Session (one per call)
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            var PeerConnection =
                window.RTCPeerConnection ||
                window.mozRTCPeerConnection ||
                window.webkitRTCPeerConnection;

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // ICE (many route options per call)
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            var IceCandidate =
                window.mozRTCIceCandidate ||
                window.RTCIceCandidate;

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Media Session Description (offer and answer per call)
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            var SessionDescription =
                window.RTCSessionDescription ||
                window.mozRTCSessionDescription ||
                window.webkitRTCSessionDescription;

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Local Microphone and Camera Media (one per device)
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            navigator.getUserMedia =
                navigator.getUserMedia ||
                navigator.webkitGetUserMedia ||
                navigator.mozGetUserMedia ||
                navigator.msGetUserMedia;

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // STUN Server List Configuration (public STUN list)
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            var configes = {!! $urls !!};
            var rtcconfig = {
                iceServers: [
                    {url: "stun:stun.l.google.com:19302"},
                    {url: "stun:stun1.l.google.com:19302"},
                    {url: "stun:stun2.l.google.com:19302"},
                    {url: "stun:stun3.l.google.com:19302"},
                    {url: "stun:stun4.l.google.com:19302"},
                    {url: "stun:23.21.150.121"},
                    {url: "stun:stun01.sipphone.com"},
                    {url: "stun:stun.ekiga.net"},
                    {url: "stun:stun.fwdnet.net"},
                    {url: "stun:stun.ideasip.com"},
                    {url: "stun:stun.iptel.org"},
                    {url: "stun:stun.rixtelecom.se"},
                    {url: "stun:stun.schlund.de"},
                    {url: "stun:stunserver.org"},
                    {url: "stun:stun.softjoys.com"},
                    {url: "stun:stun.voiparound.com"},
                    {url: "stun:stun.voipbuster.com"},
                    {url: "stun:stun.voipstunt.com"},
                    {url: "stun:stun.voxgratia.org"},
                    {url: "stun:stun.xten.com"},
                    ]
            } ;

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Custom STUN Options
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // add_servers(configes.v.iceServers);
            function add_servers(servers) {

                if (servers.constructor === Array)
                    [].unshift.apply(rtcconfig.iceServers, servers);
                else rtcconfig.iceServers.unshift(servers);
            }

            if ('servers' in config) add_servers(config.servers);

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // PHONE Events
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            var messagecb = function () {
            };
            var readycb = function () {
            };
            var unablecb = function () {
            };
            var debugcb = function () {
            };
            var connectcb = function () {
            };
            var disconnectcb = function () {
            };
            var reconnectcb = function () {
            };
            var callstatuscb = function () {
            };
            var receivercb = function () {
            };

            PHONE.message = function (cb) {
                messagecb = cb
            };
            PHONE.ready = function (cb) {
                readycb = cb
            };
            PHONE.unable = function (cb) {
                unablecb = cb
            };
            PHONE.callstatus = function (cb) {
                callstatuscb = cb
            };
            PHONE.debug = function (cb) {
                debugcb = cb
            };
            PHONE.connect = function (cb) {
                connectcb = cb
            };
            PHONE.disconnect = function (cb) {
                disconnectcb = cb
            };
            PHONE.reconnect = function (cb) {
                reconnectcb = cb
            };
            PHONE.receive = function (cb) {
                receivercb = cb
            };

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Add/Get Conversation - Creates a new PC or Returns Existing PC
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function get_conversation(number, isAnswer) {
                var talk = conversations[number] || (function (number) {
                    var talk = {
                        number: number,
                        status: '',
                        image: document.createElement('img'),
                        started: +new Date,
                        imgset: false,
                        imgsent: 0,
                        pc: new PeerConnection(rtcconfig),
                        closed: false,
                        usermsg: function (val1, val2) {
                        },
                        thumb: null,
                        connect: function () {
                        },
                        end: function () {
                        }
                    };

                    // Setup Event Methods
                    talk.pc.onaddstream = config.onaddstream || onaddstream;
                    talk.pc.onicecandidate = onicecandidate;
                    talk.pc.number = number;

                    // Disconnect and Hangup
                    talk.hangup = function (signal) {
                        if (talk.closed) return;

                        talk.closed = true;
                        talk.imgset = false;
                        clearInterval(talk.snapi);

                        if (signal !== false) transmit(number, {hangup: true});

                        talk.end(talk);
                        talk.pc.close();
                        close_conversation(number);
                    };

                    // Sending Messages
                    talk.send = function (message) {
                        transmit(number, {usermsg: message});
                    };

                    // Sending Stanpshots
                    talk.snap = function () {
                        var pic = snapper();
                        if (talk.closed) clearInterval(talk.snapi);
                        transmit(number, {thumbnail: pic});
                        var img = document.createElement('img');
                        img.src = pic;
                        return {data: pic, image: img};
                    };
                    talk.snapi = setInterval(function () {
                        if (talk.imgsent++ > 5) return clearInterval(talk.snapi);
                        talk.snap();
                    }, 1500);
                    talk.snap();

                    // Nice Accessor to Update Disconnect & Establis CBs
                    talk.thumbnail = function (cb) {
                        talk.thumb = cb;
                        return talk
                    };
                    talk.ended = function (cb) {
                        talk.end = cb;
                        return talk
                    };
                    talk.connected = function (cb) {
                        talk.connect = cb;
                        return talk
                    };
                    talk.message = function (cb) {
                        talk.usermsg = cb;
                        return talk
                    };

                    // Add Local Media Streams Audio Video Mic Camera
                    //  If answering and oneway streaming, do not attach stream
                    if (!isAnswer || !oneway) talk.pc.addStream(mystream);   // Add null here on the receiving end of streaming to go one-way.

                    // Notify of Call Status
                    update_conversation(talk, 'connecting');

                    // Return Brand New Talk Reference
                    conversations[number] = talk;
                    return talk;
                })(number);

                // Return Existing or New Reference to Caller
                return talk;
            }

            function setMsg(msg) {
                showReciveMessage(msg)
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Remove Conversation
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function close_conversation(number) {
                conversations[number] = null;
                delete conversations[number];
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Notify of Call Status Events
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function update_conversation(talk, status) {
                talk.status = status;
                callstatuscb(talk);
                return talk;
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Get Number
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            PHONE.number = function () {
                return config.number;
            };

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Get Call History
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            PHONE.history = function (settings) {
                pubnub.history({
                    channel: settings[number],
                    callback: function (call_history) {
                        settings['history'](call_history[0]);
                    }
                })
            };

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Make Call - Create new PeerConnection
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            PHONE.dial = function (number, servers) {
                console.log('PHONE.dial');
                console.log(number);
                console.log(servers);
                //if (!!servers) add_servers(servers);
                var talk = get_conversation(number);
                var pc = talk.pc;

                // Prevent Repeat Calls
                if (talk.dialed) return false;
                talk.dialed = true;

                // Send SDP Offer (Call)
                pc.createOffer(function (offer) {
                    transmit(number, {hangup: true});
                    transmit(number, offer, 2);
                    pc.setLocalDescription(offer, debugcb, debugcb);
                }, debugcb);

                // Return Session Reference
                return talk;
            };

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Send Image Snap - Send Image Snap to All Calls or a Specific Call
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            PHONE.snap = function (message, number) {
                if (number) return get_conversation(number).snap(message);
                var pic = {};
                PUBNUB.each(conversations, function (number, talk) {
                    pic = talk.snap();
                });
                return pic;
            };

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Send Message - Send Message to All Calls or a Specific Call
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            PHONE.send = function (message, number) {
                if (number) return get_conversation(number).send(message);
                PUBNUB.each(conversations, function (number, talk) {
                    talk.send(message);
                });
            };

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // End Call - Close All Calls or a Specific Call
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            PHONE.hangup = function (number) {
                if (number) return get_conversation(number).hangup();
                PUBNUB.each(conversations, function (number, talk) {
                    talk.hangup();
                });
            };

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Expose local stream and pubnub object
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            PHONE.mystream = mystream;
            PHONE.pubnub = pubnub;
            PHONE.oneway = oneway;

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Auto-hangup on Leave
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            PUBNUB.bind('unload,beforeunload', window, function () {
                if (PHONE.goodbye) return true;
                PHONE.goodbye = true;

                PUBNUB.each(conversations, function (number, talk) {
                    var mynumber = config.number;
                    var packet = {hangup: true};
                    var message = {packet: packet, id: sessionid, number: mynumber};
                    var client = new XMLHttpRequest();
                    var url = 'http://pubsub.pubnub.com/publish/'
                        + pubkey + '/'
                        + subkey + '/0/'
                        + number + '/0/'
                        + JSON.stringify(message);

                    client.open('GET', url, false);
                    client.send();
                    talk.hangup();
                });

                return true;
            });

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Grab Local Video Snapshot
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function snapshots_setup(stream) {
                var video = myvideo;
                var canvas = document.createElement('canvas');
                var context = canvas.getContext("2d");
                var snap = {width: 240, height: 180};

                // Video Settings
                video.width = snap.width;
                video.height = snap.height;
                video.srcObject = stream;
                video.volume = 0.0;
                video.play();

                // Canvas Settings
                canvas.width = snap.width;
                canvas.height = snap.height;

                // Capture Local Pic
                snapper = function () {
                    try {
                        context.drawImage(video, 0, 0, snap.width, snap.height);
                    } catch (e) {
                    }
                    return canvas.toDataURL('image/jpeg', 0.30);
                };

                PHONE.video = video;
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Visually Display New Stream
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function onaddstream(obj) {
                var vid = document.createElement('video');
                var stream = obj.stream;
                var number = (obj.srcElement || obj.target).number;
                var talk = get_conversation(number);

                vid.setAttribute('autoplay', 'autoplay');
                vid.setAttribute('data-number', number);
                vid.srcObject = stream;

                talk.video = vid;
                talk.connect(talk);
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // On ICE Route Candidate Discovery
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function onicecandidate(event) {
                if (!event.candidate) return;
                transmit(this.number, event.candidate);
            };

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Listen For New Incoming Calls
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function subscribe() {
                console.log("Subscribed to " + config.number);
                pubnub.subscribe({
                    restore: true,
                    channel: config.number,
                    message: receive,
                    disconnect: disconnectcb,
                    reconnect: reconnectcb,
                    connect: function () {
                        onready(true)
                    }
                });
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // When Ready to Receive Calls
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function onready(subscribed) {
                if (subscribed) myconnection = true;
                if (!((mystream || oneway) && myconnection)) return;
                connectcb();
                readycb();
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Prepare Local Media Camera and Mic
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function getusermedia() { //Do something if not requesting any media?
                if (oneway && !broadcast) {

                    if (!PeerConnection) {
                        return unablecb();
                    }
                    onready();
                    subscribe();
                    return;
                }
                navigator.getUserMedia(mediaconf, function (stream) {
                    if (!stream) return unablecb(stream);
                    mystream = stream;
                    phone.mystream = stream;
                    snapshots_setup(stream);
                    onready();
                    subscribe();
                }, function (info) {
                    debugcb(info);
                    return unablecb(info);
                });
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Send SDP Call Offers/Answers and ICE Candidates to Peer
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function transmit(phone, packet, times, time) {
                console.log('transmit');
                console.log(phone, packet, times, time);
                if (!packet) return;
                var number = config.number;
                var message = {packet: packet, id: sessionid, number: number};
                debugcb(message);
                pubnub.publish({channel: phone, message: message});

                // Recurse if Requested for
                if (!times) return;
                time = time || 1;
                if (time++ >= times) return;
                setTimeout(function () {
                    transmit(phone, packet, times, time);
                }, 150);
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // SDP Offers & ICE Candidates Receivable Processing
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function receive(message) {
                // Debug Callback of Data to Watch
                debugcb(message);

                // Get Call Reference
                var talk = get_conversation(message.number, true);

                // Ignore if Closed
                if (talk.closed) return;
                // User Message

                if (message.packet.usermsg) {
                    messagecb(talk, message.packet.usermsg);
                    setMsg(message.packet.usermsg);
                    return talk.usermsg(talk, message.packet.usermsg);
                }

                // Thumbnail Preview Image
                if (message.packet.thumbnail) return create_thumbnail(message);

                // If Hangup Request
                if (message.packet.hangup) return talk.hangup(false);

                // If Peer Calling Inbound (Incoming) - Can determine stream + receive here.
                if (message.packet.sdp && !talk.received) {
                    talk.received = true;
                    receivercb(talk);
                }

                // Update Peer Connection with SDP Offer or ICE Routes
                if (message.packet.sdp) add_sdp_offer(message);
                else add_ice_route(message);
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Create Remote Friend Thumbnail
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function create_thumbnail(message) {
                var talk = get_conversation(message.number);
                talk.image.src = message.packet.thumbnail;

                // Call only once
                if (!talk.thumb) return;
                if (!talk.imgset) talk.thumb(talk);
                talk.imgset = true;
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Add SDP Offer/Answers
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function add_sdp_offer(message) {
                // Get Call Reference
                var talk = get_conversation(message.number, message.packet.type == 'answer');
                var pc = talk.pc;
                var type = message.packet.type == 'offer' ? 'offer' : 'answer';

                // Deduplicate SDP Offerings/Answers
                if (type in talk) return;
                talk[type] = true;
                talk.dialed = true;

                // Notify of Call Status
                update_conversation(talk, 'routing');

                // Add SDP Offer/Answer
                pc.setRemoteDescription(
                    new SessionDescription(message.packet), function () {
                        // Set Connected Status
                        update_conversation(talk, 'connected');

                        // Call Online and Ready
                        if (pc.remoteDescription.type != 'offer') return;

                        // Create Answer to Call
                        pc.createAnswer(function (answer) {
                            pc.setLocalDescription(answer, debugcb, debugcb);
                            transmit(message.number, answer, 2);
                        }, debugcb);
                    }, debugcb
                );
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Add ICE Candidate Routes
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            function add_ice_route(message) {
                // Leave if Non-good ICE Packet
                if (!message.packet) return;
                if (!message.packet.candidate) return;

                // Get Call Reference
                var talk = get_conversation(message.number);
                var pc = talk.pc;

                // Add ICE Candidate Routes
                pc.addIceCandidate(
                    new IceCandidate(message.packet),
                    debugcb,
                    debugcb
                );
            }

            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            // Main - Request Camera and Mic
            // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
            getusermedia()

            return PHONE;
        };
    })();

</script>

<script type="text/javascript">

    let studentVideo = [];
    var vid_thumb = document.getElementById("vid-thumb");
    var vidCount = 0;
    var numberPhone;
    var brodcastVar;
    var onewayVar;

    if(kind == 'student'){
        broadcastvar = false;
        onewayVar = true;
    }
    else{
        broadcastvar = false;
        onewayVar = false;
    }

    function login(_name) {
        var phone = window.phone = PHONE({
            number: _name || "Anonymous", // listen on username line else Anonymous
            publish_key: 'pub-c-561a7378-fa06-4c50-a331-5c0056d0163c', // Your Pub Key
            subscribe_key: 'sub-c-17b7db8a-3915-11e4-9868-02ee2ddab7fe', // Your Sub Key
            brodcast: broadcastvar,
            oneway: onewayVar
        });
        var ctrl = window.ctrl = CONTROLLER(phone);
        ctrl.ready(function () {
            ctrl.addLocalStream(vid_thumb);
            if(kind ==  'student')
                makeCall(teacherId);
        });
        ctrl.receive(function (session) {
            console.log('session');
            session.connected(function (session) {
                if(kind == 'student' && session.number == 'teacher'){
                    $('#teacherVideo').append(session.video);
                }
                else {
                    index = studentVideo.length;
                    $('#student_' + index).append(session.video);
                    studentVideo.push(session);
                    vidCount++;
                }
            });
            session.ended(function (session) {
                ctrl.getVideoElement(session.number).remove();
                vidCount--;
            });

        });
        ctrl.videoToggled(function (session, isEnabled) {
            ctrl.getVideoElement(session.number).toggle(isEnabled);
        });
        ctrl.audioToggled(function (session, isEnabled) {
            ctrl.getVideoElement(session.number).css("opacity", isEnabled ? 1 : 0.75);
        });
        return false;
    }

    function makeCall(_teacherId) {
        if (!window.phone) alert("Login First!");
        var num = _teacherId;
        if (phone.number() == num) return false; // No calling yourself!
        ctrl.isOnline(num, function (isOn) {
            if (isOn) {
                ctrl.dial(num);
                numberPhone = num;
            } else alert("User if Offline");
        });
        return false;
    }

    function mute() {
        var audio = ctrl.toggleAudio();
        if (!audio) $("#mute").html("Unmute");
        else $("#mute").html("Mute");
    }

    function end() {
        ctrl.hangup();
    }

    function pause() {
        var video = ctrl.toggleVideo();
        if (!video) $('#pause').html('Unpause');
        else $('#pause').html('Pause');
    }

    function getVideo(number) {
        return $('*[data-number="' + number + '"]');
    }

    function errWrap(fxn, form) {
        try {
            return fxn(form);
        } catch (err) {
            alert("WebRTC is currently only supported by Chrome, Opera, and Firefox");
            return false;
        }
    }

    function sendMsg(_msg) {
        ctrl.send(_msg);
    }

    function showReciveMessage(_msg) {
        _msg = JSON.parse(_msg);
        mapToOutPut(_msg)
    }


    login(name);
</script>

</html>