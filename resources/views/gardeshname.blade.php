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
                            <div  class="clearfix " ><div class="wpb_column col-md-12 col-sm-12"><aside class="gap cf" style="height:30px;"></aside>			<div class="im_post_grid_box clearfix">
                                        <div class="clearfix">
                                            <div class="col-md-6 col-sm-12">
                                                <article class="im-article grid-carousel grid-2 row post-4805 post type-post status-publish format-standard has-post-thumbnail hentry category-45 category-46 category-44 category-50 tag-1841 tag-886 tag-1501 tag-1833 tag-1431 tag-1713 tag-1965 tag-1962 tag-1961 tag-1966 tag-1967 tag-1960 tag-1963 tag-1964">
                                                    <div class="im-entry-thumb">
                                                        <a class="im-entry-thumb-link" href="/%d8%b3%d8%a7%d8%b2%d9%87-%d9%87%d8%a7%db%8c-%d8%a2%d8%a8%db%8c-%d8%b4%d9%88%d8%b4%d8%aa%d8%b1/" title="سازه های آبی شوشتر و جاذبه های دیگر شهر شوشتر">
                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/11/4c7b8841-67a3-45bd-876d-d7a1c799568c-780x680.jpg" alt="سازه های آبی شوشتر و جاذبه های دیگر شهر شوشتر" />
                                                        </a>
                                                        <div class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-44" href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/" title="اماکن گردشگری">اماکن گردشگری</a></div></div>			</div>
                                                            <h2 class="im-entry-title"><a href="/%d8%b3%d8%a7%d8%b2%d9%87-%d9%87%d8%a7%db%8c-%d8%a2%d8%a8%db%8c-%d8%b4%d9%88%d8%b4%d8%aa%d8%b1/" rel="bookmark">سازه های آبی شوشتر و جاذبه های دیگر شهر شوشتر</a></h2>			<div class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">شنبه, ۱۳ آبان ۱۳۹۶</span></div><div class="comments-link im-meta-item"><a href="/%d8%b3%d8%a7%d8%b2%d9%87-%d9%87%d8%a7%db%8c-%d8%a2%d8%a8%db%8c-%d8%b4%d9%88%d8%b4%d8%aa%d8%b1/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۴۴۷</div></div>			</div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <article class="im-article grid-carousel grid-2 row post-4818 post type-post status-publish format-standard has-post-thumbnail hentry category-63 category-46 category-44 category-65 category-66 category-50 category-62 category-1640 category-1263 category-64 category-67 tag-1980 tag-1749 tag-1501 tag-1833 tag-1983 tag-903 tag-1431 tag-1977 tag-1976 tag-1982 tag-1984 tag-1979 tag-1978 tag-176 tag-1981">
                                                    <div class="im-entry-thumb">
                                                        <a class="im-entry-thumb-link" href="/%d8%aa%d8%b1%da%a9%d9%85%d9%86-%d8%b5%d8%ad%d8%b1%d8%a7-%d8%a7%d8%b3%d8%a8-%d8%a7%d8%b5%d9%84-%da%86%db%8c%d8%b2-%d8%a8%da%a9%d8%b1/" title="ترکمن صحرا از اسب تا اصل همه چیز بکر و منحصر به فرد">
                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/11/84-1-780x645.jpg" alt="ترکمن صحرا از اسب تا اصل همه چیز بکر و منحصر به فرد" />
                                                        </a>
                                                        <div class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-50" href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%b7%d8%a8%db%8c%d8%b9%d8%aa-%da%af%d8%b1%d8%af%db%8c/" title="طبیعت گردی">طبیعت گردی</a></div></div>			</div>
                                                            <h2 class="im-entry-title"><a href="/%d8%aa%d8%b1%da%a9%d9%85%d9%86-%d8%b5%d8%ad%d8%b1%d8%a7-%d8%a7%d8%b3%d8%a8-%d8%a7%d8%b5%d9%84-%da%86%db%8c%d8%b2-%d8%a8%da%a9%d8%b1/" rel="bookmark">ترکمن صحرا از اسب تا اصل همه چیز بکر و منحصر به فرد</a></h2>			<div class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">شنبه, ۱۳ آبان ۱۳۹۶</span></div><div class="comments-link im-meta-item"><a href="/%d8%aa%d8%b1%da%a9%d9%85%d9%86-%d8%b5%d8%ad%d8%b1%d8%a7-%d8%a7%d8%b3%d8%a8-%d8%a7%d8%b5%d9%84-%da%86%db%8c%d8%b2-%d8%a8%da%a9%d8%b1/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۳۳۲</div></div>			</div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="clearfix">							<div class="col-md-4 col-sm-12">
                                                <article class="im-article grid-carousel grid-1-small row post-4811 post type-post status-publish format-standard has-post-thumbnail hentry category-45 category-44 category-1164 category-1640 tag-1796 tag-1501 tag-903 tag-1431 tag-1973 tag-1735 tag-1970 tag-1968 tag-1969 tag-1972 tag-1975 tag-1793 tag-1974 tag-1971">
                                                    <div class="im-entry-thumb">
                                                        <a class="im-entry-thumb-link" href="/%d8%af%d8%a7%d8%b1%db%8c%d9%88%d8%b4-%d8%a8%d8%b2%d8%b1%da%af/" title="داریوش بزرگ و سنگ نوشته های بیستون دست نیافتنی">
                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/11/1391947529052-390x340.jpg" alt="داریوش بزرگ و سنگ نوشته های بیستون دست نیافتنی" />
                                                        </a>
                                                        <div class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-45" href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%d8%aa%d8%a7%d8%b1%db%8c%d8%ae%db%8c/" title="اماکن تاریخی">اماکن تاریخی</a></div></div>			</div>
                                                            <h2 class="im-entry-title"><a href="/%d8%af%d8%a7%d8%b1%db%8c%d9%88%d8%b4-%d8%a8%d8%b2%d8%b1%da%af/" rel="bookmark">داریوش بزرگ و سنگ نوشته های بیستون دست نیافتنی</a></h2>			<div class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">شنبه, ۱۳ آبان ۱۳۹۶</span></div><div class="comments-link im-meta-item"><a href="/%d8%af%d8%a7%d8%b1%db%8c%d9%88%d8%b4-%d8%a8%d8%b2%d8%b1%da%af/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۳۳۹</div></div>			</div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <article class="im-article grid-carousel grid-1-small row post-4918 post type-post status-publish format-standard has-post-thumbnail hentry category-2079 category-2070 category-44 category-50 category-1640 tag-2128 tag-2126 tag-1763 tag-1749 tag-1501 tag-1833 tag-903 tag-1431 tag-159 tag-2125 tag-2127 tag-2120 tag-2123 tag-2121 tag-2124 tag-2122">
                                                    <div class="im-entry-thumb">
                                                        <a class="im-entry-thumb-link" href="/%d8%af%d8%b1%d9%87-%d8%a7%d8%b1%d9%88%d8%a7%d8%ad/" title="دره ارواح یا کول خرسان مکانی راز آلود و خطرناک برای مسافران">
                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/11/3d505677439e47000ffcf37fbb9a503b-390x340.jpg" alt="دره ارواح یا کول خرسان مکانی راز آلود و خطرناک برای مسافران" />
                                                        </a>
                                                        <div class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-2079" href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%b7%d8%a8%db%8c%d8%b9%d8%aa-%da%af%d8%b1%d8%af%db%8c/%d8%a2%d8%a8%d8%b4%d8%a7%d8%b1/">آبشار</a></div></div>			</div>
                                                            <h2 class="im-entry-title"><a href="/%d8%af%d8%b1%d9%87-%d8%a7%d8%b1%d9%88%d8%a7%d8%ad/" rel="bookmark">دره ارواح یا کول خرسان مکانی راز آلود و خطرناک برای مسافران</a></h2>			<div class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">سه شنبه, ۱۶ آبان ۱۳۹۶</span></div><div class="comments-link im-meta-item"><a href="/%d8%af%d8%b1%d9%87-%d8%a7%d8%b1%d9%88%d8%a7%d8%ad/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۷۹۴</div></div>			</div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <article class="im-article grid-carousel grid-1-small row post-4753 post type-post status-publish format-standard has-post-thumbnail hentry category-940 category-44 category-50 category-1164 category-1640 tag-125 tag-1763 tag-903 tag-1431 tag-1606 tag-1894 tag-1893 tag-1892 tag-1896 tag-1895 tag-1371 tag-176 tag-1611">
                                                    <div class="im-entry-thumb">
                                                        <a class="im-entry-thumb-link" href="/%d8%aa%d9%86%da%af-%d8%b2%db%8c%d8%a8%d8%a7%db%8c-%d8%a8%d8%b3%d8%aa%d8%a7%d9%86%da%a9/" title="تنگ زیبای بستانک : بهشت گمشدۀ ایران با گونه های جانوری فراوان">
                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/10/58576606-e1471395511795-1024x654-390x340.jpg" alt="تنگ زیبای بستانک : بهشت گمشدۀ ایران با گونه های جانوری فراوان" />
                                                        </a>
                                                        <div class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-940" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d9%81%d8%a7%d8%b1%d8%b3/" title="استان فارس">استان فارس</a></div></div>			</div>
                                                            <h2 class="im-entry-title"><a href="/%d8%aa%d9%86%da%af-%d8%b2%db%8c%d8%a8%d8%a7%db%8c-%d8%a8%d8%b3%d8%aa%d8%a7%d9%86%da%a9/" rel="bookmark">تنگ زیبای بستانک : بهشت گمشدۀ ایران با گونه های جانوری فراوان</a></h2>			<div class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">پنجشنبه, ۱۱ آبان ۱۳۹۶</span></div><div class="comments-link im-meta-item"><a href="/%d8%aa%d9%86%da%af-%d8%b2%db%8c%d8%a8%d8%a7%db%8c-%d8%a8%d8%b3%d8%aa%d8%a7%d9%86%da%a9/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۶۵۶</div></div>			</div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>							</div>													</div>
                                    <aside class="gap cf" style="height:30px;"></aside></div></div><div  class="clearfix " ><div class="wpb_column col-md-12 col-sm-12">		<div class="clearfix im-post-block">

                                        <article class="im-article content-block content-block-1 clearfix post-9876 post type-post status-publish format-standard has-post-thumbnail hentry category-2068 category-50 category-1164 category-1639 tag-903 tag-7108 tag-1180 tag-7118 tag-7119 tag-1171 tag-230 tag-4998 tag-7117">
                                            <div class="row">
                                                <div class="im-entry-thumb col-md-12">
                                                    <a class="im-entry-link" href="/%d8%ba%d8%a7%d8%b1-%d8%a2%d9%88%db%8c%d8%b4%d9%88%db%8c-%d9%85%d8%a7%d8%b3%d8%a7%d9%84-%da%af%db%8c%d9%84%d8%a7%d9%86/"></a>
                                                    <div class="im-entry-thumb-image">
                                                        <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/06/avisho8.jpg" alt="غار آویشوی در نزدیکی روستای ماسال واقع در استان سرسبز گیلان" />
                                                    </div>
                                                    <div class="im-entry-block block-2068">
                                                        <div class="im-entry-header">
                                                            <h3 class="im-entry-title"><a href="/%d8%ba%d8%a7%d8%b1-%d8%a2%d9%88%db%8c%d8%b4%d9%88%db%8c-%d9%85%d8%a7%d8%b3%d8%a7%d9%84-%da%af%db%8c%d9%84%d8%a7%d9%86/" rel="bookmark">غار آویشوی در نزدیکی روستای ماسال واقع در استان سرسبز گیلان</a></h3>				</div>
                                                        <div class="im-entry-footer">
                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">یکشنبه, ۱۰ تیر ۱۳۹۷</span></div><div class="comments-link im-meta-item"><a href="/%d8%ba%d8%a7%d8%b1-%d8%a2%d9%88%db%8c%d8%b4%d9%88%db%8c-%d9%85%d8%a7%d8%b3%d8%a7%d9%84-%da%af%db%8c%d9%84%d8%a7%d9%86/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/writer/"><i class="fa fa-user"></i>شازده مسافر</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۲۸۱</div></div>				</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <aside class="gap cf" style="height:30px;"></aside></div></div><div  class="clearfix " ><div class="wpb_column col-md-8 col-sm-12">		<div class="category-element-holder style1">
                                        <div class="widget-head widget-head-45">
                                            <strong class="widget-title">
                                                اماکن تاریخی				</strong>
                                            <div class="widget-head-bar"></div>
                                            <div class="widget-head-line"></div>
                                        </div>
                                        <div class="row">
                                            <article class="im-article content-2col col-md-6 col-sm-12 post-10111 post type-post status-publish format-standard has-post-thumbnail hentry category-2068 category-45 tag-159 tag-3784 tag-1180 tag-7118 tag-230 tag-864 tag-5677">
                                                <div class="im-entry-thumb">
                                                    <a class="im-entry-thumb-link" href="/%d9%85%d9%86%d8%a7%d8%b1%d9%87-%da%af%d8%b3%da%a9%d8%b1/" title="مناره گسکر یا مناره بازار، یکی از زییاترین و  با شکوه ترین بناهای به جا مانده از دوره سلجوقی">
                                                        <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/n3547645-6171682.jpg" alt="مناره گسکر یا مناره بازار، یکی از زییاترین و  با شکوه ترین بناهای به جا مانده از دوره سلجوقی" />
                                                    </a>
                                                    <header class="im-entry-header">
                                                        <div class="im-entry-category">
                                                            <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-2068" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%da%af%db%8c%d9%84%d8%a7%d9%86/">استان گیلان</a></div></div>			</div>
                                                        <h3 class="im-entry-title"><a href="/%d9%85%d9%86%d8%a7%d8%b1%d9%87-%da%af%d8%b3%da%a9%d8%b1/" rel="bookmark">مناره گسکر یا مناره بازار، یکی از زییاترین و  با شکوه ترین بناهای به جا مانده از دوره سلجوقی</a></h3>		</header>
                                                </div>

                                                <div class="im-entry">
                                                    <div class="im-entry-content">
                                                        <p>مناره گسکر مناره گسکر (مناره بازار)، یکی از زییاترین و  با شکوه ترین بناهای برجای مانده از دوره سلجوقی است که در ۹ کیلومتری غرب&#8230;</p>
                                                    </div>

                                                    <p class="im-entry-footer">
                                                        <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">پنجشنبه, ۲۸ تیر ۱۳۹۷</span></div><div class="comments-link im-meta-item"><a href="/%d9%85%d9%86%d8%a7%d8%b1%d9%87-%da%af%d8%b3%da%a9%d8%b1/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/writer/"><i class="fa fa-user"></i>شازده مسافر</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۸۵</div></div>		</p>
                                                </div>
                                            </article>
                                            <div class="col-md-6 col-sm-12"><div class="widget"><ul>
                                                        <li class="widget-10104 im-widget clearfix">
                                                            <figure class="im-widget-thumb">
                                                                <a href="/%d8%a2%d8%b1%d8%a7%d9%85%da%af%d8%a7%d9%87-%d8%b9%d8%b7%d8%a7%d8%b1-%d9%86%db%8c%d8%b4%d8%a7%d8%a8%d9%88%d8%b1%db%8c/" title="آرامگاه عطار نیشابوری شاعر و عارف  مشهور ایرانی در سدهٔ ششم و آغاز سدهٔ هفتم">
                                                                    <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/Mausoleum-of-Attar-Neyshaburi-1.jpg" alt="آرامگاه عطار نیشابوری شاعر و عارف  مشهور ایرانی در سدهٔ ششم و آغاز سدهٔ هفتم" />
                                                                </a>
                                                            </figure>
                                                            <div class="im-widget-entry">
                                                                <header class="im-widget-entry-header">
                                                                    <h4 class="im-widget-entry-title"><a href="/%d8%a2%d8%b1%d8%a7%d9%85%da%af%d8%a7%d9%87-%d8%b9%d8%b7%d8%a7%d8%b1-%d9%86%db%8c%d8%b4%d8%a7%d8%a8%d9%88%d8%b1%db%8c/" rel="bookmark">آرامگاه عطار نیشابوری شاعر و عارف  مشهور ایرانی در سدهٔ ششم و آغاز سدهٔ هفتم</a></h4>		</header>
                                                                <p class="im-widget-entry-footer">
                                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">پنجشنبه, ۲۸ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۳۴</div></div>		</p>
                                                            </div>
                                                        </li>

                                                        <li class="widget-10092 im-widget clearfix">
                                                            <figure class="im-widget-thumb">
                                                                <a href="/%d8%b9%d9%85%d8%a7%d8%b1%d8%aa-%d8%ae%d8%b3%d8%b1%d9%88-%d9%82%d8%b5%d8%b1%d8%b4%db%8c%d8%b1%db%8c%d9%86/" title="عمارت خسرو در استان کرمانشاه یکی از دیدنی ترین  مناطق گردشگری  ایران">
                                                                    <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/img_20170326_151914_202.jpg" alt="عمارت خسرو در استان کرمانشاه یکی از دیدنی ترین  مناطق گردشگری  ایران" />
                                                                </a>
                                                            </figure>
                                                            <div class="im-widget-entry">
                                                                <header class="im-widget-entry-header">
                                                                    <h4 class="im-widget-entry-title"><a href="/%d8%b9%d9%85%d8%a7%d8%b1%d8%aa-%d8%ae%d8%b3%d8%b1%d9%88-%d9%82%d8%b5%d8%b1%d8%b4%db%8c%d8%b1%db%8c%d9%86/" rel="bookmark">عمارت خسرو در استان کرمانشاه یکی از دیدنی ترین  مناطق گردشگری  ایران</a></h4>		</header>
                                                                <p class="im-widget-entry-footer">
                                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">دوشنبه, ۲۵ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۴۷</div></div>		</p>
                                                            </div>
                                                        </li>

                                                        <li class="widget-9979 im-widget clearfix">
                                                            <figure class="im-widget-thumb">
                                                                <a href="/%d9%85%d8%b3%d8%ac%d8%af-%d8%ac%d8%a7%d9%85%d8%b9-%d8%b3%d8%a7%d9%88%d9%87/" title="مسجد جامع ساوه یکی از اولین مسجدهای ساخته شده در کشور ایران">
                                                                    <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/Jameh-Mosque-of-Saveh.jpg" alt="مسجد جامع ساوه یکی از اولین مسجدهای ساخته شده در کشور ایران" />
                                                                </a>
                                                            </figure>
                                                            <div class="im-widget-entry">
                                                                <header class="im-widget-entry-header">
                                                                    <h4 class="im-widget-entry-title"><a href="/%d9%85%d8%b3%d8%ac%d8%af-%d8%ac%d8%a7%d9%85%d8%b9-%d8%b3%d8%a7%d9%88%d9%87/" rel="bookmark">مسجد جامع ساوه یکی از اولین مسجدهای ساخته شده در کشور ایران</a></h4>		</header>
                                                                <p class="im-widget-entry-footer">
                                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">سه شنبه, ۱۲ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۰۷</div></div>		</p>
                                                            </div>
                                                        </li>

                                                        <li class="widget-9974 im-widget clearfix">
                                                            <figure class="im-widget-thumb">
                                                                <a href="/%d9%85%d8%b3%d8%ac%d8%af-%d8%ac%d8%a7%d9%85%d8%b9-%d9%86%d8%a7%db%8c%db%8c%d9%86/" title="مسجد جامع نایین مسجدی به سبک معماری عربی دارای  یک مناره  و یک گنبد یک پوسته">
                                                                    <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/9070744.jpg" alt="مسجد جامع نایین مسجدی به سبک معماری عربی دارای  یک مناره  و یک گنبد یک پوسته" />
                                                                </a>
                                                            </figure>
                                                            <div class="im-widget-entry">
                                                                <header class="im-widget-entry-header">
                                                                    <h4 class="im-widget-entry-title"><a href="/%d9%85%d8%b3%d8%ac%d8%af-%d8%ac%d8%a7%d9%85%d8%b9-%d9%86%d8%a7%db%8c%db%8c%d9%86/" rel="bookmark">مسجد جامع نایین مسجدی به سبک معماری عربی دارای  یک مناره  و یک گنبد یک پوسته</a></h4>		</header>
                                                                <p class="im-widget-entry-footer">
                                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">سه شنبه, ۱۲ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۴۳</div></div>		</p>
                                                            </div>
                                                        </li>
                                                    </ul></div></div>	  			</div>  			  		  		</div>
                                    <aside class="gap cf" style="height:30px;"></aside><div class="vc_inner row"><div class="wpb_column col-md-6 col-sm-12">		<div class="category-element-holder style2">
                                                <div class="widget-head widget-head-46">
                                                    <strong class="widget-title">
                                                        اماکن تفریحی				</strong>
                                                    <div class="widget-head-bar"></div>
                                                    <div class="widget-head-line"></div>
                                                </div>
                                                <div class="row">
                                                    <article class="im-article content-2col content-2col-nocontent col-md-12 post-9869 post type-post status-publish format-standard has-post-thumbnail hentry category-2070 category-46 category-44 category-50 tag-233 tag-1843 tag-1713 tag-1842 tag-7116 tag-770">
                                                        <div class="im-entry-thumb">
                                                            <a class="im-entry-thumb-link" href="/%d8%a2%d8%aa%d8%b4-%da%a9%d9%88%d9%87-%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d8%ae%d9%88%d8%b2%d8%b3%d8%aa%d8%a7%d9%86/" title="آتش کوه یا به زبان محلی تشکوه یکی از دیدنی های استان خوزستان">
                                                                <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/06/atash4.jpg" alt="آتش کوه یا به زبان محلی تشکوه یکی از دیدنی های استان خوزستان" />
                                                            </a>
                                                            <header class="im-entry-header">
                                                                <div class="im-entry-category">
                                                                    <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-2070" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d8%ae%d9%88%d8%b2%d8%b3%d8%aa%d8%a7%d9%86/">استان خوزستان</a></div></div>			</div>
                                                                <h3 class="im-entry-title"><a href="/%d8%a2%d8%aa%d8%b4-%da%a9%d9%88%d9%87-%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d8%ae%d9%88%d8%b2%d8%b3%d8%aa%d8%a7%d9%86/" rel="bookmark">آتش کوه یا به زبان محلی تشکوه یکی از دیدنی های استان خوزستان</a></h3>			<div class="im-entry-footer">
                                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">شنبه, ۹ تیر ۱۳۹۷</span></div><div class="comments-link im-meta-item"><a href="/%d8%a2%d8%aa%d8%b4-%da%a9%d9%88%d9%87-%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d8%ae%d9%88%d8%b2%d8%b3%d8%aa%d8%a7%d9%86/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۷۲</div></div>			</div>
                                                            </header>
                                                        </div>
                                                    </article>
                                                    <div class="col-md-12"><div class="widget"><ul>
                                                                <li class="widget-7879 im-widget clearfix">
                                                                    <figure class="im-widget-thumb">
                                                                        <a href="/%d8%ac%d8%a7%d8%b0%d8%a8%d9%87-%d9%87%d8%a7%db%8c-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c-%d9%82%d8%b4%d9%85/" title="جاذبه های گردشگری قشم ، سافاری تا برج میلاد (قسمت سوم)">
                                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/safari-motor-piste-qeshm-90x85.jpg" alt="جاذبه های گردشگری قشم ، سافاری تا برج میلاد (قسمت سوم)" />
                                                                        </a>
                                                                    </figure>
                                                                    <div class="im-widget-entry">
                                                                        <header class="im-widget-entry-header">
                                                                            <h4 class="im-widget-entry-title"><a href="/%d8%ac%d8%a7%d8%b0%d8%a8%d9%87-%d9%87%d8%a7%db%8c-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c-%d9%82%d8%b4%d9%85/" rel="bookmark">جاذبه های گردشگری قشم ، سافاری تا برج میلاد (قسمت سوم)</a></h4>		</header>
                                                                        <p class="im-widget-entry-footer">
                                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">جمعه, ۶ بهمن ۱۳۹۶</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۵۶۹</div></div>		</p>
                                                                    </div>
                                                                </li>

                                                                <li class="widget-7859 im-widget clearfix">
                                                                    <figure class="im-widget-thumb">
                                                                        <a href="/%d8%b3%d8%a7%d8%ad%d9%84-%d9%86%d8%a7%d8%b1%da%af%db%8c%d9%84/" title="ساحل نارگیل یکی از ساحل های زیبای جزیره کیش">
                                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/337-90x85.jpg" alt="ساحل نارگیل یکی از ساحل های زیبای جزیره کیش" />
                                                                        </a>
                                                                    </figure>
                                                                    <div class="im-widget-entry">
                                                                        <header class="im-widget-entry-header">
                                                                            <h4 class="im-widget-entry-title"><a href="/%d8%b3%d8%a7%d8%ad%d9%84-%d9%86%d8%a7%d8%b1%da%af%db%8c%d9%84/" rel="bookmark">ساحل نارگیل یکی از ساحل های زیبای جزیره کیش</a></h4>		</header>
                                                                        <p class="im-widget-entry-footer">
                                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">جمعه, ۶ بهمن ۱۳۹۶</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۴۱۶</div></div>		</p>
                                                                    </div>
                                                                </li>

                                                                <li class="widget-7799 im-widget clearfix">
                                                                    <figure class="im-widget-thumb">
                                                                        <a href="/%d9%be%d9%84-%d9%85%d8%b9%d9%84%d9%82-%d9%85%d8%b4%da%af%db%8c%d9%86-%d8%b4%d9%87%d8%b1/" title="پل معلق مشگین شهر ، بهترین مکان برای غلبه بر ترس از ارتفاع">
                                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/photo_2016-05-08_16-51-33-90x85.jpg" alt="پل معلق مشگین شهر ، بهترین مکان برای غلبه بر ترس از ارتفاع" />
                                                                        </a>
                                                                    </figure>
                                                                    <div class="im-widget-entry">
                                                                        <header class="im-widget-entry-header">
                                                                            <h4 class="im-widget-entry-title"><a href="/%d9%be%d9%84-%d9%85%d8%b9%d9%84%d9%82-%d9%85%d8%b4%da%af%db%8c%d9%86-%d8%b4%d9%87%d8%b1/" rel="bookmark">پل معلق مشگین شهر ، بهترین مکان برای غلبه بر ترس از ارتفاع</a></h4>		</header>
                                                                        <p class="im-widget-entry-footer">
                                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">چهارشنبه, ۴ بهمن ۱۳۹۶</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۵۷۰</div></div>		</p>
                                                                    </div>
                                                                </li>

                                                                <li class="widget-7781 im-widget clearfix">
                                                                    <figure class="im-widget-thumb">
                                                                        <a href="/%d8%b3%d9%86%da%af-%d9%86%da%af%d8%a7%d8%b1%d9%87/" title="سنگ نگاره های تیمره در استان تاریخی مرکزی در ایران">
                                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/golpayegan-petroglyphs-62-90x85.jpg" alt="سنگ نگاره های تیمره در استان تاریخی مرکزی در ایران" />
                                                                        </a>
                                                                    </figure>
                                                                    <div class="im-widget-entry">
                                                                        <header class="im-widget-entry-header">
                                                                            <h4 class="im-widget-entry-title"><a href="/%d8%b3%d9%86%da%af-%d9%86%da%af%d8%a7%d8%b1%d9%87/" rel="bookmark">سنگ نگاره های تیمره در استان تاریخی مرکزی در ایران</a></h4>		</header>
                                                                        <p class="im-widget-entry-footer">
                                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">سه شنبه, ۳ بهمن ۱۳۹۶</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۷۶۱</div></div>		</p>
                                                                    </div>
                                                                </li>
                                                            </ul></div></div>	  			</div>  			  		  		</div>
                                        </div><div class="wpb_column col-md-6 col-sm-12">		<div class="category-element-holder style2">
                                                <div class="widget-head widget-head-47">
                                                    <strong class="widget-title">
                                                        اماکن مذهبی				</strong>
                                                    <div class="widget-head-bar"></div>
                                                    <div class="widget-head-line"></div>
                                                </div>
                                                <div class="row">
                                                    <article class="im-article content-2col content-2col-nocontent col-md-12 post-9979 post type-post status-publish format-standard has-post-thumbnail hentry category-2071 category-45 category-47 category-3165 tag-159 tag-6269 tag-7138 tag-1115 tag-864">
                                                        <div class="im-entry-thumb">
                                                            <a class="im-entry-thumb-link" href="/%d9%85%d8%b3%d8%ac%d8%af-%d8%ac%d8%a7%d9%85%d8%b9-%d8%b3%d8%a7%d9%88%d9%87/" title="مسجد جامع ساوه یکی از اولین مسجدهای ساخته شده در کشور ایران">
                                                                <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/Jameh-Mosque-of-Saveh.jpg" alt="مسجد جامع ساوه یکی از اولین مسجدهای ساخته شده در کشور ایران" />
                                                            </a>
                                                            <header class="im-entry-header">
                                                                <div class="im-entry-category">
                                                                    <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-2071" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d9%85%d8%b1%da%a9%d8%b2%db%8c/">استان مرکزی</a></div></div>			</div>
                                                                <h3 class="im-entry-title"><a href="/%d9%85%d8%b3%d8%ac%d8%af-%d8%ac%d8%a7%d9%85%d8%b9-%d8%b3%d8%a7%d9%88%d9%87/" rel="bookmark">مسجد جامع ساوه یکی از اولین مسجدهای ساخته شده در کشور ایران</a></h3>			<div class="im-entry-footer">
                                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">سه شنبه, ۱۲ تیر ۱۳۹۷</span></div><div class="comments-link im-meta-item"><a href="/%d9%85%d8%b3%d8%ac%d8%af-%d8%ac%d8%a7%d9%85%d8%b9-%d8%b3%d8%a7%d9%88%d9%87/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۰۷</div></div>			</div>
                                                            </header>
                                                        </div>
                                                    </article>
                                                    <div class="col-md-12"><div class="widget"><ul>
                                                                <li class="widget-9974 im-widget clearfix">
                                                                    <figure class="im-widget-thumb">
                                                                        <a href="/%d9%85%d8%b3%d8%ac%d8%af-%d8%ac%d8%a7%d9%85%d8%b9-%d9%86%d8%a7%db%8c%db%8c%d9%86/" title="مسجد جامع نایین مسجدی به سبک معماری عربی دارای  یک مناره  و یک گنبد یک پوسته">
                                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/9070744.jpg" alt="مسجد جامع نایین مسجدی به سبک معماری عربی دارای  یک مناره  و یک گنبد یک پوسته" />
                                                                        </a>
                                                                    </figure>
                                                                    <div class="im-widget-entry">
                                                                        <header class="im-widget-entry-header">
                                                                            <h4 class="im-widget-entry-title"><a href="/%d9%85%d8%b3%d8%ac%d8%af-%d8%ac%d8%a7%d9%85%d8%b9-%d9%86%d8%a7%db%8c%db%8c%d9%86/" rel="bookmark">مسجد جامع نایین مسجدی به سبک معماری عربی دارای  یک مناره  و یک گنبد یک پوسته</a></h4>		</header>
                                                                        <p class="im-widget-entry-footer">
                                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">سه شنبه, ۱۲ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۴۳</div></div>		</p>
                                                                    </div>
                                                                </li>

                                                                <li class="widget-9408 im-widget clearfix">
                                                                    <figure class="im-widget-thumb">
                                                                        <a href="/%d8%a2%d8%b1%d8%a7%d9%85%da%af%d8%a7%d9%87-%d8%b4%db%8c%d8%ae-%d8%b9%d8%a8%d8%af%d8%a7%d9%84%d8%b5%d9%85%d8%af-%d9%86%d8%b7%d9%86%d8%b2/" title="آرامگاه شیخ عبدالصمد در شهر نطنز شامل حاوی مسجد، آرامگاه و خانقاه">
                                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/04/3dbe4b0c-6a83-4461-84fd-8f8636059327.jpg" alt="آرامگاه شیخ عبدالصمد در شهر نطنز شامل حاوی مسجد، آرامگاه و خانقاه" />
                                                                        </a>
                                                                    </figure>
                                                                    <div class="im-widget-entry">
                                                                        <header class="im-widget-entry-header">
                                                                            <h4 class="im-widget-entry-title"><a href="/%d8%a2%d8%b1%d8%a7%d9%85%da%af%d8%a7%d9%87-%d8%b4%db%8c%d8%ae-%d8%b9%d8%a8%d8%af%d8%a7%d9%84%d8%b5%d9%85%d8%af-%d9%86%d8%b7%d9%86%d8%b2/" rel="bookmark">آرامگاه شیخ عبدالصمد در شهر نطنز شامل حاوی مسجد، آرامگاه و خانقاه</a></h4>		</header>
                                                                        <p class="im-widget-entry-footer">
                                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">سه شنبه, ۴ اردیبهشت ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۲۴۹</div></div>		</p>
                                                                    </div>
                                                                </li>

                                                                <li class="widget-8228 im-widget clearfix">
                                                                    <figure class="im-widget-thumb">
                                                                        <a href="/%da%86%d9%87%d8%a7%d8%b1%d8%aa%d8%a7%d9%82%db%8c/" title="چهارتاقی به عنوان یک عنصر و یا واحد معماری در ایران">
                                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/02/چهارتاقی2-90x85.jpg" alt="چهارتاقی به عنوان یک عنصر و یا واحد معماری در ایران" />
                                                                        </a>
                                                                    </figure>
                                                                    <div class="im-widget-entry">
                                                                        <header class="im-widget-entry-header">
                                                                            <h4 class="im-widget-entry-title"><a href="/%da%86%d9%87%d8%a7%d8%b1%d8%aa%d8%a7%d9%82%db%8c/" rel="bookmark">چهارتاقی به عنوان یک عنصر و یا واحد معماری در ایران</a></h4>		</header>
                                                                        <p class="im-widget-entry-footer">
                                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">شنبه, ۲۱ بهمن ۱۳۹۶</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۲۷۳</div></div>		</p>
                                                                    </div>
                                                                </li>

                                                                <li class="widget-8215 im-widget clearfix">
                                                                    <figure class="im-widget-thumb">
                                                                        <a href="/%d8%b3%d9%82%d8%a7%d8%ae%d8%a7%d9%86%d9%87/" title="سقاخانه ؛ کاربری، انواع و جنبه اعتقادی آنها">
                                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/02/سقاخانه-90x85.jpg" alt="سقاخانه ؛ کاربری، انواع و جنبه اعتقادی آنها" />
                                                                        </a>
                                                                    </figure>
                                                                    <div class="im-widget-entry">
                                                                        <header class="im-widget-entry-header">
                                                                            <h4 class="im-widget-entry-title"><a href="/%d8%b3%d9%82%d8%a7%d8%ae%d8%a7%d9%86%d9%87/" rel="bookmark">سقاخانه ؛ کاربری، انواع و جنبه اعتقادی آنها</a></h4>		</header>
                                                                        <p class="im-widget-entry-footer">
                                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">جمعه, ۲۰ بهمن ۱۳۹۶</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۳۷۰</div></div>		</p>
                                                                    </div>
                                                                </li>
                                                            </ul></div></div>	  			</div>  			  		  		</div>
                                        </div></div><aside class="gap cf" style="height:30px;"></aside>		<div class="category-element-holder style3">
                                        <div class="widget-head widget-head-50">
                                            <strong class="widget-title">
                                                طبیعت گردی				</strong>
                                            <div class="widget-head-bar"></div>
                                            <div class="widget-head-line"></div>
                                        </div>
                                        <div class="row">
                                            <article class="im-article content-featured content-featured-nocontent clearfix post-10084 post type-post status-publish format-standard has-post-thumbnail hentry category-1638 category-44 category-2081 tag-903 tag-7152 tag-1242 tag-1180 tag-657 tag-1439 tag-4998">
                                                <div class="col-sm-12">
                                                    <div class="im-entry-thumb">
                                                        <a class="im-entry-thumb-link" href="/%d8%af%d8%b1%db%8c%d8%a7%da%86%d9%87-%da%af%d9%87%d8%b1-%d9%81%db%8c%d8%b1%d9%88%d8%b2%d9%87-%d8%a7%db%8c-%d8%af%d8%b1%d8%ae%d8%b4%d8%a7%d9%86-%d8%af%d8%b1-%d9%85%d9%86%d8%b7%d9%82%d9%87-%d8%b2/" title="دریاچه گهر فیروزه ای درخشان در  منطقه زاگرس، یکی از زیبا ترین دریاچه های مرتفع در ایران">
                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/1.jpg" alt="دریاچه گهر فیروزه ای درخشان در  منطقه زاگرس، یکی از زیبا ترین دریاچه های مرتفع در ایران" />
                                                        </a>
                                                        <header class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-1638" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d9%84%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/">استان لرستان</a></div></div>				</div>
                                                            <h3 class="im-entry-title"><a href="/%d8%af%d8%b1%db%8c%d8%a7%da%86%d9%87-%da%af%d9%87%d8%b1-%d9%81%db%8c%d8%b1%d9%88%d8%b2%d9%87-%d8%a7%db%8c-%d8%af%d8%b1%d8%ae%d8%b4%d8%a7%d9%86-%d8%af%d8%b1-%d9%85%d9%86%d8%b7%d9%82%d9%87-%d8%b2/" rel="bookmark">دریاچه گهر فیروزه ای درخشان در  منطقه زاگرس، یکی از زیبا ترین دریاچه های مرتفع در ایران</a></h3>				<div class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">یکشنبه, ۲۴ تیر ۱۳۹۷</span></div><div class="comments-link im-meta-item"><a href="/%d8%af%d8%b1%db%8c%d8%a7%da%86%d9%87-%da%af%d9%87%d8%b1-%d9%81%db%8c%d8%b1%d9%88%d8%b2%d9%87-%d8%a7%db%8c-%d8%af%d8%b1%d8%ae%d8%b4%d8%a7%d9%86-%d8%af%d8%b1-%d9%85%d9%86%d8%b7%d9%82%d9%87-%d8%b2/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/writer/"><i class="fa fa-user"></i>شازده مسافر</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۸۶</div></div>				</div>
                                                        </header>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>					  				  						  		  											<div class="row content-2col-correction">
                                            <article class="im-article content-2col col-md-6 col-sm-6 post-9962 post type-post status-publish format-standard has-post-thumbnail hentry category-2079 category-1111 category-3172 category-50 tag-1710 tag-121 tag-1763 tag-1749 tag-1447 tag-7133">
                                                <div class="im-entry-thumb">
                                                    <a class="im-entry-thumb-link" href="/%d8%b1%d9%88%d8%b3%d8%aa%d8%a7%db%8c-%d8%a8%d9%86%d9%87-%da%a9%d9%85%d8%b1-%d9%81%d8%b1%db%8c%d8%af%d9%88%d9%86%d8%b4%d9%87%d8%b1/" title=" روستای بنه کمر در منطقه پیشکوه شهرستان فریدونشهر واقع در استان اصفهان">
                                                        <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/8j4l_bonkamar_22.jpg" alt=" روستای بنه کمر در منطقه پیشکوه شهرستان فریدونشهر واقع در استان اصفهان" />
                                                    </a>
                                                    <header class="im-entry-header">
                                                        <div class="im-entry-category">
                                                            <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-2079" href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%b7%d8%a8%db%8c%d8%b9%d8%aa-%da%af%d8%b1%d8%af%db%8c/%d8%a2%d8%a8%d8%b4%d8%a7%d8%b1/">آبشار</a></div></div>			</div>
                                                        <h3 class="im-entry-title"><a href="/%d8%b1%d9%88%d8%b3%d8%aa%d8%a7%db%8c-%d8%a8%d9%86%d9%87-%da%a9%d9%85%d8%b1-%d9%81%d8%b1%db%8c%d8%af%d9%88%d9%86%d8%b4%d9%87%d8%b1/" rel="bookmark"> روستای بنه کمر در منطقه پیشکوه شهرستان فریدونشهر واقع در استان اصفهان</a></h3>		</header>
                                                </div>

                                                <div class="im-entry">
                                                    <div class="im-entry-content">
                                                        <p> روستای بنه کمر امروز به روستای بنه کمر در منطقه پیشکوه شهرستان فریدونشهر می رویم. همراه شازده مسافر باشید و از این روستای زیبا دیدن&#8230;</p>
                                                    </div>

                                                    <p class="im-entry-footer">
                                                        <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">سه شنبه, ۱۲ تیر ۱۳۹۷</span></div><div class="comments-link im-meta-item"><a href="/%d8%b1%d9%88%d8%b3%d8%aa%d8%a7%db%8c-%d8%a8%d9%86%d9%87-%da%a9%d9%85%d8%b1-%d9%81%d8%b1%db%8c%d8%af%d9%88%d9%86%d8%b4%d9%87%d8%b1/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/writer/"><i class="fa fa-user"></i>شازده مسافر</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۵۱</div></div>		</p>
                                                </div>
                                            </article>

                                            <article class="im-article content-2col col-md-6 col-sm-6 post-9876 post type-post status-publish format-standard has-post-thumbnail hentry category-2068 category-50 category-1164 category-1639 tag-903 tag-7108 tag-1180 tag-7118 tag-7119 tag-1171 tag-230 tag-4998 tag-7117">
                                                <div class="im-entry-thumb">
                                                    <a class="im-entry-thumb-link" href="/%d8%ba%d8%a7%d8%b1-%d8%a2%d9%88%db%8c%d8%b4%d9%88%db%8c-%d9%85%d8%a7%d8%b3%d8%a7%d9%84-%da%af%db%8c%d9%84%d8%a7%d9%86/" title="غار آویشوی در نزدیکی روستای ماسال واقع در استان سرسبز گیلان">
                                                        <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/06/avisho8.jpg" alt="غار آویشوی در نزدیکی روستای ماسال واقع در استان سرسبز گیلان" />
                                                    </a>
                                                    <header class="im-entry-header">
                                                        <div class="im-entry-category">
                                                            <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-2068" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%da%af%db%8c%d9%84%d8%a7%d9%86/">استان گیلان</a></div></div>			</div>
                                                        <h3 class="im-entry-title"><a href="/%d8%ba%d8%a7%d8%b1-%d8%a2%d9%88%db%8c%d8%b4%d9%88%db%8c-%d9%85%d8%a7%d8%b3%d8%a7%d9%84-%da%af%db%8c%d9%84%d8%a7%d9%86/" rel="bookmark">غار آویشوی در نزدیکی روستای ماسال واقع در استان سرسبز گیلان</a></h3>		</header>
                                                </div>

                                                <div class="im-entry">
                                                    <div class="im-entry-content">
                                                        <p>غار آویشوی غار آویشوی در گیلان یکی از پدیده های زیبایی  است که در نوع خود بی نظیر است. غار آویشوی از بی نظیرترین غارهای&#8230;</p>
                                                    </div>

                                                    <p class="im-entry-footer">
                                                        <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">یکشنبه, ۱۰ تیر ۱۳۹۷</span></div><div class="comments-link im-meta-item"><a href="/%d8%ba%d8%a7%d8%b1-%d8%a2%d9%88%db%8c%d8%b4%d9%88%db%8c-%d9%85%d8%a7%d8%b3%d8%a7%d9%84-%da%af%db%8c%d9%84%d8%a7%d9%86/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/writer/"><i class="fa fa-user"></i>شازده مسافر</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۲۸۱</div></div>		</p>
                                                </div>
                                            </article>
                                        </div>			  		  		</div>
                                    <aside class="gap cf" style="height:30px;"></aside></div><div class="sticky-sidebar wpb_column col-md-4 col-sm-12">
                                    <div class="wpb_widgetised_column wpb_content_element">
                                        <div class="wpb_wrapper">

                                            <section id="media_gallery-6" class="widget widget_media_gallery"><div id='gallery-1' class='gallery galleryid-119 gallery-columns-1 gallery-size-thumbnail'><figure class='gallery-item'>
                                                        <div class='gallery-icon landscape'>
                                                            <a href='/150324_flights-hero-image_1330x742-3/'><img width="150" height="60" src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/150324_flights-hero-image_1330x742-3.jpg" class="attachment-thumbnail size-thumbnail" alt="" /></a>
                                                        </div></figure>
                                                </div>
                                            </section><section id="impv_display_widget-4" class="widget widget_impv_display_widget"><div class="widget-head"><strong class="widget-title">محبوب ترین ها</strong><div class="widget-head-bar"></div><div class="widget-head-line"></div></div><ul class="im-widget-tabs clearfix"><li class="widget_pop_btn widget_pop_week"><a href="#impv_display_widget-4-tab2">ماه</a></li></ul><div id="impv_display_widget-4-tab2" class="widget_pop_body"><ul class='popular_by_views_list'>        <li class="im-widget clearfix">
                                                            <figure class="im-widget-thumb">
                                                                <a href="/%d9%be%d8%af%db%8c%d8%af%d9%87-%d8%b4%d8%a7%d9%86%d8%af%db%8c%d8%b2/" title="سفر به شاندیز و بازدید از مجتمع پدیده شاندیز پیش از حاشیه ها و کلاهبرداری ها!"><img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/09/پدیده-شاندیز-90x85.jpg" alt="سفر به شاندیز و بازدید از مجتمع پدیده شاندیز پیش از حاشیه ها و کلاهبرداری ها!" /></a>                </figure>
                                                            <div class="im-widget-entry">
                                                                <header class="im-widget-entry-header">
                                                                    <h4 class='im-widget-entry-title'><a href='/%d9%be%d8%af%db%8c%d8%af%d9%87-%d8%b4%d8%a7%d9%86%d8%af%db%8c%d8%b2/' title='سفر به شاندیز و بازدید از مجتمع پدیده شاندیز پیش از حاشیه ها و کلاهبرداری ها!'>سفر به شاندیز و بازدید از مجتمع پدیده شاندیز پیش از حاشیه ها و کلاهبرداری ها!</a></h4>            	</header>
                                                                <p class="im-widget-entry-footer">
                                                                    <div class="iranomag-meta clearfix">
                                                                        <div class="posted-on im-meta-item">
							<span class="entry-date published updated">
								سه شنبه, ۱۴ شهریور ۱۳۹۶							</span>
                                                                        </div>
                                                                        <div class="post-views im-meta-item">
                                                                            <i class="fa fa-eye"></i>۶,۴۶۰						</div>
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li class="im-widget clearfix">
                                                            <figure class="im-widget-thumb">
                                                                <a href="/%d8%a7%db%8c%d8%b3%d8%aa%da%af%d8%a7%d9%87-%d9%82%db%8c%d8%b7%d8%b1%db%8c%d9%87/" title="ایستگاه قیطریه ایستگاهی با دسترسی بالا"><img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/10/شاخص-copy-90x85.jpg" alt="ایستگاه قیطریه ایستگاهی با دسترسی بالا" /></a>                </figure>
                                                            <div class="im-widget-entry">
                                                                <header class="im-widget-entry-header">
                                                                    <h4 class='im-widget-entry-title'><a href='/%d8%a7%db%8c%d8%b3%d8%aa%da%af%d8%a7%d9%87-%d9%82%db%8c%d8%b7%d8%b1%db%8c%d9%87/' title='ایستگاه قیطریه ایستگاهی با دسترسی بالا'>ایستگاه قیطریه ایستگاهی با دسترسی بالا</a></h4>            	</header>
                                                                <p class="im-widget-entry-footer">
                                                                    <div class="iranomag-meta clearfix">
                                                                        <div class="posted-on im-meta-item">
							<span class="entry-date published updated">
								سه شنبه, ۲ آبان ۱۳۹۶							</span>
                                                                        </div>
                                                                        <div class="post-views im-meta-item">
                                                                            <i class="fa fa-eye"></i>۵,۶۵۷						</div>
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li class="im-widget clearfix">
                                                            <figure class="im-widget-thumb">
                                                                <a href="/%da%86%d8%a7%d8%a8%da%a9%d8%b3%d8%b1/" title="شهری ساحلی با پارکهای زیبا"><img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/09/چابکسر-90x85.jpg" alt="شهری ساحلی با پارکهای زیبا" /></a>                </figure>
                                                            <div class="im-widget-entry">
                                                                <header class="im-widget-entry-header">
                                                                    <h4 class='im-widget-entry-title'><a href='/%da%86%d8%a7%d8%a8%da%a9%d8%b3%d8%b1/' title='شهری ساحلی با پارکهای زیبا'>شهری ساحلی با پارکهای زیبا</a></h4>            	</header>
                                                                <p class="im-widget-entry-footer">
                                                                    <div class="iranomag-meta clearfix">
                                                                        <div class="posted-on im-meta-item">
							<span class="entry-date published updated">
								جمعه, ۳۱ شهریور ۱۳۹۶							</span>
                                                                        </div>
                                                                        <div class="post-views im-meta-item">
                                                                            <i class="fa fa-eye"></i>۵,۵۵۸						</div>
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li class="im-widget clearfix">
                                                            <figure class="im-widget-thumb">
                                                                <a href="/%d8%b3%d9%81%d8%a7%d9%84-%d9%88-%d8%b3%d8%b1%d8%a7%d9%85%db%8c%da%a9-%d9%87%d9%85%d8%af%d8%a7%d9%86/" title="سفال و سرامیک شهر لالجین، صنایع دستی ارزشمند همدان"><img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/08/سفال-و-سرامیک-همدان-90x85.jpg" alt="سفال و سرامیک شهر لالجین، صنایع دستی ارزشمند همدان" /></a>                </figure>
                                                            <div class="im-widget-entry">
                                                                <header class="im-widget-entry-header">
                                                                    <h4 class='im-widget-entry-title'><a href='/%d8%b3%d9%81%d8%a7%d9%84-%d9%88-%d8%b3%d8%b1%d8%a7%d9%85%db%8c%da%a9-%d9%87%d9%85%d8%af%d8%a7%d9%86/' title='سفال و سرامیک شهر لالجین، صنایع دستی ارزشمند همدان'>سفال و سرامیک شهر لالجین، صنایع دستی ارزشمند همدان</a></h4>            	</header>
                                                                <p class="im-widget-entry-footer">
                                                                    <div class="iranomag-meta clearfix">
                                                                        <div class="posted-on im-meta-item">
							<span class="entry-date published updated">
								دوشنبه, ۱۶ مرداد ۱۳۹۶							</span>
                                                                        </div>
                                                                        <div class="post-views im-meta-item">
                                                                            <i class="fa fa-eye"></i>۴,۷۸۵						</div>
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li class="im-widget clearfix">
                                                            <figure class="im-widget-thumb">
                                                                <a href="/%d9%86%d8%a7%d9%86-%d8%ae%d8%b4%da%a9/" title="طعمِ متفاوت یک نان"><img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/09/نان-خشک-90x85.jpg" alt="طعمِ متفاوت یک نان" /></a>                </figure>
                                                            <div class="im-widget-entry">
                                                                <header class="im-widget-entry-header">
                                                                    <h4 class='im-widget-entry-title'><a href='/%d9%86%d8%a7%d9%86-%d8%ae%d8%b4%da%a9/' title='طعمِ متفاوت یک نان'>طعمِ متفاوت یک نان</a></h4>            	</header>
                                                                <p class="im-widget-entry-footer">
                                                                    <div class="iranomag-meta clearfix">
                                                                        <div class="posted-on im-meta-item">
							<span class="entry-date published updated">
								یکشنبه, ۱۹ شهریور ۱۳۹۶							</span>
                                                                        </div>
                                                                        <div class="post-views im-meta-item">
                                                                            <i class="fa fa-eye"></i>۴,۳۱۵						</div>
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </li>
                                                    </ul></div></section>
                                        </div>
                                    </div>
                                </div></div><div  class="clearfix " ><div class="wpb_column col-md-12 col-sm-12">		<div class="clearfix im_carousel_slider">

                                        <article class="im-article content-carousel carousel-6582 pull-right post-10135 post type-post status-publish format-standard has-post-thumbnail hentry category-6582 category-6583 category-7032 tag-3784 tag-7035 tag-7145 tag-1789 tag-864 tag-7036">
                                            <a class="im-carousel-link" href="/%d8%a8%d9%84%d9%86%d8%af%d8%aa%d8%b1%db%8c%d9%86-%d9%85%d8%b9%d8%a8%d8%af-%d8%ac%d9%87%d8%a7%d9%86/" title="بلندترین معبد جهان در کشور پهناور و پرجمعیت هندوستان"></a>
                                            <div class="im-carousel-background">
                                                <img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/sri-vrindavan-chandrodaya-temple_1418965907.jpg" alt="بلندترین معبد جهان در کشور پهناور و پرجمعیت هندوستان" />
                                            </div>


                                            <div class="im-carousel-entry">
                                                <header class="im-carousel-entry-header">
                                                    <div class="im-entry-category">
                                                        <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-6582" href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/">بین الملل</a></div></div>			</div>
                                                    <h3 class="im-carousel-entry-title"><a href="/%d8%a8%d9%84%d9%86%d8%af%d8%aa%d8%b1%db%8c%d9%86-%d9%85%d8%b9%d8%a8%d8%af-%d8%ac%d9%87%d8%a7%d9%86/" rel="bookmark">بلندترین معبد جهان در کشور پهناور و پرجمعیت هندوستان</a></h3>		</header>

                                                <p class="im-carousel-entry-footer">
                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">جمعه, ۲۹ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۱۹</div></div>		</p>
                                            </div>
                                        </article>

                                        <article class="im-article content-carousel carousel-6582 pull-right post-10129 post type-post status-publish format-standard has-post-thumbnail hentry category-6582 category-6583 category-7032">
                                            <a class="im-carousel-link" href="/%d8%aa%d8%a7%d8%ac-%d9%85%d8%ad%d9%84/" title="تاج محل ترکیبی از  معماری هند، فارسی و اسلامی تقدیم شده به عشق"></a>
                                            <div class="im-carousel-background">
                                                <img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/slider2.jpg" alt="تاج محل ترکیبی از  معماری هند، فارسی و اسلامی تقدیم شده به عشق" />
                                            </div>


                                            <div class="im-carousel-entry">
                                                <header class="im-carousel-entry-header">
                                                    <div class="im-entry-category">
                                                        <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-6582" href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/">بین الملل</a></div></div>			</div>
                                                    <h3 class="im-carousel-entry-title"><a href="/%d8%aa%d8%a7%d8%ac-%d9%85%d8%ad%d9%84/" rel="bookmark">تاج محل ترکیبی از  معماری هند، فارسی و اسلامی تقدیم شده به عشق</a></h3>		</header>

                                                <p class="im-carousel-entry-footer">
                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">جمعه, ۲۹ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۷۱</div></div>		</p>
                                            </div>
                                        </article>

                                        <article class="im-article content-carousel carousel-6582 pull-right post-10124 post type-post status-publish format-standard has-post-thumbnail hentry category-6582 category-6584 category-7092 category-6583 tag-7128 tag-7154 tag-7093 tag-7155">
                                            <a class="im-carousel-link" href="/%d9%85%d8%af%d8%a7%d8%a6%d9%86-%d8%b5%d8%a7%d9%84%d8%ad/" title="مدائن صالح صخره ای  سنگی  و چندین کتیبه مهم تاریخی در عربستان صعودی"></a>
                                            <div class="im-carousel-background">
                                                <img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/3e7f67aefc805020379c5b605c413ae4.jpg" alt="مدائن صالح صخره ای  سنگی  و چندین کتیبه مهم تاریخی در عربستان صعودی" />
                                            </div>


                                            <div class="im-carousel-entry">
                                                <header class="im-carousel-entry-header">
                                                    <div class="im-entry-category">
                                                        <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-6582" href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/">بین الملل</a></div></div>			</div>
                                                    <h3 class="im-carousel-entry-title"><a href="/%d9%85%d8%af%d8%a7%d8%a6%d9%86-%d8%b5%d8%a7%d9%84%d8%ad/" rel="bookmark">مدائن صالح صخره ای  سنگی  و چندین کتیبه مهم تاریخی در عربستان صعودی</a></h3>		</header>

                                                <p class="im-carousel-entry-footer">
                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">جمعه, ۲۹ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۲۳۵</div></div>		</p>
                                            </div>
                                        </article>

                                        <article class="im-article content-carousel carousel-6582 pull-right post-10118 post type-post status-publish format-standard has-post-thumbnail hentry category-6582 category-7087 category-6583 tag-7084 tag-7085 tag-3314">
                                            <a class="im-carousel-link" href="/%d8%af%db%8c%d9%88%d8%a7%d8%b1-%da%86%db%8c%d9%86/" title="دیوار چین مجموعه ای باستانی از دیوارها و استحکامات با طول بیش از ۱۳،۰۰۰ مایل"></a>
                                            <div class="im-carousel-background">
                                                <img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/china_wall_01_big.jpg" alt="دیوار چین مجموعه ای باستانی از دیوارها و استحکامات با طول بیش از ۱۳،۰۰۰ مایل" />
                                            </div>


                                            <div class="im-carousel-entry">
                                                <header class="im-carousel-entry-header">
                                                    <div class="im-entry-category">
                                                        <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-6582" href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/">بین الملل</a></div></div>			</div>
                                                    <h3 class="im-carousel-entry-title"><a href="/%d8%af%db%8c%d9%88%d8%a7%d8%b1-%da%86%db%8c%d9%86/" rel="bookmark">دیوار چین مجموعه ای باستانی از دیوارها و استحکامات با طول بیش از ۱۳،۰۰۰ مایل</a></h3>		</header>

                                                <p class="im-carousel-entry-footer">
                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">پنجشنبه, ۲۸ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۲۶</div></div>		</p>
                                            </div>
                                        </article>

                                        <article class="im-article content-carousel carousel-2068 pull-right post-10111 post type-post status-publish format-standard has-post-thumbnail hentry category-2068 category-45 tag-159 tag-3784 tag-1180 tag-7118 tag-230 tag-864 tag-5677">
                                            <a class="im-carousel-link" href="/%d9%85%d9%86%d8%a7%d8%b1%d9%87-%da%af%d8%b3%da%a9%d8%b1/" title="مناره گسکر یا مناره بازار، یکی از زییاترین و  با شکوه ترین بناهای به جا مانده از دوره سلجوقی"></a>
                                            <div class="im-carousel-background">
                                                <img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/n3547645-6171682.jpg" alt="مناره گسکر یا مناره بازار، یکی از زییاترین و  با شکوه ترین بناهای به جا مانده از دوره سلجوقی" />
                                            </div>


                                            <div class="im-carousel-entry">
                                                <header class="im-carousel-entry-header">
                                                    <div class="im-entry-category">
                                                        <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-2068" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%da%af%db%8c%d9%84%d8%a7%d9%86/">استان گیلان</a></div></div>			</div>
                                                    <h3 class="im-carousel-entry-title"><a href="/%d9%85%d9%86%d8%a7%d8%b1%d9%87-%da%af%d8%b3%da%a9%d8%b1/" rel="bookmark">مناره گسکر یا مناره بازار، یکی از زییاترین و  با شکوه ترین بناهای به جا مانده از دوره سلجوقی</a></h3>		</header>

                                                <p class="im-carousel-entry-footer">
                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">پنجشنبه, ۲۸ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۸۵</div></div>		</p>
                                            </div>
                                        </article>

                                        <article class="im-article content-carousel carousel-993 pull-right post-10104 post type-post status-publish format-standard has-post-thumbnail hentry category-993 category-45 category-44 tag-2830 tag-7106 tag-1469 tag-1466 tag-1467">
                                            <a class="im-carousel-link" href="/%d8%a2%d8%b1%d8%a7%d9%85%da%af%d8%a7%d9%87-%d8%b9%d8%b7%d8%a7%d8%b1-%d9%86%db%8c%d8%b4%d8%a7%d8%a8%d9%88%d8%b1%db%8c/" title="آرامگاه عطار نیشابوری شاعر و عارف  مشهور ایرانی در سدهٔ ششم و آغاز سدهٔ هفتم"></a>
                                            <div class="im-carousel-background">
                                                <img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/Mausoleum-of-Attar-Neyshaburi-1.jpg" alt="آرامگاه عطار نیشابوری شاعر و عارف  مشهور ایرانی در سدهٔ ششم و آغاز سدهٔ هفتم" />
                                            </div>


                                            <div class="im-carousel-entry">
                                                <header class="im-carousel-entry-header">
                                                    <div class="im-entry-category">
                                                        <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-993" href="/category/%d8%ae%d8%b1%d8%a7%d8%b3%d8%a7%d9%86/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d8%ae%d8%b1%d8%a7%d8%b3%d8%a7%d9%86-%d8%b1%d8%b6%d9%88%db%8c/">استان خراسان رضوی</a></div></div>			</div>
                                                    <h3 class="im-carousel-entry-title"><a href="/%d8%a2%d8%b1%d8%a7%d9%85%da%af%d8%a7%d9%87-%d8%b9%d8%b7%d8%a7%d8%b1-%d9%86%db%8c%d8%b4%d8%a7%d8%a8%d9%88%d8%b1%db%8c/" rel="bookmark">آرامگاه عطار نیشابوری شاعر و عارف  مشهور ایرانی در سدهٔ ششم و آغاز سدهٔ هفتم</a></h3>		</header>

                                                <p class="im-carousel-entry-footer">
                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">پنجشنبه, ۲۸ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۳۴</div></div>		</p>
                                            </div>
                                        </article>

                                        <article class="im-article content-carousel carousel-1201 pull-right post-10097 post type-post status-publish format-standard has-post-thumbnail hentry category-1201 tag-127 tag-856 tag-1733 tag-5635">
                                            <a class="im-carousel-link" href="/%d8%aa%d8%ae%d8%aa-%d9%85%d8%b1%d9%85%d8%b1/" title="تخت مرمر عمارت و تختی بسیار زیبا متعلق به دوران فتحعلی شاه قاجار"></a>
                                            <div class="im-carousel-background">
                                                <img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/Marble_Throne_2.jpg" alt="تخت مرمر عمارت و تختی بسیار زیبا متعلق به دوران فتحعلی شاه قاجار" />
                                            </div>


                                            <div class="im-carousel-entry">
                                                <header class="im-carousel-entry-header">
                                                    <div class="im-entry-category">
                                                        <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-1201" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d8%aa%d9%87%d8%b1%d8%a7%d9%86/%d8%aa%d9%87%d8%b1%d8%a7%d9%86-%d8%a8%d8%b2%d8%b1%da%af/">تهران بزرگ</a></div></div>			</div>
                                                    <h3 class="im-carousel-entry-title"><a href="/%d8%aa%d8%ae%d8%aa-%d9%85%d8%b1%d9%85%d8%b1/" rel="bookmark">تخت مرمر عمارت و تختی بسیار زیبا متعلق به دوران فتحعلی شاه قاجار</a></h3>		</header>

                                                <p class="im-carousel-entry-footer">
                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">دوشنبه, ۲۵ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۲۱۱</div></div>		</p>
                                            </div>
                                        </article>

                                        <article class="im-article content-carousel carousel-2069 pull-right post-10092 post type-post status-publish format-standard has-post-thumbnail hentry category-2069 category-45 tag-903 tag-7153 tag-1180 tag-1793 tag-4998">
                                            <a class="im-carousel-link" href="/%d8%b9%d9%85%d8%a7%d8%b1%d8%aa-%d8%ae%d8%b3%d8%b1%d9%88-%d9%82%d8%b5%d8%b1%d8%b4%db%8c%d8%b1%db%8c%d9%86/" title="عمارت خسرو در استان کرمانشاه یکی از دیدنی ترین  مناطق گردشگری  ایران"></a>
                                            <div class="im-carousel-background">
                                                <img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/img_20170326_151914_202.jpg" alt="عمارت خسرو در استان کرمانشاه یکی از دیدنی ترین  مناطق گردشگری  ایران" />
                                            </div>


                                            <div class="im-carousel-entry">
                                                <header class="im-carousel-entry-header">
                                                    <div class="im-entry-category">
                                                        <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-2069" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%da%a9%d8%b1%d9%85%d8%a7%d9%86%d8%b4%d8%a7%d9%87/">استان کرمانشاه</a></div></div>			</div>
                                                    <h3 class="im-carousel-entry-title"><a href="/%d8%b9%d9%85%d8%a7%d8%b1%d8%aa-%d8%ae%d8%b3%d8%b1%d9%88-%d9%82%d8%b5%d8%b1%d8%b4%db%8c%d8%b1%db%8c%d9%86/" rel="bookmark">عمارت خسرو در استان کرمانشاه یکی از دیدنی ترین  مناطق گردشگری  ایران</a></h3>		</header>

                                                <p class="im-carousel-entry-footer">
                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">دوشنبه, ۲۵ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۴۷</div></div>		</p>
                                            </div>
                                        </article>

                                        <article class="im-article content-carousel carousel-1638 pull-right post-10084 post type-post status-publish format-standard has-post-thumbnail hentry category-1638 category-44 category-2081 tag-903 tag-7152 tag-1242 tag-1180 tag-657 tag-1439 tag-4998">
                                            <a class="im-carousel-link" href="/%d8%af%d8%b1%db%8c%d8%a7%da%86%d9%87-%da%af%d9%87%d8%b1-%d9%81%db%8c%d8%b1%d9%88%d8%b2%d9%87-%d8%a7%db%8c-%d8%af%d8%b1%d8%ae%d8%b4%d8%a7%d9%86-%d8%af%d8%b1-%d9%85%d9%86%d8%b7%d9%82%d9%87-%d8%b2/" title="دریاچه گهر فیروزه ای درخشان در  منطقه زاگرس، یکی از زیبا ترین دریاچه های مرتفع در ایران"></a>
                                            <div class="im-carousel-background">
                                                <img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/1.jpg" alt="دریاچه گهر فیروزه ای درخشان در  منطقه زاگرس، یکی از زیبا ترین دریاچه های مرتفع در ایران" />
                                            </div>


                                            <div class="im-carousel-entry">
                                                <header class="im-carousel-entry-header">
                                                    <div class="im-entry-category">
                                                        <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-1638" href="/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d9%84%d8%b1%d8%b3%d8%aa%d8%a7%d9%86/">استان لرستان</a></div></div>			</div>
                                                    <h3 class="im-carousel-entry-title"><a href="/%d8%af%d8%b1%db%8c%d8%a7%da%86%d9%87-%da%af%d9%87%d8%b1-%d9%81%db%8c%d8%b1%d9%88%d8%b2%d9%87-%d8%a7%db%8c-%d8%af%d8%b1%d8%ae%d8%b4%d8%a7%d9%86-%d8%af%d8%b1-%d9%85%d9%86%d8%b7%d9%82%d9%87-%d8%b2/" rel="bookmark">دریاچه گهر فیروزه ای درخشان در  منطقه زاگرس، یکی از زیبا ترین دریاچه های مرتفع در ایران</a></h3>		</header>

                                                <p class="im-carousel-entry-footer">
                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">یکشنبه, ۲۴ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۸۶</div></div>		</p>
                                            </div>
                                        </article>

                                        <article class="im-article content-carousel carousel-6582 pull-right post-9488 post type-post status-publish format-standard has-post-thumbnail hentry category-6582 category-7023 category-6998 category-3166 tag-6999 tag-7130 tag-7150 tag-7026 tag-7056 tag-7151 tag-7022 tag-7025 tag-1494">
                                            <a class="im-carousel-link" href="/%da%a9%d9%84%db%8c%d8%b3%d8%a7%db%8c-%d9%86%d9%88%d8%aa%d8%b1%d8%af%d8%a7%d9%85-%d9%be%d8%a7%d8%b1%db%8c%d8%b3-%d9%81%d8%b1%d8%a7%d9%86%d8%b3%d9%87/" title="کلیسای نوتردام یکی از زیباترین کلیساهای اروپا با قدمتی بیش از هفتصد سال"></a>
                                            <div class="im-carousel-background">
                                                <img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/notre-dame-paris.jpg" alt="کلیسای نوتردام یکی از زیباترین کلیساهای اروپا با قدمتی بیش از هفتصد سال" />
                                            </div>


                                            <div class="im-carousel-entry">
                                                <header class="im-carousel-entry-header">
                                                    <div class="im-entry-category">
                                                        <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-6582" href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/">بین الملل</a></div></div>			</div>
                                                    <h3 class="im-carousel-entry-title"><a href="/%da%a9%d9%84%db%8c%d8%b3%d8%a7%db%8c-%d9%86%d9%88%d8%aa%d8%b1%d8%af%d8%a7%d9%85-%d9%be%d8%a7%d8%b1%db%8c%d8%b3-%d9%81%d8%b1%d8%a7%d9%86%d8%b3%d9%87/" rel="bookmark">کلیسای نوتردام یکی از زیباترین کلیساهای اروپا با قدمتی بیش از هفتصد سال</a></h3>		</header>

                                                <p class="im-carousel-entry-footer">
                                                    <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">شنبه, ۱۶ تیر ۱۳۹۷</span></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۹۶</div></div>		</p>
                                            </div>
                                        </article>
                                    </div>
                                    <aside class="gap cf" style="height:30px;"></aside></div></div><div  class="clearfix " ><div class="wpb_column col-md-8 col-sm-12"><div class="widget-head light"><strong class="widget-title">منتخب کاربران</strong><div class="widget-head-bar"></div><div class="widget-head-line"></div></div>
                                    <div class="row im-blog">
                                        <div class="clearfix">

                                            <div class="col-lg-3 col-md-4 col-sm-12 post-grid-4">
                                                <div class="row">

                                                    <article class="im-article content-2col content-2col-content col-md-12 post-7202 post type-post status-publish format-standard has-post-thumbnail hentry category-554 category-1436 category-1260 category-65 category-66 tag-5143 tag-5145 tag-5146 tag-5144 tag-5147 tag-903 tag-5148 tag-5149 tag-5152 tag-5153 tag-5154 tag-5155 tag-5151 tag-1425 tag-830 tag-3734 tag-5157 tag-5156 tag-5150">
                                                        <div class="im-entry-thumb">
                                                            <a class="im-entry-thumb-link" href="/%d8%a7%d9%86%d9%88%d8%a7%d8%b9-%da%86%d8%a7%d9%82%d9%88/" title="انواع چاقو در استان معروف به چاقو سازی در ایران یعنی زنجان">
                                                                <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/9252.jpg" alt="انواع چاقو در استان معروف به چاقو سازی در ایران یعنی زنجان" />
                                                            </a>
                                                            <header class="im-entry-header">
                                                                <div class="im-entry-category">
                                                                    <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-66" href="/category/%d8%a2%d8%af%d8%a7%d8%a8-%d9%88-%d8%b1%d8%b3%d9%88%d9%85/%d8%b5%d9%86%d8%a7%db%8c%d8%b9-%d8%af%d8%b3%d8%aa%db%8c/" title="صنایع دستی">صنایع دستی</a></div></div>			</div>
                                                                <h3 class="im-entry-title"><a href="/%d8%a7%d9%86%d9%88%d8%a7%d8%b9-%da%86%d8%a7%d9%82%d9%88/" rel="bookmark">انواع چاقو در استان معروف به چاقو سازی در ایران یعنی زنجان</a></h3>		</header>
                                                        </div>

                                                        <div class="im-entry">
                                                            <div class="im-entry-content">
                                                                <p>انواع چاقو در صنعت چاقو سازی زنجان درچند مقالۀ متفاوت برایتان از انواع چاقو سازی در زنجان نوشتیم ، اینکه سابقۀ تاریخی این صنعت به&#8230;</p>
                                                            </div>

                                                            <p class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">یکشنبه, ۱۷ دی ۱۳۹۶</span></div><div class="comments-link im-meta-item"><a href="/%d8%a7%d9%86%d9%88%d8%a7%d8%b9-%da%86%d8%a7%d9%82%d9%88/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/writer2/"><i class="fa fa-user"></i>writer2</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۹۸۳</div></div>		</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-sm-12 post-grid-4">
                                                <div class="row">

                                                    <article class="im-article content-2col content-2col-content col-md-12 post-3086 post type-post status-publish format-standard has-post-thumbnail hentry category-46 tag-259 tag-528 tag-127 tag-257 tag-258 tag-267 tag-269 tag-266 tag-529 tag-525 tag-527 tag-526 tag-261">
                                                        <div class="im-entry-thumb">
                                                            <a class="im-entry-thumb-link" href="/%d8%b4%d9%87%d8%b1%da%a9-%d8%b3%db%8c%d9%86%d9%85%d8%a7%db%8c%db%8c-%d8%ba%d8%b2%d8%a7%d9%84%db%8c/" title="قدم زدن در خیابان­های تهران قدیم">
                                                                <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/09/شهرک-سینمایی-غزالی-370x250.jpg" alt="قدم زدن در خیابان­های تهران قدیم" />
                                                            </a>
                                                            <header class="im-entry-header">
                                                                <div class="im-entry-category">
                                                                    <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-46" href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%d8%aa%d9%81%d8%b1%db%8c%d8%ad%db%8c/">اماکن تفریحی</a></div></div>			</div>
                                                                <h3 class="im-entry-title"><a href="/%d8%b4%d9%87%d8%b1%da%a9-%d8%b3%db%8c%d9%86%d9%85%d8%a7%db%8c%db%8c-%d8%ba%d8%b2%d8%a7%d9%84%db%8c/" rel="bookmark">قدم زدن در خیابان­های تهران قدیم</a></h3>		</header>
                                                        </div>

                                                        <div class="im-entry">
                                                            <div class="im-entry-content">
                                                                <p>شهرک سینمایی غزالی شاید این سؤال برای بسیاری از علاقه ­مندان به سریال­ها و فیلم­های تاریخی ایرانی پیش آمده باشد که محل دقیق فیلم­برداری چنین&#8230;</p>
                                                            </div>

                                                            <p class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">جمعه, ۱۷ شهریور ۱۳۹۶</span></div><div class="comments-link im-meta-item"><a href="/%d8%b4%d9%87%d8%b1%da%a9-%d8%b3%db%8c%d9%86%d9%85%d8%a7%db%8c%db%8c-%d8%ba%d8%b2%d8%a7%d9%84%db%8c/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/bogen-2/"><i class="fa fa-user"></i>شازده مسافر</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۸۷۳</div></div>		</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-sm-12 post-grid-4">
                                                <div class="row">

                                                    <article class="im-article content-2col content-2col-content col-md-12 post-7196 post type-post status-publish format-standard has-post-thumbnail hentry category-1111 category-45 category-44 category-3181 tag-5137 tag-886 tag-2146 tag-2403 tag-1501 tag-2065 tag-5136 tag-5135 tag-5138 tag-903 tag-2796 tag-159 tag-2775 tag-5142 tag-1180 tag-4999 tag-5139 tag-183 tag-5141 tag-3242 tag-5134 tag-5133 tag-5140">
                                                        <div class="im-entry-thumb">
                                                            <a class="im-entry-thumb-link" href="/%da%a9%d8%a7%d8%b1%d9%88%d8%a7%d9%86%d8%b3%d8%b1%d8%a7%db%8c-%d8%a7%d9%85%db%8c%d9%86-%d8%a7%d9%84%d8%af%d9%88%d9%84%d9%87/" title="کاروانسرای امین الدوله اوج شکوه معماری ایرانی در شهر کاشان">
                                                                <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/Bazaar-of-Kashan5.jpg" alt="کاروانسرای امین الدوله اوج شکوه معماری ایرانی در شهر کاشان" />
                                                            </a>
                                                            <header class="im-entry-header">
                                                                <div class="im-entry-category">
                                                                    <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-45" href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%d8%aa%d8%a7%d8%b1%db%8c%d8%ae%db%8c/" title="اماکن تاریخی">اماکن تاریخی</a></div></div>			</div>
                                                                <h3 class="im-entry-title"><a href="/%da%a9%d8%a7%d8%b1%d9%88%d8%a7%d9%86%d8%b3%d8%b1%d8%a7%db%8c-%d8%a7%d9%85%db%8c%d9%86-%d8%a7%d9%84%d8%af%d9%88%d9%84%d9%87/" rel="bookmark">کاروانسرای امین الدوله اوج شکوه معماری ایرانی در شهر کاشان</a></h3>		</header>
                                                        </div>

                                                        <div class="im-entry">
                                                            <div class="im-entry-content">
                                                                <p>کاروانسرای امین الدوله کاروانسرای امین الدوله در شهر کاشان ، که از آن دست شهرهای ایران است که در گوشه و کناری از آن میتوانید&#8230;</p>
                                                            </div>

                                                            <p class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">یکشنبه, ۱۷ دی ۱۳۹۶</span></div><div class="comments-link im-meta-item"><a href="/%da%a9%d8%a7%d8%b1%d9%88%d8%a7%d9%86%d8%b3%d8%b1%d8%a7%db%8c-%d8%a7%d9%85%db%8c%d9%86-%d8%a7%d9%84%d8%af%d9%88%d9%84%d9%87/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/writer2/"><i class="fa fa-user"></i>writer2</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۳۳۲</div></div>		</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-sm-12 post-grid-4">
                                                <div class="row">

                                                    <article class="im-article content-2col content-2col-content col-md-12 post-635 post type-post status-publish format-standard has-post-thumbnail hentry category-144 category-44 category-47 tag-117 tag-155 tag-145 tag-165 tag-159 tag-146 tag-152 tag-154 tag-150 tag-166 tag-68 tag-153 tag-162 tag-161 tag-148 tag-73 tag-163 tag-78 tag-149 tag-164 tag-123">
                                                        <div class="im-entry-thumb">
                                                            <a class="im-entry-thumb-link" href="/%d8%a7%d9%85%d8%a7%d9%85%d8%b2%d8%a7%d8%af%d9%87-%d8%b9%d8%a8%d8%af%d8%a7%d9%84%d9%84%d9%87-%d8%a8%d8%a7%d9%81%d9%82-%db%8c%d8%b2%d8%af/" title="حال و هوای معنوی و عرفانی توی امامزاده عبدالله بافق">
                                                                <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2017/06/3c79cb00-0f9b-4f9e-b4cf-956191cdf6eb-370x250.jpg" alt="حال و هوای معنوی و عرفانی توی امامزاده عبدالله بافق" />
                                                            </a>
                                                            <header class="im-entry-header">
                                                                <div class="im-entry-category">
                                                                    <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-47" href="/category/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%da%af%d8%b1%d8%af%d8%b4%da%af%d8%b1%db%8c/%d8%a7%d9%85%d8%a7%da%a9%d9%86-%d9%85%d8%b0%d9%87%d8%a8%db%8c/" title="اماکن مذهبی">اماکن مذهبی</a></div></div>			</div>
                                                                <h3 class="im-entry-title"><a href="/%d8%a7%d9%85%d8%a7%d9%85%d8%b2%d8%a7%d8%af%d9%87-%d8%b9%d8%a8%d8%af%d8%a7%d9%84%d9%84%d9%87-%d8%a8%d8%a7%d9%81%d9%82-%db%8c%d8%b2%d8%af/" rel="bookmark">حال و هوای معنوی و عرفانی توی امامزاده عبدالله بافق</a></h3>		</header>
                                                        </div>

                                                        <div class="im-entry">
                                                            <div class="im-entry-content">
                                                                <p>سفرنامه شازده مسافر به امامزاده عبدالله بافق امامزاده عبدالله بافق شازده جونم، میدونی که توی ایران امام زاده های زیادی وجود داره و چون که&#8230;</p>
                                                            </div>

                                                            <p class="im-entry-footer">
                                                                <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">چهارشنبه, ۷ تیر ۱۳۹۶</span></div><div class="comments-link im-meta-item"><a href="/%d8%a7%d9%85%d8%a7%d9%85%d8%b2%d8%a7%d8%af%d9%87-%d8%b9%d8%a8%d8%af%d8%a7%d9%84%d9%84%d9%87-%d8%a8%d8%a7%d9%81%d9%82-%db%8c%d8%b2%d8%af/#comments"><i class="fa fa-comment-o"></i>۱</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/bogen-2/"><i class="fa fa-user"></i>شازده مسافر</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۹۹۱</div></div>		</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <aside class="gap cf" style="height:30px;"></aside><div class="widget-head light"><strong class="widget-title">جدیدترین ها</strong><div class="widget-head-bar"></div><div class="widget-head-line"></div></div>
                                    <div class="row im-blog">
                                        <div class="clearfix">

                                            <div class="small-12 columns">

                                                <article class="im-article content-column clearfix post-10135 post type-post status-publish format-standard has-post-thumbnail hentry category-6582 category-6583 category-7032 tag-3784 tag-7035 tag-7145 tag-1789 tag-864 tag-7036">
                                                    <div class="im-entry-thumb col-md-5 col-sm-12">
                                                        <a class="im-entry-thumb-link" href="/%d8%a8%d9%84%d9%86%d8%af%d8%aa%d8%b1%db%8c%d9%86-%d9%85%d8%b9%d8%a8%d8%af-%d8%ac%d9%87%d8%a7%d9%86/" title="بلندترین معبد جهان در کشور پهناور و پرجمعیت هندوستان">
                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/sri-vrindavan-chandrodaya-temple_1418965907.jpg" alt="بلندترین معبد جهان در کشور پهناور و پرجمعیت هندوستان" />
                                                        </a>
                                                    </div>

                                                    <div class="im-entry col-md-7 col-sm-12">
                                                        <header class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-6582" href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/">بین الملل</a></div></div>			</div>
                                                            <h3 class="im-entry-title"><a href="/%d8%a8%d9%84%d9%86%d8%af%d8%aa%d8%b1%db%8c%d9%86-%d9%85%d8%b9%d8%a8%d8%af-%d8%ac%d9%87%d8%a7%d9%86/" rel="bookmark">بلندترین معبد جهان در کشور پهناور و پرجمعیت هندوستان</a></h3>		</header>

                                                        <div class="im-entry-content">
                                                            <p>بلندترین معبد جهان بلندترین معبد جهان ، معبد Chandrodaya در Vrindavan فقط یک معبد  نیست، بلکه این مکان نقش مهمی  در آینده  کشور &#8220;هند&#8221; ایفا&#8230;</p>
                                                        </div>

                                                        <p class="im-entry-footer">
                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">جمعه, ۲۹ تیر ۱۳۹۷</span></div><div class="comments-link im-meta-item"><a href="/%d8%a8%d9%84%d9%86%d8%af%d8%aa%d8%b1%db%8c%d9%86-%d9%85%d8%b9%d8%a8%d8%af-%d8%ac%d9%87%d8%a7%d9%86/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/writer/"><i class="fa fa-user"></i>شازده مسافر</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۱۹</div></div>		</p>
                                                    </div>
                                                </article>
                                            </div>

                                            <div class="small-12 columns">

                                                <article class="im-article content-column clearfix post-10129 post type-post status-publish format-standard has-post-thumbnail hentry category-6582 category-6583 category-7032">
                                                    <div class="im-entry-thumb col-md-5 col-sm-12">
                                                        <a class="im-entry-thumb-link" href="/%d8%aa%d8%a7%d8%ac-%d9%85%d8%ad%d9%84/" title="تاج محل ترکیبی از  معماری هند، فارسی و اسلامی تقدیم شده به عشق">
                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/slider2.jpg" alt="تاج محل ترکیبی از  معماری هند، فارسی و اسلامی تقدیم شده به عشق" />
                                                        </a>
                                                    </div>

                                                    <div class="im-entry col-md-7 col-sm-12">
                                                        <header class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-6582" href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/">بین الملل</a></div></div>			</div>
                                                            <h3 class="im-entry-title"><a href="/%d8%aa%d8%a7%d8%ac-%d9%85%d8%ad%d9%84/" rel="bookmark">تاج محل ترکیبی از  معماری هند، فارسی و اسلامی تقدیم شده به عشق</a></h3>		</header>

                                                        <div class="im-entry-content">
                                                            <p> تاج محل محل زیبای که تاج محل در آن قرار  دارد واقعا ستودنی است .نمای زیبای سنگ مرمر سفید منحصر به فرد و بی همتا&#8230;</p>
                                                        </div>

                                                        <p class="im-entry-footer">
                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">جمعه, ۲۹ تیر ۱۳۹۷</span></div><div class="comments-link im-meta-item"><a href="/%d8%aa%d8%a7%d8%ac-%d9%85%d8%ad%d9%84/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/writer/"><i class="fa fa-user"></i>شازده مسافر</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۷۱</div></div>		</p>
                                                    </div>
                                                </article>
                                            </div>

                                            <div class="small-12 columns">

                                                <article class="im-article content-column clearfix post-10124 post type-post status-publish format-standard has-post-thumbnail hentry category-6582 category-6584 category-7092 category-6583 tag-7128 tag-7154 tag-7093 tag-7155">
                                                    <div class="im-entry-thumb col-md-5 col-sm-12">
                                                        <a class="im-entry-thumb-link" href="/%d9%85%d8%af%d8%a7%d8%a6%d9%86-%d8%b5%d8%a7%d9%84%d8%ad/" title="مدائن صالح صخره ای  سنگی  و چندین کتیبه مهم تاریخی در عربستان صعودی">
                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/3e7f67aefc805020379c5b605c413ae4.jpg" alt="مدائن صالح صخره ای  سنگی  و چندین کتیبه مهم تاریخی در عربستان صعودی" />
                                                        </a>
                                                    </div>

                                                    <div class="im-entry col-md-7 col-sm-12">
                                                        <header class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-6582" href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/">بین الملل</a></div></div>			</div>
                                                            <h3 class="im-entry-title"><a href="/%d9%85%d8%af%d8%a7%d8%a6%d9%86-%d8%b5%d8%a7%d9%84%d8%ad/" rel="bookmark">مدائن صالح صخره ای  سنگی  و چندین کتیبه مهم تاریخی در عربستان صعودی</a></h3>		</header>

                                                        <div class="im-entry-content">
                                                            <p>مدائن صالح مدائن صالح مکانی تاریخی در عربستان سعودی  است  که از صخره ای  سنگی  و چندین کتیبه مهم تاریخی تشکیل شده است. در سفرمان&#8230;</p>
                                                        </div>

                                                        <p class="im-entry-footer">
                                                            <div class="iranomag-meta clearfix"><div class="posted-on im-meta-item"><span class="entry-date published updated">جمعه, ۲۹ تیر ۱۳۹۷</span></div><div class="comments-link im-meta-item"><a href="/%d9%85%d8%af%d8%a7%d8%a6%d9%86-%d8%b5%d8%a7%d9%84%d8%ad/#respond"><i class="fa fa-comment-o"></i>۰</a></div><div class="author vcard im-meta-item"><a class="url fn n" href="/author/writer/"><i class="fa fa-user"></i>شازده مسافر</a></div><div class="post-views im-meta-item"><i class="fa fa-eye"></i>۲۳۵</div></div>		</p>
                                                    </div>
                                                </article>
                                            </div>

                                            <div class="small-12 columns">

                                                <article class="im-article content-column clearfix post-10118 post type-post status-publish format-standard has-post-thumbnail hentry category-6582 category-7087 category-6583 tag-7084 tag-7085 tag-3314">
                                                    <div class="im-entry-thumb col-md-5 col-sm-12">
                                                        <a class="im-entry-thumb-link" href="/%d8%af%db%8c%d9%88%d8%a7%d8%b1-%da%86%db%8c%d9%86/" title="دیوار چین مجموعه ای باستانی از دیوارها و استحکامات با طول بیش از ۱۳،۰۰۰ مایل">
                                                            <img class="lazy-img" data-src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/07/china_wall_01_big.jpg" alt="دیوار چین مجموعه ای باستانی از دیوارها و استحکامات با طول بیش از ۱۳،۰۰۰ مایل" />
                                                        </a>
                                                    </div>

                                                    <div class="im-entry col-md-7 col-sm-12">
                                                        <header class="im-entry-header">
                                                            <div class="im-entry-category">
                                                                <div class="iranomag-meta clearfix"><div class="cat-links im-meta-item"><a class="im-catlink-color-6582" href="/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/">بین الملل</a></div></div>			</div>
                                                            <h3 class="im-entry-title"><a href="/%d8%af%db%8c%d9%88%d8%a7%d8%b1-%da%86%db%8c%d9%86/" rel="bookmark">دیوار چین مجموعه ای باستانی از دیوارها و استحکامات با طول بیش از ۱۳،۰۰۰ مایل</a></h3>		</header>

                                                        <div class="im-entry-content">
                                                            <p>دیوار چین حتما می دانید یکی از شاهکارهای معماری بشر، دیوار چین است.  دیوار چین در سال ۱۹۸۷ توسط سازمان یونسکو، جزو یکی از آثار باستانی&#8230;</p>
                                                        </div>

                                                        <p class="im-entry-footer">
                                                            <div class="iranomag-meta clearfix">
                                                                <div class="posted-on im-meta-item">
                                                                    <span class="entry-date published updated">پنجشنبه, ۲۸ تیر ۱۳۹۷</span>
                                                                </div>
                                                                <div class="comments-link im-meta-item">
                                                                    <a href="/%d8%af%db%8c%d9%88%d8%a7%d8%b1-%da%86%db%8c%d9%86/#respond">
                                                                        <i class="fa fa-comment-o"></i>۰
                                                                    </a>
                                                                </div>
                                                                <div class="author vcard im-meta-item">
                                                                    <a class="url fn n" href="/author/writer/"> <i class="fa fa-user"></i>شازده مسافر</a>
                                                                </div>
                                                                <div class="post-views im-meta-item"><i class="fa fa-eye"></i>۱۲۶</div>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <nav class="navigation pagination" >

                                                <div class="nav-links"><span aria-current='page' class='page-numbers current'>۱</span>
                                                    <a class='page-numbers' href='/page/2/'>۲</a>
                                                    <a class='page-numbers' href='/page/3/'>۳</a>
                                                    <span class="page-numbers dots">&hellip;</span>
                                                    <a class='page-numbers' href='/page/318/'>۳۱۸</a>
                                                    <a class="next page-numbers" href="/page/2/"><span>&larr;</span></a></div>
                                            </nav></div>			</div>
                                    <aside class="gap cf" style="height:30px;"></aside></div><div class="sticky-sidebar wpb_column col-md-4 col-sm-12">
                                    <div class="wpb_widgetised_column wpb_content_element">
                                        <div class="wpb_wrapper">

                                            <section id="im_multiad_widget-2" class="widget im_multiad">		<div class="clearfix">
                                                    <div class="ad-block ab-1 col-md-6 col-sm-3 col-xs-6">
                                                        <a href="http://shazdemosafer.com"><img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/1.jpg" width="125" height="125" /></a>			</div>
                                                    <div class="ad-block ab-2 col-md-6 col-sm-3 col-xs-6">
                                                        <a href="http://shazdemosafer.com"><img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/4-2.jpg"width="125" height="125" /></a>			</div>
                                                    <div class="ad-block ab-3 col-md-6 col-sm-3 col-xs-6">
                                                        <a href="http://shazdemosafer.com"><img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/2.jpg" width="125" height="125" /></a>			</div>
                                                    <div class="ad-block ab-4 col-md-6 col-sm-3 col-xs-6">
                                                        <a href="http://shazdemosafer.com"><img src="https://gardeshname.shazdemosafer.com/wp-content/uploads/2018/01/3.jpg" width="125" height="125" /></a>			</div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div></div>
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
