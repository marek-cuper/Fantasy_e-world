<div class="footer">
    <div class="flex-container">
        <div>
            <div class="footerExplanations"><p>Player Name:</p></div>
            <div class="footerValue">
                <?php
                if(isset($_SESSION["id"])){
                    echo "<p>" .$_SESSION["name"] . "</p>";
                }
                ?>
            </div>
        </div>
            <div>
                <div class="footerExplanations"><p>Weapon:</p></div>
                <div class="footerValue"><img src="<?php if(isset($_SESSION["id"])){echo $_SESSION["weapon_link"];} ?>"></div>

            </div>
    </div>
</div>
