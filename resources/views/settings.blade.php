@extends('layouts.test')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">

                <div class="settingsBox">
                    <div>
                        <p>Changing password</p>
                    </div>
                    <form action="" method="post">
                        <div>
                            <input type="password" placeholder="Old password" id="oldpsw" name="oldpsw" required>
                        </div>
                        <div>
                            <input type="password" placeholder="New password" id="newpsw1" name="newpsw1" required>
                        </div>
                        <div>
                            <input type="password" placeholder="Repeat new password" id="newpsw2" name="newpsw2" required>
                        </div>
                        <div>
                            <button type="submit" name="submit" >Change password</button>
                        </div>
                    </form>


                    <div>
                        <p>Delete account</p>
                    </div>

                    <form action="" method="post">
                        <div>
                            <input type="password" placeholder="Password" id="psw" name="psw" required>
                        </div>
                        <div>
                            <button type="submit" name="submit" >Delete account</button>
                        </div>
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
