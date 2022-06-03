<!-- Header/Navbar -->
<?php
    $titre_page = "Fil d'attente";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<body>
<div class="queue-form-container">
    <!-- Formulaire de fil d'attente -->
    <form class="creation-form" action="Controllers/queue.php">
        <div class="label-connexion-head">
            <h1>Fil d'attente</h1>
            <hr>
            <h3>En attente de plus de joueurs... <h2>
            <br>
        </div>
        <div class="connexion-content">
            <div class="row">
                <h5>Actuellement en attente dans votre équipe... </h5>
                <div class="grid-caracteristique">
                    <div class="div-caracteristiques">
                        <div class="cardfloat-left" style="width: 18rem;">
                            <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par _pseudo_">
                            <div class="card-body left">
                                <p class="card-text">Pseudo utilisateur</p>
                            </div>
                        </div>
                    </div>
                    <div class="div-caracteristiques">
                    </div>
                    <div class="div-caracteristiques">
                        <div class="card float-right" style="width: 18rem;">
                            <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par _pseudo_">
                            <div class="card-body">
                                <p class="card-text">Pseudo utilisateur</p>
                            </div>
                        </div>
                    </div>
                    <div class="div-caracteristiques">
                    <div class="card float-left" style="width: 18rem;">
                            <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par _pseudo_">
                            <div class="card-body">
                                <p class="card-text">Pseudo utilisateur</p>
                            </div>
                        </div>
                    </div>
                    <div class="div-caracteristiques">
                    </div>  
                    <div class="div-caracteristiques">
                        <div class="card float-right" style="width: 18rem;">
                            <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par _pseudo_">
                            <div class="card-body">
                                <p class="card-text">Pseudo utilisateur</p>
                            </div>
                        </div>
                    </div>
                    <div class="div-caracteristiques">
                    </div>
                    <div class="div-caracteristiques">
                    <div class="card float-middle" style="width: 18rem;">
                            <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par _pseudo_">
                            <div class="card-body">
                                <p class="card-text">Vous</p>
                            </div>
                        </div>
                    </div>
                    <div class="div-caracteristiques">
                    </div>
                </div>
                <div class="text-center mt-4 mb-3">
                    <button type="submit" name="submit" class="form-btn">Quitter la file d'attente</button>
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
