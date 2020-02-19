

    <div class="prw_rup prw_restaurants_restaurant_filters">
        <div class="lhrFilterBlock jfy_filter_bar_establishmentTypeFilters collapsible">
            <div style="display: flex; justify-content: space-between;">
                <div class="filterGroupTitle">مراکز اقامتی</div>
                <span onclick="showMoreItems(0)" class="moreItems0 moreItems">نمایش کامل فیلترها</span>
                <span onclick="showLessItems(0)" class="lessItems hidden extraItem0">پنهان سازی فیلتر‌ها</span>
            </div>

            <div class="filterContent ui_label_group inline">

                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" ng-click="doKindFilter(1)" type="checkbox" id="x1" checked/>
                    <label for="x1"><span></span>&nbsp;&nbsp; هتل  </label>
                </div>
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" ng-click="doKindFilter(2)" type="checkbox" id="x2"/>
                    <label for="x2"><span></span>&nbsp;&nbsp; هتل آپارتمان  </label>
                </div>
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" ng-click="doKindFilter(3)" type="checkbox" id="x3"/>
                    <label for="x3"><span></span>&nbsp;&nbsp; مهمانسرا  </label>
                </div>
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" ng-click="doKindFilter(4)" type="checkbox" id="x4"/>
                    <label for="x4"><span></span>&nbsp;&nbsp; ویلا  </label>
                </div>
                <div class="filterItem lhrFilter filter selected">
                    <input ng-disabled="isDisable()" ng-click="doKindFilter(5)" type="checkbox" id="x5"/>
                    <label for="x5"><span></span>&nbsp;&nbsp; متل  </label>
                </div>
                <div class="filterItem lhrFilter filter hidden extraItem0">
                    <input ng-disabled="isDisable()" ng-click="doKindFilter(6)" type="checkbox" id="x6"/>
                    <label for="x6"><span></span>&nbsp;&nbsp; مجتمع تفریحی </label>
                </div>
                <div class="filterItem lhrFilter filter hidden extraItem0">
                    <input ng-disabled="isDisable()" ng-click="doKindFilter(7)" type="checkbox" id="x7"/>
                    <label for="x7"><span></span>&nbsp;&nbsp; پانسیون </label>
                </div>
                <div class="filterItem lhrFilter filter hidden extraItem0">
                    <input ng-disabled="isDisable()" ng-click="doKindFilter(8)" type="checkbox" id="x8"/>
                    <label for="x8"><span></span>&nbsp;&nbsp; بوم گردی </label>
                </div>

            </div>

        </div>
    </div>
