<!DOCTYPE html>
<html>
<head>
    <title>GLI Group Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="UTF-8" />
    <meta name="google-site-verification" content="s8xPBmMBBFf4mTFGFKnd_xsoiJ1LGEsn4fpSsRqZrVw" />
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link href="{{ mix('/css/client.css') }}" rel="stylesheet"/>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
    <script src="{{ mix('/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/625ea5a249.js" crossorigin="anonymous"></script>
    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
</head>
    <body id="body flex flex-col min-h-full" onscroll="detectScroll(this.event)">
       
            @inertia
      
        
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
