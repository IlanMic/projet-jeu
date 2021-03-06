<!-- Header/Navbar -->
<?php
    $titre_page = "Accueil";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<div class="alert-container">
    <?php
        require_once("../Views/layout/message.php");
    ?>
</div>

<?php

    //Affichage des menus de connexions, inscriptions et demande de mot de passe si l'utilisateur est connecté
    if($_SESSION['statut_connexion'] == false) {
        ?>
            <div class="login-form-container">
                <!-- Formulaire de connexion -->
                <form class="connexion-form" action="../Controllers/connexion.php" method="POST">
                    <div class="label-connexion-head">
                        <h1>Connexion</h1>
                        <hr>
                        <h3>Veuillez saisir les informations obligatoires (*) afin de vous connecter: <h2>
                        <br>
                    </div>
                    <div class="connexion-content">
                        <div class="row">
                            <div class="mb-4">
                                <label for="pseudo" class="form-label">Pseudo *:</label><br>
                                <input type="text" id="pseudo" class="form-control" name="pseudo" placeholder="Entrez votre pseudonyme..." required>
                            </div>
                            <div class="mb-4">
                                <label for="pass" class="form-label">Mot de passe * :</label><br>
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Entrez votre mot de passe..." required>
                            </div>
                            <div class="text-center mt-4 mb-3">
                                <button type="submit" name="submit" class="form-btn">Se connecter</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="outer">
                        <div class="inner">
                            <button class="btn-inscription mt-2 sub-btn" type="button">S'inscrire</button>
                        </div>
                        <!--<div class="inner">
                            <button class="btn-recuperation mt-2 sub-btn" type="button">Mot de passe oublié</button>
                        </div>-->
                    </div> 
                </form> 

                <!-- Formulaire d'inscription -->
                <form class="inscription-form d-none" action="../Controllers/inscription.php" method="POST">
                    <div class="label-inscription-head">
                        <h1>Inscription</h1>
                        <hr>
                        <h3>Veuillez saisir les informations obligatoires (*) afin de vous inscrire: <h2>
                        <br>
                    </div>
                    <div class="inscription-content">
                        <div class="row">
                            <div class="mb-4">
                                <label for="pseudo" class="form-label">Pseudo *:</label><br>
                                <input type="text" id="pseudo" class="form-control" name="pseudo" placeholder="Entrez votre pseudonyme..." required>
                            </div>
                            <div class="mb-4">
                                <label for="mail" class="form-label">Adresse mail *:</label><br>
                                <input type="email" id="mail" class="form-control" name="mail" placeholder="Entrez votre adresse mail..." required>
                            </div>
                            <div class="mb-4">
                                <label for="pass" class="form-label">Mot de passe * :</label><br>
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Entrez votre mot de passe..." required>
                            </div>
                            <div class="switch">
                                <div class="row">
                                    <div class="col-9">Voulez-vous profiter des avantages premium tels que la création ou gestion de club ou le déblocage d'un troisième personnage pour 5€ ?</div>
                                    <div class="col-3">
                                        <label class="switch-premium">
                                            <input type="hidden" name="premium" id="premium" value="2">
                                            <input type="checkbox" name="premium" id="premium" value="1">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4 mb-3">
                                <button type="submit" name="submit" class="form-btn">S'inscrire</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="outer">
                        <div class="inner">
                            <button class="btn-connexion mt-2 sub-btn" class="form-btn"  type="button">Se connecter</button>
                        </div>
                        <!--<div class="inner">
                            <button class="btn-recuperation mt-2 sub-btn" class="form-btn" type="button">Mot de passe oublié</button>
                        </div>-->
                    </div>
                </form> 

                <!-- Formulaire de réinitialisation de mot de passe  -->
                <!--<form class="reinitialisation-form d-none" action="Controllers/recuperation.php" method="POST">
                    <div class="label-reinitialisation-head">
                        <h1>Réinitialisation du mot de passe</h1>
                        <hr>
                        <h3>Veuillez saisir les informations obligatoires (*) afin de faire une demande de réinitialisation de mot de passe: <h2>
                        <br>
                    </div>
                    <div class="reinitialisation-content">
                        <div class="row">
                            <div class="mb-4">
                                <label for="mail" class="form-label">Pseudo *:</label><br>
                                <input type="email" id="mail" class="form-control" name="mail" placeholder="Entrez votre adresse mail..." required>
                            </div>
                            <div class="text-center mt-4 mb-3">
                                <button type="submit" name="submit" class="form-btn">Faire une demande de réinitialisation de mot de passe</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="outer">
                        <div class="inner text-center">
                            <button class="btn-connexion mt-2 sub-btn" class="form-btn" type="button">Se connecter</button>
                        </div>
                        <div class="inner">
                            <button class="btn-inscription mt-2 sub-btn" class="form-btn"  type="button">S'inscrire</button>
                        </div>
                    </div>    
                </form> -->
            </div>
        <?php
    }
    else {?>
    <!-- ajouter en fond de ce container des images du jeu -->
    <h1>Lancer une partie</h1>
    <form action="../Controllers/Jeu/matchmaking.php" class="creation-form-2" method="POST">
    <div class="row">
        <div class="index-container">
            <img src="assets/images/_svg_competition.svg" class="index-container-svg" alt="Tournoi">
            <div class="index-content">
                <input type="submit" class="index-btn" name="tournoi" value="Rejoindre la file d'attente pour votre prochain match">
                <hr>
                <p>A compléter par la suite</p>
            </div>
        </div>
    </div>
    </form>
    <?php
    }?>


<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>
