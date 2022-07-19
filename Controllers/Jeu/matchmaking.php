<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/match.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/type_match.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/personnage.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/composition.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/Core.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");

    //Dans le cadre du stage, nous ne faisons que les matchs amicaux et championnats

    //Si l'utilisateur n'a pas créé de personnages, il ne peut pas jouer au jeu
    if(compter_personnages_utilisateur($_SESSION['utilisateur_id']) > 0) {
        
        //Si l'utilisateur n'a pas sélectionner de personnage, il ne peut pas jouer au jeu
        if($_SESSION['dernier_personnage_utilise'] != null)  {

            //Si le personnage sélectionné n'a pas de club, il ne peut jouer qu'amicalement, sinon il peut jouer en championnat
            //Matchmaking championnat
            if(get_club_id($_SESSION['dernier_personnage_utilise']) != null) {
                $type_match = 2;
                
                
                
                //L'utilisateur doit avoir choisi une composition pour jouer
                if(composition_existe_deja($_SESSION['dernier_personnage_utilise']) == 1) {

                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../Views/composition.php');
                    $_SESSION['message'] = "Une composition est nécessaire pour jouer un match. 1";
                }

            //Matchmaking amical
            } else {
                $type_match = 1;

                //L'utilisateur doit avoir choisi une composition pour jouer
                if(composition_existe_deja($_SESSION['dernier_personnage_utilise']) == 1) {

                    $id_composition = get_composition_selon_id_personnage($_SESSION['dernier_personnage_utilise']);

                    //On cherche des matchs amicaux non commencés avec une place vacante
                    $pdo = connect_db();
                    $stmt = $pdo->prepare("SELECT id_match, utilisateur_1_id, utilisateur_2_id FROM matchs WHERE a_commence = 0 AND (utilisateur_1_id IS NULL OR utilisateur_2_id IS NULL) AND type_match_id = :type_match");
                    $stmt->bindParam("type_match", $type_match, PDO::PARAM_INT);
                    if($stmt->execute()) {
                        $resultats = $stmt -> fetch();
                        $id_match_a_rejoindre = $resultats['id_match'];
                        $utilisateur_1_id = $resultats['utilisateur_1_id'];
                        $utilisateur_2_id = $resultats['utilisateur_2_id'];

                        /**
                         *                  A CONTINUER
                         * 
                         * Récupérer les joueurs selon la composition
                         * Faire les UPDATE / INSERT INTO
                         * 
                         * 
                         * 
                         * 
                         * 
                         * 
                         */

                        //Si l'id obtenu n'est pas null, un match correspond et on le rejoint, sinon on en créé un
                        if($id_match_a_rejoindre != null) {
                            if($utilisateur_1_id == null) {
                                $utilisateur = 'utilisateur_1_id';
                            } else if($utilisateur_2_id == null) {
                                $utilisateur = 'utilisateur_2_id';
                            }
                            $rejoindre_match_amical = $pdo->prepare("UPDATE matchs SET ". $utilisateur ." =:id_utilisateur WHERE id_match =:id_match");
                            $rejoindre_match_amical->bindParam("id_utilisateur", $type_match, PDO::PARAM_INT);
                            $rejoindre_match_amical->bindParam("id_match", $id_match_a_rejoindre, PDO::PARAM_INT);
                        } else {
                            $zero = 0;
                            $creation_match_amical = $pdo->prepare("INSERT INTO matchs (type_match_id, utilisateur_1_id, date_match, score_utilisateur_1, score_utilisateur_2, utilisateur_1_joueur_1, utilisateur_1_joueur_2, utilisateur_1_joueur_3, utilisateur_1_joueur_4, utilisateur_1_joueur_5, utilisateur_1_joueur_6, utilisateur_1_joueur_7, est_fini, a_commence) VALUES (:type_match_id, :utilisateur_1_id, NOW(), :zero, :zero_2, :utilisateur_1_joueur_1, :utilisateur_1_joueur_2, :utilisateur_1_joueur_3, :utilisateur_1_joueur_4, :utilisateur_1_joueur_5, :utilisateur_1_joueur_6, :utilisateur_1_joueur_7, :zero_3, :zero_4)");
                        }
                    } else {
                        $_SESSION['etat'] = "Echec";
                        header('Location: ../Views/index.php');
                        $_SESSION['message'] = "Impossible de trouver un match pour le moment.";
                    }
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/composition.php');
                    $_SESSION['message'] = "Une composition est nécessaire pour jouer un match. 2";
                }
            }
        } else {
            $_SESSION['etat'] = "Echec";
            header('Location: ../Views/selection-personnage.php');
            $_SESSION['message'] = "Veuillez sélectionner au moins un personnage pour jouer";
        }
    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../Views/creation-personnage.php');
        $_SESSION['message'] = "Veuillez créer au moins un personnage pour jouer.";
    }



    /* Ancien matchmaking
    $type_match = 0;

    //Matchmaking pour les joueurs connectés
    if(isset($_SESSION['statut_connexion']) && $_SESSION['statut_connexion'] == true) {

        //On détermine tout d'abord le type de match auquel le joueur veut participer
        if(isset($_POST['tournoi']) || isset($_POST['coupe']) || isset($_POST['championnat']) || isset($_POST['match_competitif'])) {
            if(isset($_POST['tournoi'])) {
                $type_match = 3;
            } else if(isset($_POST['coupe'])) {
                $type_match = 5;
            } else if(isset($_POST['championnat'])) {
                $type_match = 4;
            } else if(isset($_POST['match_competitif'])){
                $type_match = 2;
            }

            //On va maintenant chercher un match correspondant au mode de jeu sélectionné et comportant des places disponibles
            if($type_match != 0) {

                //Si l'utilisateur n'a pas encore sélectionné de personnage, alors doit le faire et sera redirigé vers la page de sélection
                if($_SESSION['dernier_personnage_utilise'] != null) {

                    //Si le personnage sélectionné n'a pas de club, alors il devra en choisir un OU l'utilisateur devra jouer comme un invité
                    if(get_club_id($_SESSION['dernier_personnage_utilise']) != null) {
                        $liste_match_en_cours_du_club = get_match_en_cours_by_club(get_club_id($_SESSION['dernier_personnage_utilise']));
                        $counter = 0;
                        foreach($liste_match_en_cours_du_club as $match_en_cours){

                            //SI le match est en cours et correspond au mode de jeu choisi, alors on vérifie qu'il y a encore de la place
                            if($match_en_cours['type_match_id'] == $type_match){
                                if(equipe_est_complete($_SESSION['dernier_personnage_utilise'], $match_en_cours['id_match']) < 7){
                                    $counter = $counter +1;
                                    $id_match = $match_en_cours['id_match'];
                                    $place_equipe = "";
                                    $url = "?match=". $id_match;

                                    //On définit dans l'url les identifiants des joueurs
                                    if($match_en_cours['club_1_id'] == get_club_id($_SESSION['dernier_personnage_utilise'])) {
                                        if($match_en_cours['club_1_joueur_1'] == null) {
                                            $url = $url. "?club_1_joueur_1=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_1";
                                        }else if($match_en_cours['club_1_joueur_2'] == null) {
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$id_match);
                                            $url = $url. "?club_1_joueur_2=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_2";
                                        }else if($match_en_cours['club_1_joueur_3']== null)  {
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$id_match);
                                            $url = $url. "?club_1_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,1,$id_match); 
                                            $url = $url. "?club_1_joueur_3=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_3";
                                        }else if($match_en_cours['club_1_joueur_4']== null){
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$id_match);
                                            $url = $url. "?club_1_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,1,$id_match); 
                                            $url = $url. "?club_1_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,1,$id_match);
                                            $url = $url. "?club_1_joueur_4=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_4";
                                        }else if($match_en_cours['club_1_joueur_5']== null){
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$id_match);
                                            $url = $url. "?club_1_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,1,$id_match); 
                                            $url = $url. "?club_1_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,1,$id_match);
                                            $url = $url. "?club_1_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,1,$id_match);
                                            $url = $url. "?club_1_joueur_5=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_5";
                                        }else if($match_en_cours['club_1_joueur_6']== null){
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$id_match);
                                            $url = $url. "?club_1_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,1,$id_match); 
                                            $url = $url. "?club_1_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,1,$id_match);
                                            $url = $url. "?club_1_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,1,$id_match);
                                            $url = $url. "?club_1_joueur_5=". get_joueur_X_from_club_Y_from_match_z(5,1,$id_match);
                                            $url = $url."?club_1_joueur_6=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_6";
                                        }else if($match_en_cours['club_1_joueur_7']== null){
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$id_match);
                                            $url = $url. "?club_1_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,1,$id_match); 
                                            $url = $url. "?club_1_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,1,$id_match);
                                            $url = $url. "?club_1_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,1,$id_match);
                                            $url = $url. "?club_1_joueur_5=". get_joueur_X_from_club_Y_from_match_z(5,1,$id_match);
                                            $url = $url. "?club_1_joueur_63=". get_joueur_X_from_club_Y_from_match_z(6,1,$id_match);
                                            $url = $url. "?club_1_joueur_7=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_7";
                                        }
                                    } else if($match_en_cours['club_2_id'] == get_club_id($_SESSION['dernier_personnage_utilise'])) {
                                        if($match_en_cours['club_2_joueur_1'] == null) {
                                            $place_equipe = "club_2_joueur_1";
                                            $url = $url. "?club_2_joueur_1=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_2_joueur_2']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_2";
                                        }else if($match_en_cours['club_2_joueur_3']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,2,$id_match);
                                            $url = $url. "?club_2_joueur_3=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_3";
                                        }else if($match_en_cours['club_2_joueur_4']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,2,$id_match);
                                            $url = $url. "?club_2_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,2,$id_match);
                                            $url = $url. "?club_2_joueur_4=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_4";
                                        }else if($match_en_cours['club_2_joueur_5']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,2,$id_match);
                                            $url = $url. "?club_2_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,2,$id_match);
                                            $url = $url. "?club_2_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,2,$id_match);
                                            $url = $url. "?club_2_joueur_5=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_5";
                                        }else if($match_en_cours['club_2_joueur_6']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,2,$id_match);
                                            $url = $url. "?club_2_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,2,$id_match);
                                            $url = $url. "?club_2_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,2,$id_match);
                                            $url = $url. "?club_2_joueur_5=". get_joueur_X_from_club_Y_from_match_z(5,2,$id_match);
                                            $url = $url. "?club_2_joueur_6=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_6";
                                        }else if($match_en_cours['club_2_joueur_7']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,2,$id_match);
                                            $url = $url. "?club_2_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,2,$id_match);
                                            $url = $url. "?club_2_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,2,$id_match);
                                            $url = $url. "?club_2_joueur_5=". get_joueur_X_from_club_Y_from_match_z(5,2,$id_match);
                                            $url = $url. "?club_2_joueur_6=". get_joueur_X_from_club_Y_from_match_z(6,2,$id_match);
                                            $url = $url. "?club_2_joueur_7=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_7";
                                        }
                                    }

                                    break;
                                }
                            }
                        }
                        
                        //Si un match correspond à la recherche, on y ajoute l'utilisateur
                        if($counter == 1){
                            if($place_equipe != ""){                            
                                header('Location: ../../Views/queue-match.php'. $url);
                                require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
                                $pdo = connect_db();
                                $stmt = $pdo->prepare("UPDATE matchs SET ". $place_equipe ." = :id_personnage_utilise WHERE id_match = :id_match");
                                $stmt->bindParam("id_personnage_utilise", $_SESSION['dernier_personnage_utilise'], PDO::PARAM_INT);
                                $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
                                $stmt->execute();
                            } else {
                                $_SESSION['etat'] = "Echec";
                                header('Location: ../../Views/index.php');
                                $_SESSION['message'] = "Une erreur est survenue lors du lancement de la recherche de match.";
                            }

                            $pdo = null;
                        }

                        //Si aucun match ne correspond à la recherche, on cherche un match non commencé avec un seul club
                        else{
                            $url ="";
                            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
                            $pdo = connect_db();
                            $club = get_club_id($_SESSION['dernier_personnage_utilise']);
                            $stmt = $pdo->prepare("SELECT id_match, club_1_id, club_2_id, COUNT(*) as total FROM matchs WHERE (club_1_id IS NULL AND club_2_id <> :club_2) OR (club_2_id IS NULL AND club_1_id <> :club_1) AND a_commence = 0");
                            $stmt->bindParam("club_2", $club, PDO::PARAM_INT);
                            $stmt->bindParam("club_1", $club, PDO::PARAM_INT);
                            $stmt->execute();
                            $resultat_stmt = $stmt->fetch();
                            $matchs_en_attente = $resultat_stmt['total'];
                            //Si aucun match n'est disponible, alors un match est créé
                                if($matchs_en_attente == 0 && $matchs_en_attente == null) {
                                    $id_joueur = $_SESSION['dernier_personnage_utilise'];
                                    $stmt = $pdo->prepare("INSERT INTO matchs (type_match_id, club_1_id, date_match, score_club_1, score_club_2, club_1_joueur_1, est_fini, a_commence) VALUES (:type_match, :id_club, NOW(), 0, 0, :id_joueur, 0, 0)");
                                    $stmt->bindParam("type_match", $type_match, PDO::PARAM_INT);
                                    $stmt->bindParam("id_club", $club, PDO::PARAM_INT);
                                    $stmt->bindParam("id_joueur", $id_joueur, PDO::PARAM_INT);
                                    if($stmt->execute()) {
                                        $dernier_id = $pdo->lastInsertId();
                                        $url = "?match=". $dernier_id ."?club_1_joueur_1=". $_SESSION['dernier_personnage_utilise'];
                                        $_SESSION['etat'] = "Succès";
                                        header('Location: ../../Views/queue-match.php'. $url);
                                        $_SESSION['message'] = "Connexion réussie.";
                                    } else {
                                        $_SESSION['etat'] = "Echec";
                                        header('Location: ../../Views/rechercher-club.php'. $url);
                                        $_SESSION['message'] = "Erreur: Il est impossible de lancer un nouveau match pour le moment";
                                    }
                                }
                                
                                //Si un match est disponible, alors le club rejoint ce match
                                else {
                                    $update = 0;
                                    $match_a_rejoindre = $resultat_stmt['id_match'];
                                    $club_vide_1 = $resultat_stmt['club_1_id'];
                                    $club_vide_2 = $resultat_stmt['club_2_id'];
                                    $club_a_modifier = null;
                                    $url = "?match=". $match_a_rejoindre;
                                    if($club_vide_1 == null) {
                                        $club_a_modifier = "club_1_id";
                                        $update = 1;
                                        $equipe_1 = get_equipe_1($match_a_rejoindre);
                                        if($equipe_1['club_1_joueur_1'] == null) {
                                            $url = $url. "?club_1_joueur_1=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_1";
                                        }else if($equipe_1['club_1_joueur_2'] == null) {
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_2=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_2";
                                        }else if($equipe_1['club_1_joueur_3']== null)  {
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,1,$match_a_rejoindre); 
                                            $url = $url. "?club_1_joueur_3=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_3";
                                        }else if($equipe_1['club_1_joueur_4']== null){
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,1,$match_a_rejoindre); 
                                            $url = $url. "?club_1_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_4=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_4";
                                        }else if($equipe_1['club_1_joueur_5']== null){
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,1,$match_a_rejoindre); 
                                            $url = $url. "?club_1_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_5=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_5";
                                        }else if($equipe_1['club_1_joueur_6']== null){
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,1,$match_a_rejoindre); 
                                            $url = $url. "?club_1_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_5=". get_joueur_X_from_club_Y_from_match_z(5,1,$match_a_rejoindre);
                                            $url = $url."?club_1_joueur_6=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_6";
                                        }else if($equipe_1['club_1_joueur_7']== null){
                                            $url = $url. "?club_1_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,1,$match_a_rejoindre); 
                                            $url = $url. "?club_1_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_5=". get_joueur_X_from_club_Y_from_match_z(5,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_63=". get_joueur_X_from_club_Y_from_match_z(6,1,$match_a_rejoindre);
                                            $url = $url. "?club_1_joueur_7=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_1_joueur_7";
                                        }
                                    } else if($club_vide_2 == null) {
                                        $update = 1;
                                        $equipe_2 = get_equipe_2($match_a_rejoindre);
                                        $club_a_modifier = "club_2_id";
                                        if($equipe_2['club_2_joueur_1'] == null) {
                                            $place_equipe = "club_2_joueur_1";
                                            $url = $url. "?club_2_joueur_1=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($equipe_2['club_2_joueur_2']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_2";
                                        }else if($equipe_2['club_2_joueur_3']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,2,$id_match);
                                            $url = $url. "?club_2_joueur_3=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_3";
                                        }else if($equipe_2['club_2_joueur_4']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,2,$id_match);
                                            $url = $url. "?club_2_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,2,$id_match);
                                            $url = $url. "?club_2_joueur_4=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_4";
                                        }else if($equipe_2['club_2_joueur_5']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,2,$id_match);
                                            $url = $url. "?club_2_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,2,$id_match);
                                            $url = $url. "?club_2_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,2,$id_match);
                                            $url = $url. "?club_2_joueur_5=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_5";
                                        }else if($equipe_2['club_2_joueur_6']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,2,$id_match);
                                            $url = $url. "?club_2_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,2,$id_match);
                                            $url = $url. "?club_2_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,2,$id_match);
                                            $url = $url. "?club_2_joueur_5=". get_joueur_X_from_club_Y_from_match_z(5,2,$id_match);
                                            $url = $url. "?club_2_joueur_6=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_6";
                                        }else if($equipe_2['club_2_joueur_7']== null){
                                            $url = $url. "?club_2_joueur_1=". get_joueur_X_from_club_Y_from_match_z(1,2,$id_match);
                                            $url = $url. "?club_2_joueur_2=". get_joueur_X_from_club_Y_from_match_z(2,2,$id_match);
                                            $url = $url. "?club_2_joueur_3=". get_joueur_X_from_club_Y_from_match_z(3,2,$id_match);
                                            $url = $url. "?club_2_joueur_4=". get_joueur_X_from_club_Y_from_match_z(4,2,$id_match);
                                            $url = $url. "?club_2_joueur_5=". get_joueur_X_from_club_Y_from_match_z(5,2,$id_match);
                                            $url = $url. "?club_2_joueur_6=". get_joueur_X_from_club_Y_from_match_z(6,2,$id_match);
                                            $url = $url. "?club_2_joueur_7=".$_SESSION['dernier_personnage_utilise'];
                                            $place_equipe = "club_2_joueur_7";
                                        }
                                    } else {
                                        $update = 0;
                                        $_SESSION['etat'] = "Echec";
                                        header('Location: ../../Views/index.php'. $url);
                                        $_SESSION['message'] = "Erreur: Aucun match n'est disponible pour le moment.";
                                    }

                                    if($update == 1 && $club_a_modifier != null) {
                                        header('Location: ../../Views/queue-match.php'. $url);
                                        require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
                                        $pdo = connect_db();
                                        $stmt = $pdo->prepare("UPDATE matchs SET ". $club_a_modifier ." = :club_id , ". $place_equipe ." = :id_personnage_utilise WHERE id_match = :id_match");
                                        $stmt->bindParam("club_id", get_club_id($_SESSION['dernier_personnage_utilise']), PDO::PARAM_INT);
                                        $stmt->bindParam("id_personnage_utilise", $_SESSION['dernier_personnage_utilise'], PDO::PARAM_INT);
                                        $stmt->bindParam("id_match", $match_a_rejoindre, PDO::PARAM_INT);
                                        $stmt->execute();
                                    }
                                    else {
                                        echo "non";
                                    }
                                }

                            $pdo = null;
                        }

                    }else {
                        $_SESSION['etat'] = "Echec";
                        header('Location: ../../Views/rechercher-club.php'. $url);
                        $_SESSION['message'] = "Erreur: Avant de pouvoir lancer un match, il faut que le personnage sélectionné ait rejoint un club.";
                    }
                } else {
                    if(compter_personnages_utilisateur($_SESSION['utilisateur_id']) == 0){
                        $_SESSION['etat'] = "Echec";
                        header('Location: ../../Views/creation-personnage.php');
                        $_SESSION['message'] = "Erreur: Avant de pouvoir lancer un match, il vous faut créer et sélectionner un personnage.";
                    } else {
                        $_SESSION['etat'] = "Echec";
                        header('Location: ../../Views/selection-personnage.php');
                        $_SESSION['message'] = "Erreur: Avant de pouvoir lancer un match, il vous faut choisir un personnage.";
                    }
                }
            } else {

            }
        } else {
            $_SESSION['etat'] = "Echec";
            header('Location: ../../Views/index.php');
            $_SESSION['message'] = "Veuillez au moins sélectionner un mode de jeu";
        }
    } else {
        echo "EN CONSTRUCTION - A faire pour les joueurs invités...";
    } */
?>