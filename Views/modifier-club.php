<!-- Header/Navbar -->
<?php
    $titre_page = "Modification du club";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once("../Core/Core.php");
    redirection_si_non_connecte($_SESSION['statut_connexion']);
?>

<body>
<!-- Container contenant les informations du club à modifier -->
<div class="container-informations">
    <form class="edit-club-form" action="Controllers/edit-club.php">
        <div class="label-connexion-head">
            <h1>Modification du nom du club</h1>
            <hr>
            <h3>Veuillez saisir les informations obligatoires (*): <h2>
            <br>
        </div>
        <div class="club-edit-content">
            <div class="row">
                <div class="mb-4">
                    <label for="nom-club" class="form-label">Nom du club *:</label><br>
                    <input type="text" id="nom-club" class="form-control" name="nom-club" placeholder="Ancien nom du club..." required>
                </div>
                <div class="text-center mt-4 mb-3">
                    <button type="submit" name="submit" class="form-btn">Modifier</button>
                </div>
            </div>
        </div>
    </form> 
</div>
<hr>
<br>
<!-- Liste des personnages appartenant au club avec quelques caractéristiques (possibilité de les supprimer du club) -->
<h1 class="personnages-title"> Personnages appartenant au club (1): </h1>
<br>
<div class="liste-personnage-container">
    <div class="card" id="card-2">
        <div class="row no-gutters">
            <div class="col-sm-5">
                <div class="card-illustration">
                    <img class="card-img" src="assets/images/illustration-placeholder.png" alt="Illustration du personnage">
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card-body">
                    <div class="row no-gutters">
                        <h5 class="card-title">Nom du personnage <div id="circle"> 1 </div></h5>
                        <br>
                        <hr>
                        <div class="col-sm-7">
                            <br>
                            <p class="card-text">Nom Utilisateur</p>
                            <br>
                            <br>
                            <p class="card-text">Dernière connexion le: </p>
                            <br>
                            <br>
                            <p class="card-text">Dernière victoire le:</p>
                            <br>
                            <br>
                            <p class="card-text">Nombre de victoires:</p>
                        </div>
                        <div class="col-sm-5">
                            <p class="card-text">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger icon-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"></path>
                                    </svg>
                                </button>
                            </div>
                            </p>
                        </div>
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