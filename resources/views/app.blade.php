<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>GLI Group Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="UTF-8" />
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>
    <script src="{{ asset('/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/0150beeb77.js" crossorigin="anonymous"></script>
    @routes
    <script src="{{ asset('/js/app.js') }}" defer></script>
</head>
    <body id="body" onscroll="detectScroll(this.event)">
        <div class="flex flex-col h-auto">
            @inertia
        </div>
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
    </body>
</html>
