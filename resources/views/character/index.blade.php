@extends('layouts.game-layout')

@section('content')
    <div class="character-container">

        <div class="character-text">
            <p>Character: {{$character->value('name')}}</p>
        </div>

        <div class="character-text2">
            <p>Level: {{$character->value('level')}}</p>
        </div>

        <div>
            <img id="player_character_image" src="{{$chars->where('id', $character->value('picture'))->value('image_path') }}" alt="Your character image">
        </div>


        <form method="POST" action="{{ route('deleteCharacter') }}">
            @csrf
            <div>
                <button class="delete_char_button" type="submit">Delete character</button>
            </div>
            @csrf @method('DELETE')
        </form>
    </div>

@endsection
