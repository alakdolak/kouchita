<div class="row">
    <div class="settingTabs" onclick="toggleSettingSection(this)">
        تغییر اسلایدرها
    </div>
    <div class="row" style="display: none">
        <div class="settingSection container">

            <div class="row">
                <div style="width: 100%; height: 45px; cursor: pointer" onclick="toggleSettingSection(this)" >
                    <h3 style="display: inline-block">تغییر اسلاید اصلی:</h3>
                </div>

                <div class="container settingSubSection" style="display: none;">
                    <button class="btn btn-primary" style="width: auto; position: relative" onclick="addMainSliderPicSetting()">افزودن</button>
                    <div id="sliderPicSection0"></div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div style="width: 100%; height: 45px; cursor: pointer" onclick="toggleSettingSection(this)" >
                    <h3 style="display: inline-block">تغییر اسلایدر1:</h3>
                </div>

                <div class="container settingSubSection" style="display: none;">
                    <button class="btn btn-primary" style="width: auto; position: relative" onclick="addSliderPicTo(1)">افزودن</button>
                    <div id="sliderPicSection1"></div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div style="width: 100%; height: 45px; cursor: pointer" onclick="toggleSettingSection(this)" >
                    <h3 style="display: inline-block">تغییر اسلایدر4:</h3>
                </div>

                <div class="container settingSubSection" style="display: none;">
                    <button class="btn btn-primary" style="width: auto; position: relative" onclick="addSliderPicTo(4)">افزودن</button>
                    <div id="sliderPicSection4"></div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div style="width: 100%; height: 45px; cursor: pointer" onclick="toggleSettingSection(this)" >
                    <h3 style="display: inline-block">تغییر اسلایدر5:</h3>
                </div>

                <div class="container settingSubSection" style="display: none;">
                    <div id="sliderPicSection5">

                        @for($i = 0; $i < 3; $i++)
                            <div id="rowSlideId5{{$i}}" class="row">
                                <div class="col-md-2">
                                    <input type="hidden" id="slideId5{{$i}}" value="{{isset($middleBan['5'][$i]['id']) ? $middleBan['5'][$i]['id'] : 0}}">
                                @if(isset($middleBan['5']) && isset($middleBan['5'][$i]))
                                        <button class="btn btn-primary" onclick="submitSlide({{$middleBan['5'][$i]['id']}}, {{$i}}, 5)" style="position: relative; width: auto">ویرایش</button>
                                    @else
                                        <button class="btn btn-primary" onclick="submitSlide(0, {{$i}}, 5)" style="position: relative; width: auto">تایید</button>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{isset($middleBan['5']) && isset($middleBan['5'][$i]) ? $middleBan['5'][$i]['pic'] : ''}}" id="showMiddleBannerInput5{{$i}}" style="height: 100px; ">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" id="uploadImgBanner5{{$i}}" accept="image/*" onchange="showPicInput(this, 'showMiddleBannerInput5{{$i}}')">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="linkForBannerId5{{$i}}">لینک:</label>
                                            <input type="text" id="linkForBanner5{{$i}}" class="form-control" value="{{isset($middleBan['5']) && isset($middleBan['5'][$i]) ? $middleBan['5'][$i]['link'] : ''}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="textForBannerId5{{$i}}">متن:</label>
                                            <input type="text" id="textForBanner5{{$i}}" class="form-control" value="{{isset($middleBan['5']) && isset($middleBan['5'][$i]) ? $middleBan['5'][$i]['text'] : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        <hr>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div style="width: 100%; height: 45px; cursor: pointer" onclick="toggleSettingSection(this)" >
                    <h3 style="display: inline-block">تغییر اسلایدر6:</h3>
                </div>

                <div class="container settingSubSection" style="display: none;">
                    <div id="sliderPicSection6">
                        <div id="rowSlideId6" class="row">
                                <div class="col-md-2">
                                    <input type="hidden" id="slideId60" value="{{isset($middleBan['6']['id']) ? $middleBan['6']['id'] : 0}}">
                                    @if(isset($middleBan['6']))
                                        <button class="btn btn-primary" onclick="submitSlide({{$middleBan['6']['id']}}, 0, 6)" style="position: relative; width: auto">ویرایش</button>
                                    @else
                                        <button class="btn btn-primary" onclick="submitSlide(0, 0, 6)" style="position: relative; width: auto">تایید</button>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{isset($middleBan['6']) ? $middleBan['6']['pic'] : ''}}" id="showMiddleBannerInput60" style="height: 100px; ">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" id="uploadImgBanner60" accept="image/*" onchange="showPicInput(this, 'showMiddleBannerInput60')">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="linkForBannerId60">لینک:</label>
                                            <input type="text" id="linkForBanner60" class="form-control" value="{{isset($middleBan['6']) ? $middleBan['6']['link'] : ''}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="textForBannerId60">متن:</label>
                                            <input type="hidden" id="textForBanner60" class="form-control" value="{{isset($middleBan['6'])? $middleBan['6']['text'] : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <hr>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<hr>


<script>
    var silde0 = 0;
    var silde4 = 0;
    var silde1 = 0;
    var middleBan = {!! json_encode($middleBan) !!};
    var mainSliderPicSetting = {!! $sliderPic !!};
    var slide4Pics;
    var slide1Pics;

    function addMainSliderPicSetting(){

        var text = '                        <div id="rowSlide0' + ss + '" class="row">\n' +
            '                            <div class="col-md-2">\n' +
            '                                <button class="btn btn-danger" onclick="deleteMainSlide(' + ss + ', ' + kind + ')" style="position: relative; width: auto">حذف</button>\n' +
            '                                <button class="btn btn-primary" onclick="submitMainSlide(' + ss + ', ' + kind + ')" style="position: relative; width: auto">ویرایش</button>\n' +
            '                                <input type="hidden" id="slideId' + kind + '' + ss + '" value="' + sil[i]["id"] + '">' +
            '                            </div>\n' +
            '                            <div class="col-md-10">\n' +
            '                            <div class="row">\n' +
            '                                <div class="col-md-6">\n' +
            '                                    <img src="' + sil[i]["pic"] + '" id="showMiddleBannerInput' + kind + '' + ss + '" style="height: 100px; ">\n' +
            '                                </div>\n' +
            '                                <div class="col-md-6">\n' +
            '                                    <input type="file" id="uploadImgBanner' + kind + '' + ss + '" accept="image/*" onchange="showPicInput(this, \'showMiddleBannerInput' + kind + '' + ss + '\')">\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                            <div class="row">\n' +
            '                                <div class="col-md-6">\n' +
            '                                    <label for="linkForBanner' + kind + '' + ss + '">لینک:</label>\n' +
            '                                    <input type="text" id="linkForBanner' + kind + '' + ss + '" class="form-control" value="' + sil[i]["link"] + '">\n' +
            '                                </div>\n' +
            '                                <div class="col-md-6">\n' +
            '                                    <label for="textForBanner' + kind + '' + ss + '">متن:</label>\n' +
            '                                    <input type="text" id="textForBanner' + kind + '' + ss + '" class="form-control" value="' + sil[i]["text"] + '">\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                        </div>\n' +
            '                        <hr>';
        $('#sliderPicSection' + kind).append(text);

    }

    function createRowSlid(kind) {
        if(kind == 4){
            var ss = silde4;
            var sil = slide4Pics;
        }
        else{
            var ss = silde1;
            var sil = slide1Pics;
        }

        for (var i = 0; i < sil.length; i++) {
            var text = '                        <div id="rowSlide' + kind + '' + ss + '" class="row">\n' +
                '                            <div class="col-md-2">\n' +
                '                                <button class="btn btn-danger" onclick="deleteSlideCommon(' + ss + ', ' + kind + ')" style="position: relative; width: auto">حذف</button>\n' +
                '                                <button class="btn btn-primary" onclick="submitSlideCommon(' + ss + ', ' + kind + ')" style="position: relative; width: auto">ویرایش</button>\n' +
                '                                <input type="hidden" id="slideId' + kind + '' + ss + '" value="' + sil[i]["id"] + '">' +
                '                            </div>\n' +
                '                            <div class="col-md-10">\n' +
                '                            <div class="row">\n' +
                '                                <div class="col-md-6">\n' +
                '                                    <img src="' + sil[i]["pic"] + '" id="showMiddleBannerInput' + kind + '' + ss + '" style="height: 100px; ">\n' +
                '                                </div>\n' +
                '                                <div class="col-md-6">\n' +
                '                                    <input type="file" id="uploadImgBanner' + kind + '' + ss + '" accept="image/*" onchange="showPicInput(this, \'showMiddleBannerInput' + kind + '' + ss + '\')">\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="row">\n' +
                '                                <div class="col-md-6">\n' +
                '                                    <label for="linkForBanner' + kind + '' + ss + '">لینک:</label>\n' +
                '                                    <input type="text" id="linkForBanner' + kind + '' + ss + '" class="form-control" value="' + sil[i]["link"] + '">\n' +
                '                                </div>\n' +
                '                                <div class="col-md-6">\n' +
                '                                    <label for="textForBanner' + kind + '' + ss + '">متن:</label>\n' +
                '                                    <input type="text" id="textForBanner' + kind + '' + ss + '" class="form-control" value="' + sil[i]["text"] + '">\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        </div>\n' +
                '                        <hr>';
            $('#sliderPicSection' + kind).append(text);

            if (kind == 4)
                silde4++;
            else
                silde1++;
            ss++;
        }
    }
    if(middleBan['1']){
        slide1Pics = middleBan['1'];
        createRowSlid(1);
    }
    if(middleBan['4']){
        slide4Pics = middleBan['4'];
        createRowSlid(4);
    }

    function addSliderPicTo(kind){
        if(kind == 4)
            ss = silde4;
        else
            ss = silde1;

        var text = '                        <div id="rowSlide' + kind + '' + ss + '" class="row">\n' +
            '                            <div class="col-md-2">\n' +
            '                                <input type="hidden" id="slideId' + kind + '' + ss + '" value="0">\n' +
            '                                <button class="btn btn-success" onclick="submitSlideCommon(' + ss + ', ' + kind + ')" style="position: relative; width: auto">تایید</button>\n' +
            '                            </div>\n' +
            '                            <div class="col-md-10">\n' +
            '                            <div class="row">\n' +
            '                                <div class="col-md-6">\n' +
            '                                    <img src="#" id="showMiddleBannerInput' + kind + '' + ss + '" style="height: 100px;">\n' +
            '                                </div>\n' +
            '                                <div class="col-md-6">\n' +
            '                                    <input type="file" id="uploadImgBanner' + kind + '' + ss + '" accept="image/*" onchange="showPicInput(this, \'showMiddleBannerInput' + kind + '' + ss + '\')">\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                            <div class="row">\n' +
            '                                <div class="col-md-6">\n' +
            '                                    <label for="linkForBanner' + kind + '' + ss + '">لینک:</label>\n' +
            '                                    <input type="text" id="linkForBanner' + kind + '' + ss + '" class="form-control">\n' +
            '                                </div>\n' +
            '                                <div class="col-md-6">\n' +
            '                                    <label for="textForBanner' + kind + '' + ss + '">متن:</label>\n' +
            '                                    <input type="text" id="textForBanner' + kind + '' + ss + '" class="form-control">\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                        </div>\n' +
            '                        <hr>';

        $('#sliderPicSection' + kind).append(text);

        if(kind == 4)
            silde4++;
        else
            silde1++;
    }

    function showPicInput(input, output){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                newImageReplace =  e.target.result;
                $('#' + output).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function submitSlideCommon(num, numKind) {
        var link = $('#linkForBanner' + numKind + '' + num).val();
        var text = $('#textForBanner' + numKind + '' + num).val();
        var inputPic = $('#uploadImgBanner' + numKind + '' + num)[0];
        var id = $('#slideId' + numKind + '' + num).val();

        var data = new FormData();
        if(inputPic)
            data.append('pic', inputPic.files[0]);

        data.append('section', numKind);
        data.append('page', 'mainPage');
        data.append('number', 0);
        data.append('link', link);
        data.append('text', text);
        data.append('id', id);

        $.ajax({
            type: 'post',
            url: '{{route("middleBanner.image.store")}}',
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                response = JSON.parse(response);
                if (response[0] == 'ok') {
                    alert('ثبت شد.');
                    inputPic.files[0] = '';
                    $('#slideId' + numKind + '' + num).val(response[1]);
                }
            }
        });
    }
    function deleteSlideCommon(num, kind){
        var id = $('#slideId' + kind + '' + num).val();

        $.ajax({
            type: 'post',
            url: '{{route("middleBanner.image.delete")}}',
            data:{
                _token: '{{csrf_token()}}',
                id: id
            },
            success: function(response){
                if(response == 'ok'){
                    $('#rowSlide' + kind + '' + num).remove();
                }

            }
        })
    }

    function submitSlide(_id, section, kind){
        var link = $('#linkForBanner' + kind + '' + section).val();
        var text = $('#textForBanner' + kind + ''  + section).val();
        var inputPic = $('#uploadImgBanner' + kind + ''  + section)[0];
        var id = $('#slideId' + kind + ''  + section).val();

        var data = new FormData();
        if(inputPic)
            data.append('pic', inputPic.files[0]);

        data.append('section', kind);
        data.append('page', 'mainPage');
        data.append('number', section);
        data.append('link', link);
        data.append('text', text);
        data.append('id', id);

        $.ajax({
            type: 'post',
            url: '{{route("middleBanner.image.store")}}',
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                response = JSON.parse(response);
                if (response[0] == 'ok') {
                    alert('ثبت شد.');
                    inputPic.files[0] = '';
                    $('#slideId' + kind + '' + section).val(response[1]);
                }
            }
        });
    }
</script>