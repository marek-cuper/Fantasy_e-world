@extends('layouts.game-layout')

@section('content')
    <div class="character-container">
        <div class="dots">

            <?php

            for ($i = 0;
                 $i < $chars->count();
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

                for ($i = 0;
                     $i < $chars->count();
                     $i++) {
                    ?>

                <div class="slide">
                    <img id="{{ $i }}" src="{{  $chars->where('id', $i)->value('image_path') }}" alt="Character image">
                    <div class="text">{{  $chars->where('id', $i)->value('name') }}</div>
                </div>
                    <?php
                }
                ?>

            </div>

            <div><a class="next" onclick="plusSlides(1)">&#10095;</a></div>

        </div>

        <div class="scroll-box">
            <div>
                <div class="charInput">
                    <input id="name" type="text" placeholder="Name">
                </div>
                <div>
                    <button onclick="chooseCharacter()">Create character</button>
                </div>
            </div>
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

        function chooseCharacter() {
            var input = document.getElementById("name");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/createCharacter') }}",
                type: "post",
                data: {
                    name: input.value,
                    id: slideIndex - 1
                },
                success: function () { // What to do if we succeed
                    window.location.href = "{{URL::to('/character')}}"
                }
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
