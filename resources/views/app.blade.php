<!DOCTYPE html>
<html>
<head>
    <title>GLI Group Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="UTF-8" />
    <meta name="google-site-verification" content="Bj7Uub3jN16PtXsW1OXFGCQi6Ku2S389xUr4rHOo03Q" />
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link href="{{ asset('/css/client.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/>
    <script src="{{ asset('/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('/js/header.js') }}"></script>
    <script src="https://kit.fontawesome.com/625ea5a249.js" crossorigin="anonymous"></script>
    @routes
    <script src="{{ asset('/js/app.js') }}" defer></script>
</head>
    <body id="body" onscroll="detectScroll(this.event)">
        <div class="flex flex-col h-auto">
            @inertia
        </div>
        
    </body>
</html>
