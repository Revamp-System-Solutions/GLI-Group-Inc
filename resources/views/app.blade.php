<!DOCTYPE html>
<html>
<head>
    <title>GLI Group Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="UTF-8" />
    <meta name="google-site-verification" content="s8xPBmMBBFf4mTFGFKnd_xsoiJ1LGEsn4fpSsRqZrVw" />
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link href="{{ asset('/css/client.css') }}" rel="stylesheet"/>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
    <script src="{{ asset('/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/625ea5a249.js" crossorigin="anonymous"></script>
   <!-- Calendly link widget begin -->
<link href="https://calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://calendly.com/assets/external/widget.js" type="text/javascript"></script>
<!-- Calendly link widget end -->
    @routes
   
    @inertiaHead
</head>

    <body id="body flex flex-col min-h-full" onscroll="detectScroll(this.event)">
            @inertia
        
            <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
