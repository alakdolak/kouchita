<span id="share_box"
      style="display: none; width: 22%;height: 60px;background: #FFF;position: absolute;left: 7%;z-index: 10;box-shadow: rgb(136, 136, 136) 1px 4px 8px;padding: 10px;">
    <a target="_blank" style="cursor: pointer; float: left;margin-left: 5px;" class="link"
       {{--{{($config->facebookNoFollow) ? 'rel="nofollow"' : ''}}--}}
    href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}">
        <div style="background-image: url('{{URL::asset('images') . '/share.png'}}');width: 30px;height: 30px;background-size: 30px;background-position:  0 0;background-repeat:  no-repeat;display: inline-block;"></div>
    </a>
    <a target="_blank" style="cursor: pointer; float: left;margin-left: 5px;" class="link"
       {{--{{($config->telegramNoFollow) ? 'rel="nofollow"' : ''}}--}}
    href="https://telegram.me/share/url?url={{Request::url()}}">
        <div style="background-image: url('{{URL::asset('images') . '/share.png'}}');width: 30px;height: 30px;background-size: 30px;background-position:  0 -60px;background-repeat:  no-repeat;display: inline-block;border-radius: 4px;"></div>
    </a>
    <a target="_blank" style="cursor: pointer; float: left;margin-left: 5px;" class="link"
       {{--{{($config->googlePlusNoFollow) ? 'rel="nofollow"' : ''}}--}}
    href="https://plus.google.com/share?url={{str_replace('%20', '', Request::url())}}">
        <div style="background-image: url('{{URL::asset('images') . '/share.png'}}');width: 30px;height: 30px;background-size: 30px;background-position:  0 -30px;background-repeat:  no-repeat;display: inline-block;"></div>
    </a>
    <a target="_blank" style="cursor: pointer; float: left;margin-left: 5px;" class="link"
       {{--{{($config->twitterNoFollow) ? 'rel="nofollow"' : ''}}--}}
    href="https://twitter.com/home?status={{Request::url()}}">
        <div style="background-image: url('{{URL::asset('images') . '/share.png'}}');width: 30px;height: 30px;background-size: 30px;background-position:  0 -90px;background-repeat:  no-repeat;display: inline-block;"></div>
    </a>
    <span style="cursor: pointer; float: right;margin-left: 5px;line-height: 28px;font-size: 14px;">اشتراک گذاری</span>
</span>
<div class="header heading fr">
    <a style="cursor: pointer; float: left;" class="link" onclick="startHelp()">
        <div style="background-size: 28px;background-position:  0 -29px;width: 28px;height:  28px;background-image: url('{{URL::asset('images') . '/help_share.png'}}');background-repeat:  no-repeat;"></div>
    </a>
    <div id="share_pic"
         style="cursor: pointer;background-size: 28px;background-position:  0 0;width: 28px;height:  28px;background-image: url('{{URL::asset('images') . '/help_share.png'}}');background-repeat:  no-repeat;float: right;margin-left: 5px;"></div>
</div>