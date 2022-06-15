<?php
    session_start();

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
        //var_dump($data[0]['mot_de_passe']);
        //Vérification que le mot de passe saisi est correct
        $mdp_check = password_verify($mdp, $data['mot_de_passe']);
        //var_dump($mdp_check);
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

            $_SESSION['etat'] = "Succès";
            header('Location: ../Views/jeu.php');
            $_SESSION['message'] = "Connexion réussie.";
        } else{
            $_SESSION['statut_connexion'] = false;
            $_SESSION['etat'] = "Echec";
            header('Location: ../Views/index.php');
            $_SESSION['message'] = "Erreur: Mot de passe et/ou adresse email incorrect(s)µ.";
        }

        //Fermeture connexion base de données
        $pdo = null;

    } else {
        $_SESSION['statut_connexion'] = false;
        $_SESSION['etat'] = "Echec";
        header('Location: ../Views/index.php');
        $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi.";
    }
?>