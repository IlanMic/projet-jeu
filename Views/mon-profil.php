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
    <!-- Affichage du dernier personnage utilisé si l'utilisateur en possède --> 
    <?php
        if(compter_personnages_utilisateur($_SESSION['utilisateur_id']) >0 ){
            ?>
                <div class="picture-container">
                <img src="assets/images/illustration-placeholder.png" alt="illustration du dernier personnage utilisé">
                <br>
                <br>
                <p class="center-text">Dernier personnage utilisé: <p>
                </div>
            <?php
        }
    ?>

    <!-- Informations de l'utilisateurs -->
    <div class="informations-utilisateur">
      <div class="informations-header">
        <div id="informations-header-title">
          <h1>Informations utilisateur</h1>
        </div>
        <hr>
        <!-- Nom de l'utilisateur -->
        <p class="informations-header-content">Nom utilisateur:
        <?php
          if(isset($_SESSION['utilisateur_pseudo'])) {
            echo $_SESSION['utilisateur_pseudo']; 
          }else {
            echo "N/A";
          }
        ?>
        </p>
        <!-- Club dont l'utilisateur est propriétaire s'il possède un club premium -->
        <?php
          if($_SESSION['compte_premium'] == 1) {
            $nom_club = trouver_club_proprietaire($_SESSION['utilisateur_id']);
            if(isset($nom_club)){
              ?>
              <p class="informations-header-content">Propriétaire de :
                <?php
                  echo $nom_club;
                ?>
              </p>
            <?php  
            }else{
            ?>
              <p class="informations-header-content">L'utilisateur n'a pas encore créé de club.
              </p>
            <?php  
              }
          } 
        ?>

        <!-- Dernière connexion du joueur -->
        <p class="informations-header-content">Dernière connexion: dd/mm/yyyy hh:mm (il faudra modifier la base de données pour cela)</p>
        <!-- Dernière match du joueur -->
        <p class="informations-header-content">Dernier match (date + score): </p>
        <!-- Nombre de matchs joués par le joueur -->
        <p class="informations-header-content">Nombre de matchs joués</p>
        <!-- Nombre de victoires remportées par le joueur -->
        <p class="informations-header-content">Nombre de victoires</p>
      </div>
    </div>
  </div>
</div>
<hr>
<br>
<!-- Personnages et leurs caractéristiques de l'utilisateur -->
<h1 class="margin-title"> Personnages de l'utilisateur
    (<?php
        echo compter_personnages_utilisateur($_SESSION['utilisateur_id']);
    ?>) :
</h1>
<br>
  <div class=row>
    <!-- Carte personnage 1 -->
    <?php
    //Affichage de la carte de présentation du personnage 1 s'il existe
    if(isset($_SESSION['utilisateur_personnage_1'])){
        ?>
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
        <?php
    //Sinon, carte de création de personnage
    }else{
        ?>
        <div class="col-lg-4">
            <div class="card personnage-container" id="card-1">
                <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">
                <div class="card-body">
                    <h5 class="personnage-title">Aucun personnage créé</h5>
                    <hr>
                    <div class="text-left">
                        <p class="card-text">Veuillez cliquer ci-dessous pour créer votre premier personnage </p>
                    </div>
                </div>
                <div class="card-footer link-container">
                    <a class="link" href="creation-personnage.php">Créer un personnage</a>  
                </div>
            </div>
        </div>
        <?php
    }
    ?>


    <!-- Carte personnage 2 -->

    <!-- Affichage de la carte du second personnage -->
    <?php
    //Création du personnage 2 bloqué car le premier n'a pas encore été créé
    if(!isset($_SESSION['utilisateur_personnage_1'])) {
        ?>
        <div class="col-lg-4">
            <div class="card personnage-container" id="card-1"5>
                <img class="card-img-top" src="assets/images/bloque.png" alt="Personnage n°2 bloqué car les deux premiers personnages n'ont pas été créés">
                    <div class="card-body">
                    <h5 class="personnage-title">La création d'un personnage est nécessaire avant d'en créer un second.</h5>
                    <hr>
                    <div class="text-left">
                        <p class="card-text">Veuillez créer un premier personnages avant de créer ce second personnage. </p>
                        <br>
                    </div>
                </div>
                <div class="card-footer link-container">
                    <p class="card-text">Créer un premier avant de débloquer celui-ci</a>  
                </div>
            </div>
        </div>
    <?php
    //Affichage de la carte de création du second personnage
    }else if(!isset($_SESSION['utilisateur_personnage_2'])){
        ?>
        <div class="col-lg-4">
            <div class="card personnage-container" id="card-1">
                <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°2 en attente de création">
                <div class="card-body">
                    <h5 class="personnage-title">Second personnage non créé</h5>
                    <hr>
                    <div class="text-left">
                        <p class="card-text">Veuillez cliquer ci-dessous pour créer votre second personnage </p>
                    </div>
                </div>
                <div class="card-footer link-container">
                    <a class="link" href="creation-personnage.php">Créer un personnage</a>  
                </div>
            </div>
        </div>
        <?php
    //Affichage du second personnage    
    }else{
        ?>
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
      <?php
    }
    ?>

 


    <!-- Carte personnage 3 -->
    <?php
    //Impossible de débloquer le troisième personnage si le compte n'est pas premium
    if($_SESSION['compte_premium'] == 0 && isset($_SESSION['utilisateur_personnage_1']) && isset($_SESSION['utilisateur_personnage_2'])){
        ?>
            <div class="col-lg-4">
                <div class="card personnage-container" id="card-1"5>
                    <img class="card-img-top" src="assets/images/bloque.png" alt="Personnage n°3 bloqué car compte non premium">
                        <div class="card-body">
                        <h5 class="personnage-title">Le compte premium est nécessaire pour bénéficier d'un troisième personnage</h5>
                        <hr>
                        <div class="text-left">
                            <p class="card-text">Veuillez cliquer ci-dessous pour débloquer un compte premium et débloquer de nouvelles fonctionnalités telles que l'obtention d'un troisième
                                personnage ou la création et gestion de club </p>
                            <br>
                        </div>
                    </div>
                    <div class="card-footer link-container">
                        <a class="link" href="achat-.php">Débloquer un compte premium</a>  
                    </div>
                </div>
            </div>
        <?php
    //Création d'un compte premium si l'utilisateur a un compte premium
    }else if($_SESSION['compte_premium'] == 1 && isset($_SESSION['utilisateur_personnage_1']) && isset($_SESSION['utilisateur_personnage_2'])) {
        ?>
        <div class="col-lg-4">
            <div class="card personnage-container" id="card-1">
                <img class="card-img-top" src="assets/images/illustration-placeholder.png" alt="Personnage n°3 en attente de création">
                <div class="card-body">
                    <h5 class="personnage-title">Troisième personnage non créé</h5>
                    <hr>
                    <div class="text-left">
                        <p class="card-text">Veuillez cliquer ci-dessous pour créer votre troisième personnage </p>
                    </div>
                </div>
                <div class="card-footer link-container">
                    <a class="link" href="creation-personnage.php">Créer un personnage</a>  
                </div>
            </div>
        </div>
        <?php
    //Impossible de créer un troisième personnage si les deux précédent ne l'ont pas été 
    }else if(!isset($_SESSION['utilisateur_personnage_1']) || !isset($_SESSION['utilisateur_personnage_2'])){
        ?>
            <div class="col-lg-4">
                <div class="card personnage-container" id="card-1"5>
                    <img class="card-img-top" src="assets/images/bloque.png" alt="Personnage n°3 bloqué car les deux premiers personnages n'ont pas été créés">
                        <div class="card-body">
                        <h5 class="personnage-title">La création de deux personnage est nécessaire avant d'en créer un troisième.</h5>
                        <hr>
                        <div class="text-left">
                            <p class="card-text">Veuillez créer deux premiers personnages avant de créer ce troisième personnage. </p>
                            <br>
                        </div>
                    </div>
                    <div class="card-footer link-container">
                        <p class="card-text">Créer deux personnages avant de débloquer celui-ci</a>  
                    </div>
                </div>
            </div>
        <?php
    }else{
        ?>
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
        <?php
    }
    ?>
</div>    


<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>