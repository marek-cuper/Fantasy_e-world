<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    {{--    <!-- Fonts -->--}}
    {{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">--}}

    <link rel="stylesheet" href="css/web.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>



    <style>
        body{
            background: url("images/backgPixelSky.jpg")
            no-repeat fixed;
            background-size:cover;
            overflow: hidden;
        }


    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@auth
    <div class="sidenav">
        <a href="{{ url('/home') }}">Home</a>
        <a href="{{ url('/character') }}" >{{ __('Characters') }}</a>
        @if(Auth::user()->character == true)
            <a href="{{ route('weapon.index') }}" >{{ __('Weapon') }}</a>
            <a href="{{ route('scroll.index') }}" >{{ __('Scroll') }}</a>
        @endif
        <a href="{{ route('user.index') }}" >{{ __('Statistic') }}</a>
        <a href="{{ route('settings') }}" >{{ __('Settings') }}</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>

    <div class="middleNav" id="middleNav">
        <a href="{{ url('/home') }}">Home</a>
        <a href="{{ url('/character') }}" >{{ __('Characters') }}</a>
        @if(Auth::user()->character == true)
            <a href="{{ route('weapon.index') }}" >{{ __('Weapon') }}</a>
            <a href="{{ route('scroll.index') }}" >{{ __('Scroll') }}</a>
        @endif
        <a href="{{ route('user.index') }}" >{{ __('Statistic') }}</a>
        <a href="{{ route('settings') }}" >{{ __('Settings') }}</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>

    <main class="py-4">
        @yield('content')
    </main>

{{--    <div class="footer">--}}
{{--        <div class="flex-container">--}}
{{--            <div>--}}
{{--                <div class="footerExplanations"><p>Player Name:</p></div>--}}
{{--                <div class="footerValue">--}}
{{--                    {{ Auth::user()->name }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <div class="footerExplanations"><p>Weapon:</p></div>--}}
{{--                <div class="footerValue">--}}
{{--                    <img src="{{  \App\Models\Weapon::where('id', Auth::user()->weapon)->value('image_path') }}">--}}
{{--                    <img src="{{  $weps->value('image_path') }}">--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <script>
        function myFunction() {
            var x = document.getElementById("middleNav");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>
@endauth
</body>
</html>
