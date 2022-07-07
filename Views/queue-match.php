<!-- Header/Navbar -->
<?php
    $titre_page = "Fil d'attente";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once("../Models/personnage.php");
    require_once("../Models/utilisateur.php");
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
        <div class="queue-content">
            <h5>Actuellement en attente dans votre équipe... </h5>
            <div class="row">
                <div class="col-sm d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par _pseudo_">
                        <div class="card-body left">
                            <p class="card-text">Pseudo utilisateur</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm d-flex justify-content-center">
                </div>                
                <div class="col-sm d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par _pseudo_">
                        <div class="card-body left">
                            <p class="card-text">Pseudo utilisateur</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par _pseudo_">
                        <div class="card-body left">
                            <p class="card-text">Pseudo utilisateur</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm d-flex justify-content-center">
                </div>                
                <div class="col-sm d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par _pseudo_">
                        <div class="card-body left">
                            <p class="card-text">Pseudo utilisateur</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <br>
                <div class="col-sm d-flex justify-content-center">
                </div>
                <?php 
                if($_SESSION['statut_connexion'] == true) {
                    $utilisateur = get_pseudo($_SESSION['utilisateur_id']);
                    if(get_illustration($_SESSION['dernier_personnage_utilise']) !=null) {
                        $dernier_personnage_illustration = "data:image/jpeg;base64,".base64_encode(get_illustration($_SESSION['dernier_personnage_utilise']));
                    } else {
                        $dernier_personnage_illustration = "assets/images/illustration-placeholder.png";
                    }
                } else {
                    $utilisateur = "Invité-". random_int(100000, 999999);
                    $dernier_personnage_illustration = "assets/images/illustration-placeholder.png";
                }
                ?> 
                <div class="col-sm d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="<?php echo $dernier_personnage_illustration ?>" alt="Personnage utilisé par <?php echo $utilisateur ?>">
                            <div class="card-body left">
                                <p class="card-text"><?php echo $utilisateur ?></p>
                            </div>
                        </div>
                </div>                
                <div class="col-sm d-flex justify-content-center">
                </div>
            </div>
            <div class="text-center mt-4 mb-3">
                <button type="submit" name="submit" class="form-btn">Quitter la file d'attente</button>
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
