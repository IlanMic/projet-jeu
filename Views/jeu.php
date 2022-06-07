<!-- Header/Navbar -->
<?php
    $titre_page = "Jeu";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<body class="page-jeu">
<div class="game-container">
    <div class="timer-container">
        <div id="timer"><span>En attente du démarrage de la partie...<span></div>
    </div>
    <div class="capacites-container">
        <div id="capacite-1">
            <button type="button" class="button-capacites" id="capacite-a" onclick="activateCapacite()"><img id="image-capacite-1" src="assets/images/magie.png" alt="capacité magique"></button>
        </div>
        <div id="capacite-2">
            <button type="button" class="button-capacites" id="capacite-e" onclick="activateCapacite()"><img id="image-capacite-2" src="assets/images/fourberie.png" alt="fourberie"></button>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>