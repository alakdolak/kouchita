<style>
    .newSafarnamehSection{
        width: 100%;
        background: white;
        padding: 10px;
        direction: rtl;
        text-align: right;
    }

    .newSafarnamehSection .row{
        width: 100%;
        margin: 0px;
    }

    .backSafarnameh{
        border: none;
        background: white;
        margin: 0px 12px;
        color: #0076a3;
    }

    .submitSafarnameh{
        background: #0d6650;
        border-color: #0d6650;
        border-radius: 11px;
    }
    .newSafarnamehImgSection{
        margin-top: 10px;
        margin-right: 15px;
        cursor: pointer;
    }
</style>


<div class="newSafarnamehSection">
    <div class="row">
        <div class="form-group">
            <label for="safarnamehTitle">برای سفرنامت یک عنوان بنویسید</label>
            <input id="newSafarnamehTitle" type="text" class="form-control" placeholder="عنوان سفرنامه">
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label for="safarnamehSummery">می تونی یه خلاصه از سفرنامت تو 100 کاراکتر بنویسی (اختیاری)</label>
            <textarea id="safarnamehSummery" class="form-control" rows="1" placeholder="خلاصه سفرنامه"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label for="safarnamehText">متن سفرنامت رو اینجا بنویس</label>
            <textarea id="safarnamehText" class="form-control" rows="5" placeholder="متن سفرنامه"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="form-group" style="display: flex; flex-direction: column;">
            <label>خب یه عکس خوب هم از سفرنامت</label>
            <input type="file" id="safarnamehPicInput" style="display: none" onchange="changeNewPicSafarnameh(this)">
            <label for="safarnamehPicInput" class="newSafarnamehImgSection">
                <img id="newSafarnamehPic" src="{{URL::asset('images/mainPics/default/Placeholder.png')}}" style=" height: 120px">
            </label>
        </div>
    </div>

    <div class="row" style="display: flex; justify-content: center; align-items: center">
        <button class="backSafarnameh">بازگشت</button>
        <button class="btn btn-success submitSafarnameh" style="background: #0d6650" onclick="storeSafarnameh()">ثبت</button>
    </div>

</div>


<script>
    autosize($('#safarnamehText'));

    var safarnamehNewMainPic = null;
    function changeNewPicSafarnameh(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e) {
                safarnamehNewMainPic = input.files[0];
                $('#newSafarnamehPic').attr('src',  e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function storeSafarnameh(){
        var formDa = new FormData();
        var title = $('#newSafarnamehTitle').val();
        var summery = $('#safarnamehSummery').val();
        var text = $('#safarnamehText').val();

        formDa.append('pic', safarnamehNewMainPic);
        formDa.append('title', title);
        formDa.append('summery', summery);
        formDa.append('text', text);

        $.ajax({
            type: 'post',
            url: '{{route('profile.safarnameh.new')}}',
            data: formDa,
            processData: false,
            contentType: false,
            success: function(response){
                if(response == 'ok') {
                    showSuccessNotifi('سفرنامه شما با موفقیت ثبت شد.', 'left');
                    $('#newSafarnamehTitle').val('');
                    $('#safarnamehSummery').val('');
                    $('#safarnamehText').val('');
                    safarnamehNewMainPic = null;
                }
                else
                    showSuccessNotifi('در ثبت سفرنامه مشکلی پیش امده لطفا دوباره تلاش نمایید.', 'left', 'red');
            },
            error: function(err){
                showSuccessNotifi('در ثبت سفرنامه مشکلی پیش امده لطفا دوباره تلاش نمایید.', 'left', 'red');
            }
        })
    }

</script>