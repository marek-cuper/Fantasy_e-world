@extends('layouts.game-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">

                <div class="settingsBox">
                    <div>
                        <p>Username: {{$name}}</p>
                    </div>
                    <div>
                        <p>Changing name</p>
                    </div>
                    <form action="{{ route('changeName') }}" method="post">
                        <div>
                            <input id="newName" type="text" placeholder="New name" name="newName"
                                   @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" name="submit">Change name</button>
                        </div>
                        @csrf @method('POST')
                    </form>

                    <div>
                        <p>Changing email</p>
                    </div>
                    <form action="{{ route('changeEmail') }}" method="post">
                        <div>
                            <input id="oldEmail" type="email" placeholder="Old Email" name="oldEmail"
                                   @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div>
                            <input id="newEmail" type="email" placeholder="New email" name="newEmail"
                                   @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div>
                            <input id="confirmPassword" type="password" placeholder="Confirm password"
                                   name="confirmPassword" required autocomplete="new-password">
                        </div>
                        <div>
                            <button type="submit" name="submit">Change email</button>
                        </div>
                        @csrf @method('POST')
                    </form>

                    <div>
                        <p>Changing password</p>
                    </div>
                    <form action="{{ route('changePassword') }}" method="post">
                        <div>
                            <input id="oldPassword" type="password" placeholder="Old password" name="oldPassword"
                                   @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div>
                            <input id="newPassword" type="password" placeholder="New password" name="newPassword"
                                   @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div>
                            <input id="confirmPassword" type="password" placeholder="Confirm password"
                                   name="confirmPassword" required autocomplete="new-password">
                        </div>
                        <div>
                            <button type="submit" name="submit">Change password</button>
                        </div>
                        @csrf @method('POST')
                    </form>


                    <div>
                        <p>Delete account</p>
                    </div>

                    <form action="{{ route('delete') }}" method="post">
                        <div>
                            <input id="password" type="password" placeholder="Password"
                                   @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        @if(Route::has('deleteaccount'))
                            <p>
                                    <?php
                                    echo $deleteaccount
                                    ?>
                            </p>

                            {{--                            <p>{{ $deleteaccount }}</p>--}}
                        @endif
                        <div>
                            <button type="submit" name="submit">Delete account</button>
                        </div>
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>

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
@endsection
