<?php
    session_start();
    require_once("../Models/club.php");
    require_once("../Models/utilisateur.php");
    //Vérification de la déclaration des variables
    if(isset($_POST['pseudo']) && isset($_POST['pass'])) {

        //Récupération des variables du formulaire
        $pseudo = $_POST['pseudo'];
        $mdp =  $_POST['pass'];
        $options = [
            'cost' => 12,
        ]; 

        //Connexion à la base de données
        require_once("../Core/ConnexionBDD.php");
        $pdo = connect_db();

        //Récupération des utilisateurs correspondants
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo");
        $stmt->bindParam("pseudo", $pseudo, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch();
        
        //Vérification que le mot de passe saisi est correct
        $mdp_check = password_verify($mdp, $data['mot_de_passe']);
        
        if($mdp_check == true) {
            $_SESSION['statut_connexion'] = true;
            $_SESSION['utilisateur_id'] = $data['id_utilisateur'];
            $_SESSION['utilisateur_pseudo'] = $data['pseudo'];
            $_SESSION['mail'] = $data['adresse_mail'];
            $_SESSION['utilisateur_club'] = $data['club_id'];
            $_SESSION['compte_premium'] = $data['compte_premium'];
            $_SESSION['utilisateur_personnage_1'] = $data['personnage_1_id'];
            $_SESSION['utilisateur_personnage_2'] = $data['personnage_2_id'];
            $_SESSION['utilisateur_personnage_3'] = $data['personnage_3_id'];
            if($data['compte_premium'] == 1) {
                if(!empty(get_club_nom($_SESSION['utilisateur_id']))){
                    $_SESSION['club_id'] = get_club_id_from_proprietaire_id($_SESSION['utilisateur_id']);
                }
            }

            if(is_null($data['personnage_2_id'])) {
                $id_personnage = $_SESSION['dernier_personnage_cree'] = "personnage_1_id";
            }
            else if(is_null($data['personnage_3_id'])) {
                $_SESSION['dernier_personnage_cree'] = "personnage_2_id";
            }
            else if(is_null ($data['personnage_3_id'])) {
                $_SESSION['dernier_personnage_cree'] = "personnage_3_id";
            }
            else{
                $_SESSION['dernier_personnage_cree'] = "";
            }

            //Mise à jour de la date de dernière connexion pour l'utilisateur
            $date = date('Y-m-d H:i:s');
            $update_last_connection = $pdo->prepare("UPDATE utilisateur SET derniere_connexion = :date_now WHERE id_utilisateur = :id_utilisateur");
            $update_last_connection->bindParam("date_now", $date, PDO::PARAM_STR);
            $update_last_connection->bindParam("id_utilisateur", $data['id_utilisateur'], PDO::PARAM_INT);
            if($update_last_connection->execute()) {
                $_SESSION['derniere_connexion'] = $date;
            }
            $_SESSION['dernier_personnage_utilise'] = $data['dernier_personnage_utilise'];

            $_SESSION['etat'] = "Succès";
            header('Location: ../Views/jeu.php');
            $_SESSION['message'] = "Connexion réussie.";
        } else{
            $_SESSION['statut_connexion'] = false;
            $_SESSION['etat'] = "Echec";
            header('Location: ../Views/index.php');
            $_SESSION['message'] = "Erreur: Mot de passe et/ou adresse email incorrect(s).";
        }

        //Fermeture connexion base de données
        $pdo = null;

    } else {
        $_SESSION['statut_connexion'] = false;
        $_SESSION['etat'] = "Echec";
        header('Location: ../Views/index.php');
        $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi. La connexion ne peut aboutir.";
    }
?>