<!-- Header/Navbar -->
<?php
    $titre_page = "Fil d'attente";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/personnage.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/utilisateur.php");
?>

<body>
<div class="queue-form-container">
    <!-- Formulaire de fil d'attente -->
    <form class="creation-form" action="Controllers/queue.php">
        <div class="label-connexion-head">
            <h1>Fil d'attente</h1>
            <hr>
            <h3>En attente de l'adversaire <h2>
            <br>
        </div>
        <div class="queue-content">
            <div class="row">
                <div class="col-sm d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                    <?php
                        if(isset($_SESSION['statut_connexion']) && $_SESSION['statut_connexion'] == true) {
                            $pseudo_utilisateur = $_SESSION['utilisateur_pseudo'];
                        } else {
                            $pseudo_utilisateur = "guest_".rand(1111,9999);
                        }
                        if($_SESSION['statut_connexion'] == true && isset($_SESSION['dernier_personnage_utilise']) && $_SESSION['dernier_personnage_utilise'] != null && get_illustration($_SESSION['dernier_personnage_utilise']) != null) {
                            echo '<img class="card-img-top img-illustration" src="data:image/jpeg;base64,'.base64_encode(($_SESSION['dernier_personnage_utilise'])).'" alt="Profil du personnage 1"/>';
                        } else {
                            ?>
                            <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par <?php echo $pseudo_utilisateur ?>">
                            <?php
                        }
                        ?>
                        <div class="card-body left">
                            <p class="card-text"><?php echo $pseudo_utilisateur ?></p>
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
