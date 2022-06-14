<!-- Header/Navbar -->
<?php
    $titre_page = " Création du Club";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once("../Core/Core.php");
    redirection_si_non_connecte($_SESSION['statut_connexion']);
?>

<body>
<!-- Container contenant les informations pour la création du club -->
<div class="container-creation">
    <form class="create-club-form" action="Controllers/create-club.php">
        <div class="label-connexion-head">
            <h1>Sélection du nom du club</h1>
            <hr>
            <h3>Veuillez saisir les informations obligatoires (*): <h2>
            <br>
        </div>
        <div class="club-edit-content">
            <div class="row">
                <div class="mb-4">
                    <label for="nom-club" class="form-label">Nom du club *:</label><br>
                    <input type="text" id="nom-club" class="form-control" name="nom-club" placeholder="Veuillez saisir le nom du club..." required>
                </div>
                <div class="text-center mt-4 mb-3">
                    <button type="submit" name="submit" class="form-btn">Créer</button>
                </div>
            </div>
        </div>
    </form> 
</div>
<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>