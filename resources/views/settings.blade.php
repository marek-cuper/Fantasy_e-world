@extends('layouts.test')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">

                <div class="settingsBox">
                    <div>
                        <p>Changing password</p>
                    </div>
                    <form action="{{ route('changePassword') }}" method="post">
                        <div>
                            <input id="oldPassword" type="password" placeholder="Old password" name="oldPassword" @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div>
                            <input id="newPassword" type="password" placeholder="New password" name="newPassword" @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div>
                            <input id="confirmPassword" type="password" placeholder="Confirm password" name="confirmPassword" required autocomplete="new-password">
                        </div>
                        <div>
                            <button type="submit" name="submit" >Change password</button>
                        </div>
                        @csrf @method('POST')
                    </form>


                    <div>
                        <p>Delete account</p>
                    </div>

                    <form action="{{ route('delete') }}" method="post">
                        <div>
                            <input id="password" type="password" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
                            <button type="submit" name="submit" >Delete account</button>
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
