<link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/shareBox.css')}}'/>

<span id="share_box">

    <a target="_blank" style="" class="link" {{($config->facebookNoFollow) ? 'rel="nofollow"' : ''}}
    href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}">
        <div style=""></div>
    </a>
    <a target="_blank" class="link" {{($config->telegramNoFollow) ? 'rel="nofollow"' : ''}}
    href="https://telegram.me/share/url?url={{Request::url()}}">
        <div style=""></div>
    </a>
    <a target="_blank" class="link" {{($config->googlePlusNoFollow) ? 'rel="nofollow"' : ''}}
    href="https://plus.google.com/share?url={{str_replace('%20', '', Request::url())}}">
        <div></div>
    </a>
    <a target="_blank" class="link" {{($config->twitterNoFollow) ? 'rel="nofollow"' : ''}} href="https://twitter.com/home?status={{Request::url()}}">
        <div></div>
    </a>
    <span>اشتراک گذاری</span>
</span>
<div class="header heading fr" id="lastDivOfShareBox">
    <a class="link" onclick="startHelp()">
        <div></div>
    </a>
    <div id="share_pic"></div>
</div>