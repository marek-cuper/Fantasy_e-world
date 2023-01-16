<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="css/web.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>



    <style>
        body{
            background: url({{$boss->value('backg_path')}})
            no-repeat fixed;
            background-size:cover;
            overflow: hidden;
        }


    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@auth



    <main class="py-4">
{{--        <div class="battle_info">--}}
{{--            <p id="battle_info">FIGHT!</p>--}}
{{--        </div>--}}
        <div class="battle_container">
            <div class="player_box">

                <div class="battle_player_info">
                    <div class="battle_player_name">
                        <p>{{$character->value('name')}}</p>
                    </div>

                    <div class="battle_player_health">
                        <progress id="player_health" value="80" max="100"></progress>
                    </div>

                    <div class="battle_player_mana">
                        <progress id="player_mana" value="40" max="100"></progress>
                    </div>
                </div>

                <div class="battle_player_profwep">
                    <div id="battle_player_image" class="battle_player_image">
                        <img src="{{$player_img_src}}">
                    </div>

                    <div id="battle_player_weapon" class="battle_player_weapon">
                        <img onclick="main(0)" src="{{$player_wep->value('image_path')}}">
                    </div>
                </div>

                <div id="battle_player_scrolls" class="battle_player_scrolls">
                    <div class="battle_player_scroll">
                        <img id="battle_player_scroll1" onclick="main(1)" src="{{$player_scroll1->value('image_path')}}">
                    </div>
                    <div class="battle_player_scroll">
                        <img id="battle_player_scroll2" onclick="main(2)" src="{{$player_scroll2->value('image_path')}}">
                    </div>
                    <div class="battle_player_scroll">
                        <img id="battle_player_scroll3" onclick="main(3)" src="{{$player_scroll3->value('image_path')}}">
                    </div>
                </div>

                <div id="battle_player_buffs" class="battle_player_buffs">
                    <div class="battle_player_buff">
                        <img id="battle_player_buff1"  src="{{$player_scroll1->value('image_path')}}">
                    </div>
                    <div class="battle_player_buff">
                        <img id="battle_player_buff2"  src="{{$player_scroll2->value('image_path')}}">
                    </div>
                    <div class="battle_player_buff">
                        <img id="battle_player_buff3"  src="{{$player_scroll3->value('image_path')}}">
                    </div>
                </div>
            </div>


            <div class="battle_box">
                <img id="battle_action">
            </div>

            <div class="boss_box">

                <div class="battle_boss_info">
                    <div class="battle_boss_name">
                        <p>{{$boss->value('name')}}</p>
                    </div>

                    <div class="battle_boss_health">
                        <progress id="boss_health" value="30" max="100"></progress>
                    </div>

                    <div class="battle_boss_mana">
                        <progress id="boss_mana" value="95" max="100"></progress>
                    </div>
                </div>

                <div class="battle_boss_profwep">
                    <div id="battle_boss_weapon" class="battle_boss_weapon">
                        <img src="{{$boss->value('wep_path')}}">
                    </div>

                    <div class="battle_boss_image">
                        <img src="{{$boss->value('profile_path')}}">
                    </div>

                </div>

                <div id="battle_boss_scrolls" class="battle_boss_scrolls">
                    <div class="battle_boss_scroll">
                        <img src="{{$boss->value('scroll1_path')}}">
                    </div>
                    <div class="battle_boss_scroll">
                        <img src="{{$boss->value('scroll2_path')}}">
                    </div>
                    <div class="battle_boss_scroll">
                        <img src="{{$boss->value('scroll3_path')}}">
                    </div>
                </div>

                <div id="battle_boss_buffs" class="battle_boss_buffs">
                    <div class="battle_boss_buff">
                        <img id="battle_boss_buff1" src="{{$player_scroll1->value('image_path')}}">
                    </div>
                    <div class="battle_boss_buff">
                        <img id="battle_boss_buff2" src="{{$player_scroll2->value('image_path')}}">
                    </div>
                    <div class="battle_boss_buff">
                        <img id="battle_boss_buff3" src="{{$player_scroll3->value('image_path')}}">
                    </div>
                </div>

            </div>


        </div>

        <div class="endMenu" id="endMenu">
            <img src="{{$boss->value('backg_path')}}">
            <p id="endMenuText">You won battle</p>
            <form method="GET" action="{{ url('/lobby') }}">
                @csrf
                <div>
                    <button class="delete_char_button" type="submit">Leave battle</button>
                </div>
            </form>
        </div>


    </main>

    <script>

        let end = 0;
        let endMenu = document.getElementById("endMenu");
        endMenu.style.display = "none";
        let endMenuText = document.getElementById("endMenuText");

        let playerWeaponName = "{{$player_wep->value('name')}}";
        let playerWeaponImg = "{{$player_wep->value('image_path')}}";
        let playerWeaponDmg = {{$player_wep->value('damage')}};

        let bossWeaponName = "{{$boss->value('name')}}";
        let bossWeaponImg = "{{$boss->value('wep_path')}}";
        let bossScroll1Img = "{{$boss->value('scroll1_path')}}";
        let bossScroll2Img = "{{$boss->value('scroll2_path')}}";
        let bossScroll3Img = "{{$boss->value('scroll3_path')}}";
        let bossWeaponDmg = {{$boss->value('damage')}};
        let bossEffects = [];


        let round = 0;
        let textInfo = document.getElementById("battle_info");
        let actionBox = document.getElementById("battle_action");
        let wepPlayer = document.getElementById("battle_player_weapon");
        let scrollsPlayer = document.getElementById("battle_player_scrolls");
        let playerImage = document.getElementById("battle_player_image");

        let effect1PlayerImg = document.getElementById("battle_player_buff1");
        let effect2PlayerImg = document.getElementById("battle_player_buff2");
        let effect3PlayerImg = document.getElementById("battle_player_buff3");

        let effect1BossImg = document.getElementById("battle_boss_buff1");
        let effect2BossImg = document.getElementById("battle_boss_buff2");
        let effect3BossImg = document.getElementById("battle_boss_buff3");



        let healthBarPlayer = document.getElementById("player_health");
        let healthBarBoss = document.getElementById("boss_health");
        healthBarPlayer.setAttribute("max", "100");
        healthBarPlayer.setAttribute("value", "100");
        healthBarBoss.setAttribute("max", "100");
        healthBarBoss.setAttribute("value", "100");

        let manaBarPlayer = document.getElementById("player_mana");
        let manaBarBoss = document.getElementById("boss_mana");
        manaBarPlayer.setAttribute("max", "100");
        manaBarPlayer.setAttribute("value", "100");
        manaBarBoss.setAttribute("max", "100");
        manaBarBoss.setAttribute("value", "100");

        let wepBoss = document.getElementById("battle_boss_weapon");
        let scrollsBoss = document.getElementById("battle_boss_scrolls");
        wepBoss.style.display = 'none';
        scrollsBoss.style.display = 'none';
        let playerMaxHealth = 1000;
        let playerHealth = 1000;
        let bossMaxHealth = {{$boss->value('health')}};
        let bossHealth = {{$boss->value('health')}};
        let playerMaxMana = 10;
        let playerMana = 10;
        let playerDiaryStacks = 0;
        let playerEffects = [];

        let playerPassives = [];
        if("{{$player_scroll1->value('activation')}}" === "0"){
            let disscroll = document.getElementById("battle_player_scroll1");
            disscroll.onclick = null;
            playerPassives.push("{{$player_scroll1->value('name')}}");
        }
        if("{{$player_scroll2->value('activation')}}" === "0"){
            let disscroll = document.getElementById("battle_player_scroll2");
            disscroll.onclick = null;
            playerPassives.push("{{$player_scroll2->value('name')}}");

        }
        if("{{$player_scroll3->value('activation')}}" === "0"){
            let disscroll = document.getElementById("battle_player_scroll3");
            disscroll.onclick = null;
            playerPassives.push("{{$player_scroll3->value('name')}}");
        }


        function main(action){
            //0-wep, 1-scroll1, 2-scroll2, 3-scroll3
            // textInfo.textContent = ""

            round++;
            showPlayerOptions(0);
            playerAction(action);
            // showAction(img_path)
            sleepFunc(2000).then(() => {
                clearAction();
                showPlayerOptions(0);
                showBossOptions(1)
                sleepFunc(2000).then(() => {
                    showBossOptions(0)
                    bossAction();
                    sleepFunc(2000).then(() => {
                        clearAction();
                        showPlayerOptions(1);
                        endRound();
                    });
                });
            });



        }

        function sleepFunc(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        function showPlayerOptions(tf){
            if(tf === 1){
                wepPlayer.style.display = 'flex';
                scrollsPlayer.style.display = 'grid';
            } else {
                wepPlayer.style.display = 'none';
                scrollsPlayer.style.display = 'none';
            }
            sleepFunc(1);
        }

        function showBossOptions(tf){
            if(tf === 1){
                wepBoss.style.display = 'flex';
                scrollsBoss.style.display = 'grid';
            } else {
                wepBoss.style.display = 'none';
                scrollsBoss.style.display = 'none';
            }
            sleepFunc(1);
        }

        function showAction(image_path){
            actionBox.src = image_path;
            actionBox.style.display = 'block';
        }

        function clearAction(){
            actionBox.style.display = 'none';
        }

        function playerGetHeal(heal){
            playerHealth = playerHealth + heal;
            if(playerHealth > playerMaxHealth){
                playerHealth = playerMaxHealth;
            }
            updateHealthMana();
        }

        function bossGetHeal(heal){
            bossHealth = bossHealth + heal;
            if(bossHealth > bossMaxHealth){
                bossHealth = bossMaxHealth;
            }
            updateHealthMana();
        }

        function playerGetDamage(damage){
            playerHealth = playerHealth - damage;
            if( playerHealth <= 0){
                dead(1)
            }
            updateHealthMana();
        }

        function bossGetDamage(damage){
            bossHealth = bossHealth - damage;
            if( bossHealth <= 0){
                dead(0)
            }
            updateHealthMana();
        }

        function updateHealthMana(){
            healthBarBoss.setAttribute('value', (bossHealth/bossMaxHealth * 100).toString());
            healthBarPlayer.setAttribute('value', (playerHealth/playerMaxHealth * 100).toString());
            manaBarPlayer.setAttribute('value', (playerMana/playerMaxMana * 100).toString());
        }

        function addMana(mana){
            playerMana = playerMana + mana;
            if(playerMana >= playerMaxMana){
                playerMana = playerMaxMana;
            }
            updateHealthMana();
        }

        function spendMana(mana){
            playerMana = playerMana - mana;
            if(playerMana < 0){
                playerMana = 0;
                updateHealthMana();
                return 0;
            }
            updateHealthMana();
            return 1;
        }

        function dead(who){
            endMenu.style.display = "flex";
            if(who === 0){
                endMenuText.textContent = "{{$character->value('name')}} is WINNER"
            } else {
                endMenuText.textContent = "{{$character->value('name')}} is LOSER"
            }
        }
        function bossAction(){
            let image_path;
            if(round%2 === 0){
                image_path = bossWeaponImg;
                playerGetDamage(bossWeaponDmg)
            }else{
                if(round%6 === 1){
                    image_path = bossScroll1Img;
                    bossWeaponDmg += 50;
                } else if(round%6 === 3){
                    image_path = bossScroll2Img;
                    bossEffects = [];
                    playerEffects = [];
                    playerImage.style.display = 'flex';
                    updateBuffsImg();
                } else {
                    image_path = bossScroll3Img;
                    bossGetHeal(1000);
                }
                bossGetHeal(200);
            }
            showAction(image_path)
        }

        function playerAction(action){
            if(action === 0){
                playerWeaponAction();
            } else {
                playerScrollAction(action);
            }
            if (playerWeaponName === "Axes"){
                bossGetDamage(playerWeaponDmg/2);
            }

        }

        function playerWeaponAction(){
            let damage = playerWeaponDmg;
            if (playerImage.style.display === 'none'){
                if(playerWeaponName === "Daggers"){
                    damage = damage * 3;
                }
            }
            if(playerWeaponName === "Scythe"){
                playerGetHeal(damage/2)
            }
            if(playerWeaponName === "Torch"){
                if(!bossEffects.includes("fire")){
                    bossEffects.push("fire");
                    updateBuffsImg();
                }
            }
            if(playerWeaponName === "Shadow staff"){
                playerWeaponDmg = playerWeaponDmg + 80;
            }
            bossGetDamage(damage);
            if(playerEffects.includes("totem")){
                playerGetHeal(damage/10)
            }


            showAction(playerWeaponImg);


            if(playerImage.style.display === 'none'){
                playerImage.style.display = 'flex';
            }
        }

        function playerScrollAction(action){

            let imgPath;
            let scrollName;
            let scrollCost;
            if(action === 1){
                imgPath = "{{$player_scroll1->value('image_path')}}";
                scrollName = "{{$player_scroll1->value('name')}}";
                scrollCost = {{$player_scroll1->value('cost')}};
            }else if(action === 2){
                imgPath = "{{$player_scroll2->value('image_path')}}";
                scrollName = "{{$player_scroll2->value('name')}}";
                scrollCost = {{$player_scroll2->value('cost')}};

            } else{
                imgPath = "{{$player_scroll3->value('image_path')}}";
                scrollName = "{{$player_scroll3->value('name')}}";
                scrollCost = {{$player_scroll3->value('cost')}};

            }
            if (spendMana(scrollCost) === 1){
                if(scrollName === "Thief scroll"){
                    if(!playerEffects.includes("invisibility")){
                        playerImage.style.display = 'none';
                        playerEffects.push('invisibility')
                        updateBuffsImg();
                    }
                }
                if(scrollName === "Healing scroll"){
                    playerGetHeal(playerMaxHealth/4);
                }
                if(scrollName === "Mana scroll"){
                    playerMaxMana += 2;
                    addMana(5);
                }
                if(scrollName === "Diary"){
                    if (playerDiaryStacks > 4){
                        bossGetDamage(2000);
                        imgPath = "images/scrolls/diary2.png"
                    }
                    playerDiaryStacks++;
                }
                if(scrollName === "Totem"){
                    if(!playerEffects.includes("totem")){
                        playerEffects.push("totem");
                        updateBuffsImg();
                    }
                }
                if(scrollName === "Abyssbook"){
                    let damage = 500;
                    if(playerPassives.includes("Infernal scroll")){
                        damage = damage * 2;
                    }
                    bossGetDamage(damage);
                    if(!bossEffects.includes("fire")){
                        bossEffects.push("fire");
                        updateBuffsImg();
                    }

                }
                if(scrollName === "Execution book"){
                    if(bossHealth < (bossMaxHealth/5)){
                        bossGetDamage(bossHealth + 100);
                    }
                }
                if(scrollName === "Runner scroll"){
                    endMenu.style.display = "flex";
                    endMenuText.textContent = "{{$character->value('name')}} run from battle away"
                }
            } else {
                imgPath = "images/trash.png"
            }

            showAction(imgPath)

        }

        function endRound(){
            addMana(1);
            if(playerPassives.includes("Repair scroll")){
                playerGetHeal(playerMaxHealth/20);
            }
            if(bossEffects.includes("fire")){
                let damage = bossMaxHealth/100*1.5;
                if(playerPassives.includes("Infernal scroll")){
                    damage = damage * 2;
                }
                bossGetDamage(damage)
            }
        }

        function updateBuffsImg(){
            effect1PlayerImg.style.display = 'none';
            effect2PlayerImg.style.display = 'none';
            effect3PlayerImg.style.display = 'none';
            effect1BossImg.style.display = 'none';
            effect2BossImg.style.display = 'none';
            effect3BossImg.style.display = 'none';

            if (playerEffects.length === 1){

                effect1PlayerImg.src = getImgSrcForEffect(playerEffects[0]);
                effect1PlayerImg.style.display = 'grid';
            }else if (playerEffects.length === 2){
                effect1PlayerImg.src = getImgSrcForEffect(playerEffects[0]);
                effect1PlayerImg.style.display = 'grid';
                effect2PlayerImg.src = getImgSrcForEffect(playerEffects[1]);
                effect2PlayerImg.style.display = 'grid';
            }else if (playerEffects.length === 3){
                effect1PlayerImg.src = getImgSrcForEffect(playerEffects[0]);
                effect1PlayerImg.style.display = 'grid';
                effect2PlayerImg.src = getImgSrcForEffect(playerEffects[1]);
                effect2PlayerImg.style.display = 'grid';
                effect3PlayerImg.src = getImgSrcForEffect(playerEffects[2]);
                effect3PlayerImg.style.display = 'grid';
            }

            if (bossEffects.length === 1){
                effect3BossImg.src = getImgSrcForEffect(bossEffects[0]);
                effect3BossImg.style.display = 'grid';
            }else if (bossEffects.length === 2){
                effect3BossImg.src = getImgSrcForEffect(bossEffects[0]);
                effect3BossImg.style.display = 'grid';
                effect2BossImg.src = getImgSrcForEffect(bossEffects[1]);
                effect2BossImg.style.display = 'grid';
            }else if (bossEffects.length === 3){
                effect3BossImg.src = getImgSrcForEffect(bossEffects[0]);
                effect3BossImg.style.display = 'grid';
                effect2BossImg.src = getImgSrcForEffect(bossEffects[1]);
                effect2BossImg.style.display = 'grid';
                effect1BossImg.src = getImgSrcForEffect(bossEffects[2]);
                effect1BossImg.style.display = 'grid';
            }

        }

        function getImgSrcForEffect(effect){
            if(effect === 'fire'){
                return 'images/effects/fire.png'
            } else if(effect === 'totem'){
                return 'images/scrolls/totem.png'
            }else if(effect === 'invisibility'){
                return 'images/effects/invisibility.png'
            }
        }



    </script>
@endauth
</body>
</html>
