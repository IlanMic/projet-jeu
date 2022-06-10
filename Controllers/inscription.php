<?php
    session_start();
    //Convertit les caractères éligibles en format html
    $pseudo =  htmlentities($_POST['pseudo']);
    $mail = htmlentities($_POST['mail']);
    $pass =  htmlentities($_POST['pass']);
    $options = [
        'cost' => 12,
    ]; 

    require_once("../Core/ConnexionBDD.php");
    $pdo = connect_db();

    //On vérifie la volonté de créer un compte premium ou non
    $premium = $_POST['premium'];
    echo $premium;
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
        $_SESSION['message'] =  "Erreur !";
        header('Location: ../Views/index.php');
    }


    



?>