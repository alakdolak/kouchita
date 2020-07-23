
@include('component.smallShowReview')

<div class="userProfileActivitiesDetailsMainDiv userActivitiesPosts col-sm-8 col-xs-12">
    <div class="userProfilePostsFiltrationContainer">
        <div class="userProfilePostsFiltration">
            <span class="active" onclick="changeSortPost('new', this)">جدیدترین‌ها</span>
            <span onclick="changeSortPost('top', this)">بهترین‌ها</span>
            <span onclick="changeSortPost('hot', this)">داغ‌ترین‌ها</span>
        </div>
    </div>

    <div class="postsMainDivInSpecificMode col-xs-12">
        <div id="leftPostSection" class="postsLeftDivInSpecificMode col-xs-6"></div>
        <div id="rightPostSection" class="postsRightDivInSpecificMode col-xs-6"></div>
    </div>
</div>

<script>
    let reviewSort = 'new';
    let allReviews = [];

    function getReviewsUserReview(){
        $('#leftPostSection').html('');
        $('#rightPostSection').html('');

        setSmallReviewPlaceHolder('leftPostSection'); // in component.smallShowReview.blade.php
        setSmallReviewPlaceHolder('rightPostSection'); // in component.smallShowReview.blade.php

        let data;
        if(userPageId == 0)
            data = {
                _token: '{{csrf_token()}}',
                sort: reviewSort
            };
        else
            data = {
                _token: '{{csrf_token()}}',
                userId: userPageId, // in mainProfile.blade.php
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

                    $('#leftPostSection').html('');
                    $('#rightPostSection').html('');

                    createReviews();
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

</script>

