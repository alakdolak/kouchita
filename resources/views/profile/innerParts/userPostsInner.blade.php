
@include('component.smallShowReview')

<div class="userProfileActivitiesDetailsMainDiv userActivitiesPosts col-sm-8 col-xs-12">
    <div class="userProfilePostsFiltrationContainer">
        <div class="userProfilePostsFiltration">
            <span>نمایش بر اساس</span>
            <span class="active" onclick="changeSortPost('new', this)">جدیدترین‌ها</span>
            <span onclick="changeSortPost('top', this)">بهترین‌ها</span>
            <span onclick="changeSortPost('hot', this)">داغ‌ترین‌ها</span>
{{--            <span>بدترین‌ها</span>--}}
{{--            <span>بیشترین همراهان</span>--}}
        </div>
    </div>

    <div class="userProfilePostsMainDiv">
        <div class="userProfilePostsSearchContainer">
            <div class="inputBox">
                <textarea class="inputBoxInput inputBoxInputSearch" type="text" placeholder="جستجو کنید"></textarea>
            </div>
{{--            <span>نمایش تکی</span>--}}
{{--            <span>نمایش جدولی</span>--}}
        </div>

        <div class="postsMainDivInSpecificMode col-xs-12">
            <div id="leftPostSection" class="postsLeftDivInSpecificMode col-xs-6"></div>
            <div id="rightPostSection" class="postsRightDivInSpecificMode col-xs-6"></div>
        </div>
    </div>
</div>

<script>
    let reviewSort = 'new';
    let hasPlaceHolder = true;
    let allReviews = [];
    let userPageId = {{isset($userId) ? $userId : 0}};

    function getReviewsUserReview(){
        $('#leftPostSection').html('');
        $('#rightPostSection').html('');

        setSmallReviewPlaceHolder('leftPostSection'); // in component.smallShowReview.blade.php
        setSmallReviewPlaceHolder('rightPostSection'); // in component.smallShowReview.blade.php
        hasPlaceHolder = true;

        let data;
        if(userPageId == 0)
            data = {
                _token: '{{csrf_token()}}',
                sort: reviewSort
            };
        else
            data = {
                _token: '{{csrf_token()}}',
                userId: userPageId,
                sort: reviewSort
            };

        $.ajax({
            type: 'post',
            url: '{{route("profile.getUserReviews")}}',
            data: data,
            success: function(response){
                response = JSON.parse(response);
                if(response.status == 'ok'){
                    allReviews = response.result;
                    createReviews()
                }
            },
            error: function(err){
                console.log(err);
            }
        })
    }

    function createReviews(){
        let odd = true;

        allReviews.forEach(item => {
            text = createSmallReviewHtml(item); // in component.smallShowReview.blade.php;

            if(hasPlaceHolder){
                hasPlaceHolder = false;
                $('#leftPostSection').html('');
                $('#rightPostSection').html('');
            }

            if(odd)
                $('#leftPostSection').append(text);
            else
                $('#rightPostSection').append(text);

            odd = !odd;
        });
    }

    function changeSortPost(_kind, _element){
        $(_element).parent().find('.active').removeClass('active');
        $(_element).addClass('active');
        reviewSort = _kind;
        getReviewsUserReview()
    }

    getReviewsUserReview();
</script>
