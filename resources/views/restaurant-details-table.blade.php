
<link rel='stylesheet' type='text/css' media='screen, print' href='{{URL::asset('placeDetailsTable.css')}}'/>

@if($k == -1)
    <table class="mainPlaceDetailsTable">
@else
    <table class="tableDiv elsePlaceDetailsTable" id="table_{{$k}}">
@endif

    <tr>
        <td class="titleInTable">نوع رستوران</td>
        @if($place->kind_id == 1)
            <td><div class="highlightedAmenity detailListItem">رستوران</div></td>
        @else
            <td><div class="highlightedAmenity detailListItem">فست فود</div></td>
        @endif
    </tr>

    <tr>
        <?php $i = 1; ?>
        <td class="titleInTable">محدوده ی قرار گیری</td>
        @if($place->tarikhi == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">تاریخی</div></td>
        @endif
        @if($place->markaz == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">مرکز شهر</div></td>
        @endif
        @if($place->hoome == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">حومه شهر</div></td>
        @endif
        @if($place->shologh == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">شلوغ</div></td>
        @endif
        @if($place->khalvat == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">خلوت</div></td>
        @endif
        @if($place->tabiat == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">طبیعت</div></td>
        @endif
        @if($place->kooh == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">کوه</div></td>
        @endif
        @if($place->darya == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">دریا</div></td>
        @endif
    </tr>

    <tr>
        <?php $i = 1; ?>
        <td class="titleInTable">نوع معماری</td>
        @if($place->modern == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">مدرن</div></td>
        @endif
        @if($place->sonnati == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">سنتی</div></td>
        @endif
        @if($place->ghadimi == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">اصالتا قدیمی</div></td>
        @endif
        @if($place->mamooli == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">معمولی</div></td>
        @endif
    </tr>

    <tr>
        <td class="titleInTable">امکانات رفاهی</td>
        <?php $i = 1; ?>

        @if($place->food_farangi == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">رستوران فرنگی</div></td>
        @endif

        @if($place->food_irani == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">رستوران ایرانی</div></td>
        @endif

        @if($place->food_mahali == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">صبحانه ی مجانی</div></td>
        @endif

        @if($place->coffeeshop == 1)
            @if($i % 3 == 0)
    </tr><tr>
        <td><div class="highlightedAmenity detailListItem"></div></td>
        <?php $i++; ?>
        @endif
        <?php $i++; ?>
        <td><div class="highlightedAmenity detailListItem">کافی شاپ</div></td>
        @endif
    </tr>
</table>