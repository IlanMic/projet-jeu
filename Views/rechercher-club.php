<!-- Header/Navbar -->
<?php
    $titre_page = "Recherche de club";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once("../Core/Core.php");
    require_once("../Models/club.php");
    require_once("../Models/utilisateur.php");
    require_once("../Models/poule.php");
    require_once("../Models/personnage.php");
    redirection_si_non_connecte($_SESSION['statut_connexion']);
?>

<body>
<!-- Formulaire pour rechercher un club selon son nom -->
<div class="container-rechercher">
    <form class="search-club-form" action="rechercher-club.php" method="POST">
        <div class="label-connexion-head">
            <h1>Saisissez le nom du club que vous cherchez</h1>
            <hr>
            <h3>Veuillez saisir les informations obligatoires (*) : <h2>
            <br>
        </div>
        <div class="club-search-content">
            <div class="row">
                <div class="mb-4">
                    <label for="nom-club" class="form-label">Nom du club *:</label><br>
                    <input type="text" id="nom_club" class="form-control" name="nom_club" placeholder="Ancien nom du club..." >
                </div>
                <div class="text-center mt-4 mb-3">
                    <button type="submit" name="submit" class="form-btn">Rechercher</button>
                </div>
            </div>
        </div>
    </form> 
</div>
<hr>
<br>
<!-- Liste des personnages appartenant au club avec quelques caractéristiques (possibilité de les supprimer du club) -->
<h1 class="club-title"> Clubs correspondant à la recherche (?): </h1>
<br>
<?php
if(isset($_POST['nom_club'])) {
    $liste_club = get_all_clubs_from_name($_POST['nom_club']);
    if (is_array($liste_club) || is_object($liste_club)) {
        foreach($liste_club as $club) {
            $club_id = $club['id_club'];
            $poule_id = get_poule_from_club_id($club['id_club']);
            if(isset($poule_id)) {
                $poule_nom = get_nom_poule($poule_id);
            } else {
                $poule_nom = "Ce club n'a pas encore rejoint une division.";
            }
        ?>
        <div class="card" id="card-2">
            <div class="row no-gutters">
                <div class="card-body thin-margin">
                    <h5 class="card-title"><a href="profil-club.php?c=<?php echo $club_id ?>"><?php echo $club['nom_club']?></a></h5>
                    <hr>
                    <div class="row">
                        <div class="col-sm-7">
                            <br>
                            <p class="card-text">Propriétaire: <a href="profil-utilisateur.php?u=<?php echo $club['proprietaire_id'] ?>"><?php echo get_pseudo($club['proprietaire_id']) ?></a></p>
                            <br>
                            <br>
                            <p class="card-text">Nombre de joueurs : <?php echo compter_personnages_club($club['id_club']) ?>  </p>
                            <br>
                            <br>
                            <p class="card-text">Division actuelle: <?php echo $poule_nom ?></p>
                        </div>
                        <div class="col-sm-5">
                            <div class ="join-club-btn">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#join-club">
                                Rejoindre ce club ?
                                </button>
                                <!-- Formulaire pour que le personnage sélectionné rejoigne le club -->
                                <form action="../Controllers/rejoindre-club.php" method="POST">
                                    <!-- Modal -->
                                    <div class="modal fade" id="join-club" tabindex="-1" role="dialog" aria-labelledby="Rejoindre-ce-club" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Séléctionnez le personnage qui rejoindra ce club</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" name="personnageid" id="personnageid" value="<?php echo $_SESSION['utilisateur_personnage_1'] ?>" checked>
                                                <label class="form-check-label" for="personnage-1">
                                                    <?php echo get_nom_personnage($_SESSION['utilisateur_personnage_1']); ?>
                                                </label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" name="personnageid" id="personnageid" value="<?php echo $_SESSION['utilisateur_personnage_2'] ?>">
                                                <label class="form-check-label" for="personnage-2">
                                                    <?php echo get_nom_personnage($_SESSION['utilisateur_personnage_2']); ?>
                                                </label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" name="personnageid" id="personnageid" value="<?php echo $_SESSION['utilisateur_personnage_3'] ?>">
                                                <label class="form-check-label" for="personnage-3">
                                                    <?php echo get_nom_personnage($_SESSION['utilisateur_personnage_3']); ?>
                                                </label>
                                                <input type="hidden" name="club_id" id="club_id" value="<?php echo $club["id_club"]; ?>">
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Rejoindre le club avec ce personnage</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    }

}
?>

<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>