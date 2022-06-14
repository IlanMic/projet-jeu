<!-- Header/Navbar -->
<?php
    $titre_page = "Utilisateur";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once("../Core/Core.php");
    redirection_si_non_connecte($_SESSION['statut_connexion']);
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
        <p class="informations-header-content">Nom utilisateur:</p>
        <p class="informations-header-content">Club: </p>
        <p class="informations-header-content">Dernière connexion: dd/mm/yyyy hh:mm (il faudra modifier la base de données pour cela)</p>
        <p class="informations-header-content">Dernier match (date + score): </p>
        <p class="informations-header-content">Nombre de matchs joués</p>
        <p class="informations-header-content">Nombre de victoires</p>
      </div>
    </div>
  </div>
</div>
<hr>
<br>
<!-- Personnages et leurs caractéristiques de l'utilisateur -->
<h1 class="margin-title"> Personnages de l'utilisateur: </h1>
<br>
  <div class=row>
    <!-- Carte personnage 1 -->
    <div class="col-lg-4">
      <div class="card personnage-container" id="card-1">
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">
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
            <p class="card-text">Nombre de matchs: </p>
            <br>
            <p class="card-text">Nombre de victoires: </p>
            <br>
          </div>
        </div>
        <div class="card-footer link-container">
          <a class="link" href="modification-personnage.php">Modifier le personnage</a>  
        </div>
      </div>
    </div>
    <!-- Carte personnage 2 -->
    <div class="col-lg-4">
      <div class="card personnage-container" id="card-1">
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°2">
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
            <p class="card-text">Nombre de matchs: </p>
            <br>
            <p class="card-text">Nombre de victoires: </p>
            <br>
          </div>
        </div>
        <div class="card-footer link-container">
          <a class="link" href="modification-personnage.php">Modifier le personnage</a>  
        </div>
      </div>
    </div>  
    <!-- Carte personnage 3 -->
    <div class="col-lg-4">
      <div class="card personnage-container" id="card-1"5>
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°3">
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
            <p class="card-text">Nombre de matchs: </p>
            <br>
            <p class="card-text">Nombre de victoires: </p>
            <br>
          </div>
        </div>
        <div class="card-footer link-container">
          <a class="link" href="modification-personnage.php">Modifier le personnage</a>  
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