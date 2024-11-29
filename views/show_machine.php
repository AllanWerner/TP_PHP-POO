<?php

$headTitle = "Machine à rouleaux";

// if(!isset($gain) || !$gain){
//     header("Location: /418");
//     exit;
// }
ob_start();
?>

<section class="container">
    <h1>🎰Machine à sous🎰</h1>

    <article class="slot-machine">
        <div class="reel" id="reel1">🍒</div>
        <div class="reel" id="reel2">🍒</div>
        <div class="reel" id="reel3">🍒</div>
    </article>

        <button type="submit" name="play" id="spinButton">Spin!</button>


    <div id="result"><p>Lancer la machine !</p></div>

    <script src="<?= "/sources/js/slot_machine.js?v=" . filemtime(ROOT."/sources/js/slot_machine.js") ?>"></script>
</section>

<?php
$mainContent = ob_get_clean();