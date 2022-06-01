<!-- Header/Navbar -->
<?php
    $titre_page = "Club - ";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<body>
<!-- Container contenant les informations du club -->
<div class="container-informations">
  <div class="informations-club">
    <!-- informations du club -->
    <div class="informations-header">
      <div id="informations-header-title">
        Informations club
      </div>
      <hr>
      <p class="informations-header-content">Nom du club:</p>
      <p class="informations-header-content">Division: </p>
      <p class="informations-header-content">Nombre de joueurs: </p>
      <p class="informations-header-content">Dernier match (date + score): </p>
    </div>
  </div>
</div>
<div class="text-right padding-right-short">
    <!-- Lien pour modifier les informations du club (à ne rendre accessible qu'au propriétaire) -->
    <a href="modifier-club.php" class="link-info">
        Modifier les informations du club
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            
        </svg>
    </a>
</div>
<hr>
<br>
<!-- Liste des personnages appartenant au club avec quelques caractéristiques -->
<h1> Personnages appartenant au club (9): </h1>
<br>
<div class="liste-personnage-container">
  <div class=row>
    <!-- Personnage 1 -->
    <div class="col-4 ">
      <div class="card personnage-container-1" id="card-1">
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="image de personnage par défaut">
        <div class="card-body">
          <h5 class="personnage-title">Personnage 1</h5>
          <div id="circle">1</div>
          <div class="text-left">
            <br>
            <p class="card-text">Race: </p>
            <p class="card-text">Club: </p>
            <p class="card-text">Capacité 1: </p>
            <p class="card-text">Capacité 2: </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Personnage 2... -->
    <div class="col-4">
      <div class="card personnage-container-2" id="card-1">
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="image de personnage par défaut">
        <div class="card-body">
          <h5 class="personnage-title">Personnage 2</h5>
          <div id="circle">1</div>
          <div class="text-left">
            <br>
            <p class="card-text">Race: </p>
            <p class="card-text">Club: </p>
            <p class="card-text">Capacité 1: </p>
            <p class="card-text">Capacité 2: </p>
          </div>
        </div>
      </div>  
    </div>  
    <div class="col-4">
      <div class="card personnage-container-1" id="card-1"5>
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="image de personnage par défaut">
        <div class="card-body">
          <h5 class="personnage-title">Personnage 3</h5>
          <div id="circle">1</div>
          <div class="text-left">
            <br>
            <p class="card-text">Race: </p>
            <p class="card-text">Club: </p>
            <p class="card-text">Capacité 1: </p>
            <p class="card-text">Capacité 2: </p>
          </div>
        </div>
      </div>
    </div>
  </div>    
</div>
<div class="liste-personnage-container">
  <div class=row>
    <div class="col-4 ">
      <div class="card personnage-container-1" id="card-1">
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="image de personnage par défaut">
        <div class="card-body">
          <h5 class="personnage-title">Personnage 1</h5>
          <div id="circle">1</div>
          <div class="text-left">
            <br>
            <p class="card-text">Race: </p>
            <p class="card-text">Club: </p>
            <p class="card-text">Capacité 1: </p>
            <p class="card-text">Capacité 2: </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card personnage-container-2" id="card-1">
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="image de personnage par défaut">
        <div class="card-body">
          <h5 class="personnage-title">Personnage 2</h5>
          <div id="circle">1</div>
          <div class="text-left">
            <br>
            <p class="card-text">Race: </p>
            <p class="card-text">Club: </p>
            <p class="card-text">Capacité 1: </p>
            <p class="card-text">Capacité 2: </p>
          </div>
        </div>
      </div>  
    </div>  
    <div class="col-4">
      <div class="card personnage-container-1" id="card-1">
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="image de personnage par défaut">
        <div class="card-body">
          <h5 class="personnage-title">Personnage 3</h5>
          <div id="circle">1</div>
          <div class="text-left">
            <br>
            <p class="card-text">Race: </p>
            <p class="card-text">Club: </p>
            <p class="card-text">Capacité 1: </p>
            <p class="card-text">Capacité 2: </p>
          </div>
        </div>
      </div>
    </div>
  </div>    
</div>
<div class="liste-personnage-container">
  <div class=row>
    <div class="col-4 ">
      <div class="card personnage-container-1" id="card-1">
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="image de personnage par défaut">
        <div class="card-body">
          <h5 class="personnage-title">Personnage 1</h5>
          <div id="circle">1</div>
          <div class="text-left">
            <br>
            <p class="card-text">Race: </p>
            <p class="card-text">Club: </p>
            <p class="card-text">Capacité 1: </p>
            <p class="card-text">Capacité 2: </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card personnage-container-2" id="card-1">
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="image de personnage par défaut">
        <div class="card-body">
          <h5 class="personnage-title">Personnage 2</h5>
          <div id="circle">1</div>
          <div class="text-left">
            <br>
            <p class="card-text">Race: </p>
            <p class="card-text">Club: </p>
            <p class="card-text">Capacité 1: </p>
            <p class="card-text">Capacité 2: </p>
          </div>
        </div>
      </div>  
    </div>  
    <div class="col-4">
      <div class="card personnage-container-1" id="card-1"5>
        <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="image de personnage par défaut">
        <div class="card-body">
          <h5 class="personnage-title">Personnage 3</h5>
          <div id="circle">1</div>
          <div class="text-left">
            <br>
            <p class="card-text">Race: </p>
            <p class="card-text">Club: </p>
            <p class="card-text">Capacité 1: </p>
            <p class="card-text">Capacité 2: </p>
          </div>
        </div>
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