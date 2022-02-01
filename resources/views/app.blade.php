<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>GLI Group Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="UTF-8" />
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link href="{{ asset('/css/client.css') }}" rel="stylesheet"/>
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
        <!-- Messenger Chat Plugin Code -->
        <div id="fb-root"></div>

        <!-- Your Chat Plugin code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "103402264966215");
        chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
        window.fbAsyncInit = function() {
            FB.init({
            appId            : 468041464709531,
            xfbml            : true,
            version          : 'v12.0',
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            js.crossorigin = "anonymous";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
       
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
