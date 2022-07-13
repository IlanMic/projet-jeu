<!-- Header/Navbar -->
<?php
    $titre_page = "Fil d'attente";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/personnage.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/utilisateur.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/club.php");
?>

<body>
<div class="composition-container">
    <div class="label-connexion-head composition-form">    
        <form action="composition.php" method="GET">
            <h1>Composition d'équipe</h1>
            <hr>
            <h3>Ici, il est possible de positionner vos personnages pour le prochain match.</h3>
            <br>
            <div class="composition-match">
                <h4>Sélectionner le nombre de joueur que placer à chaque position: </h4>
                <div class="row center-text">
                    <div class="col-sm">         
                        <h5>Défense:</h5>
                        <input type="number" name="nombre_defense"  value="0" min="0" max="6">
                    </div>
                    <div class="col-sm">
                        <h5>Milieu</h5>
                        <input type="number" name="nombre_milieu"  value="0" min="0" max="6">
                    </div>
                    <div class="col-sm"> 
                        <h5>Attaque</h5>
                        <input type="number" name="nombre_attaque" value="0" min="0" max="6">
                    </div>
                </div>
                <div class="text-center mt-4 mb-3">
                    <button type="submit" name="submit" class="form-btn">Mettre à jour la composition</button>
                </div>
            </div>
        </form>
        <br>
        <div id="positionnement-personnages">
            <h4>Attribuer à chaque joueur le poste que vous souhaitez:</h4>
            <?php
                $liste_personnages_club = get_all_personnages_club_and_bots($_SESSION['club_id']);
            ?>
            <label for="gardien" class="form-label">Gardien *:</label><br>
            <select class= "form-select joueur" name="gardien" id="gardien" required>
            <option selected disabled value="null">Sélectionnez le gardien</option>
            <?php
                foreach($liste_personnages_club as $personnage) {
                    echo '<option value="' . $personnage['id_personnage'] . '">' . $personnage['nom_personnage'] . '</option>';
                }
            ?>
            </select>
            <br>
        </div>
        <div id="terrain-de-football">
            <div class="row fourth-bottom-row center-text">
                <?php
                if(isset($_GET['nombre_attaque']) && $_GET['nombre_attaque'] > 0 && $_GET['nombre_attaque'] < 7){
                    $i = 0;
                    while($i != $_GET['nombre_attaque']) {
                        ?>
                        <div class="col justify-center">
                            <div class="card personnage-container" id="card-composition">
                                <img class="card-img-top img-illustration-composition" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">
                                Joueur 1
                            </div>
                        </div>
                        <?php
                        $i = $i +1;
                    }
                    ?>

                    <?php
                } else {
                    echo "Aucun attaquant";
                } ?>

            </div>
            <div class="row third-bottom-row center-text">
            <?php
                if(isset($_GET['nombre_milieu']) && $_GET['nombre_milieu'] > 0 && $_GET['nombre_milieu'] < 7){
                    $i = 0;
                    while($i != $_GET['nombre_milieu']) {
                        ?>
                        <div class="col justify-center">
                            <div class="card personnage-container" id="card-composition">
                                <img class="card-img-top img-illustration-composition" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">
                                Joueur 1
                            </div>
                        </div>
                        <?php
                        $i = $i +1;
                    }
                    ?>

                    <?php
                } else {
                    echo "Aucun milieu";
                } ?>
            </div>
            <div class="row second-bottom-row center-text">
            <?php
                if(isset($_GET['nombre_defense']) && $_GET['nombre_defense'] > 0 && $_GET['nombre_defense'] < 7){
                    $i = 0;
                    while($i != $_GET['nombre_defense']) {
                        ?>
                        <div class="col justify-center">
                            <div class="card personnage-container" id="card-composition">
                                <img class="card-img-top img-illustration-composition" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">
                                Joueur 1
                            </div>
                        </div>
                        <?php
                        $i = $i +1;
                    }
                    ?>

                    <?php
                } else {
                    echo "Aucun défenseur";
                } ?>
            </div>               
            <div class="row bottom-row center-text">
                <div class="col justify-center">
                    <div class="card personnage-container" id="card-composition">
                        <img class="card-img-top img-illustration-composition" src="assets/images/illustration-placeholder.png" alt="Personnage n°1">
                        [BOT] Gardien
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
