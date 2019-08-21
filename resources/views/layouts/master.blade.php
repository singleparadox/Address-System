<html>
    <head>
        <title>Address System - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="{{asset('js/jquery.js')}}"></script>
        <style>
            body {
                margin: 0;
                padding: 0;
            }
            h4 {
                text-align: center;
            }
            .container {
                display: block;
                width: 800px;
                margin: 0 auto;
            }
            .inline_block_content {
                display: inline-block;
                width: 20%;
            }
            .inline_block_e_d {
                display: inline;
                margin-left:60%;
            }
            .inline {
                display: inline-block;
            }
            .back_div {
                display:inline-block;
            }
            .submit_div {
                display:inline-block;
                margin-left:70%;
            }


        </style>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </body>
</html>
