<!-- Header/Navbar -->
<?php
    $titre_page = "Recherche de club";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<body>
<!-- Formulaire pour rechercher un club selon son nom -->
<div class="container-rechercher">
    <form class="search-club-form" action="Controllers/search-club.php">
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
                    <input type="text" id="nom-club" class="form-control" name="nom-club" placeholder="Ancien nom du club..." required>
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
<div class="liste-personnage-container">
  <div class=row>
        <div class="card mb-3 horizontal-card">
            <div class="row no-gutters">
                <div class="col-md-11">
                    <div class="card-body">
                        <div class="col-md-5 card-bloc">
                            <h5 class="card-title">Nom du club</h5>
                        </div>
                        <div class="col-md-5 card-bloc">
                            <p class="card-text">Nom du propriétaire</p>
                        </div>
                        <div class="col-md-5 card-bloc">
                            <p class="card-text">Nombre de joueurs</p>
                        </div>
                        <div class="col-md-5 card-bloc">
                            <p class="card-text">Division actuelle</p>
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