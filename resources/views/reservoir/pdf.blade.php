<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>{{$reservoir->title}}</title>
        <style>
            @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url({{ asset('fonts/Roboto-Regular.ttf') }});
            }
            @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: bold;
            src: url({{ asset('fonts/Roboto-Bold.ttf') }});
            }
            body {
                font-family: 'Roboto';
            }
        </style>
    </head>
    <body>
        <h1>{{$reservoir->title}}</h1>
        <h2>{{$reservoir->area}}</h2>
        <div>{!!$reservoir->about!!}</div>
    </body>
</html>