<!-- Header/Navbar -->
<?php
    $titre_page = "Fil d'attente";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/personnage.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/utilisateur.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/club.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/Core.php");
    if(isset($_SESSION['dernier_personnage_utilise']) && $_SESSION['dernier_personnage_utilise'] != null && is_match_in_less_than_1_hour($_SESSION['dernier_personnage_utilise']) != 1){

    }

?>

<body>

<div class="alert-container">
    <?php
        require_once("../Views/layout/message.php");
    ?>
</div>

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
                        <input type="number" name="nombre_defense" id="nombre_defense" value="0" min="0" max="4">
                    </div>
                    <div class="col-sm">
                        <h5>Milieu</h5>
                        <input type="number" name="nombre_milieu" id="nombre_milieu"  value="0" min="0" max="4">
                    </div>
                    <div class="col-sm"> 
                        <h5>Attaque</h5>
                        <input type="number" name="nombre_attaque" id="nombre_attaque" value="0" min="0" max="3">
                    </div>
                    <input type="hidden" name="compo_finie" value="0">
                </div>
                <div class="text-center mt-4 mb-3">
                    <button type="submit" name="submit" class="form-btn">Mettre à jour la composition</button>
                </div>
            </div>
        </form>
        <br>
        <div id="positionnement-personnages">
            <form method="POST">
            <?php
                if($_SESSION['statut_connexion'] == true && get_club_id($_SESSION['dernier_personnage_utilise'] != null)) {
                    $liste_personnages_club = get_all_personnages_club_and_bots(get_club_id($_SESSION['dernier_personnage_utilise']));
                } else {
                    $liste_personnages_club = get_all_bots();
                }

                if(isset($_GET['compo_finie'])) {
                    ?>
                    <h4>Attribuer à chaque joueur le poste que vous souhaitez:</h4>
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
                    
                    <?php

                    $nombre_defenseurs = $_GET['nombre_defense'];
                    $nombre_milieux = $_GET['nombre_milieu'];
                    $nombre_attaquants = $_GET['nombre_attaque'];

                    $index_defense = 0;
                    $index_milieu = 0;
                    $index_attaque = 0;

                    while($index_defense < $nombre_defenseurs) {
                        ?>
                        <label for="defenseur_<?php echo $index_defense+1 ?>" class="form-label">Defenseur <?php echo $index_defense+1 ?> *:</label><br>
                        <select class= "form-select joueur" name="defenseur_<?php echo $index_defense+1 ?>" id="defenseur_<?php echo $index_defense+1 ?>" required>
                        <option selected disabled value="null">Sélectionnez le defenseur <?php echo $index_defense+1 ?></option>
                        <?php
                            foreach($liste_personnages_club as $personnage) {
                                echo '<option value="' . $personnage['id_personnage'] . '">' . $personnage['nom_personnage'] . '</option>';
                            }
                        ?>
                        </select>
                        <br>
                        <?php
                        ++$index_defense;
                    }

                    while($index_milieu < $nombre_milieux) {
                        ?>
                        <label for="milieu_<?php echo $index_milieu+1 ?>" class="form-label">Milieu de terrain <?php echo $index_milieu+1 ?> *:</label><br>
                        <select class= "form-select joueur" name="milieu_<?php echo $index_milieu+1 ?>" id="milieu_<?php echo $index_milieu+1 ?>" required>
                        <option selected disabled value="null">Sélectionnez le milieu de terrain <?php echo $index_milieu+1 ?></option>
                        <?php
                            foreach($liste_personnages_club as $personnage) {
                                echo '<option value="' . $personnage['id_personnage'] . '">' . $personnage['nom_personnage'] . '</option>';
                            }
                        ?>
                        </select>
                        <br>
                        <?php
                        ++$index_milieu;
                    }

                    while($index_attaque < $nombre_attaquants) {
                        ?>
                        <label for="attaquant_<?php echo $index_attaque+1 ?>" class="form-label">Attaquant <?php echo $index_attaque+1 ?> *:</label><br>
                        <select class= "form-select joueur" name="attaquant_<?php echo $index_attaque+1 ?>" id="attaquant_<?php echo $index_attaque+1 ?>" required>
                        <option selected disabled value="null">Sélectionnez l'attaquant <?php echo $index_attaque+1 ?></option>
                        <?php
                            foreach($liste_personnages_club as $personnage) {
                                echo '<option value="' . $personnage['id_personnage'] . '">' . $personnage['nom_personnage'] . '</option>';
                            }
                        ?>
                        </select>
                        <br>
                        <?php
                        ++$index_attaque;
                    }

                    ?>
                    <input type="hidden" name="selection_faite" value="0">
                    <div class="text-center mt-4 mb-3">
                       <button type="submit" name="submit" class="form-btn">Afficher l'équipe</button>
                    </div>
                    <?php
                }
            ?>
            </form>
        </div>
        <form action="../Controllers/Composition/sauvegarder-composition.php" method="POST">
        <div id="terrain-de-football">
            <?php
            //Affichage de composition seulement lorsque la composition est faite
            if(isset($_GET['compo_finie']) && isset($_POST['selection_faite'])) {
                $index_joueur = 1;
                ?>  
                <div class="row fourth-bottom-row center-text g-0">
                    <?php
                        if(isset($_GET['nombre_attaque']) && $_GET['nombre_attaque'] > 0 && $_GET['nombre_attaque'] < 7){
                            $i = 0;
                            while($i != $_GET['nombre_attaque']) {
                                $i = $i +1;

                                if(isset($_POST['attaquant_'. $i]) && $_POST['attaquant_'. $i] != null){
                                    $id_attaquant = $_POST['attaquant_'. $i];
                                    ?>
                                    <input type="hidden" name="joueur_<?php echo $index_joueur ?>_id" value="<?php echo $id_attaquant?>">
                                    <input type="hidden" name="joueur_<?php echo $index_joueur ?>_poste" value="4">
                                    <?php
                                    switch ($nombre_attaquants) {
                                        case 1:
                                        case 2:
                                            ?>
                                            <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="6">
                                            <?php
                                            break;
                                        case 3:
                                            if($i == 1 || $i == 3) {
                                                ?>
                                                <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="5">
                                                <?php
                                            } else {
                                                ?>
                                                <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="6">
                                                <?php
                                            }
                                            break;
                                    }
                                    ++$index_joueur;
                                }else{
                                    $_SESSION['etat'] = "Echec";
                                    redirect_to_composition();
                                    $_SESSION['message'] = "Veuillez sélectionner au moins un joueur pour chaque poste.";                         
                                }    
                                ?>
                                <div class="col justify-center">
                                    <div class="card personnage-container" id="card-composition">
                                    <?php
                                        if(get_illustration($id_attaquant) != null){
                                            echo '<img class="card-img-top img-illustration-composition" src="data:image/jpeg;base64,'.base64_encode(get_illustration($id_attaquant)).'" alt="Attaquant n°<?php echo $i?>">';
                                        } else {
                                            echo '<img class="card-img-top img-illustration-composition" src="assets/images/illustration-placeholder.png" alt="Attaquant n°<?php echo $i?>">';
                                        }
                                        ?>
                                        <?php echo get_nom_personnage($id_attaquant); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                <div class="row third-bottom-row center-text g-0">
                    <?php
                        if(isset($_GET['nombre_milieu']) && $_GET['nombre_milieu'] > 0 && $_GET['nombre_milieu'] < 7){
                            $i = 0;
                            while($i != $_GET['nombre_milieu']) {
                                $i = $i +1;
                                if(isset($_POST['milieu_'. $i]) && $_POST['milieu_'. $i] != null){
                                    $id_milieu = $_POST['milieu_'. $i];
                                    ?>
                                    <input type="hidden" name="joueur_<?php echo $index_joueur ?>_id" value="<?php echo $id_milieu?>">
                                    <input type="hidden" name="joueur_<?php echo $index_joueur ?>_poste" value="3">
                                    <?php
                                    switch ($nombre_milieux){
                                        case 1:
                                            ?>
                                            <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="3">
                                            <?php
                                            break;
                                        case 2:
                                            ?>
                                            <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="3">
                                            <?php
                                        case 3:
                                            if($i == 1 ||$i == 3) {
                                                ?>
                                                <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="4">
                                                <?php
                                            }
                                            else {
                                                ?>
                                                <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="3">
                                                <?php
                                            }
                                            break;
                                        case 4:
                                            if($i == 1 || $i == 4) {
                                                ?>
                                                <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="4">
                                                <?php
                                            }
                                            else {
                                                ?>
                                                <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="3">
                                                <?php
                                            }
                                            break; 
                                    }
                                    ++$index_joueur;
                                }else{
                                    $_SESSION['etat'] = "Echec";
                                    redirect_to_composition();
                                    $_SESSION['message'] = "Veuillez sélectionner au moins un joueur pour chaque poste.";                         
                                }    
                                ?>
                                <div class="col justify-center">
                                    <div class="card personnage-container" id="card-composition">
                                    <?php
                                        if(get_illustration($id_milieu) != null){
                                            echo '<img class="card-img-top img-illustration-composition" src="data:image/jpeg;base64,'.base64_encode(get_illustration($id_milieu)).'" alt="Milieu de terrain n°<?php echo $i?>">';
                                        } else {
                                            echo '<img class="card-img-top img-illustration-composition" src="assets/images/illustration-placeholder.png" alt="Milieu de terrain n°<?php echo $i?>">';
                                        }
                                        ?>                                        
                                        <?php echo get_nom_personnage($id_milieu); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                <div class="row second-bottom-row center-text g-0">
                    <?php
                        if(isset($_GET['nombre_defense']) && $_GET['nombre_defense'] > 0 && $_GET['nombre_defense'] < 7){
                            $i = 0;
                            while($i != $_GET['nombre_defense']) {
                                $i = $i +1;
                                if(isset($_POST['defenseur_'. $i]) && $_POST['defenseur_'. $i] != null){
                                    $id_defenseur = $_POST['defenseur_'. $i];
                                    ?>
                                    <input type="hidden" name="joueur_<?php echo $index_joueur ?>_id" value="<?php echo $id_defenseur?>">
                                    <input type="hidden" name="joueur_<?php echo $index_joueur ?>_poste" value="2">
                                    <?php
                                    switch($nombre_defenseurs) {
                                        case 1:
                                        case 2:
                                            ?>
                                            <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="2">
                                            <?php
                                        case 3:
                                            if($i == 1 || $i == 3) {
                                                ?>
                                                <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="1">
                                                <?php
                                            } else {
                                                ?>
                                                <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="2">
                                                <?php
                                            }
                                        case 4:
                                            if($i == 1 || $i == 4) {
                                                ?>
                                                <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="1">
                                                <?php
                                            } else {
                                                ?>
                                                <input type="hidden" name="joueur_<?php echo $index_joueur ?>_orientation" value="2">
                                                <?php
                                            }
                                            break;
                                    }
                                    ++$index_joueur;
                                }else{
                                    $_SESSION['etat'] = "Echec";
                                    redirect_to_composition();
                                    $_SESSION['message'] = "Veuillez sélectionner au moins un joueur pour chaque poste.";                         
                                }                                
                                ?>
                                <div class="col justify-center">
                                    <div class="card personnage-container" id="card-composition">
                                    <?php
                                            if(get_illustration($id_defenseur) != null){
                                                echo '<img class="card-img-top img-illustration-composition" src="data:image/jpeg;base64,'.base64_encode(get_illustration($id_defenseur)).'" alt="Defenseur n°<?php echo $i?>">';
                                            } else {
                                                echo '<img class="card-img-top img-illustration-composition" src="assets/images/illustration-placeholder.png" alt="Defenseur n°<?php echo $i?>">';
                                            }
                                        ?>                                        
                                        <?php echo get_nom_personnage($id_defenseur); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>               
                <div class="row bottom-row center-text g-0">
                    <div class="col justify-center">
                        <div class="card personnage-container" id="card-composition">
                            <?php
                                if(isset($_POST['gardien']) && $_POST['gardien'] != null){
                                    $id_gardien = $_POST['gardien'];
                                    ?>
                                    <input type="hidden" name="gardien" value="<?php echo $id_gardien?>">
                                    <?php
                                    ++$index_joueur;
                                    if(get_illustration($id_gardien) != null) {
                                        echo '<img class="card-img-top img-illustration-composition" src="data:image/jpeg;base64,'.base64_encode(get_illustration($id_gardien)).'" alt="Gardien">';
                                    } else {
                                        echo '<img class="card-img-top img-illustration-composition" src="assets/images/illustration-placeholder.png" alt="Gardien de but">';
                                    }
                                    echo get_nom_personnage($id_gardien);
                                } else {
                                    $_SESSION['etat'] = "Echec";
                                    redirect_to_composition();
                                    $_SESSION['message'] = "Veuillez sélectionner au moins un joueur pour chaque poste.";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
            if(isset($_GET['nombre_defense']) && isset($_GET['nombre_milieu']) && isset($_GET['nombre_attaque'])) {
        ?>
            <input type="hidden" name="nombre_defenseurs" value="<?php echo $_GET['nombre_defense'] ?>">
            <input type="hidden" name="nombre_attaquants" value="<?php echo $_GET['nombre_milieu'] ?>">
            <input type="hidden" name="nombre_milieux" value="<?php echo $_GET['nombre_attaque']?>">
            <div class="text-center mt-4 mb-3">
               <button type="submit" name="submit" class="form-btn">Sauvegarder et utiliser cette composition d'équipe</button>
            </div>
        <?php
            }
        ?>
        </form>
    </div>
</div>

<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>   
</body>
</html>
