<div class="bottomLightBorder headerFilter">
    <div style="display: flex; justify-content: space-between;">
        <div class="filterGroupTitle">{{__('مراکز اقامتی')}}</div>
        <span onclick="showMoreItems(0)" class="moreItems0 moreItems">
            {{__('نمایش کامل فیلترها')}}
            <span class="downArrowIcon"></span>
        </span>
        <span onclick="showLessItems(0)" class="lessItems hidden extraItem0">
            {{__('پنهان سازی فیلتر‌ها')}}
            <span class="upArrowIcon"></span>
        </span>
    </div>

    <div class="filterContent ui_label_group inline specialFiltersSection">

        <div class="filterItem lhrFilter filter selected">
            <input ng-disabled="isDisable()" class="kind_id1" onclick="doKindFilter('kind_id', 1)" type="checkbox" id="kind_id1" value="هتل" checked/>
            <label for="kind_id1"><span></span>&nbsp;&nbsp; {{__('هتل')}}  </label>
        </div>
        <div class="filterItem lhrFilter filter selected">
            <input ng-disabled="isDisable()" class="kind_id2" onclick="doKindFilter('kind_id', 2)" type="checkbox" id="kind_id2" value="هتل آپارتمان"/>
            <label for="kind_id2"><span></span>&nbsp;&nbsp; {{__('هتل آپارتمان')}}  </label>
        </div>
        <div class="filterItem lhrFilter filter selected">
            <input ng-disabled="isDisable()" class="kind_id3" onclick="doKindFilter('kind_id', 3)" type="checkbox" id="kind_id3" value="مهمانسرا"/>
            <label for="kind_id3"><span></span>&nbsp;&nbsp; {{__('مهمانسرا')}}  </label>
        </div>
        <div class="filterItem lhrFilter filter selected">
            <input ng-disabled="isDisable()" class="kind_id4" onclick="doKindFilter('kind_id', 4)" type="checkbox" id="kind_id4" value="ویلا"/>
            <label for="kind_id4"><span></span>&nbsp;&nbsp; {{__('ویلا')}}  </label>
        </div>
        <div class="filterItem lhrFilter filter selected">
            <input ng-disabled="isDisable()" class="kind_id5" onclick="doKindFilter('kind_id', 5)" type="checkbox" id="kind_id5" value="متل"/>
            <label for="kind_id5"><span></span>&nbsp;&nbsp; {{__('متل')}}  </label>
        </div>
        <div class="filterItem lhrFilter filter hidden extraItem0">
            <input ng-disabled="isDisable()" class="kind_id6" onclick="doKindFilter('kind_id', 6)" type="checkbox" id="kind_id6" value="مجتمع تفریحی"/>
            <label for="kind_id6"><span></span>&nbsp;&nbsp; {{__('مجتمع تفریحی')}} </label>
        </div>
        <div class="filterItem lhrFilter filter hidden extraItem0">
            <input ng-disabled="isDisable()" class="kind_id7" onclick="doKindFilter('kind_id', 7)" type="checkbox" id="kind_id7" value="پانسیون"/>
            <label for="kind_id7"><span></span>&nbsp;&nbsp; {{__('پانسیون')}} </label>
        </div>
        <div class="filterItem lhrFilter filter hidden extraItem0">
            <input ng-disabled="isDisable()" class="kind_id8" onclick="doKindFilter('kind_id', 8)" type="checkbox" id="kind_id8" value="بوم گردی"/>
            <label for="kind_id8"><span></span>&nbsp;&nbsp; {{__('بوم گردی')}} </label>
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