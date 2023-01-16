@extends('layouts.game-layout')

@section('content')
    <div class="weapon-container">
        <div class="dots">

            <?php

            for ($i = 0;
                 $i < $weps->count();
                 $i++) {
                ?>
            <span class="dot" onclick="currentSlide($i)"></span>
                <?php
            }
            ?>
        </div>

        <div class="weapons-box">
            <div><a class="prev" onclick="plusSlides(-1)">&#10094;</a></div>

            <div class="slideshow-container" id="slideshow-container">

                <?php

                foreach ($weps as $wep) {
                    ?>

                <div id="{{ $wep->id }}" class="slide">
                    @if(Auth::user()->name == "admin")
                        <div class="text">Playable</div>
                        @if($wep->id != 0)
                            <div class="text">
                                <label class="switch">
                                    @if($wep->playable == 1)
                                        <input class="swicth" type="checkbox" onclick="changePlayable()" checked>
                                    @else
                                        <input class="swicth" type="checkbox" onclick="changePlayable()" unchecked>
                                    @endif
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        @endif
                    @endif
                    <img class="wepsImgs" id="{{ $wep->id }}" src="{{  $wep->image_path }}">
                    <div class="text">{{  $wep->info }}</div>
                </div>
                    <?php
                }
                ?>

            </div>

            <div><a class="next" onclick="plusSlides(1)">&#10095;</a></div>

        </div>


        <div id="weaponSubmit" class="player_weapon_button">
            <button onclick="chooseWeapon()">Choose weapon</button>
        </div>

        <div class="player_weapon">
            <img id="player_weapon_image"
                 src="{{$weps->where('id', $character->value('weapon'))->value('image_path') }}">
        </div>


    </div>

    <script>

        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("slide");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }

        function chooseWeapon() {
            let slides = document.getElementsByClassName("slide");
            let id = slides[slideIndex - 1].id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/setWeapon') }}",
                type: "post",
                data: {id: id},
                success: function () { // What to do if we succeed
                    let wepsimgs = document.getElementsByClassName("wepsImgs");
                    var img = document.getElementById("player_weapon_image");
                    img.src = wepsimgs[slideIndex - 1].src;
                }
            });
        }

        function changePlayable() {
            let slides = document.getElementsByClassName("slide");
            let id = slides[slideIndex - 1].id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/changePlayabilityWeapon') }}",
                type: "post",
                data: {id: id},
                // success: function(){ // What to do if we succeed
                //     alert(id);
                // }
            });
        }


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
