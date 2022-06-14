<!-- Header/Navbar -->
<?php
    $titre_page = "Sélection de personnage";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once("../Core/Core.php");
    redirection_si_non_connecte($_SESSION['statut_connexion']);
?>

<body>
<div class="personnage-creation-form-container">
    <!-- Sélection de personnage -->
    <form class="creation-form" action="Controllers/modifier-personnage.php">
        <div class="label-connexion-head">
            <h1>Sélection de personnage</h1>
            <hr>
            <h3>Veuillez sélectionner un personnage en cliquant dessus <h2>
            <br>
        </div>
        <div class="connexion-content">
            <div class="liste-personnage-container">
                <div class=row>
                    <!-- Carte personnage 1 -->
                    <div class="col-lg-4">
                        <div class="card personnage-container">
                            <div class="ticking-box-container">
                                <div class="ticking-box" id="tick-box-1">
                                    <svg class="tick svg-1" xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </div>
                                <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">
                            </div>
                            <div class="card-body">
                                <h5 class="personnage-title">Personnage 1</h5>
                                <div id="circle">1</div>
                                <hr>
                                <div class="text-left">
                                    <p class="card-text">Race: </p>
                                    <br>
                                    <p class="card-text">Club: </p>
                                    <br>
                                    <p class="card-text">Capacité 1: </p>
                                    <br>
                                    <p class="card-text">Capacité 2: </p>
                                    <br>
                                </div>
                                <div class="card-footer"><button type="button" class="card-button-footer tick-1">Choisis-moi !</button</div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- Carte personnage 2 -->
                    <div class="col-lg-4">
                        <div class="card personnage-container">
                            <div class="ticking-box-container">
                                <div class="ticking-box" id="tick-box-2">
                                    <svg class="tick invisible svg-2" xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </div>
                                <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">
                            </div>
                                <div class="card-body">
                                    <h5 class="personnage-title">Personnage 2</h5>
                                    <div id="circle">1</div>
                                    <hr>
                                    <div class="text-left">
                                        <p class="card-text">Race: </p>
                                        <br>
                                        <p class="card-text">Club: </p>
                                        <br>
                                        <p class="card-text">Capacité 1: </p>
                                        <br>
                                        <p class="card-text">Capacité 2: </p>
                                        <br>
                                    </div>
                                    <div class="card-footer"><button type="button" class="card-button-footer tick-2">Choisis-moi !</button</div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <!-- Carte personnage 3 -->
                    <div class="col-lg-4">
                        <div class="card personnage-container">
                            <div class="ticking-box-container">
                                <div class="ticking-box" id="tick-box-3">
                                    <svg class="tick invisible svg-3" xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </div>
                                <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">
                                </div>                            
                                    <div class="card-body">
                                        <h5 class="personnage-title">Personnage 3</h5>
                                        <div id="circle">1</div>
                                        <hr>
                                        <div class="text-left">
                                            <p class="card-text">Race: </p>
                                            <br>
                                            <p class="card-text">Club: </p>
                                            <br>
                                            <p class="card-text">Capacité 1: </p>
                                            <br>
                                            <p class="card-text">Capacité 2: </p>
                                            <br>
                                        </div>
                                        <div class="card-footer"><button type="button" class="card-button-footer tick-3">Choisis-moi !</button</div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>
