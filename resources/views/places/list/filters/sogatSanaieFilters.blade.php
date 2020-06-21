
<div class="prw_rup prw_restaurants_restaurant_filters">
    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
        <div class="filterContent ui_label_group inline specialFiltersSection">
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="eatable0" onchange="doKindFilter('eatable', 0)" type="radio" name="eatableFilter" id="eatable0" value="صنایع دستی"/>
                {{--غیر خوراکی--}}
                <label for="eatable0"><span></span>&nbsp;&nbsp; {{__('صنایع‌دستی')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                {{--خوراکی--}}
                <input ng-disabled="isDisable()" class="eatable1" onchange="doKindFilter('eatable', 1)" type="radio" name="eatableFilter" id="eatable1" value="سوغات"/>
                <label for="eatable1"><span></span>&nbsp;&nbsp; {{__('سوغات')}}  </label>
            </div>
        </div>
    </div>
</div>


<div class="filterForEatable0" style="display: none">
    <div class="prw_rup prw_restaurants_restaurant_filters">
        <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
            {{--<div style="display: flex; justify-content: space-between;">--}}
                {{--<div class="filterGroupTitle">سبک</div>--}}
            {{--</div>--}}
            <div class="filterContent ui_label_group inline specialFiltersSection">
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" class="fragile1" name="fragile" onclick="doKindFilter('fragile', 1)" type="radio" id="fragile1" value="شکستنی"/>
                    <label for="fragile1"><span></span>&nbsp;&nbsp; {{__('شکستنی')}}  </label>
                </div>
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" class="fragile0" name="fragile" onclick="doKindFilter('fragile', 0)" type="radio" id="fragile0" value="غیرشکستنی"/>
                    <label for="fragile0"><span></span>&nbsp;&nbsp; {{__('غیرشکستنی')}}  </label>
                </div>
            </div>

        </div>
    </div>

    <div class="prw_rup prw_restaurants_restaurant_filters">
        <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
            <div style="display: flex; justify-content: space-between;">
                <div class="filterGroupTitle">{{__('نوع')}}</div>
            </div>
            <div class="filterContent ui_label_group inline specialFiltersSection">
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" class="jewelry1" onclick="doKindFilter('jewelry', 1)" type="checkbox" id="jewelry1" value="زیورآلات"/>
                    <label for="jewelry1"><span></span>&nbsp;&nbsp; {{__('زیورآلات')}}  </label>
                </div>
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" class="cloth1" onclick="doKindFilter('cloth', 1)" type="checkbox" id="cloth1" value="پارچه و پوشیدنی"/>
                    <label for="cloth1"><span></span>&nbsp;&nbsp; {{__('پارچه و پوشیدنی')}}  </label>
                </div>
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" class="decorative1" onclick="doKindFilter('decorative', 1)" type="checkbox" id="decorative1" value="لوازم تزئینی"/>
                    <label for="decorative1"><span></span>&nbsp;&nbsp; {{__('لوازم تزئینی')}}  </label>
                </div>
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" class="applied1" onclick="doKindFilter('applied', 1)" type="checkbox" id="applied1" value="لوازم کاربردی منزل"/>
                    <label for="applied1"><span></span>&nbsp;&nbsp; {{__('لوازم کاربردی منزل')}}  </label>
                </div>
            </div>

        </div>
    </div>

    <div class="prw_rup prw_restaurants_restaurant_filters">
        <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
            <div style="display: flex; justify-content: space-between;">
                <div class="filterGroupTitle">{{__('سبک')}}</div>
            </div>
            <div class="filterContent ui_label_group inline specialFiltersSection">
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" class="style1" onclick="doKindFilter('style', 1)" type="checkbox" id="style1" value="سنتی"/>
                    <label for="style1"><span></span>&nbsp;&nbsp; {{__('سنتی')}}  </label>
                </div>
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" class="style2" onclick="doKindFilter('style', 2)" type="checkbox" id="style2" value="مدرن"/>
                    <label for="style2"><span></span>&nbsp;&nbsp; {{__('مدرن')}}  </label>
                </div>
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" class="style3" onclick="doKindFilter('style', 3)" type="checkbox" id="style3" value="تلفیقی"/>
                    <label for="style3"><span></span>&nbsp;&nbsp; {{__('تلفیقی')}}  </label>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="filterForEatable1" style="display: none">
    <div class="prw_rup prw_restaurants_restaurant_filters">
    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
        <div style="display: flex; justify-content: space-between;">
            <div class="filterGroupTitle">{{__('مزه')}}</div>
        </div>
        <div class="filterContent ui_label_group inline specialFiltersSection">
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="torsh1" onclick="doKindFilter('torsh', 1)" type="checkbox" id="torsh1" value="ترش"/>
                <label for="torsh1"><span></span>&nbsp;&nbsp; {{__('ترش')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="shirin1" onclick="doKindFilter('shirin', 1)" type="checkbox" id="shirin1" value="شیرین"/>
                <label for="shirin1"><span></span>&nbsp;&nbsp; {{__('شیرین')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="talkh1" onclick="doKindFilter('talkh', 1)" type="checkbox" id="talkh1" value="تلخ"/>
                <label for="talkh1"><span></span>&nbsp;&nbsp; {{__('تلخ')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="malas1" onclick="doKindFilter('malas', 1)" type="checkbox" id="malas1" value="ملس"/>
                <label for="malas1"><span></span>&nbsp;&nbsp; {{__('ملس')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="shor1" onclick="doKindFilter('shor', 1)" type="checkbox" id="shor1" value="شور"/>
                <label for="shor1"><span></span>&nbsp;&nbsp; {{__('شور')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="tond1" onclick="doKindFilter('tond', 1)" type="checkbox" id="tond1" value="تند"/>
                <label for="tond1"><span></span>&nbsp;&nbsp; {{__('تند')}}  </label>
            </div>
        </div>

    </div>
</div>
</div>


{{--common in sogatSanaie--}}
<div class="prw_rup prw_restaurants_restaurant_filters">
    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
        <div style="display: flex; justify-content: space-between;">
            <div class="filterGroupTitle">{{__('ابعاد')}}</div>
        </div>
        <div class="filterContent ui_label_group inline specialFiltersSection">
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="size1" onclick="doKindFilter('size', 1)" type="checkbox" id="size1" value="کوچک"/>
                <label for="size1"><span></span>&nbsp;&nbsp; {{__('کوچک')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="size2" onclick="doKindFilter('size', 2)" type="checkbox" id="size2" value="متوسط"/>
                <label for="size2"><span></span>&nbsp;&nbsp; {{__('متوسط')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="size3" onclick="doKindFilter('size', 3)" type="checkbox" id="size3" value="بزرگ"/>
                <label for="size3"><span></span>&nbsp;&nbsp; {{__('بزرگ')}}  </label>
            </div>
        </div>

    </div>
</div>

<div class="prw_rup prw_restaurants_restaurant_filters">
    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
        <div style="display: flex; justify-content: space-between;">
            <div class="filterGroupTitle">{{__('وزن')}}</div>
        </div>
        <div class="filterContent ui_label_group inline specialFiltersSection">
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="weight1" onclick="doKindFilter('weight', 1)" type="checkbox" id="weight1" value="سبک"/>
                <label for="weight1"><span></span>&nbsp;&nbsp; {{__('سبک')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="weight2" onclick="doKindFilter('weight', 2)" type="checkbox" id="weight2" value="متوسط"/>
                <label for="weight2"><span></span>&nbsp;&nbsp; {{__('متوسط')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="weight3" onclick="doKindFilter('weight', 3)" type="checkbox" id="weight3" value="سنگین"/>
                <label for="weight3"><span></span>&nbsp;&nbsp; {{__('سنگین')}}  </label>
            </div>
        </div>

    </div>
</div>

<div class="prw_rup prw_restaurants_restaurant_filters">
    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
        <div style="display: flex; justify-content: space-between;">
            <div class="filterGroupTitle">{{__('کلاس قیمتی')}}</div>
        </div>
        <div class="filterContent ui_label_group inline specialFiltersSection">
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="price1" onclick="doKindFilter('price', 1)" type="checkbox" id="price1" value="ارزان"/>
                <label for="price1"><span></span>&nbsp;&nbsp; {{__('ارزان')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="price2" onclick="doKindFilter('price', 2)" type="checkbox" id="price2" value="متوسط"/>
                <label for="price2"><span></span>&nbsp;&nbsp; {{__('متوسط')}}  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="price3" onclick="doKindFilter('price', 3)" type="checkbox" id="price3" value="گران"/>
                <label for="price3"><span></span>&nbsp;&nbsp; {{__('گران')}}  </label>
            </div>
        </div>

    </div>
</div>



<script>

    function onlyForSogatSanaie(){

        $('.filterForEatable0').css('display', 'none');
        $('.filterForEatable1').css('display', 'none');

        for(var i = 0; i < specialFilters.length; i++){
            if(specialFilters[i]['kind'] == 'eatable') {
                $('.filterForEatable' + specialFilters[i]['value']).css('display', 'block');

                var deleteKind;
                if(specialFilters[i]['value'] == 0)
                    deleteKind = ['torsh', 'shirin', 'talkh', 'malas', 'shor', 'tond'];
                else
                    deleteKind = ['jewelry', 'cloth', 'decorative', 'applied', 'style', 'fragile'];

                for(var i = 0 ; i < specialFilters.length; i++){
                    if(deleteKind.indexOf(specialFilters[i]['kind']) > -1) {
                        $('.' + specialFilters[i]['kind'] + specialFilters[i]['value']).prop("checked", false);
                        specialFilters[i] = 0;
                    }
                }

            }
        }

        newSearch();
    }

    function specialCancelSogataSanaiesFilters(){
        $('.filterForEatable0').css('display', 'none');
        $('.filterForEatable1').css('display', 'none');

        var deleteKind = ['torsh', 'shirin', 'talkh', 'malas', 'shor', 'tond', 'jewelry', 'cloth', 'decorative', 'applied', 'style', 'fragile'];
        for(var i = 0 ; i < specialFilters.length; i++){
            if(deleteKind.indexOf(specialFilters[i]['kind']) > -1) {
                $('.' + specialFilters[i]['kind'] + specialFilters[i]['value']).prop("checked", false);
                specialFilters[i] = 0;
            }
        }

        newSearch();
    }


    //this function for change ids of specialFilters in phone type
    function changePhoneIds(){
        var getIds = [];

        var elems = $('.specialFiltersSection').children();
        for(i = 0; i < elems.length; i++){
            var childs = $(elems[i]).children();
            var inputId = $(childs[0]).attr('id');

            if(getIds.indexOf(inputId) > -1){
                $(childs[0]).attr('id', 'phone_' + inputId);
                $(childs[1]).attr('for', 'phone_' + inputId);
            }
            else
                getIds[getIds.length] = inputId;
        }
    }
    changePhoneIds();
</script>
