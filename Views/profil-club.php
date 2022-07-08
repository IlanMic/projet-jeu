<!-- Header/Navbar -->
<?php
    $titre_page = "Club - ";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/Core.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/club.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/poule.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/personnage.php");
    redirection_si_non_connecte($_SESSION['statut_connexion']);
    $uri = $_SERVER['REQUEST_URI']; 
    $identifiant_club = $_GET['c'];
?>

<body>
<!-- Container contenant les informations du club -->
<div class="container-informations">
  <div class="informations-club">
    <!-- informations du club -->
    <div class="informations-header">
      <div id="informations-header-title">
        <h1>Informations club</h1>
      </div>
      <hr>
      <?php
        $poule_id = get_poule_from_club_id($identifiant_club);
        if(isset($poule_id)) {
            $poule_nom = get_nom_poule($poule_id);
        } else {
            $poule_nom = "Ce club n'a pas encore rejoint une division.";
        }
      ?>
      <p class="informations-header-content">Nom du club: <?php echo get_club($identifiant_club) ?></p>
      <p class="informations-header-content">Division: <?php echo $poule_nom; ?></p>
      <p class="informations-header-content">Nombre de joueurs: <?php echo compter_personnages_club($identifiant_club); ?> </p>
      <p class="informations-header-content">Dernier match (date + score): </p>
    </div>
  </div>
</div>
<?php
if($_SESSION['utilisateur_id'] == $identifiant_club) {
?>
<div class="text-right padding-right-short">
    <!-- Lien pour modifier les informations du club -->
    <a href="modifier-club.php" class="link-info">
        Modifier les informations du club
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            
        </svg>
    </a>
</div>
<?php
}
?>
<hr>
<br>
<?php
    $liste_personnages = get_all_personnages_club($identifiant_club);
    foreach($liste_personnages as $personnage){
        ?>
        <div class="card card-list" id="card-2">
            <div class="row no-gutters">
                <div class="col-sm-5">
                    <div class="card-illustration">
                     <?php 
                    if($personnage['illustration']!=null) {
                      echo '<img class="card-img-top img-illustration" src="data:image/jpeg;base64,'.base64_encode($personnage['illustration']).'" alt="Profil du personnage 1"/>';
                    } else {
                      echo '<img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">';
                    }
                    ?>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <h5 class="card-title"><?php echo $personnage['nom_personnage']; ?> <div id="circle"> <?php echo $personnage['niveau']; ?> </div></h5>
                            <br>
                            <hr>
                            <div class="col-sm-7">
                                <br>
                                <p class="card-text">Utilisateur = <?php echo get_pseudo(get_joueur($personnage['id_personnage'])); ?></p>
                                <br>
                                <br>
                                <p class="card-text">Dernière connexion de l'utilisateur le:
                                  <?php if(get_derniere_connexion(get_joueur($personnage['id_personnage'])) != null) {
                                    echo get_derniere_connexion(get_joueur($personnage['id_personnage'])); 
                                  } else {
                                      echo "N/A";
                                  } ?>
                                </p>
                                <br>
                                <br>
                                <p class="card-text">Dernière victoire le:</p>
                                <br>
                                <br>
                                <p class="card-text">Nombre de victoires:</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>