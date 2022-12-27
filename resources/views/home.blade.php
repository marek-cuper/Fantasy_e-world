@extends('layouts.test')

@section('content')
<div class="container">
    <div class="chat-box">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <ul>
            <li>Player1: Hi</li>
            <li>Player58: Hello guys</li>
            <li>XPlayesX: Someone looking for money?</li>
            <li>Mark: Welcome here</li>
            <li>Michael: Michael HERE!</li>
        </ul>
    </div>
</div>
@endsection
