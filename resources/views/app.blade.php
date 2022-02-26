<!DOCTYPE html>
<html>
<head>
    <title>GLI Group Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="UTF-8" />
    <meta name="google-site-verification" content="Bj7Uub3jN16PtXsW1OXFGCQi6Ku2S389xUr4rHOo03Q" />
    <link href="{{ asset('/css/client.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>
    <script src="{{ asset('/js/jquery-3.3.1.slim.min.js') }}"></script>

    <script src="https://kit.fontawesome.com/625ea5a249.js" crossorigin="anonymous"></script>
    @routes
    <script src="{{ asset('/js/app.js') }}" defer></script>
</head>
    <body id="body" onscroll="detectScroll(this.event)">
        <div class="flex flex-col h-auto">
            @inertia
        </div>
        
    </body>
    <script>
        var lastScrollTop = 0;
        function detectScroll(event) {
        var st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > 200){
            $('#appheader').removeClass('py-6').addClass('py-2')
            $("#logo-link").children('img').removeClass('w-12').addClass('w-6')
            $("#logo-link").children('span').removeClass('lg:text-2xl text-base').addClass('lg:text-base text-sm')
        } else if(st == 0){
            $('#appheader').removeClass('py-2').addClass('py-6')
            $("#logo-link").children('img').removeClass('w-6').addClass('w-12')
            $("#logo-link").children('span').removeClass('lg:text-base text-sm').addClass('lg:text-2xl text-base')
        }
        lastScrollTop = st <= 0 ? 0 : st;    
        }
    </script>
</html>
