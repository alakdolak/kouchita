<?php $placeMode = "ticket";
$state = 'اصفهان';
$kindPlaceId = 10; ?>
        <!DOCTYPE html>
<html>
<head>
    @include('layouts.topHeader')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/long_lived_global_legacy_2.css?v=1')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme2/gardeshname.min.css?v=1.1')}}"/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title>خانه - شازده مسافر</title>

    <link rel='stylesheet' id='google-font-css'  href='//fonts.googleapis.com/css?family=Dosis%3A200' type='text/css' media='all' />
    <style id='iranomag-style-inline-css' type='text/css'>
        a {color:#298bca;}a:hover,.im-topnav.dark a:hover, .im-topnav.dark ul > li > a:hover,.im-topnav.light a:hover, .im-topnav.light ul > li > a:hover,.im-navigation.dark a:hover, .im-navigation.dark ul > li > a:hover,.im-navigation.light a:hover, .im-navigation.light ul > li > a:hover,.im-main-header.dark a:hover, .im-main-header.dark ul > li > a:hover,.im-main-header.light a:hover, .im-main-header.light ul > li > a:hover,.im-main-header.dark .im-header-links .top-menu ul li a:hover,.im-main-header.light .im-header-links .top-menu ul li a:hover,.im-top-footer.dark a:hover, .im-footer.dark ul > li > a:hover,.im-top-footer.light a:hover, .im-footer.light ul > li > a:hover,.im-navigation .primary-menu > ul > li > ul.sub-menu > li > a:hover,.iranomag-meta .im-meta-item a:hover,.im-entry-title a:hover,.widget_pop_btn a.active,.im-top-footer.dark .widget_impv_display_widget .widget_pop_btn a.active,.im-top-footer.light .widget_impv_display_widget .widget_pop_btn a.active,.im-widget-entry-header h4.im-widget-entry-title a:hover,.widget li .rsswidget:hover,.widget_recent_comments .recentcomments a:hover,.widget_tag_cloud .tagcloud a:hover,.im-top-footer.dark .widget_tag_cloud .tagcloud a:hover,.im-top-footer.light .widget_tag_cloud .tagcloud a:hover,.widget_meta ul li a:hover,.widget ul li a:hover,.im-top-footer.dark .widget ul li a:hover,.im-top-footer.light .widget ul li a:hover,.im-vc-video-large.light .im-entry-title a:hover,.mobile-menu li a:hover,.im-post-vote-item a:hover,.im-entry-pages .nav-before:hover, .im-entry-pages .nav-after:hover,.im-topnav .top-menu > ul > li > ul.sub-menu > li > a:hover,.im-404-search ul li a:hover,.im-post-download-item-exlink a:hover{color:#33aefd;}.bypostauthor .im-comment-box {background-color:rgba(51,174,253, 0.065);border-color:rgba(51,174,253, 0.25);}.bypostauthor .im-comment-box .im-comment-details {border-color:rgba(51,174,253, 0.2);}.review-line,.im-tag-title .fa,.im-404-box{background-color:#298bca;}input:hover, select:hover, textarea:hover,input:focus, select:focus, textarea:focus {border-color:#33aefd;box-shadow:rgba(41,139,202, 0.5) 0 0 5px;}input[type=submit] {background-color:#298bca;border-color:#2376ac;}input[type=submit]:hover, input[type=submit]:focus {background-color:#33aefd;border-color:#2b94d7;}.mega-menu-item-header .mega-menu-item-header-title a:hover {color:#33aefd!important;}#back-to-top {border-color:#298bca;color:#298bca;}#back-to-top:hover {border-color:#33aefd;color:#33aefd;}@media (max-width:768px) {#back-to-top {background-color:#298bca;}}.widget_categories .widget-head-bar {background-color:#298bca;}.widget_tag_cloud .tagcloud a:hover,.im-top-footer.dark .widget_tag_cloud .tagcloud a:hover {border-color:#33aefd;}.nav-links > a:hover {border-color:#33aefd;}.nav-links .current {background-color:#33aefd;border:1px solid #298bca;}.im-2col-featured {background-color:#33aefd;}.im-2col-featured:before {border-right-color:#1f6898;}.im-svg #im-bar,#review-avg-svg #review-avg-bar{stroke:#298bca;}.im-post-download {background-color:rgba(41,139,202, 0.075);border-color:rgba(41,139,202, 0.25);}.im-post-download-title {color:rgba(37,125,182, 0.9);}.im-post-download-list li .fa {background-color:#216fa2;}.im-post-download-item-title {color:rgba(33,111,162, 0.9);}.im-post-download-item-desc {color:rgba(33,111,162, 0.75);}.im-post-download-item-exlink a {color:rgba(45,153,222, 0.75);}.im-entry-content th {background-color:#298bca;border-color:#257db6;}.im-entry-content tr:hover {background-color:rgba(41,139,202, 0.05);}.im-catlink-color-3193,.im-catlink-color-3193:hover {background-color:#666;}.im-catlink-color-2079,.im-catlink-color-2079:hover {background-color:#666;}.im-catlink-color-6121,.im-catlink-color-6121:hover {background-color:#666;}.menu-item-category-61 > a:hover {color:#80cbc4!important;}.menu-item-category-61 .im_mega_menu_holder {border-color:#80cbc4!important;}.im-bar-61 {stroke:#80cbc4!important;}.im-catlink-color-61 {background-color:#80cbc4;}.widget-head-61 .widget-head-bar,.im-top-footer.dark .widget-head-61 .widget-head-bar {background-color:#80cbc4;}.carousel-61:hover .im-carousel-background:after {background-color:rgba(128,203,196,0.65);}.carousel-61:hover .im-carousel-entry {background:linear-gradient(to top, rgba(128,203,196,0.95), transparent);}.content-block-1:hover .block-61 {background:linear-gradient(to right, rgb(96,152,147), rgb(128,203,196), transparent);}.content-block-2:hover .block-61 {background:linear-gradient(to right, transparent, rgb(128,203,196), rgb(96,152,147));}@media (max-width:768px) {.content-block:hover .block-61 {background:rgb(128,203,196);}}.im-archive-61 {border-color:#80cbc4;}.im-catlink-color-1238,.im-catlink-color-1238:hover {background-color:#666;}.im-catlink-color-1237,.im-catlink-color-1237:hover {background-color:#666;}.im-catlink-color-7010,.im-catlink-color-7010:hover {background-color:#666;}.im-catlink-color-6805,.im-catlink-color-6805:hover {background-color:#666;}.im-catlink-color-54,.im-catlink-color-54:hover {background-color:#666;}.menu-item-category-554 > a:hover {color:#c62828!important;}.menu-item-category-554 .im_mega_menu_holder {border-color:#c62828!important;}.im-bar-554 {stroke:#c62828!important;}.im-catlink-color-554 {background-color:#c62828;}.widget-head-554 .widget-head-bar,.im-top-footer.dark .widget-head-554 .widget-head-bar {background-color:#c62828;}.carousel-554:hover .im-carousel-background:after {background-color:rgba(198,40,40,0.65);}.carousel-554:hover .im-carousel-entry {background:linear-gradient(to top, rgba(198,40,40,0.95), transparent);}.content-block-1:hover .block-554 {background:linear-gradient(to right, rgb(149,30,30), rgb(198,40,40), transparent);}.content-block-2:hover .block-554 {background:linear-gradient(to right, transparent, rgb(198,40,40), rgb(149,30,30));}@media (max-width:768px) {.content-block:hover .block-554 {background:rgb(198,40,40);}}.im-archive-554 {border-color:#c62828;}.im-catlink-color-1908,.im-catlink-color-1908:hover {background-color:#666;}.im-catlink-color-5810,.im-catlink-color-5810:hover {background-color:#666;}.im-catlink-color-7017,.im-catlink-color-7017:hover {background-color:#666;}.im-catlink-color-3167,.im-catlink-color-3167:hover {background-color:#666;}.im-catlink-color-1111,.im-catlink-color-1111:hover {background-color:#666;}.im-catlink-color-2073,.im-catlink-color-2073:hover {background-color:#666;}.im-catlink-color-2076,.im-catlink-color-2076:hover {background-color:#666;}.im-catlink-color-2075,.im-catlink-color-2075:hover {background-color:#666;}.im-catlink-color-851,.im-catlink-color-851:hover {background-color:#666;}.im-catlink-color-982,.im-catlink-color-982:hover {background-color:#666;}.im-catlink-color-1635,.im-catlink-color-1635:hover {background-color:#666;}.im-catlink-color-1636,.im-catlink-color-1636:hover {background-color:#666;}.im-catlink-color-993,.im-catlink-color-993:hover {background-color:#666;}.im-catlink-color-1637,.im-catlink-color-1637:hover {background-color:#666;}.im-catlink-color-2070,.im-catlink-color-2070:hover {background-color:#666;}.im-catlink-color-1436,.im-catlink-color-1436:hover {background-color:#666;}.im-catlink-color-2074,.im-catlink-color-2074:hover {background-color:#666;}.im-catlink-color-1206,.im-catlink-color-1206:hover {background-color:#666;}.im-catlink-color-940,.im-catlink-color-940:hover {background-color:#666;}.im-catlink-color-1322,.im-catlink-color-1322:hover {background-color:#666;}.im-catlink-color-2072,.im-catlink-color-2072:hover {background-color:#666;}.im-catlink-color-1233,.im-catlink-color-1233:hover {background-color:#666;}.im-catlink-color-791,.im-catlink-color-791:hover {background-color:#666;}.im-catlink-color-2069,.im-catlink-color-2069:hover {background-color:#666;}.im-catlink-color-2077,.im-catlink-color-2077:hover {background-color:#666;}.im-catlink-color-2067,.im-catlink-color-2067:hover {background-color:#666;}.im-catlink-color-2068,.im-catlink-color-2068:hover {background-color:#666;}.im-catlink-color-1638,.im-catlink-color-1638:hover {background-color:#666;}.im-catlink-color-2245,.im-catlink-color-2245:hover {background-color:#666;}.im-catlink-color-2071,.im-catlink-color-2071:hover {background-color:#666;}.im-catlink-color-814,.im-catlink-color-814:hover {background-color:#666;}.menu-item-category-171 > a:hover {color:#a1887f!important;}.menu-item-category-171 .im_mega_menu_holder {border-color:#a1887f!important;}.im-bar-171 {stroke:#a1887f!important;}.im-catlink-color-171 {background-color:#a1887f;}.widget-head-171 .widget-head-bar,.im-top-footer.dark .widget-head-171 .widget-head-bar {background-color:#a1887f;}.carousel-171:hover .im-carousel-background:after {background-color:rgba(161,136,127,0.65);}.carousel-171:hover .im-carousel-entry {background:linear-gradient(to top, rgba(161,136,127,0.95), transparent);}.content-block-1:hover .block-171 {background:linear-gradient(to right, rgb(121,102,95), rgb(161,136,127), transparent);}.content-block-2:hover .block-171 {background:linear-gradient(to right, transparent, rgb(161,136,127), rgb(121,102,95));}@media (max-width:768px) {.content-block:hover .block-171 {background:rgb(161,136,127);}}.im-archive-171 {border-color:#a1887f;}.menu-item-category-144 > a:hover {color:#ffca28!important;}.menu-item-category-144 .im_mega_menu_holder {border-color:#ffca28!important;}.im-bar-144 {stroke:#ffca28!important;}.im-catlink-color-144 {background-color:#ffca28;}.widget-head-144 .widget-head-bar,.im-top-footer.dark .widget-head-144 .widget-head-bar {background-color:#ffca28;}.carousel-144:hover .im-carousel-background:after {background-color:rgba(255,202,40,0.65);}.carousel-144:hover .im-carousel-entry {background:linear-gradient(to top, rgba(255,202,40,0.95), transparent);}.content-block-1:hover .block-144 {background:linear-gradient(to right, rgb(191,152,30), rgb(255,202,40), transparent);}.content-block-2:hover .block-144 {background:linear-gradient(to right, transparent, rgb(255,202,40), rgb(191,152,30));}@media (max-width:768px) {.content-block:hover .block-144 {background:rgb(255,202,40);}}.im-archive-144 {border-color:#ffca28;}.im-catlink-color-6751,.im-catlink-color-6751:hover {background-color:#666;}.im-catlink-color-7077,.im-catlink-color-7077:hover {background-color:#666;}.im-catlink-color-63,.im-catlink-color-63:hover {background-color:#666;}.menu-item-category-45 > a:hover {color:#6d4c41!important;}.menu-item-category-45 .im_mega_menu_holder {border-color:#6d4c41!important;}.im-bar-45 {stroke:#6d4c41!important;}.im-catlink-color-45 {background-color:#6d4c41;}.widget-head-45 .widget-head-bar,.im-top-footer.dark .widget-head-45 .widget-head-bar {background-color:#6d4c41;}.carousel-45:hover .im-carousel-background:after {background-color:rgba(109,76,65,0.65);}.carousel-45:hover .im-carousel-entry {background:linear-gradient(to top, rgba(109,76,65,0.95), transparent);}.content-block-1:hover .block-45 {background:linear-gradient(to right, rgb(82,57,49), rgb(109,76,65), transparent);}.content-block-2:hover .block-45 {background:linear-gradient(to right, transparent, rgb(109,76,65), rgb(82,57,49));}@media (max-width:768px) {.content-block:hover .block-45 {background:rgb(109,76,65);}}.im-archive-45 {border-color:#6d4c41;}.menu-item-category-46 > a:hover {color:#512da8!important;}.menu-item-category-46 .im_mega_menu_holder {border-color:#512da8!important;}.im-bar-46 {stroke:#512da8!important;}.im-catlink-color-46 {background-color:#512da8;}.widget-head-46 .widget-head-bar,.im-top-footer.dark .widget-head-46 .widget-head-bar {background-color:#512da8;}.carousel-46:hover .im-carousel-background:after {background-color:rgba(81,45,168,0.65);}.carousel-46:hover .im-carousel-entry {background:linear-gradient(to top, rgba(81,45,168,0.95), transparent);}.content-block-1:hover .block-46 {background:linear-gradient(to right, rgb(61,34,126), rgb(81,45,168), transparent);}.content-block-2:hover .block-46 {background:linear-gradient(to right, transparent, rgb(81,45,168), rgb(61,34,126));}@media (max-width:768px) {.content-block:hover .block-46 {background:rgb(81,45,168);}}.im-archive-46 {border-color:#512da8;}.im-catlink-color-3174,.im-catlink-color-3174:hover {background-color:#666;}.menu-item-category-44 > a:hover {color:#cddc39!important;}.menu-item-category-44 .im_mega_menu_holder {border-color:#cddc39!important;}.im-bar-44 {stroke:#cddc39!important;}.im-catlink-color-44 {background-color:#cddc39;}.widget-head-44 .widget-head-bar,.im-top-footer.dark .widget-head-44 .widget-head-bar {background-color:#cddc39;}.carousel-44:hover .im-carousel-background:after {background-color:rgba(205,220,57,0.65);}.carousel-44:hover .im-carousel-entry {background:linear-gradient(to top, rgba(205,220,57,0.95), transparent);}.content-block-1:hover .block-44 {background:linear-gradient(to right, rgb(154,165,43), rgb(205,220,57), transparent);}.content-block-2:hover .block-44 {background:linear-gradient(to right, transparent, rgb(205,220,57), rgb(154,165,43));}@media (max-width:768px) {.content-block:hover .block-44 {background:rgb(205,220,57);}}.im-archive-44 {border-color:#cddc39;}.menu-item-category-47 > a:hover {color:#01579b!important;}.menu-item-category-47 .im_mega_menu_holder {border-color:#01579b!important;}.im-bar-47 {stroke:#01579b!important;}.im-catlink-color-47 {background-color:#01579b;}.widget-head-47 .widget-head-bar,.im-top-footer.dark .widget-head-47 .widget-head-bar {background-color:#01579b;}.carousel-47:hover .im-carousel-background:after {background-color:rgba(1,87,155,0.65);}.carousel-47:hover .im-carousel-entry {background:linear-gradient(to top, rgba(1,87,155,0.95), transparent);}.content-block-1:hover .block-47 {background:linear-gradient(to right, rgb(1,65,116), rgb(1,87,155), transparent);}.content-block-2:hover .block-47 {background:linear-gradient(to right, transparent, rgb(1,87,155), rgb(1,65,116));}@media (max-width:768px) {.content-block:hover .block-47 {background:rgb(1,87,155);}}.im-archive-47 {border-color:#01579b;}.im-catlink-color-3177,.im-catlink-color-3177:hover {background-color:#666;}.im-catlink-color-7122,.im-catlink-color-7122:hover {background-color:#666;}.im-catlink-color-7052,.im-catlink-color-7052:hover {background-color:#666;}.im-catlink-color-4307,.im-catlink-color-4307:hover {background-color:#666;}.im-catlink-color-6582,.im-catlink-color-6582:hover {background-color:#666;}.im-catlink-color-3178,.im-catlink-color-3178:hover {background-color:#666;}.im-catlink-color-3190,.im-catlink-color-3190:hover {background-color:#666;}.im-catlink-color-3179,.im-catlink-color-3179:hover {background-color:#666;}.im-catlink-color-6478,.im-catlink-color-6478:hover {background-color:#666;}.im-catlink-color-6777,.im-catlink-color-6777:hover {background-color:#666;}.im-catlink-color-7112,.im-catlink-color-7112:hover {background-color:#666;}.im-catlink-color-1201,.im-catlink-color-1201:hover {background-color:#666;}.im-catlink-color-3183,.im-catlink-color-3183:hover {background-color:#666;}.im-catlink-color-58,.im-catlink-color-58:hover {background-color:#666;}.im-catlink-color-3169,.im-catlink-color-3169:hover {background-color:#666;}.im-catlink-color-1039,.im-catlink-color-1039:hover {background-color:#666;}.menu-item-category-57 > a:hover {color:#ff3d00!important;}.menu-item-category-57 .im_mega_menu_holder {border-color:#ff3d00!important;}.im-bar-57 {stroke:#ff3d00!important;}.im-catlink-color-57 {background-color:#ff3d00;}.widget-head-57 .widget-head-bar,.im-top-footer.dark .widget-head-57 .widget-head-bar {background-color:#ff3d00;}.carousel-57:hover .im-carousel-background:after {background-color:rgba(255,61,0,0.65);}.carousel-57:hover .im-carousel-entry {background:linear-gradient(to top, rgba(255,61,0,0.95), transparent);}.content-block-1:hover .block-57 {background:linear-gradient(to right, rgb(191,46,0), rgb(255,61,0), transparent);}.content-block-2:hover .block-57 {background:linear-gradient(to right, transparent, rgb(255,61,0), rgb(191,46,0));}@media (max-width:768px) {.content-block:hover .block-57 {background:rgb(255,61,0);}}.im-archive-57 {border-color:#ff3d00;}.im-catlink-color-56,.im-catlink-color-56:hover {background-color:#666;}.im-catlink-color-2080,.im-catlink-color-2080:hover {background-color:#666;}.im-catlink-color-3170,.im-catlink-color-3170:hover {background-color:#666;}.im-catlink-color-7087,.im-catlink-color-7087:hover {background-color:#666;}.im-catlink-color-3180,.im-catlink-color-3180:hover {background-color:#666;}.im-catlink-color-51,.im-catlink-color-51:hover {background-color:#666;}.im-catlink-color-36,.im-catlink-color-36:hover {background-color:#666;}.im-catlink-color-6584,.im-catlink-color-6584:hover {background-color:#666;}.im-catlink-color-1260,.im-catlink-color-1260:hover {background-color:#666;}.im-catlink-color-6726,.im-catlink-color-6726:hover {background-color:#666;}.im-catlink-color-3182,.im-catlink-color-3182:hover {background-color:#666;}.im-catlink-color-2081,.im-catlink-color-2081:hover {background-color:#666;}.im-catlink-color-6017,.im-catlink-color-6017:hover {background-color:#666;}.im-catlink-color-40,.im-catlink-color-40:hover {background-color:#666;}.im-catlink-color-39,.im-catlink-color-39:hover {background-color:#666;}.im-catlink-color-37,.im-catlink-color-37:hover {background-color:#666;}.menu-item-category-60 > a:hover {color:#8e24aa!important;}.menu-item-category-60 .im_mega_menu_holder {border-color:#8e24aa!important;}.im-bar-60 {stroke:#8e24aa!important;}.im-catlink-color-60 {background-color:#8e24aa;}.widget-head-60 .widget-head-bar,.im-top-footer.dark .widget-head-60 .widget-head-bar {background-color:#8e24aa;}.carousel-60:hover .im-carousel-background:after {background-color:rgba(142,36,170,0.65);}.carousel-60:hover .im-carousel-entry {background:linear-gradient(to top, rgba(142,36,170,0.95), transparent);}.content-block-1:hover .block-60 {background:linear-gradient(to right, rgb(107,27,128), rgb(142,36,170), transparent);}.content-block-2:hover .block-60 {background:linear-gradient(to right, transparent, rgb(142,36,170), rgb(107,27,128));}@media (max-width:768px) {.content-block:hover .block-60 {background:rgb(142,36,170);}}.im-archive-60 {border-color:#8e24aa;}.im-catlink-color-2082,.im-catlink-color-2082:hover {background-color:#666;}.im-catlink-color-3172,.im-catlink-color-3172:hover {background-color:#666;}.im-catlink-color-7072,.im-catlink-color-7072:hover {background-color:#666;}.im-catlink-color-7088,.im-catlink-color-7088:hover {background-color:#666;}.im-catlink-color-3191,.im-catlink-color-3191:hover {background-color:#666;}.menu-item-category-65 > a:hover {color:#00b0ff!important;}.menu-item-category-65 .im_mega_menu_holder {border-color:#00b0ff!important;}.im-bar-65 {stroke:#00b0ff!important;}.im-catlink-color-65 {background-color:#00b0ff;}.widget-head-65 .widget-head-bar,.im-top-footer.dark .widget-head-65 .widget-head-bar {background-color:#00b0ff;}.carousel-65:hover .im-carousel-background:after {background-color:rgba(0,176,255,0.65);}.carousel-65:hover .im-carousel-entry {background:linear-gradient(to top, rgba(0,176,255,0.95), transparent);}.content-block-1:hover .block-65 {background:linear-gradient(to right, rgb(0,132,191), rgb(0,176,255), transparent);}.content-block-2:hover .block-65 {background:linear-gradient(to right, transparent, rgb(0,176,255), rgb(0,132,191));}@media (max-width:768px) {.content-block:hover .block-65 {background:rgb(0,176,255);}}.im-archive-65 {border-color:#00b0ff;}.im-catlink-color-1112,.im-catlink-color-1112:hover {background-color:#666;}.im-catlink-color-6455,.im-catlink-color-6455:hover {background-color:#666;}.im-catlink-color-1151,.im-catlink-color-1151:hover {background-color:#666;}.im-catlink-color-1329,.im-catlink-color-1329:hover {background-color:#666;}.im-catlink-color-1094,.im-catlink-color-1094:hover {background-color:#666;}.menu-item-category-66 > a:hover {color:#00bcd4!important;}.menu-item-category-66 .im_mega_menu_holder {border-color:#00bcd4!important;}.im-bar-66 {stroke:#00bcd4!important;}.im-catlink-color-66 {background-color:#00bcd4;}.widget-head-66 .widget-head-bar,.im-top-footer.dark .widget-head-66 .widget-head-bar {background-color:#00bcd4;}.carousel-66:hover .im-carousel-background:after {background-color:rgba(0,188,212,0.65);}.carousel-66:hover .im-carousel-entry {background:linear-gradient(to top, rgba(0,188,212,0.95), transparent);}.content-block-1:hover .block-66 {background:linear-gradient(to right, rgb(0,141,159), rgb(0,188,212), transparent);}.content-block-2:hover .block-66 {background:linear-gradient(to right, transparent, rgb(0,188,212), rgb(0,141,159));}@media (max-width:768px) {.content-block:hover .block-66 {background:rgb(0,188,212);}}.im-archive-66 {border-color:#00bcd4;}.im-catlink-color-3189,.im-catlink-color-3189:hover {background-color:#666;}.menu-item-category-50 > a:hover {color:#558b2f!important;}.menu-item-category-50 .im_mega_menu_holder {border-color:#558b2f!important;}.im-bar-50 {stroke:#558b2f!important;}.im-catlink-color-50 {background-color:#558b2f;}.widget-head-50 .widget-head-bar,.im-top-footer.dark .widget-head-50 .widget-head-bar {background-color:#558b2f;}.carousel-50:hover .im-carousel-background:after {background-color:rgba(85,139,47,0.65);}.carousel-50:hover .im-carousel-entry {background:linear-gradient(to top, rgba(85,139,47,0.95), transparent);}.content-block-1:hover .block-50 {background:linear-gradient(to right, rgb(64,104,35), rgb(85,139,47), transparent);}.content-block-2:hover .block-50 {background:linear-gradient(to right, transparent, rgb(85,139,47), rgb(64,104,35));}@media (max-width:768px) {.content-block:hover .block-50 {background:rgb(85,139,47);}}.im-archive-50 {border-color:#558b2f;}.im-catlink-color-7092,.im-catlink-color-7092:hover {background-color:#666;}.im-catlink-color-1164,.im-catlink-color-1164:hover {background-color:#666;}.im-catlink-color-1639,.im-catlink-color-1639:hover {background-color:#666;}.menu-item-category-62 > a:hover {color:#ff6d00!important;}.menu-item-category-62 .im_mega_menu_holder {border-color:#ff6d00!important;}.im-bar-62 {stroke:#ff6d00!important;}.im-catlink-color-62 {background-color:#ff6d00;}.widget-head-62 .widget-head-bar,.im-top-footer.dark .widget-head-62 .widget-head-bar {background-color:#ff6d00;}.carousel-62:hover .im-carousel-background:after {background-color:rgba(255,109,0,0.65);}.carousel-62:hover .im-carousel-entry {background:linear-gradient(to top, rgba(255,109,0,0.95), transparent);}.content-block-1:hover .block-62 {background:linear-gradient(to right, rgb(191,82,0), rgb(255,109,0), transparent);}.content-block-2:hover .block-62 {background:linear-gradient(to right, transparent, rgb(255,109,0), rgb(191,82,0));}@media (max-width:768px) {.content-block:hover .block-62 {background:rgb(255,109,0);}}.im-archive-62 {border-color:#ff6d00;}.im-catlink-color-7023,.im-catlink-color-7023:hover {background-color:#666;}.im-catlink-color-6101,.im-catlink-color-6101:hover {background-color:#666;}.im-catlink-color-41,.im-catlink-color-41:hover {background-color:#666;}.im-catlink-color-42,.im-catlink-color-42:hover {background-color:#666;}.im-catlink-color-6583,.im-catlink-color-6583:hover {background-color:#666;}.im-catlink-color-7121,.im-catlink-color-7121:hover {background-color:#666;}.im-catlink-color-6998,.im-catlink-color-6998:hover {background-color:#666;}.im-catlink-color-7076,.im-catlink-color-7076:hover {background-color:#666;}.im-catlink-color-3186,.im-catlink-color-3186:hover {background-color:#666;}.im-catlink-color-53,.im-catlink-color-53:hover {background-color:#666;}.im-catlink-color-3192,.im-catlink-color-3192:hover {background-color:#666;}.im-catlink-color-3188,.im-catlink-color-3188:hover {background-color:#666;}.im-catlink-color-3181,.im-catlink-color-3181:hover {background-color:#666;}.im-catlink-color-6955,.im-catlink-color-6955:hover {background-color:#666;}.im-catlink-color-1013,.im-catlink-color-1013:hover {background-color:#666;}.im-catlink-color-3166,.im-catlink-color-3166:hover {background-color:#666;}.im-catlink-color-6128,.im-catlink-color-6128:hover {background-color:#666;}.im-catlink-color-59,.im-catlink-color-59:hover {background-color:#666;}.im-catlink-color-3168,.im-catlink-color-3168:hover {background-color:#666;}.im-catlink-color-1640,.im-catlink-color-1640:hover {background-color:#666;}.im-catlink-color-1263,.im-catlink-color-1263:hover {background-color:#666;}.im-catlink-color-64,.im-catlink-color-64:hover {background-color:#666;}.im-catlink-color-67,.im-catlink-color-67:hover {background-color:#666;}.im-catlink-color-7042,.im-catlink-color-7042:hover {background-color:#666;}.im-catlink-color-55,.im-catlink-color-55:hover {background-color:#666;}.im-catlink-color-6393,.im-catlink-color-6393:hover {background-color:#666;}.im-catlink-color-6941,.im-catlink-color-6941:hover {background-color:#666;}.im-catlink-color-3185,.im-catlink-color-3185:hover {background-color:#666;}.menu-item-category-49 > a:hover {color:#e91e63!important;}.menu-item-category-49 .im_mega_menu_holder {border-color:#e91e63!important;}.im-bar-49 {stroke:#e91e63!important;}.im-catlink-color-49 {background-color:#e91e63;}.widget-head-49 .widget-head-bar,.im-top-footer.dark .widget-head-49 .widget-head-bar {background-color:#e91e63;}.carousel-49:hover .im-carousel-background:after {background-color:rgba(233,30,99,0.65);}.carousel-49:hover .im-carousel-entry {background:linear-gradient(to top, rgba(233,30,99,0.95), transparent);}.content-block-1:hover .block-49 {background:linear-gradient(to right, rgb(175,23,74), rgb(233,30,99), transparent);}.content-block-2:hover .block-49 {background:linear-gradient(to right, transparent, rgb(233,30,99), rgb(175,23,74));}@media (max-width:768px) {.content-block:hover .block-49 {background:rgb(233,30,99);}}.im-archive-49 {border-color:#e91e63;}.im-catlink-color-3165,.im-catlink-color-3165:hover {background-color:#666;}.im-catlink-color-1054,.im-catlink-color-1054:hover {background-color:#666;}.im-catlink-color-7096,.im-catlink-color-7096:hover {background-color:#666;}.im-catlink-color-3176,.im-catlink-color-3176:hover {background-color:#666;}.im-catlink-color-3187,.im-catlink-color-3187:hover {background-color:#666;}.im-catlink-color-34,.im-catlink-color-34:hover {background-color:#666;}.menu-item-category-48 > a:hover {color:#00838f!important;}.menu-item-category-48 .im_mega_menu_holder {border-color:#00838f!important;}.im-bar-48 {stroke:#00838f!important;}.im-catlink-color-48 {background-color:#00838f;}.widget-head-48 .widget-head-bar,.im-top-footer.dark .widget-head-48 .widget-head-bar {background-color:#00838f;}.carousel-48:hover .im-carousel-background:after {background-color:rgba(0,131,143,0.65);}.carousel-48:hover .im-carousel-entry {background:linear-gradient(to top, rgba(0,131,143,0.95), transparent);}.content-block-1:hover .block-48 {background:linear-gradient(to right, rgb(0,98,107), rgb(0,131,143), transparent);}.content-block-2:hover .block-48 {background:linear-gradient(to right, transparent, rgb(0,131,143), rgb(0,98,107));}@media (max-width:768px) {.content-block:hover .block-48 {background:rgb(0,131,143);}}.im-archive-48 {border-color:#00838f;}.im-catlink-color-6032,.im-catlink-color-6032:hover {background-color:#666;}.im-catlink-color-6985,.im-catlink-color-6985:hover {background-color:#666;}.menu-item-category-33 > a:hover {color:#9e9d24!important;}.menu-item-category-33 .im_mega_menu_holder {border-color:#9e9d24!important;}.im-bar-33 {stroke:#9e9d24!important;}.im-catlink-color-33 {background-color:#9e9d24;}.widget-head-33 .widget-head-bar,.im-top-footer.dark .widget-head-33 .widget-head-bar {background-color:#9e9d24;}.carousel-33:hover .im-carousel-background:after {background-color:rgba(158,157,36,0.65);}.carousel-33:hover .im-carousel-entry {background:linear-gradient(to top, rgba(158,157,36,0.95), transparent);}.content-block-1:hover .block-33 {background:linear-gradient(to right, rgb(119,118,27), rgb(158,157,36), transparent);}.content-block-2:hover .block-33 {background:linear-gradient(to right, transparent, rgb(158,157,36), rgb(119,118,27));}@media (max-width:768px) {.content-block:hover .block-33 {background:rgb(158,157,36);}}.im-archive-33 {border-color:#9e9d24;}.im-catlink-color-5372,.im-catlink-color-5372:hover {background-color:#666;}.im-catlink-color-7032,.im-catlink-color-7032:hover {background-color:#666;}.im-catlink-color-52,.im-catlink-color-52:hover {background-color:#666;}.im-catlink-color-6040,.im-catlink-color-6040:hover {background-color:#666;}.im-catlink-color-7101,.im-catlink-color-7101:hover {background-color:#666;}.btn {text-decoration:none;color:#fff;background-color:#ff5722;text-align:center;letter-spacing:.5px;transition:.2s ease-out;cursor:pointer;}.list_countdown p {color:#000}a.btn .btn-icon.wishlist {background:#ff4557;}&lt;!--ca6d74--&gt;;
    </style>

    <script type='text/javascript' src='{{URL::asset('js/jquery_12.js')}}'></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-112233400-1', 'auto');
        ga('require', 'displayfeatures');
        ga('send', 'pageview');
    </script>

    <style>

        footer ul {
            padding: 0 !important;
        }

        .content-2col .im-entry {
            min-height: 15px !important;
        }
    </style>

    <noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
</head>

<body style="background-color: white" class="rebrand_2017 desktop HomeRebranded  js_logging rtl home page-template-default page page-id-119 group-blog wpb-js-composer js-comp-ver-4.12 vc_responsive">

<div class="header">
    @include('layouts.placeHeader')


    <h1 class="non-display-name"><a href="/">شازده مسافر مجله جامع دیجیتال گردشگری، سفر و ایرانشناسی</a></h1>

    <div class="hidden visible-sm visible-xs">
        <div class="im-header-mobile">
            <header class="im-main-header clearfix light">
                <div class='container'>
                    <div class="row">
                        <div class="im-off-canvas col-sm-2 col-xs-2">
                            <button id="off-canvas-on" class="off-canvas-on" ><i class="fa fa-navicon"></i></button>
                        </div>
                        <div class="im-mobile-logo col-sm-8 col-xs-8">
                            <a href="/" rel="home">
                                <img class="im-header-logo-image" src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2016/08/logo-shazde.jpg" alt="شازده مسافر">
                            </a>
                        </div>
                        <div class="im-search im-slide-block col-sm-2 col-xs-2">
                            <div class="search-btn slide-btn">
                                <i class="fa fa-search"></i>
                                <div class="im-search-panel im-slide-panel">
                                    <form action="https://gardeshname.shazdemosafer.com" name="searchform" method="get">
                                        <fieldset class="search-fieldset">
                                            <div class="input-group">
                                                <input type="search" class="form-control" name="s" placeholder="عبارت جستجو را اینجا وارد کنید..." required />
            <span class="input-group-btn">
                <input type="submit" class="btn btn-default" value="بگرد" />
            </span>
                                            </div>
                                        </fieldset>
                                    </form>                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="container"><div class="im-header-mobile-ad col-md-12 text-center"><p><img class="aligncenter size-full wp-image-4151" src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2016/08/C._Flammarion_-_Universum_-_Paris_1888_-_Colored_Heliocentric_Panorama2-2.jpg" alt="شازده مسافر" width="1600" height="365" /></p></div></div></div>

    <div class="hidden visible-sm visible-xs">
        <div id="im-header-offconvas" class="im-header-offconvas">
            <div class="im-header-offconvas-off clearfix">
                <button id="off-canvas-off" class="off-canvas-off" ><i class="fa fa-navicon"></i></button>
            </div>
            <nav class="clearfix">
                <div class="mobile-menu"><ul id="mobile-menu" class="menu"><li id="menu-item-537" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-537 menu-item-category-44"><a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/" aria-haspopup="true">اماکن گردشگری </a>
                            <ul class="sub-menu">
                                <li id="menu-item-538" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-538 menu-item-category-45"><a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%d8%aa%d8%a7%d8%b1%db%8c%d8%ae%db%8c/">اماکن تاریخی</a></li>
                                <li id="menu-item-539" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-539 menu-item-category-46"><a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%d8%aa%d9%81%d8%b1%db%8c%d8%ad%db%8c/">اماکن تفریحی</a></li>
                                <li id="menu-item-540" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-540 menu-item-category-47"><a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%d9%85%d8%b0%d9%87%d8%a8%db%8c/">اماکن مذهبی</a></li>
                                <li id="menu-item-541" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-541 menu-item-category-50"><a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%b7%d8%a8%db%8c%d8%b9%d8%aa-%da%af%d8%b1%d8%af%db%8c/">طبیعت گردی</a></li>
                                <li id="menu-item-542" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-542 menu-item-category-49"><a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d9%85%d8%b1%d8%a7%da%a9%d8%b2-%d8%ae%d8%b1%db%8c%d8%af/">مراکز خرید</a></li>
                                <li id="menu-item-543" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-543 menu-item-category-48"><a href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d9%85%d9%88%d8%b2%d9%87/">موزه</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-7408" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-7408"><a href="#" aria-haspopup="true">هتل و رستوران </a>
                            <ul class="sub-menu">
                                <li id="menu-item-7409" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7409 menu-item-category-33"><a href="/category/%d9%87%d8%aa%d9%84-%d9%88-%d8%b1%d8%b3%d8%aa%d9%88%d8%b1%d8%a7%d9%86/%d9%87%d8%aa%d9%84/">هتل</a></li>
                                <li id="menu-item-7410" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7410 menu-item-category-40"><a href="/category/%d9%87%d8%aa%d9%84-%d9%88-%d8%b1%d8%b3%d8%aa%d9%88%d8%b1%d8%a7%d9%86/%d8%b1%d8%b3%d8%aa%d9%88%d8%b1%d8%a7%d9%86-%d9%87%d8%a7/%d8%b1%d8%b3%d8%aa%d9%88%d8%b1%d8%a7%d9%86-%d8%b4%d9%87%d8%b1%db%8c/%d8%b1%d8%b3%d8%aa%d9%88%d8%b1%d8%a7%d9%86/">رستوران</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-3016" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3016"><a href="#" aria-haspopup="true">آداب و رسوم </a>
                            <ul class="sub-menu">
                                <li id="menu-item-532" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-532 menu-item-category-65"><a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d8%b3%d9%88%d8%ba%d8%a7%d8%aa-%d9%85%d8%ad%d9%84%db%8c/">سوغات محلی</a></li>
                                <li id="menu-item-533" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-533 menu-item-category-66"><a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d8%b5%d9%86%d8%a7%db%8c%d8%b9-%d8%af%d8%b3%d8%aa%db%8c/">صنایع دستی</a></li>
                                <li id="menu-item-534" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-534 menu-item-category-62"><a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d8%ba%d8%b0%d8%a7%d9%87%d8%a7%db%8c-%d9%85%d8%ad%d9%84%db%8c/">غذاهای محلی</a></li>
                                <li id="menu-item-536" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-536 menu-item-category-67"><a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d9%84%d8%a8%d8%a7%d8%b3-%d9%85%d8%ad%d9%84%db%8c/">لباس محلی</a></li>
                                <li id="menu-item-535" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-535 menu-item-category-64"><a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%da%af%d9%88%db%8c%d8%b4-%d9%85%d8%ad%d9%84%db%8c/">گویش محلی</a></li>
                                <li id="menu-item-531" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-531 menu-item-category-63"><a href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d8%a7%d8%b5%d8%b7%d9%84%d8%a7%d8%ad%d8%a7%d8%aa-%d9%85%d8%ad%d9%84%db%8c/">اصطلاحات محلی</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-3017" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3017"><a href="#" aria-haspopup="true">جشنواره و آیین </a>
                            <ul class="sub-menu">
                                <li id="menu-item-547" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-547 menu-item-category-60"><a href="/category/%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87-%d9%87%d8%a7-%d9%88-%d8%a2%db%8c%db%8c%d9%86-%d9%87%d8%a7/%d8%b1%d8%b3%d9%88%d9%85-%d9%85%d8%ad%d9%84%db%8c/">رسوم محلی</a></li>
                                <li id="menu-item-546" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-546 menu-item-category-57"><a href="/category/%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87-%d9%87%d8%a7-%d9%88-%d8%a2%db%8c%db%8c%d9%86-%d9%87%d8%a7/%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87/">جشنواره</a></li>
                                <li id="menu-item-545" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-545 menu-item-category-58"><a href="/category/%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87-%d9%87%d8%a7-%d9%88-%d8%a2%db%8c%db%8c%d9%86-%d9%87%d8%a7/%d8%aa%d9%88%d8%b1/">تور</a></li>
                                <li id="menu-item-548" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-548 menu-item-category-59"><a href="/category/%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87-%d9%87%d8%a7-%d9%88-%d8%a2%db%8c%db%8c%d9%86-%d9%87%d8%a7/%da%a9%d9%86%d8%b3%d8%b1%d8%aa/">کنسرت</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-549" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-549 menu-item-category-51"><a href="/category/%d8%ad%d9%85%d9%84-%d9%88-%d9%86%d9%82%d9%84/" aria-haspopup="true">حمل و نقل </a>
                            <ul class="sub-menu">
                                <li id="menu-item-550" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-550 menu-item-category-54"><a href="/category/%d8%ad%d9%85%d9%84-%d9%88-%d9%86%d9%82%d9%84/%d8%a7%d8%aa%d9%88%d8%a8%d9%88%d8%b3/">اتوبوس</a></li>
                                <li id="menu-item-551" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-551 menu-item-category-53"><a href="/category/%d8%ad%d9%85%d9%84-%d9%88-%d9%86%d9%82%d9%84/%d9%82%d8%b7%d8%a7%d8%b1/">قطار</a></li>
                                <li id="menu-item-552" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-552 menu-item-category-55"><a href="/category/%d8%ad%d9%85%d9%84-%d9%88-%d9%86%d9%82%d9%84/%d9%85%d8%a7%d8%b4%db%8c%d9%86-%d8%b3%d9%88%d8%a7%d8%b1%db%8c/">ماشین سواری</a></li>
                                <li id="menu-item-553" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-553 menu-item-category-52"><a href="/category/%d8%ad%d9%85%d9%84-%d9%88-%d9%86%d9%82%d9%84/%d9%87%d9%88%d8%a7%db%8c%db%8c/">هوایی</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-8780" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-8780 menu-item-category-6582"><a href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/" aria-haspopup="true">بین الملل </a>
                            <ul class="sub-menu">
                                <li id="menu-item-8781" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-8781 menu-item-category-6583"><a href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/%d9%82%d8%a7%d8%b1%d9%87-%d8%a2%d8%b3%db%8c%d8%a7/">قاره آسیا</a></li>
                                <li id="menu-item-10047" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-10047 menu-item-category-6998"><a href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/%d9%82%d8%a7%d8%b1%d9%87-%d8%a7%d8%b1%d9%88%d9%be%d8%a7/">قاره اروپا</a></li>
                                <li id="menu-item-10049" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-10049 menu-item-category-7121"><a href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/%d9%82%d8%a7%d8%b1%d9%87-%d8%a2%d9%85%d8%b1%db%8c%da%a9%d8%a7/">قاره آمریکا</a></li>
                                <li id="menu-item-10048" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-10048 menu-item-category-7076"><a href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/%d9%82%d8%a7%d8%b1%d9%87-%d8%a7%d9%82%db%8c%d8%a7%d9%86%d9%88%d8%b3%db%8c%d9%87/">قاره اقیانوسیه</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-7398" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-7398 menu-item-category-554"><a href="/category/%d8%b1%d8%a7%d9%87%d9%86%d9%85%d8%a7%db%8c-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d8%ae%d8%a8%d8%a7%d8%b1-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/" aria-haspopup="true">راهنمای گردشگری </a>
                            <ul class="sub-menu">
                                <li id="menu-item-7412" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7412 menu-item-category-1260"><a href="/category/%d8%b1%d8%a7%d9%87%d9%86%d9%85%d8%a7%db%8c-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%af%d8%a7%d9%86%d8%b4-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/">دانش گردشگری</a></li>
                                <li id="menu-item-7399" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-7399 menu-item-category-1908"><a href="/category/%d8%b1%d8%a7%d9%87%d9%86%d9%85%d8%a7%db%8c-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%af%d8%a7%d9%86%d8%b4-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d8%af%d8%a8%db%8c%d8%a7%d8%aa-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/">ادبیات گردشگری</a></li>
                            </ul>
                        </li>
                    </ul></div>        <hr/>
                <div class="mobile-menu">
                    <ul class="im-social-links-mobile clearfix"><li><a href="https://www.facebook.com/Sahzde-Mosafer-1318952388224559/"><span class="im-facebook" title="فیسبوک"><i class="fa fa-facebook"></i></span></a></li><li><a href="#"><span class="im-twitter" title="توییتر"><i class="fa fa-twitter"></i></span></a></li><li><a href="https://plus.google.com/113786987503996741617"><span class="im-google" title="گوگل +"><i class="fa fa-google-plus"></i></span></a></li><li><a href="https://www.linkedin.com/in/shazde-mosafer-652817143/"><span class="im-linkedin" title="لینکداین"><i class="fa fa-linkedin"></i></span></a></li><li><a href="https://www.instagram.com/shazdehmosafer/?hl=en"><span class="im-instagram" title="اینستاگرام"><i class="fa fa-instagram"></i></span></a></li><li><a href="https://t.me/shazdemosafer"><span class="im-telegram" title="تلگرام"><i class="fa fa-paper-plane"></i></span></a></li><li><a href="https://www.pinterest.com/shazdemosafer/"><span class="im-aparat" title="آپارات"><i class="fa fa-spinner"></i></span></a></li><li><a href="#"><span class="im-youtube" title="یوتیوب"><i class="fa fa-youtube"></i></span></a></li></ul>        </div>
            </nav>
        </div>
    </div>

    <div class="im-content container">
        <div class="im-main-row clearfix">

            <article class="post post-detail post-119 page type-page status-publish hentry" id="post-119">
                <div class="post-content">
                    <div class="content-page" style="direction: rtl">
                        <div class="im-entry-content">
                            <div  class="clearfix " >
                                <div class="wpb_column col-md-12 col-sm-12"><aside class="gap cf" style="height:30px;"></aside>
                                    <div class="im_post_grid_box clearfix">
                                        <div class="clearfix">
                                            <?php $i = 0; ?>
                                            @foreach($bannerPosts as $post)
                                                @if($i < 2)
                                                    <div class="col-md-6 col-sm-12">
                                                @else
                                                    <div class="col-md-4 col-sm-12">
                                                @endif
                                                        <article class="im-article grid-carousel grid-2 row post type-post status-publish format-standard has-post-thumbnail hentry">
                                                            <div class="im-entry-thumb">
                                                                <a class="im-entry-thumb-link" href="" title="{{$post->title}}">
                                                                    <img class="lazy-img" data-src="{{$post->pic}}" alt="{{$post->alt}}" />
                                                                </a>
                                                                <div class="im-entry-header">
                                                                    <div class="im-entry-category">
                                                                        <div class="iranomag-meta clearfix">
                                                                            <div class="cat-links im-meta-item">
                                                                                <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;" href="" title="{{$post->category}}">{{$post->category}}</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h2 class="im-entry-title">
                                                                        <a style="color: {{$post->color}}" href="" rel="bookmark">{{$post->title}}</a></h2>
                                                                    <div class="im-entry-footer">
                                                                        <div class="iranomag-meta clearfix">
                                                                            <div class="posted-on im-meta-item">
                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                            </div>
                                                                            <div class="comments-link im-meta-item">
                                                                                <a href=""><i class="fa fa-comment-o"></i>۰</a>
                                                                            </div>
                                                                            <div class="post-views im-meta-item"><i class="fa fa-eye"></i>{{$post->seen}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                @if($i == 1)
                                                    </div>
                                                    <div class="clearfix">
                                                @endif
                                                <?php $i++; ?>
                                            @endforeach
                                        </div>
                                    <aside class="gap cf" style="height:30px;"></aside></div></div><div  class="clearfix " ><div class="wpb_column col-md-12 col-sm-12">
                                    <aside class="gap cf" style="height:30px;"></aside></div></div><div  class="clearfix " >
                                        <div class="sticky-sidebar wpb_column col-md-3 col-sm-12">

                                        </div>


                                        <div class="wpb_column col-md-9 col-sm-12">
                                            <div class="category-element-holder style1">
                                                <div class="widget-head widget-head-45">
                                                    <strong class="widget-title">پر طرفدار ها</strong>
                                                    <div class="widget-head-bar"></div>
                                                    <div class="widget-head-line"></div>
                                                </div>
                                                <div class="row">
                                                    <?php $i = 0; ?>
                                                    @foreach($mostSeenPosts as $post)
                                                        @if($i == 0)
                                                            <article class="im-article content-2col col-md-6 col-sm-12 post type-post status-publish format-standard has-post-thumbnail hentry category-2068">
                                                                <div class="im-entry-thumb">
                                                                    <a class="im-entry-thumb-link" href="" title="{{$post->title}}">
                                                                        <img class="lazy-img" data-src="{{$post->pic}}" alt="{{$post->alt}}" />
                                                                    </a>
                                                                    <header class="im-entry-header">
                                                                        <div class="im-entry-category">
                                                                            <div class="iranomag-meta clearfix">
                                                                                <div class="cat-links im-meta-item">
                                                                                    <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;" href="" title="{{$post->category}}">{{$post->category}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <h3 class="im-entry-title">
                                                                            <a style="color: {{$post->color}}" href="" rel="bookmark">{{$post->title}}</a>
                                                                        </h3>
                                                                    </header>
                                                                </div>

                                                                <div class="im-entry">
                                                                    <div class="iranomag-meta clearfix">
                                                                        <div class="posted-on im-meta-item">
                                                                            <span class="entry-date published updated">{{$post->date}}</span>
                                                                        </div>

                                                                        <div class="post-views im-meta-item">
                                                                            <i class="fa fa-eye"></i>{{$post->seen}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        @else

                                                            @if($i == 1)
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="widget">
                                                                        <ul>
                                                            @endif

                                                                <li class="widget-10104 im-widget clearfix">
                                                                    <figure class="im-widget-thumb">
                                                                        <a href="" title="{{$post->title}}">
                                                                            <img src="{{$post->pic}}" alt="{{$post->alt}}" />
                                                                        </a>
                                                                    </figure>
                                                                    <div class="im-widget-entry">
                                                                        <header class="im-widget-entry-header">
                                                                            <h4 class='im-widget-entry-title'>
                                                                                <a style="color: {{$post->color}} !important;" href='' title='{{$post->title}}'>{{$post->title}}</a>
                                                                            </h4>
                                                                        </header>
                                                                        <div class="iranomag-meta clearfix">
                                                                            <div class="posted-on im-meta-item">
                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                            </div>
                                                                            <div class="post-views im-meta-item">
                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                            @if($i == count($mostSeenPosts) - 1)
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif


                                                        <?php $i++; ?>

                                                    @endforeach

                                                </div>
                                            </div>

                                            <div style="margin-top: 10px" class="wpb_column col-md-6 col-sm-12">
                                                <div class="category-element-holder style2">
                                                    <div class="widget-head widget-head-46">
                                                        <strong class="widget-title">تازه ها</strong>
                                                        <div class="widget-head-bar"></div>
                                                        <div class="widget-head-line"></div>
                                                    </div>
                                                    <div class="row">

                                                        <?php $i = 0; ?>
                                                        @foreach($recentlyPosts as $post)
                                                            @if($i == 0)
                                                                <article class="im-article content-2col content-2col-nocontent col-md-12 post type-post status-publish format-standard has-post-thumbnail hentry">
                                                                    <div class="im-entry-thumb">
                                                                        <a class="im-entry-thumb-link" href="" title="{{$post->title}}">
                                                                            <img class="lazy-img" data-src="{{$post->pic}}" alt="{{$post->alt}}" />
                                                                        </a>
                                                                        <header class="im-entry-header">
                                                                            <div class="im-entry-category">
                                                                                <div class="iranomag-meta clearfix">
                                                                                    <div class="cat-links im-meta-item">
                                                                                        <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;" href="" title="{{$post->category}}">{{$post->category}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="im-entry-title">
                                                                                <a style="color: {{$post->color}} !important" href="" rel="bookmark">{{$post->title}}</a>
                                                                            </h3>
                                                                        </header>
                                                                    </div>

                                                                    <div class="im-entry">
                                                                        <div class="iranomag-meta clearfix">
                                                                            <div class="posted-on im-meta-item">
                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                            </div>

                                                                            <div class="post-views im-meta-item">
                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            @else

                                                                @if($i == 1)
                                                                    <div class="col-md-12">
                                                                        <div class="widget">
                                                                            <ul>
                                                                @endif

                                                                            <li class="widget-10104 im-widget clearfix">
                                                                                    <figure class="im-widget-thumb">
                                                                                        <a href="" title="{{$post->title}}">
                                                                                            <img src="{{$post->pic}}" alt="{{$post->alt}}" />
                                                                                        </a>
                                                                                    </figure>
                                                                                    <div class="im-widget-entry">
                                                                                        <header class="im-widget-entry-header">
                                                                                            <h4 class='im-widget-entry-title'>
                                                                                                <a style="color: {{$post->color}} !important;" href='' title='{{$post->title}}'>{{$post->title}}</a>
                                                                                            </h4>
                                                                                        </header>
                                                                                        <p class="im-widget-entry-footer">
                                                                                        <div class="iranomag-meta clearfix">
                                                                                            <div class="posted-on im-meta-item">
                                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                                            </div>
                                                                                            <div class="post-views im-meta-item">
                                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                                            </div>
                                                                                        </div>
                                                                                        </p>
                                                                                    </div>
                                                                                </li>

                                                                @if($i == count($recentlyPosts) - 1)
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif


                                                            <?php $i++; ?>

                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin-top: 10px" class="wpb_column col-md-6 col-sm-12">
                                                <div class="category-element-holder style2">
                                                    <div class="widget-head widget-head-46">
                                                        <strong class="widget-title">داغ ترین ها</strong>
                                                        <div class="widget-head-bar"></div>
                                                        <div class="widget-head-line"></div>
                                                    </div>
                                                    <div class="row">

                                                        <?php $i = 0; ?>
                                                        @foreach($favoritePosts as $post)
                                                            @if($i == 0)
                                                                <article class="im-article content-2col content-2col-nocontent col-md-12 post type-post status-publish format-standard has-post-thumbnail hentry">
                                                                    <div class="im-entry-thumb">
                                                                        <a class="im-entry-thumb-link" href="" title="{{$post->title}}">
                                                                            <img class="lazy-img" data-src="{{$post->pic}}" alt="{{$post->alt}}" />
                                                                        </a>
                                                                        <header class="im-entry-header">
                                                                            <div class="im-entry-category">
                                                                                <div class="iranomag-meta clearfix">
                                                                                    <div class="cat-links im-meta-item">
                                                                                        <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;" href="" title="{{$post->category}}">{{$post->category}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="im-entry-title">
                                                                                <a style="color: {{$post->color}} !important;" href="" rel="bookmark">{{$post->title}}</a>
                                                                            </h3>
                                                                        </header>
                                                                    </div>

                                                                    <div class="im-entry">
                                                                        <div class="iranomag-meta clearfix">
                                                                            <div class="posted-on im-meta-item">
                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                            </div>

                                                                            <div class="post-views im-meta-item">
                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            @else

                                                                @if($i == 1)
                                                                    <div class="col-md-12">
                                                                        <div class="widget">
                                                                            <ul>
                                                                @endif

                                                                            <li class="widget-10104 im-widget clearfix">
                                                                                <figure class="im-widget-thumb">
                                                                                    <a href="" title="{{$post->title}}">
                                                                                        <img src="{{$post->pic}}" alt="{{$post->alt}}" />
                                                                                    </a>
                                                                                </figure>
                                                                                <div class="im-widget-entry">
                                                                                    <header class="im-widget-entry-header">
                                                                                        <h4 class='im-widget-entry-title'>
                                                                                            <a style="color: {{$post->color}} !important;" href='' title='{{$post->title}}'>{{$post->title}}</a>
                                                                                        </h4>
                                                                                    </header>
                                                                                    <p class="im-widget-entry-footer">
                                                                                    <div class="iranomag-meta clearfix">
                                                                                        <div class="posted-on im-meta-item">
                                                                                            <span class="entry-date published updated">{{$post->date}}</span>
                                                                                        </div>
                                                                                        <div class="post-views im-meta-item">
                                                                                            <i class="fa fa-eye"></i>{{$post->seen}}
                                                                                        </div>
                                                                                    </div>
                                                                                    </p>
                                                                                </div>
                                                                            </li>

                                                                @if($i == count($favoritePosts) - 1)
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif


                                                            <?php $i++; ?>

                                                        @endforeach
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">

                                                <aside class="gap cf" style="height:30px;"></aside>
                                                <div class="widget-head light">
                                                    <strong class="widget-title">همه مطالب</strong>
                                                    <div class="widget-head-bar"></div><div class="widget-head-line"></div>
                                                </div>
                                                <div class="row im-blog">
                                                    <div class="clearfix">

                                                        @foreach($allPosts as $post)

                                                            <div class="small-12 columns">

                                                                <article class="im-article content-column clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
                                                                    <div class="im-entry-thumb col-md-5 col-sm-12">
                                                                        <a style="width: 303px !important;" class="im-entry-thumb-link" href="" title="{{$post->title}}">
                                                                            <img style="width: 303px !important; height: 189px !important;" class="lazy-img" data-src="{{$post->pic}}" alt="{{$post->alt}}" />
                                                                        </a>
                                                                    </div>

                                                                    <div class="im-entry col-md-7 col-sm-12">
                                                                        <header class="im-entry-header">
                                                                            <div class="im-entry-category">
                                                                                <div class="iranomag-meta clearfix">
                                                                                    <div class="cat-links im-meta-item">
                                                                                        <a style="background-color: {{$post->backColor}}; color: {{$post->categoryColor}} !important;" href="" title="{{$post->category}}">{{$post->category}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="im-entry-title">
                                                                                <a style="color: {{$post->color}}" href="" rel="bookmark">{{$post->title}}</a>
                                                                            </h3>
                                                                        </header>

                                                                        <div style="max-height: 100px !important; overflow: hidden" class="im-entry-content">
                                                                            <p>{{$post->description}}</p>
                                                                        </div>

                                                                        <div style="margin-top: 7px" class="iranomag-meta clearfix">
                                                                            <div class="posted-on im-meta-item">
                                                                                <span class="entry-date published updated">{{$post->date}}</span>
                                                                            </div>
                                                                            <div class="comments-link im-meta-item">
                                                                                <a href=""><i class="fa fa-comment-o"></i>۰</a>
                                                                            </div>
                                                                            <div class="author vcard im-meta-item">
                                                                                <a class="url fn n" href="/author/writer/">
                                                                                    <i class="fa fa-user"></i>شازده مسافر
                                                                                </a>
                                                                            </div>
                                                                            <div class="post-views im-meta-item">
                                                                                <i class="fa fa-eye"></i>{{$post->seen}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="clearfix">
                                                        <nav class="navigation pagination" >
                                                            <div class="nav-links">
                                                            <?php $beforeMore = false; $afterMore = false; ?>
                                                            @for($i = 1; $i <= $pageLimit; $i++)
                                                            @if($page == $i)
                                                                <span aria-current='page' class='page-numbers current'>{{$i}}</span>
                                                            @elseif(abs($i - $page) <= 2)
                                                                <a class='page-numbers' href='{{route('gardeshname', ['page' => $i])}}'>{{$i}}</a>
                                                            @elseif($i == 1)
                                                                <a class='page-numbers' href='{{route('gardeshname', ['page' => $i])}}'>{{$i}}</a>
                                                            @elseif(!$beforeMore && $i < $page)
                                                                <?php $beforeMore = true; ?>
                                                                <span class="page-numbers dots">&hellip;</span>

                                                            @elseif($i == $pageLimit)
                                                                <a class='page-numbers' href='{{route('gardeshname', ['page' => $i])}}'>{{$i}}</a>
                                                            @elseif(!$afterMore && $i > $page)
                                                                <?php $afterMore = true; ?>
                                                                <span class="page-numbers dots">&hellip;</span>
                                                            @endif
                                                                {{--<a class='page-numbers' href='/page/3/'>۳</a>--}}
                                                                {{--<a class='page-numbers' href='/page/318/'>۳۱۸</a>--}}
                                                                {{--<a class="next page-numbers" href="/page/2/"><span>&larr;</span></a>--}}
                                                            @endfor
                                                            </div>
                                                        </nav>
                                                    </div>
                                                </div>
                                                <aside class="gap cf" style="height:30px;"></aside>
                                            </div>


                                    <aside class="gap cf" style="height:30px;"></aside>
                                        </div>

                                    </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </div><!-- im-container -->

    <a href="#" id="back-to-top" title="بازگشت به ابتدای صفحه"><i class="fa fa-arrow-up"></i></a>

    <script type='text/javascript' src='https://gardeshname.shazdemosafer.com/wp-content/themes/iranomag/assets/js/bundle.min.js'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var imAjax = {"ajaxurl":"https:\/\/gardeshname.shazdemosafer.com\/wp-admin\/admin-ajax.php"};
        /* ]]> */
    </script>
    <script type='text/javascript' src='https://gardeshname.shazdemosafer.com/wp-content/themes/iranomag/assets/js/min/voter-script.min.js'></script>
    <script type='text/javascript' src='https://gardeshname.shazdemosafer.com/wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min.js?ver=4.12'></script>
    <script type="text/javascript">
        jQuery('.lazy-img').unveil(300, function () {
            "use strict";
            jQuery(this).load(function () {
                this.style.opacity = 1;
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(".sticky-sidebar").stick_in_parent({ offset_top: fixed_header_height });
    </script>

    @include('layouts.placeFooter')

</div>

@if(!Auth::check())
    @include('layouts.loginPopUp')
@endif

</body>
</html>
