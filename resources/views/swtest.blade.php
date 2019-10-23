<html>

<head>

    <link rel="manifest"  href="{{URL::asset('offlineMode/manifest.json')}}">

</head>

<body>

    <h1>
        Service Worker
    </h1>


    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function(){
                navigator.serviceWorker.register('{{URL::asset("ServiceWorker.js")}}').then(
                    registration => {
                        console.log('Service Worker is registered', registration);
                    }).catch(
                    err => {
                        console.error('Registration failed:', err);
                    });
            })
        }
    </script>
</body>


</html>