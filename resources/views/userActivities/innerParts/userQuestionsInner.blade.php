
<div class="userProfileActivitiesDetailsMainDiv col-sm-8 col-xs-12">
    <div class="userProfilePostsFiltrationContainer">
        <div class="userProfilePostsFiltration">
            <span>نمایش بر اساس</span>
            <span>جدیدترین‌ها</span>
            <span>قدمی‌ترین‌ها</span>
            <span>بهترین‌ها</span>
            <span>داغ‌ترین‌ها</span>
            <span>بدترین‌ها</span>
            <span>بیشترین همراهان</span>
        </div>
    </div>

    <div class="userProfileQAndA">
        <div class="userProfilePostsSearchContainer">
            <div class="inputBox">
                            <textarea class="inputBoxInput inputBoxInputSearch" type="text"
                                      placeholder="جستجو کنید"></textarea>
            </div>
            <span>نمایش پاسخ‌ها</span>
            <span>نمایش سؤال‌ها</span>
            <div class="clear-both display-none"></div>
            <span>نمایش همه</span>
        </div>

        <div class="answersBoxMainDiv">
            <div class="answersOptionsBoxes answersActions" onclick="showAnswersActionBox(this)">
                <span class="answersActionsIcon"></span>
            </div>
            <div class="questionsActionsMoreDetails display-none">
                <span>گزارش پست</span>
                <span>مشاهده صفحه شازده سینا</span>
                <span>مشاهده تمامی پست‌ها</span>
                <span>صفحه قوانین و مقررات</span>
            </div>
            {{--    <div class="showingQuestionCompletely" onclick="showSpecificQuestion(this)">--}}
            {{--        مشاهده کامل سؤال--}}
            {{--    </div>--}}
            <div class="answersWriterDetailsShow">
                <div class="circleBase type2 answersWriterPicShow"></div>
                <div class="answersWriterExperienceDetails">
                    <b class="userProfileNameAnswers">shazdesina</b>
                    <div class="display-inline-block">در
                        <span class="answersWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                    </div>
                    <div>
                        هم اکنون - بیش از 23 ساعت پیش
                    </div>
                </div>
            </div>
            <div class="clear-both"></div>
            <div class="questionContentMainBox">
                بسیار از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از طریق اینترنت
                دریافت می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا خدمات
                مورد نیازشان اثرپذیری فراوانی دارد.
                با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع روستایی هستند،
                می توان گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی نقش کلیدی داشته باشد.
            </div>
            <div class="clear-both"></div>
            <div class="questionSubMenuBar">
                <div class="numberOfAnswers">
                    <span>31</span>
                    نفر پاسخ دادند
                </div>
                <div class="showAnswersToggle" onclick="showAllAnswers(this)">مشاهده پاسخ‌ها</div>
                <b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(this)">پاسخ دهید</b>
            </div>
            <div>
                <div class="display-none">
                    <div class="answerPlaceMainDiv">
                        <div class="circleBase type2 answerWriterProfilePic"></div>
                        <div class="answerBoxText">
                            <b class="replyWriterUsername">shazdesina</b>
                            من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                            متهم کنید.
                            <div class="answerStatistics">
                                <span class="numberOfDislikeAnswer">31</span>
                                <span class="numberOfLikeAnswer">31</span>
                            </div>
                        </div>
                        <div class="actionToAnswer">
                            <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                <span class="dislikeAnswer"></span>
                                <span class="dislikeAnswerClicked display-none"></span>
                            </div>
                            <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                <span class="likeAnswer"></span>
                                <span class="likeAnswerClicked display-none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="newAnswerPlaceMainDiv">
                            <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                            <div class="inputBox">
                                <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                          placeholder="شما چه نظری دارید؟"></textarea>
                                <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="display-none theOne">
                    <div class="answerPlaceMainDiv">
                        <div class="seePrevAnswers" onclick="seePrevAnswers(this)">مشاهده پاسخ‌ها پیش از
                            این
                        </div>
                        <div class="circleBase type2 answerWriterProfilePic"></div>
                        <div class="answerBoxText">
                            <b class="replyWriterUsername">shazdesina</b>
                            من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                            متهم کنید.
                            <div class="answerStatistics">
                                <span class="numberOfDislikeAnswer">31</span>
                                <span class="numberOfLikeAnswer">31</span>
                            </div>
                        </div>
                        <div class="actionToAnswer">
                            <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                <span class="dislikeAnswer"></span>
                                <span class="dislikeAnswerClicked display-none"></span>
                            </div>
                            <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                <span class="likeAnswer"></span>
                                <span class="likeAnswerClicked display-none"></span>
                            </div>
                        </div>
                        <div class="seeNextAnswers" onclick="seeNextAnswers(this)">مشاهده پاسخ‌ها پس از
                            این
                        </div>
                    </div>
                    <div class="">
                        <div class="newAnswerPlaceMainDiv">
                            <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                            <div class="inputBox">
                                <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                          placeholder="شما چه نظری دارید؟"></textarea>
                                <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="display-none">
                    <div class="answerPlaceMainDiv">
                        <div class="circleBase type2 answerWriterProfilePic"></div>
                        <div class="answerBoxText">
                            <b class="replyWriterUsername">shazdesina</b>
                            من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                            متهم کنید.
                            <div class="answerStatistics">
                                <span class="numberOfDislikeAnswer">31</span>
                                <span class="numberOfLikeAnswer">31</span>
                            </div>
                        </div>
                        <div class="actionToAnswer">
                            <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                <span class="dislikeAnswer"></span>
                                <span class="dislikeAnswerClicked display-none"></span>
                            </div>
                            <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                <span class="likeAnswer"></span>
                                <span class="likeAnswerClicked display-none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="newAnswerPlaceMainDiv">
                            <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                            <div class="inputBox">
                                <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                          placeholder="شما چه نظری دارید؟"></textarea>
                                <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="display-none last">
                <div class="newAnswerPlaceMainDiv">
                    <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                    <div class="inputBox">
                        <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                        <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                  placeholder="شما چه نظری دارید؟"></textarea>
                        <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                    </div>
                    <div></div>
                </div>
            </div>
        </div>

        <div class="answersBoxMainDiv">
            <div class="answersOptionsBoxes answersActions" onclick="showAnswersActionBox(this)">
                <span class="answersActionsIcon"></span>
            </div>
            <div class="questionsActionsMoreDetails display-none">
                <span>گزارش پست</span>
                <span>مشاهده صفحه شازده سینا</span>
                <span>مشاهده تمامی پست‌ها</span>
                <span>صفحه قوانین و مقررات</span>
            </div>
            {{--    <div class="showingQuestionCompletely" onclick="showSpecificQuestion(this)">--}}
            {{--        مشاهده کامل سؤال--}}
            {{--    </div>--}}
            <div class="answersWriterDetailsShow">
                <div class="circleBase type2 answersWriterPicShow"></div>
                <div class="answersWriterExperienceDetails">
                    <b class="userProfileNameAnswers">shazdesina</b>
                    <div class="display-inline-block">در
                        <span class="answersWriterExperiencePlace">هتل عباسی، شهر یزد، استان یزد</span>
                    </div>
                    <div>
                        هم اکنون - بیش از 23 ساعت پیش
                    </div>
                </div>
            </div>
            <div class="clear-both"></div>
            <div class="questionContentMainBox">
                بسیار از درخواست کنندگان کسب و کارهای بومی و محلی اطلاعات مورد نیاز خود را از طریق اینترنت
                دریافت می کنند به گونه ای که این اطلاعات در تصمیم گیری نهایی آنها برای انتخاب کالا یا خدمات
                مورد نیازشان اثرپذیری فراوانی دارد.
                با توجه به ابن که خدمات و کالاهای بومی و محلی دارای اصالت و فرهنگ کهن جوامع روستایی هستند،
                می توان گفت اینترنت می تواند در آمدزایی از سبک زندگی جوامع محلی نقش کلیدی داشته باشد.
            </div>
            <div class="clear-both"></div>
            <div class="questionSubMenuBar">
                <div class="numberOfAnswers">
                    <span>31</span>
                    نفر پاسخ دادند
                </div>
                <div class="showAnswersToggle" onclick="showAllAnswers(this)">مشاهده پاسخ‌ها</div>
                <b class="replyBtn replyAnswerBtn" onclick="replyToAnswers(this)">پاسخ دهید</b>
            </div>
            <div>
                <div class="display-none">
                    <div class="answerPlaceMainDiv">
                        <div class="circleBase type2 answerWriterProfilePic"></div>
                        <div class="answerBoxText">
                            <b class="replyWriterUsername">shazdesina</b>
                            من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                            متهم کنید.
                            <div class="answerStatistics">
                                <span class="numberOfDislikeAnswer">31</span>
                                <span class="numberOfLikeAnswer">31</span>
                            </div>
                        </div>
                        <div class="actionToAnswer">
                            <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                <span class="dislikeAnswer"></span>
                                <span class="dislikeAnswerClicked display-none"></span>
                            </div>
                            <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                <span class="likeAnswer"></span>
                                <span class="likeAnswerClicked display-none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="newAnswerPlaceMainDiv">
                            <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                            <div class="inputBox">
                                <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                          placeholder="شما چه نظری دارید؟"></textarea>
                                <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="display-none theOne">
                    <div class="answerPlaceMainDiv">
                        <div class="seePrevAnswers" onclick="seePrevAnswers(this)">مشاهده پاسخ‌ها پیش از
                            این
                        </div>
                        <div class="circleBase type2 answerWriterProfilePic"></div>
                        <div class="answerBoxText">
                            <b class="replyWriterUsername">shazdesina</b>
                            من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                            متهم کنید.
                            <div class="answerStatistics">
                                <span class="numberOfDislikeAnswer">31</span>
                                <span class="numberOfLikeAnswer">31</span>
                            </div>
                        </div>
                        <div class="actionToAnswer">
                            <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                <span class="dislikeAnswer"></span>
                                <span class="dislikeAnswerClicked display-none"></span>
                            </div>
                            <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                <span class="likeAnswer"></span>
                                <span class="likeAnswerClicked display-none"></span>
                            </div>
                        </div>
                        <div class="seeNextAnswers" onclick="seeNextAnswers(this)">مشاهده پاسخ‌ها پس از
                            این
                        </div>
                    </div>
                    <div class="">
                        <div class="newAnswerPlaceMainDiv">
                            <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                            <div class="inputBox">
                                <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                          placeholder="شما چه نظری دارید؟"></textarea>
                                <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="display-none">
                    <div class="answerPlaceMainDiv">
                        <div class="circleBase type2 answerWriterProfilePic"></div>
                        <div class="answerBoxText">
                            <b class="replyWriterUsername">shazdesina</b>
                            من موافق این مطلب نیستم. دوست من شما باید خودتان توجه می کردید نه اینکه ما را
                            متهم کنید.
                            <div class="answerStatistics">
                                <span class="numberOfDislikeAnswer">31</span>
                                <span class="numberOfLikeAnswer">31</span>
                            </div>
                        </div>
                        <div class="actionToAnswer">
                            <div class="display-inline-block" onclick="dislikeTheAnswers(this)">
                                <span class="dislikeAnswer"></span>
                                <span class="dislikeAnswerClicked display-none"></span>
                            </div>
                            <div class="display-inline-block" onclick="likeTheAnswers(this)">
                                <span class="likeAnswer"></span>
                                <span class="likeAnswerClicked display-none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="newAnswerPlaceMainDiv">
                            <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                            <div class="inputBox">
                                <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                                <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                          placeholder="شما چه نظری دارید؟"></textarea>
                                <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="display-none last">
                <div class="newAnswerPlaceMainDiv">
                    <div class="circleBase type2 newAnswerWriterProfilePic"></div>
                    <div class="inputBox">
                        <b class="replyAnswerTitle">در پاسخ به نظر shazdesina</b>
                        <textarea class="inputBoxInput inputBoxInputAnswer" type="text"
                                  placeholder="شما چه نظری دارید؟"></textarea>
                        <img class="commentSmileyIcon" src="{{"../public/images/smile.png"}}">
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

</div>