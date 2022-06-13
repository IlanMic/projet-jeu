<?php
    session_start();

    //Vérification de la déclaration des variables
    if(isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['premium'])) {

        //Récupération des variables du formulaire
        $pseudo = $_POST['pseudo'];
        $mail = $_POST['mail'];
        $pass =  $_POST['pass'];
        $premium = $_POST['premium'];
        $options = [
            'cost' => 12,
        ]; 

        //Connexion à la base de données
        require_once("../Core/ConnexionBDD.php");
        $pdo = connect_db();

        //Vérification de la volonté de créer un compte premium ou non
        if($premium == 1) {
            $premium = 1;
        }else{
            $premium = 0;
        }

        //Insertion de l'utilisateur dans la base de données
        $stmt = $pdo->prepare("INSERT INTO utilisateur (pseudo, adresse_mail, mot_de_passe, compte_premium) VALUES (:pseudo, :mail, :mdp, :premium)");
        $hash_mdp = password_hash($pass, PASSWORD_BCRYPT, $options);
        $stmt->bindParam("pseudo", $pseudo, PDO::PARAM_STR);
        $stmt->bindParam("mail", $mail, PDO::PARAM_STR);
        $stmt->bindParam("mdp", $hash_mdp, PDO::PARAM_STR);
        $stmt->bindParam("premium", $premium, PDO::PARAM_INT);
        if($stmt->execute()) {
            $_SESSION['etat'] = "Succès";
            $_SESSION['message'] = "Inscription réussie";
            header('Location: ../Views/index.php');

        } else {
            $_SESSION['etat'] = "Echec";
            $_SESSION['message'] =  "Erreur: au moins une saisie ne remplit pas les conditions nécessaires.";
            header('Location: ../Views/index.php');
        }

    }

    



?>