<div class="loaderDiv" id="fullPageLoader" style="display: none">
    <div class="loader_200">
{{--        <img src="{{URL::asset('images/loading.gif')}}" style="width: 300px;">--}}
        <img data-src="{{URL::asset('images/loading.gif')}}" class="lazyload" style="width: 300px;">
    </div>
</div>

<script>
    function openLoading(_callBack = ''){
        $('#fullPageLoader').css('display', 'flex');

        setTimeout(function(){
            if(typeof _callBack === 'function')
                _callBack();
        }, 200);
    }
    function closeLoading(){
        $('#fullPageLoader').css('display', 'none');
    }
</script>