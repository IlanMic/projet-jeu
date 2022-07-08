<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/match.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/type_match.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/personnage.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/Core.php");
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
                                    $url = "";
                                    if($match_en_cours['club_1_id'] == get_club_id($_SESSION['dernier_personnage_utilise'])) {
                                        if($match_en_cours['club_1_joueur_1'] == null) {
                                            $url = $url. "?club_1_joueur_1=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_1_joueur_2'] == null) {
                                            $url = $url. "?club_1_joueur_2=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_1_joueur_3']== null)  {
                                            $url = $url. "?club_1_joueur_3=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_1_joueur_4']== null){
                                            $url = $url. "?club_1_joueur_4=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_1_joueur_5']== null){
                                            $url = $url. "?club_1_joueur_5=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_1_joueur_6']== null){
                                            $url = $url. "?club_1_joueur_6=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_1_joueur_7']== null){
                                            $url = $url. "?club_1_joueur_7=".$_SESSION['dernier_personnage_utilise'];
                                        }
                                    } else if($match_en_cours['club_2_id'] == get_club_id($_SESSION['dernier_personnage_utilise'])) {
                                        if($match_en_cours['club_2_joueur_1'] == null) {
                                            $url = $url. "?club_2_joueur_1=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_2_joueur_2']== null){
                                            $url = $url. "?club_2_joueur_2=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_2_joueur_3']== null){
                                            $url = $url. "?club_2_joueur_3=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_2_joueur_4']== null){
                                            $url = $url. "?club_2_joueur_4=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_2_joueur_5']== null){
                                            $url = $url. "?club_2_joueur_5=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_2_joueur_6']== null){
                                            $url = $url. "?club_2_joueur_6=".$_SESSION['dernier_personnage_utilise'];
                                        }else if($match_en_cours['club_2_joueur_7']== null){
                                            $url = $url. "?club_2_joueur_7=".$_SESSION['dernier_personnage_utilise'];
                                        }
                                    }
                                    break;
                                }
                            }
                        }
                        
                        if($counter == 1){
                            header('Location: ../../Views/queue-match.php'. $url);
                        }

                    }else {
                        echo "EN CONSTRUCTION - Soit rediriger vers un club soit jouer comme un invité";
                    }
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/selection-personnage.php');
                    $_SESSION['message'] = "Erreur: Avant de pouvoir lancer un match, il vous faut choisir un personnage.";
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
    }
?>