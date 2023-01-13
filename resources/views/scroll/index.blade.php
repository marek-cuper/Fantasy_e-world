@extends('layouts.test')

@section('content')

    <div class="weapon-container">
        <div class="dots">

            <?php

            for ($i = 1; $i <= $scro->count(); $i++) {
                ?>
                    <span class="dot" onclick="currentSlide($i)"></span>
                <?php
            }
            ?>
        </div>

        <div class="weapons-box">
            <div><a class="prev" onclick="plusSlides(-1)">&#10094;</a></div>

            <div class="slideshow-container-scroll" id="slideshow-container">



                <?php

                foreach ($scro as $scroll) {
                    ?>

                <div id="{{ $scroll->id }}" class="slide">
                    @if(Auth::user()->name == "admin")
                        <div class="text">Playable</div>
                        @if($scroll->id != 0)
                        <div  class="text">
                            <label class="switch">
                                    @if($scroll->playable == 1)
                                        <input class="swicth" type="checkbox" onclick="changePlayable()" checked>
                                    @else
                                        <input class="swicth" type="checkbox" onclick="changePlayable()" unchecked>
                                    @endif
                                <span class="slider round"></span>
                            </label>
                        </div>
                        @endif
                    @endif
                    <img class="wepsImgs" id="{{ $scroll->id }}" src="{{  $scroll->image_path }}">
                        <div class="text">{{ __('Cost: ') }}{{  $scroll->cost }}</div>
                        <div class="text">{{  $scroll->info }}</div>
                </div>





{{--                <div class="slide">--}}
{{--                    <img id="{{ $i }}" src="{{  $scro->where('id', $i)->value('image_path') }}">--}}
{{--                    <div class="text">{{ __('Cost: ') }}{{  $scro->where('id', $i)->value('cost') }}</div>--}}
{{--                    <div class="text">{{  $scro->where('id', $i)->value('info') }}</div>--}}
{{--                </div>--}}

                    <?php
                }
                ?>

            </div>

            <div><a class="next" onclick="plusSlides(1)">&#10095;</a></div>

        </div>

        <div class="scroll-box">
            <div id="scrollSubmit" class="player_scroll_button">
                <button onclick="chooseScroll(1)" >Choose 1. scroll</button>
            </div>

            <div id="scrollSubmit" class="player_scroll_button">
                <button onclick="chooseScroll(2)" >Choose 2. scroll</button>
            </div>

            <div id="scrollSubmit" class="player_scroll_button">
                <button onclick="chooseScroll(3)" >Choose 3. scroll</button>
            </div>
        </div>



        <div class="scroll-box">
            <div class="scroll-container">
                <img id="player_scroll1_image" src="{{$scroll->where('id', $character->value('scroll1'))->value('image_path') }}">
            </div>

            <div class="scroll-container">
                <img id="player_scroll2_image" src="{{$scroll->where('id', $character->value('scroll2'))->value('image_path') }}">
            </div>

            <div class="scroll-container">
                <img id="player_scroll3_image" src="{{$scroll->where('id', $character->value('scroll3'))->value('image_path') }}">
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
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }

        function chooseScroll(){
            var src1 = document.getElementById('player_scroll1_image').src;
            var src2 = document.getElementById('player_scroll2_image').src;
            var src3 = document.getElementById('player_scroll3_image').src;
            var changesrc = document.getElementById(slideIndex - 1).src;

            if(src1 !== changesrc && src2 !== changesrc && src3 !== changesrc){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/setScroll') }}",
                    type: "post",
                    data: {
                        id: slideIndex - 1,
                        scroll: n,
                    },
                    success: function(){ // What to do if we succeed
                        if(n === 1){
                            var img = document.getElementById("player_scroll1_image");
                            img.src = document.getElementById(slideIndex - 1).src;
                        }else if(n === 2){
                            var img = document.getElementById("player_scroll2_image");
                            img.src = document.getElementById(slideIndex - 1).src;
                        } else if(n === 3){
                            var img = document.getElementById("player_scroll3_image");
                            img.src = document.getElementById(slideIndex - 1).src;
                        }
                    }
                });
            } else {
                alert("Every scroll what you choose must be different");
            }
        }

        function changePlayable(n) {
            let slides = document.getElementsByClassName("slide");
            let id = slides[slideIndex-1].id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/changePlayabilityScroll') }}",
                type: "post",
                data: {id: id},
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
