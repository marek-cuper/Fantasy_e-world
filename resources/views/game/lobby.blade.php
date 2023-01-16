@extends('layouts.game-layout')

@section('content')
    <div class="character-container">


        <div class="character-text">
            <p>Name: {{$bosses->where('id', $character->value('level'))->value('name')}}</p>
        </div>

        <div>
            <img id="player_character_image"
                 src="{{$bosses->where('id', $character->value('level'))->value('profile_path')}}">
        </div>


        <div>
            <form method="GET" action="{{ route('battle') }}">
                @csrf
                <div>
                    <button class="delete_char_button" type="submit">Enter battle</button>
                </div>
            </form>
        </div>


    </div>

    <script>

    </script>
@endsection
