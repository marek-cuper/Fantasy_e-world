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

            <div class="slideshow-container" id="slideshow-container">

                <?php

                for ($i = 0; $i < $scro->count(); $i++) {
                    ?>

                <div class="slide">
                    <img src="{{  $scro->where('id', $i)->value('image_path') }}">
                    <div class="text">{{ __('Cost: ') }}{{  $scro->where('id', $i)->value('cost') }}</div>
                    <div class="text">{{  $scro->where('id', $i)->value('info') }}</div>
                </div>
                    <?php
                }
                ?>

            </div>

            <div><a class="next" onclick="plusSlides(1)">&#10095;</a></div>

        </div>
{{--        <div id="weaponSubmit" class="player_weapon_button">--}}
{{--            <button onclick="chooseWeapon()" >Choose weapon</button>--}}
{{--        </div>--}}

        <div class="scroll-box">
            <div class="scroll-container">
                <img id="player_weapon_image" src="{{  $scro->where('id', Auth::user()->scroll1)->value('image_path') }}">
            </div>

            <div class="scroll-container">
                <img id="player_weapon_image" src="{{  $scro->where('id', Auth::user()->scroll2)->value('image_path') }}">
            </div>

            <div class="scroll-container">
                <img id="player_weapon_image" src="{{  $scro->where('id', Auth::user()->scroll3)->value('image_path') }}">
            </div>
        </div>



    </div>

    <script>

        {{--let listWeps = {{ $weps->toArray() }};--}}
        {{--for (i = 0; i < listWeps.length(); i++) {--}}
            // var tree = document.createDocumentFragment();
            // var div = document.createElement("div");
            // div.setAttribute('class','slide');
            //
            // var img = document.createElement("img");
            // img.setAttribute('src',listWeps[i].find('image_path'));
            //
            // var divText = document.createElement("div");
            // divText.setAttribute('class','text');
            //
            //
            // tree.appendChild(div)
            // div.appendChild(img)
            // div.appendChild(divText)
            // document.getElementById("slideshow-container").appendChild(tree);
        // }

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

        function chooseWeapon(){

            // var before = "images/weapons/"
            // var imageLookup = ["stone.png", "shadow_staff.png", "daggers.png", "axes.png", "torch.png"];
            // var link = before + imageLookup[slideIndex - 1];
            // document.getElementById("player_weapon_image").src = link;
            {{--$.ajax({--}}
            {{--    type: "POST",--}}
            {{--    url: 'setWeapon', // This is what I have updated--}}
            {{--    data: {--}}
            {{--        _token: "{{ csrf_token() }}",--}}
            {{--        id: slideIndex },--}}
            {{--    success: function() {--}}
            {{--        alert( slideIndex );--}}
            {{--    }--}}
            {{--})--}}
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/setWeapon') }}",
                type: "post",
                data: {id: slideIndex,},
                success: function(){ // What to do if we succeed
                    var img = document.getElementById("player_weapon_image");
                    img.src = {{  \App\Models\Weapon::where('id', 1)->value('image_path') }};
                }
            });
{{--            {{\App\Models\Weapon::where('id', $slideIndex)->value("info")}}--}}
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
