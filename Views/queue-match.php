<!-- Header/Navbar -->
<?php
    $titre_page = "Fil d'attente";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/personnage.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/utilisateur.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/match.php");
    if(isset($_SESSION['match_en_attente']) && $_SESSION['match_en_attente'] == true) {
        if(!isset($_SESSION['opposant']) || $_SESSION['opposant'] == null ) {
            ?>
            <meta http-equiv="refresh" content="30">
            <?php
            $match_cree = $_SESSION['match_en_attente_id'];
            if(get_utilisateur_1($match_cree) != $_SESSION['dernier_personnage_utilise'] && get_utilisateur_1($match_cree) != null) {
                $_SESSION['opposant'] = get_utilisateur_1($match_cree);
                $nom_opposant = get_pseudo($_SESSION['opposant']);
                $capitaine_opposant = get_dernier_personnage($_SESSION['opposant']);
                $illustration_capitaine_opposant = get_illustration($_SESSION['opposant']);
            } else if(get_utilisateur_2($match_cree) != $_SESSION['dernier_personnage_utilise'] && get_utilisateur_2($match_cree) != null) {
                $_SESSION['opposant'] = get_utilisateur_2($match_cree);
                $nom_opposant = get_pseudo($_SESSION['opposant']);
                $capitaine_opposant = get_dernier_personnage($_SESSION['opposant']);
                $illustration_capitaine_opposant = get_illustration($_SESSION['opposant']);                
            } else {
                $nom_opposant = "En attente d'adversaire";
                $capitaine_opposant = null;
                $illustration_capitaine_opposant = null;
            }
        } else {
            $nom_opposant = get_pseudo($_SESSION['opposant']);
            $capitaine_opposant = get_dernier_personnage($_SESSION['opposant']);
            $illustration_capitaine_opposant = get_illustration($_SESSION['opposant']);
        }
    } else if(isset($_SESSION['match_en_cours']) && $_SESSION['match_en_cours'] == true) {
        $nom_opposant = get_pseudo($_SESSION['opposant_match']);
        $capitaine_opposant = get_dernier_personnage($_SESSION['opposant_match']);
        $illustration_capitaine_opposant = get_illustration($_SESSION['opposant_match']);
    } else {
        $nom_opposant = "En attente d'adversaire";
        $capitaine_opposant = null;
        $illustration_capitaine_opposant = null;
    }
?>

<body>
<div class="queue-form-container">
    <!-- Formulaire de fil d'attente -->
    <div class="creation-form">
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
                            echo '<img class="card-img-top img-illustration" src="data:image/jpeg;base64,'.base64_encode(get_illustration($_SESSION['dernier_personnage_utilise'])).'" alt="Profil du personnage 1"/>';
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
                        <?php
                        if(isset($_SESSION['match_en_cours']) && $_SESSION['match_en_cours'] == true && $illustration_capitaine_opposant == null) {
                            echo  '<img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage utilisé par <?php echo $nom_opposant ?>">';
                        } else if(isset($_SESSION['match_en_cours'])  && $_SESSION['match_en_cours'] == true && $illustration_capitaine_opposant != null) {
                            echo '<img class="card-img-top img-illustration" src="data:image/jpeg;base64,'.base64_encode($illustration_capitaine_opposant).'" alt="Profil du capitaine de "/>';
                        } else {
                            echo '<img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Image de profil">';
                        }
                        ?>
                        <div class="card-body left">
                            <p class="card-text"><?php echo $nom_opposant ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <form action="../Controllers/Jeu/quitter-queue.php" method="POST">
                <div class="text-center mt-4 mb-3">
                    <button type="submit" name="submit" class="form-btn">Quitter la file d'attente</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>
