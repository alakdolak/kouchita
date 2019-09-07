<?php $placeMode = "ticket";
$state = 'اصفهان';
$kindPlaceId = 10; ?>
        <!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/gardeshname.min.css?v=1.1')}}"/>

    <title>{{$post->title}} - شازده مسافر</title>

    <meta name="description" content="{{$post->description}}"/>
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{$post->title}}" />
    <meta property="og:description" content="{{$post->description}}" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:site_name" content="شازده مسافر" />

    @for($i = 0; $i < count($tags); $i++)
        <meta property="article:tag" content="{{$tags[$i]}}" />
    @endfor

    <meta property="article:section" content="" />
    <meta property="article:published_time" content="{{$post->created_at}}" />
    <meta property="article:modified_time" content="{{$post->updated_at}}" />
    <meta property="og:updated_time" content="{{$post->updated_at}}" />
    <meta property="og:image" content="{{URL::asset('posts/' . $post->pic)}}" />
    <meta property="og:image:secure_url" content="{{URL::asset('posts/' . $post->pic)}}" />
    <meta property="og:image:width" content="770" />
    <meta property="og:image:height" content="480" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="{{$post->description}}" />
    <meta name="twitter:title" content="{{$post->title}}" />
    <meta name="twitter:site" content="@shazdemosafer" />
    <meta name="twitter:image" content="{{URL::asset('posts/' . $post->pic)}}" />
    <meta name="twitter:creator" content="@shazdemosafer" />
    <script type='application/ld+json'>{"@context":"https:\/\/schema.org","@type":"Organization","url":"https:\/\/gardeshname.shazdemosafer.com\/","sameAs":["https:\/\/www.instagram.com\/shazdemosafer\/","https:\/\/www.youtube.com\/watch?v=lU7PS3FdGoM","https:\/\/www.pinterest.com\/shazdemosafer\/","https:\/\/twitter.com\/shazdemosafer"],"@id":"https:\/\/gardeshname.shazdemosafer.com\/#organization","name":"shazdemosafer","logo":""}</script>
    <!-- / Yoast SEO plugin. -->


    <style id='iranomag-style-inline-css' type='text/css'>

        .user_likes {
            cursor: pointer;
        }

        .user_dislikes {
            cursor: pointer;
        }

        div, p, h1, h2, h3, h4, h5, h6, span, a {
            direction: rtl !important;
            text-align: right
        }

        a {color:#298bca;}a:hover,.im-topnav.dark a:hover, .im-topnav.dark ul > li > a:hover,.im-topnav.light a:hover, .im-topnav.light ul > li > a:hover,.im-navigation.dark a:hover, .im-navigation.dark ul > li > a:hover,.im-navigation.light a:hover, .im-navigation.light ul > li > a:hover,.im-main-header.dark a:hover, .im-main-header.dark ul > li > a:hover,.im-main-header.light a:hover, .im-main-header.light ul > li > a:hover,.im-main-header.dark .im-header-links .top-menu ul li a:hover,.im-main-header.light .im-header-links .top-menu ul li a:hover,.im-top-footer.dark a:hover, .im-footer.dark ul > li > a:hover,.im-top-footer.light a:hover, .im-footer.light ul > li > a:hover,.im-navigation .primary-menu > ul > li > ul.sub-menu > li > a:hover,.iranomag-meta .im-meta-item a:hover,.im-entry-title a:hover,.widget_pop_btn a.active,.im-top-footer.dark .widget_impv_display_widget .widget_pop_btn a.active,.im-top-footer.light .widget_impv_display_widget .widget_pop_btn a.active,.im-widget-entry-header h4.im-widget-entry-title a:hover,.widget li .rsswidget:hover,.widget_recent_comments .recentcomments a:hover,.widget_tag_cloud .tagcloud a:hover,.im-top-footer.dark .widget_tag_cloud .tagcloud a:hover,.im-top-footer.light .widget_tag_cloud .tagcloud a:hover,.widget_meta ul li a:hover,.widget ul li a:hover,.im-top-footer.dark .widget ul li a:hover,.im-top-footer.light .widget ul li a:hover,.im-vc-video-large.light .im-entry-title a:hover,.mobile-menu li a:hover,.im-post-vote-item a:hover,.im-entry-pages .nav-before:hover, .im-entry-pages .nav-after:hover,.im-topnav .top-menu > ul > li > ul.sub-menu > li > a:hover,.im-404-search ul li a:hover,.im-post-download-item-exlink a:hover{color:#33aefd;}.bypostauthor .im-comment-box {background-color:rgba(51,174,253, 0.065);border-color:rgba(51,174,253, 0.25);}.bypostauthor .im-comment-box .im-comment-details {border-color:rgba(51,174,253, 0.2);}.review-line,.im-tag-title .fa,.im-404-box{background-color:#298bca;}input:hover, select:hover, textarea:hover,input:focus, select:focus, textarea:focus {border-color:#33aefd;box-shadow:rgba(41,139,202, 0.5) 0 0 5px;}input[type=submit] {background-color:#298bca;border-color:#2376ac;}input[type=submit]:hover, input[type=submit]:focus {background-color:#33aefd;border-color:#2b94d7;}.mega-menu-item-header .mega-menu-item-header-title a:hover {color:#33aefd!important;}#back-to-top {border-color:#298bca;color:#298bca;}#back-to-top:hover {border-color:#33aefd;color:#33aefd;}@media (max-width:768px) {#back-to-top {background-color:#298bca;}}.widget_categories .widget-head-bar {background-color:#298bca;}.widget_tag_cloud .tagcloud a:hover,.im-top-footer.dark .widget_tag_cloud .tagcloud a:hover {border-color:#33aefd;}.nav-links > a:hover {border-color:#33aefd;}.nav-links .current {background-color:#33aefd;border:1px solid #298bca;}.im-2col-featured {background-color:#33aefd;}.im-2col-featured:before {border-right-color:#1f6898;}.im-svg #im-bar,#review-avg-svg #review-avg-bar{stroke:#298bca;}.im-post-download {background-color:rgba(41,139,202, 0.075);border-color:rgba(41,139,202, 0.25);}.im-post-download-title {color:rgba(37,125,182, 0.9);}.im-post-download-list li .fa {background-color:#216fa2;}.im-post-download-item-title {color:rgba(33,111,162, 0.9);}.im-post-download-item-desc {color:rgba(33,111,162, 0.75);}.im-post-download-item-exlink a {color:rgba(45,153,222, 0.75);}.im-entry-content th {background-color:#298bca;border-color:#257db6;}.im-entry-content tr:hover {background-color:rgba(41,139,202, 0.05);}.im-catlink-color-3193,.im-catlink-color-3193:hover {background-color:#666;}.im-catlink-color-2079,.im-catlink-color-2079:hover {background-color:#666;}.im-catlink-color-6121,.im-catlink-color-6121:hover {background-color:#666;}.menu-item-category-61 > a:hover {color:#80cbc4!important;}.menu-item-category-61 .im_mega_menu_holder {border-color:#80cbc4!important;}.im-bar-61 {stroke:#80cbc4!important;}.im-catlink-color-61 {background-color:#80cbc4;}.widget-head-61 .widget-head-bar,.im-top-footer.dark .widget-head-61 .widget-head-bar {background-color:#80cbc4;}.carousel-61:hover .im-carousel-background:after {background-color:rgba(128,203,196,0.65);}.carousel-61:hover .im-carousel-entry {background:linear-gradient(to top, rgba(128,203,196,0.95), transparent);}.content-block-1:hover .block-61 {background:linear-gradient(to right, rgb(96,152,147), rgb(128,203,196), transparent);}.content-block-2:hover .block-61 {background:linear-gradient(to right, transparent, rgb(128,203,196), rgb(96,152,147));}@media (max-width:768px) {.content-block:hover .block-61 {background:rgb(128,203,196);}}.im-archive-61 {border-color:#80cbc4;}.im-catlink-color-1238,.im-catlink-color-1238:hover {background-color:#666;}.im-catlink-color-1237,.im-catlink-color-1237:hover {background-color:#666;}.im-catlink-color-7010,.im-catlink-color-7010:hover {background-color:#666;}.im-catlink-color-6805,.im-catlink-color-6805:hover {background-color:#666;}.im-catlink-color-54,.im-catlink-color-54:hover {background-color:#666;}.menu-item-category-554 > a:hover {color:#c62828!important;}.menu-item-category-554 .im_mega_menu_holder {border-color:#c62828!important;}.im-bar-554 {stroke:#c62828!important;}.im-catlink-color-554 {background-color:#c62828;}.widget-head-554 .widget-head-bar,.im-top-footer.dark .widget-head-554 .widget-head-bar {background-color:#c62828;}.carousel-554:hover .im-carousel-background:after {background-color:rgba(198,40,40,0.65);}.carousel-554:hover .im-carousel-entry {background:linear-gradient(to top, rgba(198,40,40,0.95), transparent);}.content-block-1:hover .block-554 {background:linear-gradient(to right, rgb(149,30,30), rgb(198,40,40), transparent);}.content-block-2:hover .block-554 {background:linear-gradient(to right, transparent, rgb(198,40,40), rgb(149,30,30));}@media (max-width:768px) {.content-block:hover .block-554 {background:rgb(198,40,40);}}.im-archive-554 {border-color:#c62828;}.im-catlink-color-1908,.im-catlink-color-1908:hover {background-color:#666;}.im-catlink-color-5810,.im-catlink-color-5810:hover {background-color:#666;}.im-catlink-color-7017,.im-catlink-color-7017:hover {background-color:#666;}.im-catlink-color-3167,.im-catlink-color-3167:hover {background-color:#666;}.im-catlink-color-1111,.im-catlink-color-1111:hover {background-color:#666;}.im-catlink-color-2073,.im-catlink-color-2073:hover {background-color:#666;}.im-catlink-color-2076,.im-catlink-color-2076:hover {background-color:#666;}.im-catlink-color-2075,.im-catlink-color-2075:hover {background-color:#666;}.im-catlink-color-851,.im-catlink-color-851:hover {background-color:#666;}.im-catlink-color-982,.im-catlink-color-982:hover {background-color:#666;}.im-catlink-color-1635,.im-catlink-color-1635:hover {background-color:#666;}.im-catlink-color-1636,.im-catlink-color-1636:hover {background-color:#666;}.im-catlink-color-993,.im-catlink-color-993:hover {background-color:#666;}.im-catlink-color-1637,.im-catlink-color-1637:hover {background-color:#666;}.im-catlink-color-2070,.im-catlink-color-2070:hover {background-color:#666;}.im-catlink-color-1436,.im-catlink-color-1436:hover {background-color:#666;}.im-catlink-color-2074,.im-catlink-color-2074:hover {background-color:#666;}.im-catlink-color-1206,.im-catlink-color-1206:hover {background-color:#666;}.im-catlink-color-940,.im-catlink-color-940:hover {background-color:#666;}.im-catlink-color-1322,.im-catlink-color-1322:hover {background-color:#666;}.im-catlink-color-2072,.im-catlink-color-2072:hover {background-color:#666;}.im-catlink-color-1233,.im-catlink-color-1233:hover {background-color:#666;}.im-catlink-color-791,.im-catlink-color-791:hover {background-color:#666;}.im-catlink-color-2069,.im-catlink-color-2069:hover {background-color:#666;}.im-catlink-color-2077,.im-catlink-color-2077:hover {background-color:#666;}.im-catlink-color-2067,.im-catlink-color-2067:hover {background-color:#666;}.im-catlink-color-2068,.im-catlink-color-2068:hover {background-color:#666;}.im-catlink-color-1638,.im-catlink-color-1638:hover {background-color:#666;}.im-catlink-color-2245,.im-catlink-color-2245:hover {background-color:#666;}.im-catlink-color-2071,.im-catlink-color-2071:hover {background-color:#666;}.im-catlink-color-814,.im-catlink-color-814:hover {background-color:#666;}.menu-item-category-171 > a:hover {color:#a1887f!important;}.menu-item-category-171 .im_mega_menu_holder {border-color:#a1887f!important;}.im-bar-171 {stroke:#a1887f!important;}.im-catlink-color-171 {background-color:#a1887f;}.widget-head-171 .widget-head-bar,.im-top-footer.dark .widget-head-171 .widget-head-bar {background-color:#a1887f;}.carousel-171:hover .im-carousel-background:after {background-color:rgba(161,136,127,0.65);}.carousel-171:hover .im-carousel-entry {background:linear-gradient(to top, rgba(161,136,127,0.95), transparent);}.content-block-1:hover .block-171 {background:linear-gradient(to right, rgb(121,102,95), rgb(161,136,127), transparent);}.content-block-2:hover .block-171 {background:linear-gradient(to right, transparent, rgb(161,136,127), rgb(121,102,95));}@media (max-width:768px) {.content-block:hover .block-171 {background:rgb(161,136,127);}}.im-archive-171 {border-color:#a1887f;}.menu-item-category-144 > a:hover {color:#ffca28!important;}.menu-item-category-144 .im_mega_menu_holder {border-color:#ffca28!important;}.im-bar-144 {stroke:#ffca28!important;}.im-catlink-color-144 {background-color:#ffca28;}.widget-head-144 .widget-head-bar,.im-top-footer.dark .widget-head-144 .widget-head-bar {background-color:#ffca28;}.carousel-144:hover .im-carousel-background:after {background-color:rgba(255,202,40,0.65);}.carousel-144:hover .im-carousel-entry {background:linear-gradient(to top, rgba(255,202,40,0.95), transparent);}.content-block-1:hover .block-144 {background:linear-gradient(to right, rgb(191,152,30), rgb(255,202,40), transparent);}.content-block-2:hover .block-144 {background:linear-gradient(to right, transparent, rgb(255,202,40), rgb(191,152,30));}@media (max-width:768px) {.content-block:hover .block-144 {background:rgb(255,202,40);}}.im-archive-144 {border-color:#ffca28;}.im-catlink-color-6751,.im-catlink-color-6751:hover {background-color:#666;}.im-catlink-color-7077,.im-catlink-color-7077:hover {background-color:#666;}.im-catlink-color-63,.im-catlink-color-63:hover {background-color:#666;}.menu-item-category-45 > a:hover {color:#6d4c41!important;}.menu-item-category-45 .im_mega_menu_holder {border-color:#6d4c41!important;}.im-bar-45 {stroke:#6d4c41!important;}.im-catlink-color-45 {background-color:#6d4c41;}.widget-head-45 .widget-head-bar,.im-top-footer.dark .widget-head-45 .widget-head-bar {background-color:#6d4c41;}.carousel-45:hover .im-carousel-background:after {background-color:rgba(109,76,65,0.65);}.carousel-45:hover .im-carousel-entry {background:linear-gradient(to top, rgba(109,76,65,0.95), transparent);}.content-block-1:hover .block-45 {background:linear-gradient(to right, rgb(82,57,49), rgb(109,76,65), transparent);}.content-block-2:hover .block-45 {background:linear-gradient(to right, transparent, rgb(109,76,65), rgb(82,57,49));}@media (max-width:768px) {.content-block:hover .block-45 {background:rgb(109,76,65);}}.im-archive-45 {border-color:#6d4c41;}.menu-item-category-46 > a:hover {color:#512da8!important;}.menu-item-category-46 .im_mega_menu_holder {border-color:#512da8!important;}.im-bar-46 {stroke:#512da8!important;}.im-catlink-color-46 {background-color:#512da8;}.widget-head-46 .widget-head-bar,.im-top-footer.dark .widget-head-46 .widget-head-bar {background-color:#512da8;}.carousel-46:hover .im-carousel-background:after {background-color:rgba(81,45,168,0.65);}.carousel-46:hover .im-carousel-entry {background:linear-gradient(to top, rgba(81,45,168,0.95), transparent);}.content-block-1:hover .block-46 {background:linear-gradient(to right, rgb(61,34,126), rgb(81,45,168), transparent);}.content-block-2:hover .block-46 {background:linear-gradient(to right, transparent, rgb(81,45,168), rgb(61,34,126));}@media (max-width:768px) {.content-block:hover .block-46 {background:rgb(81,45,168);}}.im-archive-46 {border-color:#512da8;}.im-catlink-color-3174,.im-catlink-color-3174:hover {background-color:#666;}.menu-item-category-44 > a:hover {color:#cddc39!important;}.menu-item-category-44 .im_mega_menu_holder {border-color:#cddc39!important;}.im-bar-44 {stroke:#cddc39!important;}.im-catlink-color-44 {background-color:#cddc39;}.widget-head-44 .widget-head-bar,.im-top-footer.dark .widget-head-44 .widget-head-bar {background-color:#cddc39;}.carousel-44:hover .im-carousel-background:after {background-color:rgba(205,220,57,0.65);}.carousel-44:hover .im-carousel-entry {background:linear-gradient(to top, rgba(205,220,57,0.95), transparent);}.content-block-1:hover .block-44 {background:linear-gradient(to right, rgb(154,165,43), rgb(205,220,57), transparent);}.content-block-2:hover .block-44 {background:linear-gradient(to right, transparent, rgb(205,220,57), rgb(154,165,43));}@media (max-width:768px) {.content-block:hover .block-44 {background:rgb(205,220,57);}}.im-archive-44 {border-color:#cddc39;}.menu-item-category-47 > a:hover {color:#01579b!important;}.menu-item-category-47 .im_mega_menu_holder {border-color:#01579b!important;}.im-bar-47 {stroke:#01579b!important;}.im-catlink-color-47 {background-color:#01579b;}.widget-head-47 .widget-head-bar,.im-top-footer.dark .widget-head-47 .widget-head-bar {background-color:#01579b;}.carousel-47:hover .im-carousel-background:after {background-color:rgba(1,87,155,0.65);}.carousel-47:hover .im-carousel-entry {background:linear-gradient(to top, rgba(1,87,155,0.95), transparent);}.content-block-1:hover .block-47 {background:linear-gradient(to right, rgb(1,65,116), rgb(1,87,155), transparent);}.content-block-2:hover .block-47 {background:linear-gradient(to right, transparent, rgb(1,87,155), rgb(1,65,116));}@media (max-width:768px) {.content-block:hover .block-47 {background:rgb(1,87,155);}}.im-archive-47 {border-color:#01579b;}.im-catlink-color-3177,.im-catlink-color-3177:hover {background-color:#666;}.im-catlink-color-7122,.im-catlink-color-7122:hover {background-color:#666;}.im-catlink-color-7052,.im-catlink-color-7052:hover {background-color:#666;}.im-catlink-color-4307,.im-catlink-color-4307:hover {background-color:#666;}.im-catlink-color-6582,.im-catlink-color-6582:hover {background-color:#666;}.im-catlink-color-3178,.im-catlink-color-3178:hover {background-color:#666;}.im-catlink-color-3190,.im-catlink-color-3190:hover {background-color:#666;}.im-catlink-color-3179,.im-catlink-color-3179:hover {background-color:#666;}.im-catlink-color-6478,.im-catlink-color-6478:hover {background-color:#666;}.im-catlink-color-6777,.im-catlink-color-6777:hover {background-color:#666;}.im-catlink-color-7112,.im-catlink-color-7112:hover {background-color:#666;}.im-catlink-color-1201,.im-catlink-color-1201:hover {background-color:#666;}.im-catlink-color-3183,.im-catlink-color-3183:hover {background-color:#666;}.im-catlink-color-58,.im-catlink-color-58:hover {background-color:#666;}.im-catlink-color-3169,.im-catlink-color-3169:hover {background-color:#666;}.im-catlink-color-1039,.im-catlink-color-1039:hover {background-color:#666;}.menu-item-category-57 > a:hover {color:#ff3d00!important;}.menu-item-category-57 .im_mega_menu_holder {border-color:#ff3d00!important;}.im-bar-57 {stroke:#ff3d00!important;}.im-catlink-color-57 {background-color:#ff3d00;}.widget-head-57 .widget-head-bar,.im-top-footer.dark .widget-head-57 .widget-head-bar {background-color:#ff3d00;}.carousel-57:hover .im-carousel-background:after {background-color:rgba(255,61,0,0.65);}.carousel-57:hover .im-carousel-entry {background:linear-gradient(to top, rgba(255,61,0,0.95), transparent);}.content-block-1:hover .block-57 {background:linear-gradient(to right, rgb(191,46,0), rgb(255,61,0), transparent);}.content-block-2:hover .block-57 {background:linear-gradient(to right, transparent, rgb(255,61,0), rgb(191,46,0));}@media (max-width:768px) {.content-block:hover .block-57 {background:rgb(255,61,0);}}.im-archive-57 {border-color:#ff3d00;}.im-catlink-color-56,.im-catlink-color-56:hover {background-color:#666;}.im-catlink-color-2080,.im-catlink-color-2080:hover {background-color:#666;}.im-catlink-color-3170,.im-catlink-color-3170:hover {background-color:#666;}.im-catlink-color-7087,.im-catlink-color-7087:hover {background-color:#666;}.im-catlink-color-3180,.im-catlink-color-3180:hover {background-color:#666;}.im-catlink-color-51,.im-catlink-color-51:hover {background-color:#666;}.im-catlink-color-36,.im-catlink-color-36:hover {background-color:#666;}.im-catlink-color-6584,.im-catlink-color-6584:hover {background-color:#666;}.im-catlink-color-1260,.im-catlink-color-1260:hover {background-color:#666;}.im-catlink-color-6726,.im-catlink-color-6726:hover {background-color:#666;}.im-catlink-color-3182,.im-catlink-color-3182:hover {background-color:#666;}.im-catlink-color-2081,.im-catlink-color-2081:hover {background-color:#666;}.im-catlink-color-6017,.im-catlink-color-6017:hover {background-color:#666;}.im-catlink-color-40,.im-catlink-color-40:hover {background-color:#666;}.im-catlink-color-39,.im-catlink-color-39:hover {background-color:#666;}.im-catlink-color-37,.im-catlink-color-37:hover {background-color:#666;}.menu-item-category-60 > a:hover {color:#8e24aa!important;}.menu-item-category-60 .im_mega_menu_holder {border-color:#8e24aa!important;}.im-bar-60 {stroke:#8e24aa!important;}.im-catlink-color-60 {background-color:#8e24aa;}.widget-head-60 .widget-head-bar,.im-top-footer.dark .widget-head-60 .widget-head-bar {background-color:#8e24aa;}.carousel-60:hover .im-carousel-background:after {background-color:rgba(142,36,170,0.65);}.carousel-60:hover .im-carousel-entry {background:linear-gradient(to top, rgba(142,36,170,0.95), transparent);}.content-block-1:hover .block-60 {background:linear-gradient(to right, rgb(107,27,128), rgb(142,36,170), transparent);}.content-block-2:hover .block-60 {background:linear-gradient(to right, transparent, rgb(142,36,170), rgb(107,27,128));}@media (max-width:768px) {.content-block:hover .block-60 {background:rgb(142,36,170);}}.im-archive-60 {border-color:#8e24aa;}.im-catlink-color-2082,.im-catlink-color-2082:hover {background-color:#666;}.im-catlink-color-3172,.im-catlink-color-3172:hover {background-color:#666;}.im-catlink-color-7072,.im-catlink-color-7072:hover {background-color:#666;}.im-catlink-color-7088,.im-catlink-color-7088:hover {background-color:#666;}.im-catlink-color-3191,.im-catlink-color-3191:hover {background-color:#666;}.menu-item-category-65 > a:hover {color:#00b0ff!important;}.menu-item-category-65 .im_mega_menu_holder {border-color:#00b0ff!important;}.im-bar-65 {stroke:#00b0ff!important;}.im-catlink-color-65 {background-color:#00b0ff;}.widget-head-65 .widget-head-bar,.im-top-footer.dark .widget-head-65 .widget-head-bar {background-color:#00b0ff;}.carousel-65:hover .im-carousel-background:after {background-color:rgba(0,176,255,0.65);}.carousel-65:hover .im-carousel-entry {background:linear-gradient(to top, rgba(0,176,255,0.95), transparent);}.content-block-1:hover .block-65 {background:linear-gradient(to right, rgb(0,132,191), rgb(0,176,255), transparent);}.content-block-2:hover .block-65 {background:linear-gradient(to right, transparent, rgb(0,176,255), rgb(0,132,191));}@media (max-width:768px) {.content-block:hover .block-65 {background:rgb(0,176,255);}}.im-archive-65 {border-color:#00b0ff;}.im-catlink-color-1112,.im-catlink-color-1112:hover {background-color:#666;}.im-catlink-color-6455,.im-catlink-color-6455:hover {background-color:#666;}.im-catlink-color-1151,.im-catlink-color-1151:hover {background-color:#666;}.im-catlink-color-1329,.im-catlink-color-1329:hover {background-color:#666;}.im-catlink-color-1094,.im-catlink-color-1094:hover {background-color:#666;}.menu-item-category-66 > a:hover {color:#00bcd4!important;}.menu-item-category-66 .im_mega_menu_holder {border-color:#00bcd4!important;}.im-bar-66 {stroke:#00bcd4!important;}.im-catlink-color-66 {background-color:#00bcd4;}.widget-head-66 .widget-head-bar,.im-top-footer.dark .widget-head-66 .widget-head-bar {background-color:#00bcd4;}.carousel-66:hover .im-carousel-background:after {background-color:rgba(0,188,212,0.65);}.carousel-66:hover .im-carousel-entry {background:linear-gradient(to top, rgba(0,188,212,0.95), transparent);}.content-block-1:hover .block-66 {background:linear-gradient(to right, rgb(0,141,159), rgb(0,188,212), transparent);}.content-block-2:hover .block-66 {background:linear-gradient(to right, transparent, rgb(0,188,212), rgb(0,141,159));}@media (max-width:768px) {.content-block:hover .block-66 {background:rgb(0,188,212);}}.im-archive-66 {border-color:#00bcd4;}.im-catlink-color-3189,.im-catlink-color-3189:hover {background-color:#666;}.menu-item-category-50 > a:hover {color:#558b2f!important;}.menu-item-category-50 .im_mega_menu_holder {border-color:#558b2f!important;}.im-bar-50 {stroke:#558b2f!important;}.im-catlink-color-50 {background-color:#558b2f;}.widget-head-50 .widget-head-bar,.im-top-footer.dark .widget-head-50 .widget-head-bar {background-color:#558b2f;}.carousel-50:hover .im-carousel-background:after {background-color:rgba(85,139,47,0.65);}.carousel-50:hover .im-carousel-entry {background:linear-gradient(to top, rgba(85,139,47,0.95), transparent);}.content-block-1:hover .block-50 {background:linear-gradient(to right, rgb(64,104,35), rgb(85,139,47), transparent);}.content-block-2:hover .block-50 {background:linear-gradient(to right, transparent, rgb(85,139,47), rgb(64,104,35));}@media (max-width:768px) {.content-block:hover .block-50 {background:rgb(85,139,47);}}.im-archive-50 {border-color:#558b2f;}.im-catlink-color-7092,.im-catlink-color-7092:hover {background-color:#666;}.im-catlink-color-1164,.im-catlink-color-1164:hover {background-color:#666;}.im-catlink-color-1639,.im-catlink-color-1639:hover {background-color:#666;}.menu-item-category-62 > a:hover {color:#ff6d00!important;}.menu-item-category-62 .im_mega_menu_holder {border-color:#ff6d00!important;}.im-bar-62 {stroke:#ff6d00!important;}.im-catlink-color-62 {background-color:#ff6d00;}.widget-head-62 .widget-head-bar,.im-top-footer.dark .widget-head-62 .widget-head-bar {background-color:#ff6d00;}.carousel-62:hover .im-carousel-background:after {background-color:rgba(255,109,0,0.65);}.carousel-62:hover .im-carousel-entry {background:linear-gradient(to top, rgba(255,109,0,0.95), transparent);}.content-block-1:hover .block-62 {background:linear-gradient(to right, rgb(191,82,0), rgb(255,109,0), transparent);}.content-block-2:hover .block-62 {background:linear-gradient(to right, transparent, rgb(255,109,0), rgb(191,82,0));}@media (max-width:768px) {.content-block:hover .block-62 {background:rgb(255,109,0);}}.im-archive-62 {border-color:#ff6d00;}.im-catlink-color-7023,.im-catlink-color-7023:hover {background-color:#666;}.im-catlink-color-6101,.im-catlink-color-6101:hover {background-color:#666;}.im-catlink-color-41,.im-catlink-color-41:hover {background-color:#666;}.im-catlink-color-42,.im-catlink-color-42:hover {background-color:#666;}.im-catlink-color-6583,.im-catlink-color-6583:hover {background-color:#666;}.im-catlink-color-7121,.im-catlink-color-7121:hover {background-color:#666;}.im-catlink-color-6998,.im-catlink-color-6998:hover {background-color:#666;}.im-catlink-color-7076,.im-catlink-color-7076:hover {background-color:#666;}.im-catlink-color-3186,.im-catlink-color-3186:hover {background-color:#666;}.im-catlink-color-53,.im-catlink-color-53:hover {background-color:#666;}.im-catlink-color-3192,.im-catlink-color-3192:hover {background-color:#666;}.im-catlink-color-3188,.im-catlink-color-3188:hover {background-color:#666;}.im-catlink-color-3181,.im-catlink-color-3181:hover {background-color:#666;}.im-catlink-color-6955,.im-catlink-color-6955:hover {background-color:#666;}.im-catlink-color-1013,.im-catlink-color-1013:hover {background-color:#666;}.im-catlink-color-3166,.im-catlink-color-3166:hover {background-color:#666;}.im-catlink-color-6128,.im-catlink-color-6128:hover {background-color:#666;}.im-catlink-color-59,.im-catlink-color-59:hover {background-color:#666;}.im-catlink-color-3168,.im-catlink-color-3168:hover {background-color:#666;}.im-catlink-color-1640,.im-catlink-color-1640:hover {background-color:#666;}.im-catlink-color-1263,.im-catlink-color-1263:hover {background-color:#666;}.im-catlink-color-64,.im-catlink-color-64:hover {background-color:#666;}.im-catlink-color-67,.im-catlink-color-67:hover {background-color:#666;}.im-catlink-color-7042,.im-catlink-color-7042:hover {background-color:#666;}.im-catlink-color-55,.im-catlink-color-55:hover {background-color:#666;}.im-catlink-color-6393,.im-catlink-color-6393:hover {background-color:#666;}.im-catlink-color-6941,.im-catlink-color-6941:hover {background-color:#666;}.im-catlink-color-3185,.im-catlink-color-3185:hover {background-color:#666;}.menu-item-category-49 > a:hover {color:#e91e63!important;}.menu-item-category-49 .im_mega_menu_holder {border-color:#e91e63!important;}.im-bar-49 {stroke:#e91e63!important;}.im-catlink-color-49 {background-color:#e91e63;}.widget-head-49 .widget-head-bar,.im-top-footer.dark .widget-head-49 .widget-head-bar {background-color:#e91e63;}.carousel-49:hover .im-carousel-background:after {background-color:rgba(233,30,99,0.65);}.carousel-49:hover .im-carousel-entry {background:linear-gradient(to top, rgba(233,30,99,0.95), transparent);}.content-block-1:hover .block-49 {background:linear-gradient(to right, rgb(175,23,74), rgb(233,30,99), transparent);}.content-block-2:hover .block-49 {background:linear-gradient(to right, transparent, rgb(233,30,99), rgb(175,23,74));}@media (max-width:768px) {.content-block:hover .block-49 {background:rgb(233,30,99);}}.im-archive-49 {border-color:#e91e63;}.im-catlink-color-3165,.im-catlink-color-3165:hover {background-color:#666;}.im-catlink-color-1054,.im-catlink-color-1054:hover {background-color:#666;}.im-catlink-color-7096,.im-catlink-color-7096:hover {background-color:#666;}.im-catlink-color-3176,.im-catlink-color-3176:hover {background-color:#666;}.im-catlink-color-3187,.im-catlink-color-3187:hover {background-color:#666;}.im-catlink-color-34,.im-catlink-color-34:hover {background-color:#666;}.menu-item-category-48 > a:hover {color:#00838f!important;}.menu-item-category-48 .im_mega_menu_holder {border-color:#00838f!important;}.im-bar-48 {stroke:#00838f!important;}.im-catlink-color-48 {background-color:#00838f;}.widget-head-48 .widget-head-bar,.im-top-footer.dark .widget-head-48 .widget-head-bar {background-color:#00838f;}.carousel-48:hover .im-carousel-background:after {background-color:rgba(0,131,143,0.65);}.carousel-48:hover .im-carousel-entry {background:linear-gradient(to top, rgba(0,131,143,0.95), transparent);}.content-block-1:hover .block-48 {background:linear-gradient(to right, rgb(0,98,107), rgb(0,131,143), transparent);}.content-block-2:hover .block-48 {background:linear-gradient(to right, transparent, rgb(0,131,143), rgb(0,98,107));}@media (max-width:768px) {.content-block:hover .block-48 {background:rgb(0,131,143);}}.im-archive-48 {border-color:#00838f;}.im-catlink-color-6032,.im-catlink-color-6032:hover {background-color:#666;}.im-catlink-color-6985,.im-catlink-color-6985:hover {background-color:#666;}.menu-item-category-33 > a:hover {color:#9e9d24!important;}.menu-item-category-33 .im_mega_menu_holder {border-color:#9e9d24!important;}.im-bar-33 {stroke:#9e9d24!important;}.im-catlink-color-33 {background-color:#9e9d24;}.widget-head-33 .widget-head-bar,.im-top-footer.dark .widget-head-33 .widget-head-bar {background-color:#9e9d24;}.carousel-33:hover .im-carousel-background:after {background-color:rgba(158,157,36,0.65);}.carousel-33:hover .im-carousel-entry {background:linear-gradient(to top, rgba(158,157,36,0.95), transparent);}.content-block-1:hover .block-33 {background:linear-gradient(to right, rgb(119,118,27), rgb(158,157,36), transparent);}.content-block-2:hover .block-33 {background:linear-gradient(to right, transparent, rgb(158,157,36), rgb(119,118,27));}@media (max-width:768px) {.content-block:hover .block-33 {background:rgb(158,157,36);}}.im-archive-33 {border-color:#9e9d24;}.im-catlink-color-5372,.im-catlink-color-5372:hover {background-color:#666;}.im-catlink-color-7032,.im-catlink-color-7032:hover {background-color:#666;}.im-catlink-color-52,.im-catlink-color-52:hover {background-color:#666;}.im-catlink-color-6040,.im-catlink-color-6040:hover {background-color:#666;}.im-catlink-color-7101,.im-catlink-color-7101:hover {background-color:#666;}.btn {text-decoration:none;color:#fff;background-color:#ff5722;text-align:center;letter-spacing:.5px;transition:.2s ease-out;cursor:pointer;}.list_countdown p {color:#000}a.btn .btn-icon.wishlist {background:#ff4557;}
    </style>

    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="https://gardeshname.shazdemosafer.com/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]--><!--[if IE  8]><link rel="stylesheet" type="text/css" href="/wp-content/plugins/js_composer/assets/css/vc-ie8.min.css" media="screen"><![endif]-->


    <!-- BEGIN ExactMetrics v5.3.5 Universal Analytics - https://exactmetrics.com/ -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-112233400-1', 'auto');
        ga('require', 'displayfeatures');
        ga('send', 'pageview');
    </script>
    <!-- END ExactMetrics Universal Analytics -->
    <noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript></head>

<body class="rtl post-template-default single single-post single-format-standard group-blog wpb-js-composer js-comp-ver-4.12 vc_responsive">

<div class="header">
    @include('layouts.placeHeader')

    <div class="hidden-sm hidden-xs">
        <div class="im-header-1 im-header-block">
            <header class="im-main-header clearfix light">
                <div class='container'>
                    <div class="im-header-flex">

                        <div class="im-header-logo col-md-1 col-sm-12"></div>

                        <div class="im-header-ad col-md-10 col-sm-12">
                            <p>
                                <img class="aligncenter size-full wp-image-4151" src="{{URL::asset('posts/' . $post->pic)}}" alt="شازده مسافر" width="100%" />
                            </p>

                            <article class="im-article content-single content-layout-1 col-md-12 type-post status-publish format-standard has-post-thumbnail hentry">

                                <div class="im-entry clearfix">
                                    <header class="im-entry-header">
                                        <div class="im-entry-category">
                                            <div class="iranomag-meta clearfix">
                                                <div class="cat-links im-meta-item">
                                                    <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;">{{$post->title}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="im-entry-meta">
                                            <div class="iranomag-meta clearfix">
                                                <div class="posted-on im-meta-item">
                                                    <span class="entry-date published updated">{{$post->date}}</span>
                                                </div>
                                                <div class="comments-link im-meta-item">
                                                    <a href="/">
                                                        <i class="fa fa-comment-o"></i>{{$post->comments}}
                                                    </a>
                                                </div>
                                                <div class="author vcard im-meta-item">
                                                    <a class="url fn n" href="/author/writer/">
                                                        <i class="fa fa-user"></i>شازده مسافر
                                                    </a>
                                                </div>
                                                <div class="post-views im-meta-item"><i class="fa fa-eye"></i>{{$post->seen}}</div>
                                            </div>
                                        </div>

                                        <div>
                                            {!! $post->description !!}
                                        </div>

                                    </header>

                                </div>

                            </article>

                            <div class="im-post-share col-md-12">
                                <a target="_blank" title="اشتراک گذاری در فیسبوک" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}"><i class="fa fa-facebook"></i><span>فیسبوک</span></a>
                                <a target="_blank" title="اشتراک گذاری در توییتر" href="https://twitter.com/home?status={{Request::url()}}"><i class="fa fa-twitter"></i><span>توییتر</span></a>
                                <a target="_blank" title="اشتراک گذاری در گوگل پلاس" href="https://plus.google.com/share?url={{Request::url()}}"><i class="fa fa-google-plus"></i><span>گوگل +</span></a>
                                <a target="_blank" title="اشتراک گذاری در لینکداین" href="https://www.linkedin.com/shareArticle?mini=true&url={{Request::url()}}
&source="><i class="fa fa-linkedin"></i><span>لینکداین</span></a>
                                <a title="اشتراک گذاری در تلگرام" target="_blank" href="https://telegram.me/share/url?url={{Request::url()}}"><i class="fa fa-paper-plane"></i><span>تلگرام</span></a>
                                <a target="_blank" title="اشتراک گذاری در WhatsApp" href="whatsapp://send?text={{Request::url()}}/"><i class="fa fa-whatsapp"></i><span>واتس اپ</span></a>
                                <a target="_blank" title="اشتراک گذاری در کلوب" href="http://www.cloob.com/share/link/add?url={{Request::url()}}"><i class="fa fa-contao"></i><span>کلوب</span></a>
                            </div>

                            <div class="im-post-vote col-md-12">
                                <div class="im-post-vote-item">
                                    <h2><i class="fa fa-heartbeat"></i>امتیاز شما به مطلب</h2>
                                </div>

                                <div class="im-post-vote-item">
                                    <a onclick="likePost()" class="user_likes"><i class="fa fa-thumbs-o-up"></i>دوست داشتم: <span id="likes_counter">{{$post->likes}}</span></a>
                                </div>

                                <div class="im-post-vote-item">
                                    <a onclick="dislikePost()" class="user_dislikes"><i class="fa fa-thumbs-o-down"></i>دوست نداشتم: <span id="dislikes_counter">{{$post->dislikes}}</span></a>
                                </div>

                                <div class="im-post-vote-item">
                                    <i class="fa fa-heart-o"></i>میانگین امتیازات: <span id="vote_avg">{{$post->point}}</span>
                                </div>
                            </div>

                            @if(count($tags) > 0)
                                <div class="im-entry-tags col-md-12">
                                    <div class="iranomag-meta clearfix">
                                        <div class="tags-links im-meta-item">
                                            <div class="im-tag-title clearfix">
                                                <i class="fa fa-tags"></i>برچسب ها
                                            </div>
                                            <div class="im-tag-items">
                                                @foreach($tags as $tag)
                                                    <a rel="tag">{{$tag}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($author != null)
                                <div class="im-entry-author col-md-12">
                                    <div class="im-entry-author-img">
                                        <img src='{{$creatorPhoto}}' class='avatar avatar-85 photo' height='85' width='85' />
                                    </div>
                                    <div class="im-entry-author-text">
                                        <h2>درباره نویسنده</h2>
                                        <p>{{$author}}</p>
                                    </div>
                                </div>
                            @endif

                            <div id="REVIEWS" class="col-md-12 ratings_and_types concepts_and_filters block_wrap"
                                 style="position: relative">
                                <div class="header_group block_header" style="position: relative">
                                    <h3 class="tabs_header reviews_header block_title"> نقدها <span
                                                class="reviews_header_count block_title"></span></h3>
                                </div>
                                <div id="reviewsContainer" class="ppr_rup ppr_priv_location_reviews_list"></div>
                                <div class="unified pagination north_star">
                                    <div class="pageNumbers" id="pageNumCommentContainer"></div>
                                </div>
                            </div>

                            <div class="hidden im-entry-comment col-md-12">

                                @if(Auth::check())

                                    <div id="comments" class="comments-area">
                                        <div id="respond" class="comment-respond">
                                            <h3 id="reply-title" class="comment-reply-title">
                                                <i class="fa fa-comment-o"></i>ارسال دیدگاه
                                            </h3>

                                            <p class="comment-form-comment">
                                                <label for="comment">دیدگاه</label>
                                                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
                                            </p>

                                            <div class="row">
                                                <p class="form-submit">
                                                    <input onclick="sendPostComment()" name="submit" type="submit" id="submit" class="submit" value="ارسال دیدگاه" />
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(".im-entry-comment").removeClass('hidden');
                                    </script>

                                @endif

                            </div>

                            <div class="im-header-logo col-md-1 col-sm-12"></div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>

    <a href="#" id="back-to-top" title="بازگشت به ابتدای صفحه"><i class="fa fa-arrow-up"></i></a>
</div>

@include('layouts.placeFooter')

<script>

    function sendPostComment() {
        $.ajax({
            type: 'post',
            url: '{{route('sendPostComment')}}',
            data: {
                'postId': '{{$post->id}}',
                'comment': $("#comment").val()
            },
            success: function (res) {
                if(res == "ok") {
                    alert("دیدگاه شما با موفقیت به سامانه اضاضفه گردید ");
                    $("#comment").val("");
                }
            }
        });
    }

    function likePost() {

        $.ajax({
            type: 'post',
            url: '{{route('likePost')}}',
            data: {
                'postId': '{{$post->id}}',
                'status': 'like'
            },
            success: function (res) {

                res = JSON.parse(res);

                if(res.status == "ok") {
                    $("#likes_counter").empty().append(res.likes);
                    $("#vote_avg").empty().append(res.point);
                }
            }
        });

    }

    function dislikePost() {

        $.ajax({
            type: 'post',
            url: '{{route('likePost')}}',
            data: {
                'postId': '{{$post->id}}',
                'status': 'dislike'
            },
            success: function (res) {

                res = JSON.parse(res);

                if(res.status == "ok") {
                    $("#dislikes_counter").empty().append(res.dislikes);
                    $("#vote_avg").empty().append(res.point);
                }
            }
        });

    }

    $(".login-button").click(function () {
        $(".dark").show();
        showLoginPrompt('{{Request::url()}}');
    });
    function hideElement(e) {
        $(".dark").hide();
        $("#" + e).addClass("hidden");
    }

    function showElement(e) {
        $("#" + e).removeClass("hidden");
        $(".dark").show();
    }

    $(document).ready(function () {

        $.ajax({
            type: 'post',
            url: '{{route('getPostComments')}}',
            data: {
                'postId': '{{$post->id}}',
                'page': 1
            },
            success: function (res) {
                showComments(JSON.parse(res));
            }
        })

    });


    function showComments(arr) {


        var postCounts = arr.postCounts;

        $(".seeAllReviews").empty().append(postCounts + " نقد");
        $(".reviews_header_count").empty().append("(" + postCounts + " نقد)");
        var newElement = "<p id='pagination-details' class='pagination-details' style='clear: both; padding: 12px 0 !important;'><b>" + arr.posts.length + "</b> از <b>" + postCounts + "</b> نقد</p>";

        arr = arr.posts;

        for (var i = 0; i < arr.length; i++) {
            newElement += "<div style='border-bottom: 1px solid #E3E3E3;' class='review'>";
            newElement += "<div class='prw_rup prw_reviews_basic_review_hsx'>";
            newElement += "<div class='reviewSelector'>";
            newElement += "<div class='review hsx_review ui_columns is-multiline inlineReviewUpdate provider0'>";
            newElement += "<div class='ui_column is-2' style='float: right;'>";
            newElement += "<div class='prw_rup prw_reviews_member_info_hsx'>";
            newElement += "<div class='member_info'>";
            newElement += "<div class='avatar_wrap'>";
            newElement += "<div class='username' style='text-align: center;margin-top: 5px;'>" + arr[i].username + "</div>";
            newElement += "</div>";
            newElement += "</div></div></div>";
            newElement += "<div class='ui_column is-9' style='float: right;'>";
            newElement += "<div class='innerBubble'>";
            newElement += "<div class='wrap'>";
            newElement += "<div style='display: inline-block'>";
            newElement += "<span class='ratingDate relativeDate' style='float: right;'>نوشته شده در تاریخ " + arr[i].created_at + " </span></div>";
            newElement += "<div class='prw_rup prw_reviews_text_summary_hsx'>";
            newElement += "<div class='entry'>";
            newElement += "<p class='partial_entry' style='line-height: 20px; max-height: 70px; overflow: hidden; padding: 10px; font-size: 12px'>" + arr[i].msg;
            newElement += "</p>";
            newElement += "</div></div>";

            newElement += "</div></div></div>";
            newElement += "</div></div></div></div>";
        }

        $("#reviewsContainer").empty().append(newElement);

        newElement = "";
        var limit = Math.ceil(arr.length / 6);
        var preCurr = false;
        var passCurr = false;
        var currPage = 1;

        for (var k = 1; k <= limit; k++) {
            if (Math.abs(currPage - k) < 4 || k == 1 || k == limit) {
                if (k == currPage) {
                    newElement += "<span data-page-number='" + k + "' class='pageNum current pageNumComment'>" + k + "</span>";
                }
                else {
                    newElement += "<a onclick='changeCommentPage(this)' data-page-number='" + k + "' class='pageNum taLnk pageNumComment'>" + k + "</a>";
                }
            }
            else if (k < currPage && !preCurr) {
                preCurr = true;
                newElement += "<span class='separator'>&hellip;</span>";
            }
            else if (k > currPage && !passCurr) {
                passCurr = true;
                newElement += "<span class='separator'>&hellip;</span>";
            }
        }
        $("#pageNumCommentContainer").empty().append(newElement);
        if ($("#commentCount").empty())
            $("#commentCount").append(postCounts);
    }

</script>

<div class="ui_backdrop dark" style="display: none; z-index: 10000000;"></div>

@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif

</body>
</html>
