@extends('layouts.test')

@section('content')
    <div class="weapon-container">
        <!--    <div class="galleryWeaponsBox">-->
        <!--      <div class="imageWeapons">-->
        <!--        <div>-->
        <!--          <img src="images/weapons/axes.png"/>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--          <img src="images/weapons/shadow_staff.png"/>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--          <img src="images/weapons/torch.png"/>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--          <img src="images/weapons/shaman_staff.png"/>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--          <img src="images/weapons/crossbow.png"/>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--          <img src="images/weapons/scythe.png"/>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--          <img src="images/weapons/arcane_staff.png"/>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--          <img src="images/weapons/daggers.png"/>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <div class="dots">
            <!--            --><?php
//            for ($i = 1; $i <= 5; $i++) {
//                ?>
                <!--                <span class="dot" onclick="currentSlide($i)"></span>;-->
            <!--                --><?php
//            }
//            ?>
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>

        <div class="weapons-box">
            <div><a class="prev" onclick="plusSlides(-1)">&#10094;</a></div>

            <div class="slideshow-container">

                <div class="slide">
                    <img src="images/weapons/stone.png">
                    <div class="text">Stone, it is just stone, what do you expect?</div>
                </div>

                <div class="slide">
                    <img src="images/weapons/shadow_staff.png">
                    <div class="text">Shadow stuff, every action spawn monster</div>
                </div>

                <div class="slide">
                    <img src="images/weapons/daggers.png">
                    <div class="text">Daggers, bonus on every action in Invisbility</div>
                </div>

                <div class="slide">
                    <img src="images/weapons/axes.png">
                    <div class="text">Axes, bonus attack after every action</div>
                </div>

                <div class="slide">
                    <img src="images/weapons/torch.png">
                    <div class="text">Torch, </div>
                </div>
            </div>

            <div><a class="next" onclick="plusSlides(1)">&#10095;</a></div>

        </div>
        <div class="player_weapon_button" type="submit" name="submit" action="includes/weapon.inc.php" method="post" onclick="chooseWeapon()">
            <button>Choose weapon</button>
        </div>

        <div class="player_weapon">
            <img id="player_weapon_image" src="{{  \App\Models\Weapon::where('id', Auth::user()->weapon)->value('image_path') }}">
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

        function chooseWeapon(){

            var before = "images/weapons/"
            var imageLookup = ["stone.png", "shadow_staff.png", "daggers.png", "axes.png", "torch.png"];
            var link = before + imageLookup[slideIndex - 1];
            document.getElementById("player_weapon_image").src = link;
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
