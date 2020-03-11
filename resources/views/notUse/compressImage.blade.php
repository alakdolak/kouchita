<html>
    <head>
        <script src="{{URL::asset('js/jQuery.js')}}"></script>

    </head>

    <body>
        <button onclick="startCompress(0)"> شروع</button>

        <div>
            <ul id="result">

            </ul>
        </div>
    </body>

    <script>
        // var files = ['amaken', 'badges', 'city', 'hotels', 'mahalifood', 'majara', 'posts', 'restaurant', 'sogatsanaie'];
        var files = ['posts'];

        function startCompress(index){
            if(index < files.length) {
                $.ajax({
                    type: 'post',
                    url: '{{url('resizePostImages')}}',
                    data: {
                        _token: '{{csrf_token()}}',
                        file: files[index]
                    },
                    success: function(response){
                        if(response == 'ok'){
                            text = '<li>' + files[index] + '</li>';
                            $('#result').append(text);
                            startCompress(index+1);
                        }
                    }
                })
            }
            else
                alert('تمام شد')
        }
    </script>
</html>