<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
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

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <label for="cameraSelect">Change Camera:</label>
            <select name="cameraSelect" id="cameraSelect" class="form-control"></select>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="form-group">
                    <lable for="userName">UserName</lable>
                    <input type="text" class="form-control" id="userName">
                </div>
            </div>
            <div class="row">
                <div id="thumbVideo" class="videoShow"></div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="form-group">
                    <lable for="callName">CallNumber</lable>
                    <input type="text" class="form-control" id="callName">
                </div>
            </div>
            <div class="row">
                <div id="resultVideo" class="videoShow"></div>
            </div>
        </div>
    </div>
</div>


</body>
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>

<script>
    let cameras = [];
    let nowShowStream;

    const constraints = {
        'video': true,
        'audio': true
    }
    // navigator.mediaDevices.getUserMedia(constraints)
    //     .then(stream => {
    //         nowShowStream = stream;
    //         createTumbVideo();
    //     })
    //     .catch(error => {
    //         console.error('Error accessing media devices.', error);
    //     });

    function getConnectedDevices(type, callback) {
        navigator.mediaDevices.enumerateDevices()
            .then(devices => {
                const filtered = devices.filter(device => device.kind === type);
                cameras = filtered;
                callback(filtered);
            });
    }

    getConnectedDevices('videoinput', cameras => {
        cameras.forEach(item => {
            $('#cameraSelect').append('<option value="' + item.deviceId + '">' + item.deviceId + '</option>')
        })
    });

    function createTumbVideo(){
        videoTag = '<video id="localVideo" autoplay playsinline controls="false"/>';
        $('#thumbVideo').append(videoTag);

        const videoElement = document.querySelector('video#localVideo');
        videoElement.srcObject = nowShowStream;
    }
</script>

<script>
    const configuration = {
        'iceServers': [
            {'urls': 'stun:stun.l.google.com:19302'}
        ]
    };

    localPeerConnection = new RTCPeerConnection(configuration);
    localPeerConnection.addEventListener('icecandidate', handleConnection);
    // localPeerConnection.addEventListener(
    //     'iceconnectionstatechange', handleConnectionChange);

    navigator.mediaDevices.getUserMedia(mediaStreamConstraints).
    then(gotLocalMediaStream).
    catch(handleLocalMediaStreamError);

    function gotLocalMediaStream(mediaStream) {
        localVideo.srcObject = mediaStream;
        localStream = mediaStream;
        trace('Received local stream.');
        callButton.disabled = false;  // Enable call button.
    }

    localPeerConnection.addStream(localStream);
    trace('Added local stream to localPeerConnection.');

    function handleConnection(event) {
        const peerConnection = event.target;
        const iceCandidate = event.candidate;

        if (iceCandidate) {
            const newIceCandidate = new RTCIceCandidate(iceCandidate);
            const otherPeer = getOtherPeer(peerConnection);

            otherPeer.addIceCandidate(newIceCandidate)
                .then(() => {
                    handleConnectionSuccess(peerConnection);
                }).catch((error) => {
                handleConnectionFailure(peerConnection, error);
            });

            trace(`${getPeerName(peerConnection)} ICE candidate:\n` +
                `${event.candidate.candidate}.`);
        }
    }

    trace('localPeerConnection createOffer start.');
    localPeerConnection.createOffer(offerOptions)
        .then(createdOffer).catch(setSessionDescriptionError);

    // Logs offer creation and sets peer connection session descriptions.
    function createdOffer(description) {
        trace(`Offer from localPeerConnection:\n${description.sdp}`);

        trace('localPeerConnection setLocalDescription start.');
        localPeerConnection.setLocalDescription(description)
            .then(() => {
                setLocalDescriptionSuccess(localPeerConnection);
            }).catch(setSessionDescriptionError);

        trace('remotePeerConnection setRemoteDescription start.');
        remotePeerConnection.setRemoteDescription(description)
            .then(() => {
                setRemoteDescriptionSuccess(remotePeerConnection);
            }).catch(setSessionDescriptionError);

        trace('remotePeerConnection createAnswer start.');
        remotePeerConnection.createAnswer()
            .then(createdAnswer)
            .catch(setSessionDescriptionError);
    }

    // Logs answer to offer creation and sets peer connection session descriptions.
    function createdAnswer(description) {
        trace(`Answer from remotePeerConnection:\n${description.sdp}.`);

        trace('remotePeerConnection setLocalDescription start.');
        remotePeerConnection.setLocalDescription(description)
            .then(() => {
                setLocalDescriptionSuccess(remotePeerConnection);
            }).catch(setSessionDescriptionError);

        trace('localPeerConnection setRemoteDescription start.');
        localPeerConnection.setRemoteDescription(description)
            .then(() => {
                setRemoteDescriptionSuccess(localPeerConnection);
            }).catch(setSessionDescriptionError);
    }

</script>

<script !src="">
    class SignalingChannel{

        constructor(_name) {
            this.id = _name;
        }

    }
</script>

</html>