<nav class="navbar navbar-expand-lg navbar-inverse">
    <div class="navbar ">
      <div class="col flex-container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="nav navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                </svg>
                <i class="bi bi-house-fill"></i> Page d'accueil 
              </a>
            </li>
            <?php if(isset($_SESSION['statut_connexion']) && $_SESSION['statut_connexion'] == true) { ?>
                <li class="nav-item">
                  <a class="nav-link" href="mon-profil.php">
                    <p>
                    <svg class="svg-profile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                      <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/>
                    </svg>
                      <?php
                      require_once("../Models/utilisateur.php");
                      if(isset($_SESSION['utilisateur_pseudo'])) {
                        echo $_SESSION['utilisateur_pseudo'];
                      }
                      ?>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="btn dropdown-toggle btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Club
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <?php
                        if($_SESSION['compte_premium'] == 1){
                          if(empty(get_club_nom($_SESSION['utilisateur_id']))){
                            echo '<a class="nav-link" href="creation-club.php">Créer un club</a>';
                          }else{
                            $club = $_SESSION['club_id'];
                            ?>
                              <a class="nav-link" href="modification-club.php?club=<?php echo $club; ?>">Modifier le club</a>
                              <a class="nav-link" href="profil-club.php?c=<?php echo $club; ?>">Mon club</a>
                            <?php
                          }
                        }
                      ?>
                      <a class="nav-link" href="rechercher-club.php">Recherche club</a>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="creation-personnage.php">Création de personnage</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="selection-personnage.php">Sélection de personnage</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="queue-match.php">Fil d'attente de match</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="jeu.php">Page de jeu</a>
                </li>
                <li class="nav-item">
                <?php if($_SESSION['statut_connexion'] == true) { ?>
                  <form action="../Controllers/deconnexion.php" method="post">
                    <button class="logout-btn" type="submit">Déconnexion</button>
                  </form>
                <?php } ?>
                </li>
            <?php }else{ 
              $_SESSION['statut_connexion'] = false;
              ?>
              <li class="nav-item">
                <a class="nav-link" href="#">Classement des meilleurs clubs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Classement des meilleurs personnages</a>
              </li>
            <?php } ?>    
          </ul>
        </div>
        <div>

            <a class="nav-link" href="regles-jeu.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
            </svg>
          </a>
        </div>
      </div>  
    </div>
</nav>