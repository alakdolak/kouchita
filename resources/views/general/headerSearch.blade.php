<div id="searchBoxTopPageMainDiv">
    <span>شما در</span>
    <div class="inputBox position-ralative">
        <div class="select-side">
            <i class="glyphicon glyphicon-triangle-bottom"></i>
        </div>
        <select class="inputBoxInput styled-select text-align-right mg-lt-10">
            <option>استان {{$state->name}}</option>
        </select>
    </div>
    <span>در</span>
    <div class="inputBox position-ralative">
        <div class="select-side">
            <i class="glyphicon glyphicon-triangle-bottom"></i>
        </div>
        @if(isset($mode) && $mode == 'city')
            <select class="inputBoxInput styled-select text-align-right mg-lt-10">
                <option>شهر {{$city->name}}</option>
            </select>
        @endif
    </div>
    <span class="mg-lt-15">هستید. تغییر دهید</span>
    <div id="searchIcon" onclick="openProSearch()"></div>
</div>

<script>

</script>