<?php
    session_start();
    
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");

    echo $_SESSION['match_en_attente'];

    echo $_SESSION['match_en_cours'];
    echo '<br>';

    //On invalide les sessions contenant les données du match alors en attente
    if(isset($_SESSION['match_en_attente']) && $_SESSION['match_en_attente'] == true) {
        $id_match = $_SESSION['match_en_attente_id'];
        $_SESSION['match_en_attente'] = false;
        unset($_SESSION['opposant']);
        unset($_SESSION['match_en_attente_id']);
    }
    
    if(isset($_SESSION['match_en_cours']) && $_SESSION['match_en_cours'] == true) {
        $id_match = $_SESSION['match_en_cours_id'];
        unset($_SESSION['opposant_match']);
        $_SESSION['match_en_cours'] = false;
    }

    echo $_SESSION['match_en_attente'];

    echo $_SESSION['match_en_cours'];

    $id_utilisateur = $_SESSION['dernier_personnage_utilise'];
    $delete_match = 0;

    if(isset($id_match) && $id_match != "") {
        
        $pdo = connect_db();

        //On détermine à quelle équipe du match appartient le joueur
        $select_equipes = $pdo->prepare("SELECT utilisateur_1_id, utilisateur_2_id FROM matchs WHERE id_match = :id_match");
        $select_equipes->bindParam("id_match", $id_match, PDO::PARAM_INT);
        $select_equipes->execute();
        $equipes = $select_equipes ->fetch();
        $equipe_1 = $equipes['utilisateur_1_id'];
        $equipe_2 = $equipes['utilisateur_2_id'];
        if($equipe_1 == $id_utilisateur) {
            $utilisateur_a_retirer_du_match = "utilisateur_1_";
            if($equipe_2 == null) {
                $delete_match = 1;
            }
        } else if($equipe_2 == $id_utilisateur) {
            $utilisateur_a_retirer_du_match = "utilisateur_2_";
            if($equipe_1 == null) {
                $delete_match = 1;
            }
        }

        //On met à null les données liées au joueur quittant le match / On supprime le match s'il est le seul à l'avoir rejoint
        if($delete_match == 1) {
            $suppresion_match = $pdo->prepare("DELETE FROM matchs WHERE id_match = :id_match");
            $suppresion_match->bindParam("id_match", $id_match, PDO::PARAM_INT);
            if($suppresion_match->execute()) {
                $_SESSION['etat'] = "Succès";
                header('Location: ../../Views/index.php');
                $_SESSION['message'] = "Vous avez bien quitté le match.";
            } else {
                $_SESSION['etat'] = "Echec";
                header('Location: ../../Views/index.php');
                $_SESSION['message'] = "Erreur: Veuillez réessayer de quitter la file d'attente";
            }
        } else {
            $retrait_equipe = $pdo->prepare("UPDATE matchs SET ". $utilisateur_a_retirer_du_match ."id = NULL, ". $utilisateur_a_retirer_du_match ."joueur_1 = NULL, ". $utilisateur_a_retirer_du_match ."joueur_2 = NULL, ". $utilisateur_a_retirer_du_match ."joueur_3 = NULL, ". $utilisateur_a_retirer_du_match ."joueur_4 = NULL, ". $utilisateur_a_retirer_du_match ."joueur_5 = NULL, ". $utilisateur_a_retirer_du_match ."joueur_6 = NULL, ". $utilisateur_a_retirer_du_match ."joueur_7 = NULL WHERE id_match = :id_match");
            $retrait_equipe->bindParam("id_match", $id_match, PDO::PARAM_INT);
            if($retrait_equipe->execute()) {
                $_SESSION['etat'] = "Succès";
                header('Location: ../../Views/index.php');
                $_SESSION['message'] = "Vous avez bien quitté le match.";
            } else {
                $_SESSION['etat'] = "Echec";
                header('Location: ../../Views/index.php');
                $_SESSION['message'] = "Erreur: Veuillez réessayer de quitter la file d'attente";
            }
        }
        $pdo = null;
    }
?>
