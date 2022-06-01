<!-- Header/Navbar -->
<?php
    $titre_page = "Club - ";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<body>
<!-- Container contenant les informations du club -->
<div class="container-informations">
    <form class="edit-club-form" action="Controllers/edit-club.php">
        <div class="label-connexion-head">
            <h1>Modification du nom du club</h1>
            <hr>
            <h3>Veuillez saisir les informations obligatoires (*) afin de vous connecter: <h2>
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
<!-- Liste des personnages appartenant au club avec quelques caractéristiques -->
<h1 class="personnages-title"> Personnages appartenant au club (9): </h1>
<br>
<div class="liste-personnage-container">
  <div class=row>
        <div class="card mb-3 horizontal-card">
            <div class="row no-gutters">
                <div class="col-md-1 picture-placeholder">
                    <img src="assets/images/illustration-placeholder.png" class="card-img" alt="illustation du personnage">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="bloc-card verticalLine">
                            <h5 class="card-title">Personnage 1</h5>
                            <p class="card-text">Utilisateur 1</p>
                        </div>
                        <div class="col-md-2 verticalLine">
                            <p class="card-text">Dernière connexion le...</p>
                        </div>
                        <div class="col-md-2 verticalLine">
                            <p class="card-text"><small class="text-muted">Dernière victoire le...</small></p>
                        </div>
                        <div class="col-md-2 verticalLine">
                            <p class="card-text"><small class="text-muted">Niveau: </small></p>
                        </div>
                        <div class="col-md-2 verticalLine">
                            <p class="card-text"><small class="text-muted">Suppression/Mute </small></p>
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