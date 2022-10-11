<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Boolpress</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <nav class="navbar">
                <div>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Boolpress') }}
                    </a>
                </div>
                @if (Route::has('login'))
                    <div class="top-right links">
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    </div>
                @endif
            </nav>

            <div id="root"></div>
        </div>
        <script src="{{asset('js/front.js')}}"></script>
    </body>
</html>
