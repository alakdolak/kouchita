
<div class="prw_rup prw_restaurants_restaurant_filters">
    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
        <div style="display: flex; justify-content: space-between;">
            <div class="filterGroupTitle">نوع غذا</div>
        </div>
        <div class="filterContent ui_label_group inline specialFiltersSection">
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="kind1" onclick="doKindFilter('kind', 1)" type="checkbox" id="kind1" value="چلوخورش"/>
                <label for="kind1"><span></span>&nbsp;&nbsp; چلوخورش  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="kind2" onclick="doKindFilter('kind', 2)" type="checkbox" id="kind2" value="خوراک"/>
                <label for="kind2"><span></span>&nbsp;&nbsp; خوراک  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="kind8" onclick="doKindFilter('kind', 8)" type="checkbox" id="kind8" value="سوپ و آش"/>
                <label for="kind8"><span></span>&nbsp;&nbsp; سوپ و آش  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="kind3" onclick="doKindFilter('kind', 3)" type="checkbox" id="kind3" value="سالاد و پیش غذا"/>
                <label for="kind3"><span></span>&nbsp;&nbsp; سالاد و پیش غذا</label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="kind4" onclick="doKindFilter('kind', 4)" type="checkbox" id="kind4" value="ساندویچ"/>
                <label for="kind4"><span></span>&nbsp;&nbsp; ساندویچ</label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="kind5" onclick="doKindFilter('kind', 5)" type="checkbox" id="kind5" value="کباب"/>
                <label for="kind5"><span></span>&nbsp;&nbsp; کباب</label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="kind6" onclick="doKindFilter('kind', 6)" type="checkbox" id="kind6" value="دسر"/>
                <label for="kind6"><span></span>&nbsp;&nbsp; دسر</label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="kind7" onclick="doKindFilter('kind', 7)" type="checkbox" id="kind7" value="نوشیدنی"/>
                <label for="kind7"><span></span>&nbsp;&nbsp; نوشیدنی</label>
            </div>
        </div>

    </div>
</div>

<div class="prw_rup prw_restaurants_restaurant_filters">
    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
        <div class="filterContent ui_label_group inline specialFiltersSection">
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="hotOrCold1" name="hotOrCold" onclick="doKindFilter('hotOrCold', 1)" type="radio" id="hotOrCold1" value="گرم"/>
                <label for="hotOrCold1"><span></span>&nbsp;&nbsp; گرم  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="hotOrCold2" name="hotOrCold" onclick="doKindFilter('hotOrCold', 2)" type="radio" id="hotOrCold2" value="سرد"/>
                <label for="hotOrCold2"><span></span>&nbsp;&nbsp; سرد  </label>
            </div>
        </div>

    </div>
</div>

<div class="prw_rup prw_restaurants_restaurant_filters">
    <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
        <div style="display: flex; justify-content: space-between;">
            <div class="filterGroupTitle">مناسب برای</div>
        </div>
        <div class="filterContent ui_label_group inline specialFiltersSection">
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="vegetarian1" onclick="doKindFilter('vegetarian', 1)" type="checkbox" id="vegetarian1" value="افراد گیاه‌خوار"/>
                <label for="vegetarian1"><span></span>&nbsp;&nbsp; افراد گیاه‌خوار  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="vegan1" onclick="doKindFilter('vegan', 1)" type="checkbox" id="vegan1" value="وگان"/>
                <label for="vegan1"><span></span>&nbsp;&nbsp; وگان  </label>
            </div>
            <div class="filterItem lhrFilter filter selected">
                <input ng-disabled="isDisable()" class="diabet1" onclick="doKindFilter('diabet', 1)" type="checkbox" id="diabet1" value="افراد مبتلا به دیابت"/>
                <label for="diabet1"><span></span>&nbsp;&nbsp; افراد مبتلا به دیابت  </label>
            </div>
        </div>

    </div>
</div>

<script>
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
