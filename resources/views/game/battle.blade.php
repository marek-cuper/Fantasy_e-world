<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="css/web.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>



    <style>
        body{
            background: url({{$boss->value('backg_path')}})
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



    <main class="py-4">
        <div class="battle_info">
            <p>YOUR TURN</p>
        </div>
        <div class="battle_container">
            <div class="player_box">

                <div class="battle_player_info">
                    <div class="battle_player_name">
                        <p>{{$character->value('name')}}</p>
                    </div>

                    <div class="battle_player_health">
                        <progress id="player_health" value="80" max="100"></progress>
                    </div>

                    <div class="battle_player_mana">
                        <progress id="player_mana" value="40" max="100"></progress>
                    </div>
                </div>

                <div class="battle_player_profwep">
                    <div class="battle_player_image">
                        <img src="{{$player_img_src}}">
                    </div>

                    <div class="battle_player_weapon">
                        <img src="{{$player_wep->value('image_path')}}">
                    </div>
                </div>

                <div class="battle_player_scrolls">
                    <div class="battle_player_scroll">
                        <img src="{{$player_scroll1->value('image_path')}}">
                    </div>
                    <div class="battle_player_scroll">
                        <img src="{{$player_scroll2->value('image_path')}}">
                    </div>
                    <div class="battle_player_scroll">
                        <img src="{{$player_scroll3->value('image_path')}}">
                    </div>
                </div>
            </div>


            <div class="battle_box">

            </div>

            <div class="boss_box">

                <div class="battle_boss_info">
                    <div class="battle_boss_name">
                        <p>{{$boss->value('name')}}</p>
                    </div>

                    <div class="battle_boss_health">
                        <progress id="boss_health" value="30" max="100"></progress>
                    </div>

                    <div class="battle_boss_mana">
                        <progress id="boss_mana" value="95" max="100"></progress>
                    </div>
                </div>

                <div class="battle_boss_profwep">
                    <div class="battle_boss_weapon">
                        <img src="{{$boss->value('wep_path')}}">
                    </div>

                    <div class="battle_boss_image">
                        <img src="{{$boss->value('profile_path')}}">
                    </div>

                </div>

                <div class="battle_boss_scrolls">
                    <div class="battle_boss_scroll">
                        <img src="{{$boss->value('scroll1_path')}}">
                    </div>
                    <div class="battle_boss_scroll">
                        <img src="{{$boss->value('scroll2_path')}}">
                    </div>
                    <div class="battle_boss_scroll">
                        <img src="{{$boss->value('scroll3_path')}}">
                    </div>
                </div>

            </div>


        </div>


    </main>

    <script>


    </script>
@endauth
</body>
</html>
