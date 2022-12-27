@extends('layouts.test')

@section('content')
    <div class="container">
        <div class="chat-box">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="statistics">
                <p>{!! $grid->show() !!}</p>

            </div>
        </div>
    </div>
@endsection
