<!-- Header/Navbar -->
<?php
    $titre_page = "Utilisateur";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once("../Core/Core.php");
    redirection_si_non_connecte($_SESSION['statut_connexion']);
    require_once("../Models/utilisateur.php");
    require_once("../Models/personnage.php");
    require_once("../Models/race.php");
    $uri = $_SERVER['REQUEST_URI']; 
    $identifiant_utilisateur = $_GET['u'];
    $identifiant_perso_1 = get_personnage_1($identifiant_utilisateur);
    $identifiant_perso_2 = get_personnage_2($identifiant_utilisateur);
    $identifiant_perso_3 = get_personnage_3($identifiant_utilisateur);
?>

<body>
<!-- Container avec les informations de l'utilisateur -->
<div class="container-informations">
  <div class="row">
    <!-- Illustration du dernier personnage utilisé -->
    <div class="picture-container">
      <img src="assets/images/illustration-placeholder.png" alt="illustration du dernier personnage utilisé">
      <br>
      <br>
      <p class="center-text">Dernier personnage utilisé: <p>
    </div>
    <!-- Informations de l'utilisateurs -->
    <div class="informations-utilisateur">
      <div class="informations-header">
        <div id="informations-header-title">
          <h1>Informations utilisateur</h1>
        </div>
        <hr>
        <p class="informations-header-content">Nom utilisateur: <?php echo get_pseudo($identifiant_utilisateur) ?></p>
        <p class="informations-header-content">Club: <?php echo get_club_nom($identifiant_utilisateur) ?></p>
        <p class="informations-header-content">Dernière connexion: dd/mm/yyyy hh:mm (il faudra modifier la base de données pour cela)</p>
        <p class="informations-header-content">Dernier match (date + score): N/A </p>
        <p class="informations-header-content">Nombre de matchs joués: N/A </p>
        <p class="informations-header-content">Nombre de victoires : N/A</p>
      </div>
    </div>
  </div>
</div>
<hr>
<br>

<?php
if(isset($identifiant_perso_1)) {
?>
<!-- Personnages et leurs caractéristiques de l'utilisateur -->
<h1 class="margin-title"> Personnages de l'utilisateur: </h1>
<br>
<div class=row>
  <!-- Carte personnage 1 -->
  <div class="col-lg-4">
    <div class="card personnage-container" id="card-1">
    <?php
    if(get_illustration($identifiant_perso_1)!=null) {
      echo '<img class="card-img-top img-illustration" src="data:image/jpeg;base64,'.base64_encode(get_illustration($identifiant_perso_1)).'" alt="Profil du personnage 1"/>';
    } else {
      echo '<img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">';
    }
    ?>
      <div class="card-body">
        <h5 class="personnage-title">Personnage 1: <?php echo get_nom_personnage($identifiant_perso_1)?></h5>
        <div id="circle"><?php echo get_niveau($identifiant_perso_1)?></div>
        <hr>
        <div class="text-left">
        <p class="card-text">Race: <?php echo get_nom_race(get_race_id($identifiant_perso_1))?></p>
          <br>
          <p class="card-text">Club: </p>
          <br>
          <p class="card-text">Capacité 1: N/A </p>
          <br>
          <p class="card-text">Capacité 2: N/A </p>
          <br>
          <p class="card-text">Nombre de matchs: N/A </p>
          <br>
          <p class="card-text">Nombre de victoires: N/A </p>
          <br>
        </div>
      </div>
    </div>
  </div>
  <?php
  if(isset($identifiant_perso_2)) {
  ?>
  <!-- Carte personnage 2 -->
  <div class="col-lg-4">
    <div class="card personnage-container" id="card-1">
    <?php
    if(get_illustration($identifiant_perso_2)!=null) {
      echo '<img class="card-img-top img-illustration" src="data:image/jpeg;base64,'.base64_encode(get_illustration($identifiant_perso_2)).'" alt="Profil du personnage 2"/>';
    } else {
      echo '<img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°2">';
    }
    ?>
      <div class="card-body">
        <h5 class="personnage-title">Personnage 2: <?php echo get_nom_personnage($identifiant_perso_2)?></h5>
        <div id="circle"><?php echo get_niveau($identifiant_perso_2)?></div>
        <hr>
        <div class="text-left">
          <p class="card-text">Race: <?php echo get_nom_race(get_race_id($identifiant_perso_2))?></p>
          <br>
          <p class="card-text">Club: </p>
          <br>
          <p class="card-text">Capacité 1: </p>
          <br>
          <p class="card-text">Capacité 2: </p>
          <br>
          <p class="card-text">Nombre de matchs: </p>
          <br>
          <p class="card-text">Nombre de victoires: </p>
          <br>
        </div>
      </div>
    </div>
  </div>  
  <?php
  }
  if(isset($identifiant_perso_3)) {
  ?>
  <!-- Carte personnage 3 -->
  <div class="col-lg-4">
    <div class="card personnage-container" id="card-1"5>
    <?php
    if(get_illustration($identifiant_perso_3)!=null) {
      echo '<img class="card-img-top img-illustration" src="data:image/jpeg;base64,'.base64_encode(get_illustration($identifiant_perso_3)).'" alt="Profil du personnage 3"/>';
    } else {
      echo '<img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°3">';
    }
    ?>
      <div class="card-body">
        <h5 class="personnage-title">Personnage 3: <?php echo get_nom_personnage($identifiant_perso_3)?></h5>
        <div id="circle"><?php echo get_niveau($identifiant_perso_3)?></div>
        <hr>
        <div class="text-left">
          <p class="card-text">Race: <?php echo get_nom_race(get_race_id($identifiant_perso_3))?></p>
          <br>
          <p class="card-text">Club: </p>
          <br>
          <p class="card-text">Capacité 1: </p>
          <br>
          <p class="card-text">Capacité 2: </p>
          <br>
          <p class="card-text">Nombre de matchs: </p>
          <br>
          <p class="card-text">Nombre de victoires: </p>
          <br>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
  ?>
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