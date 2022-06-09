<!-- Header/Navbar -->
<?php
    $titre_page = "Jeu";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<body class="page-jeu">
<div class="game-container .container-fluid">
    <div class="row no-gutters">
        <div class="col-4 justify-content-center team thin-margin">
            Equipe 1
            <div class="row no-gutters">
                <div class="col-md-15 col-sm-3 d-flex justify-content-center">
                    <img class="team-img" src="assets/images/illustration-placeholder.png" alt="illustration de personnage">
                </div>
                <div class="col-md-15 col-sm-3 d-flex justify-content-center">
                    <img class="team-img" src="assets/images/illustration-placeholder.png" alt="illustration de personnage">
                </div>
                <div class="col-md-15 col-sm-3 d-flex justify-content-center">
                    <img class="team-img" src="assets/images/illustration-placeholder.png" alt="illustration de personnage">
                </div>
                <div class="col-md-15 col-sm-3 d-flex justify-content-center">
                    <img class="team-img" src="assets/images/illustration-placeholder.png" alt="illustration de personnage">
                </div>
                <div class="col-md-15 col-sm-3 d-flex justify-content-center">
                    <img class="team-img" src="assets/images/illustration-placeholder.png" alt="illustration de personnage">
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="timer-container">
                <div id="timer">
                    <span>90:00<span>
                </div>
            </div>
        </div>
        <div class="col-4 team justify-content-center">
            Equipe 2
            <div class="row no-gutters">
                <div class="col-md-15 col-sm-3 d-flex justify-content-center">
                    <img class="team-img" src="assets/images/illustration-placeholder.png" alt="illustration de personnage">
                </div>
                <div class="col-md-15 col-sm-3 d-flex justify-content-center">
                    <img class="team-img" src="assets/images/illustration-placeholder.png" alt="illustration de personnage">
                </div>
                <div class="col-md-15 col-sm-3 d-flex justify-content-center">
                    <img class="team-img" src="assets/images/illustration-placeholder.png" alt="illustration de personnage">
                </div>
                <div class="col-md-15 col-sm-3 d-flex justify-content-center">
                    <img class="team-img" src="assets/images/illustration-placeholder.png" alt="illustration de personnage">
                </div>
                <div class="col-md-15 col-sm-3 d-flex justify-content-center">
                    <img class="team-img" src="assets/images/illustration-placeholder.png" alt="illustration de personnage">
                </div>
            </div>
        </div>
    </div>
    <div class="gaming-screen">

    </div>
    <div class="row no-gutters">
        <div class="col-6 d-flex justify-content-center">
            <div id="capacite-1">
                <button type="button" class="button-capacites" id="capacite-a" onclick="activateCapacite()"><img id="image-capacite-1" src="assets/images/magie.png" alt="capacité magique"></button>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-center">
            <div id="capacite-2">
                <button type="button" class="button-capacites" id="capacite-e" onclick="activateCapacite()"><img id="image-capacite-2" src="assets/images/fourberie.png" alt="fourberie"></button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>