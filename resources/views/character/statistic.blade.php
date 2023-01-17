@extends('layouts.game-layout')

@section('content')
    <div class="container">
        <div class="chat-box">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="statistics">
                {!! $grid->show() !!}

            </div>
        </div>
    </div>
@endsection
