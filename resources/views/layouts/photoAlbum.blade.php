<link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('css/theme2/photoAlbum.css')}}'/>

<span id="photo_album_span" class="ui_overlay ui_modal albumLightbox">
   <div class="body_text">
      <!--[if IE 8 ]>
       <style type="text/css">
           body.remove-scrolling {
               position: fixed;
           }
       </style>
       <![endif]-->
      <div id="LOC_PHOTO_ALBUMS" class="albumViewer mediaAlbums mediaAlbumsLightbox">
         <div class="placementWrapper">
            <div class="ppr_rup ppr_priv_photoviewer">
               <div class="photoviewerWrapper">
                  <div class="navBar ltr">
                     <div class="tabContainer inlineTabs">
                        <ul class="lbTabs tabCount3">
                        </ul>
                     </div>
                     <div class="mainView hasTabs desktop">
                        <div class="photoRegion view_hero ">
                           <div class="heroWrapper">
                              <div class="cssLoadingSpinner display-none">
                                 <div class="cssLoadingSpinner_step1"></div>
                                 <div class="cssLoadingSpinner_step2"></div>
                                 <div class="cssLoadingSpinner_step3"></div>
                                 <div class="cssLoadingSpinner_step4"></div>
                                 <div class="cssLoadingSpinner_step5"></div>
                                 <div class="cssLoadingSpinner_step6"></div>
                                 <div class="cssLoadingSpinner_step7"></div>
                                 <div class="cssLoadingSpinner_step8"></div>
                              </div>
                              <div class="heroPhoto">
                                 <div class="mainImg imgCenterBoth portrait" dir="ltr">
                                 </div>
                                 <a onclick="prvPhotoSlideBar()" class="heroNavLeft heroNav left showOnHover"></a>
                                 <a onclick="nxtPhotoSlideBar()" class="heroNavRight heroNav right showOnHover"></a>
                              </div>
                              <div class="heroThumbnails showOnHover">
                                 <div class="thumbNav left thumbNavLeft"></div>
                                 <div class="photos inHeroList">
                                 </div>
                                 <div class="thumbNav right thumbNavRight"></div>
                              </div>
                           </div>
                        </div>
                        <div class="photoviewerSidebarWrapper">
                           <div class="upperSidebarContainer">
                              <a class="ui_button secondary backBtn ltr">
                                  <span class="ui_icon single-chevron-left"><span class="close_album buttonText">بازگشت به صفحه اصلی</span></span>
                              </a>
                              <div class="captionArea">
                                 <div class="iconContainer">
                                    <div class="logoCircle tripadvisor hidden">
                                       <span class="tripadvisorIcon"></span>
                                    </div>
                                    <div class="logoCircle management">
                                       <span class="ui_icon hotels managementIcon"></span>
                                    </div>
                                    <div class="logoCircle memberAvatar hidden">
                                    </div>
                                 </div>
                                 <div class="captionRightContainer">
                                    <div class="caption">
                                       <div class="captionProvider"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <hr class="sidebarSeparator">
                           </div>
                           <div class="lowerSidebarContainer">
                              <div class="dynamicLowerSidebarContent">
                                 <div class="sidebarMediaList">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="ui_close_x close_album"></div>
   </div>
</span>