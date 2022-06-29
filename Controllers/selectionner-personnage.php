<?php
    session_start();
    $uri = $_SERVER['REQUEST_URI']; 
    if(isset($_GET['personnage-selectionne'])) {
        $identifiant_personnage= $_GET['personnage-selectionne'];
        $identifiant_utilisateur = $_SESSION['utilisateur_id'];
        require_once("../Core/ConnexionBDD.php");
        $pdo = connect_db();
        $stmt = $pdo->prepare("UPDATE utilisateur SET dernier_personnage_utilise = :dernier_personnage WHERE id_utilisateur = :utilisateur");
        $stmt->bindParam("dernier_personnage", $identifiant_personnage, PDO::PARAM_INT);
        $stmt->bindParam("utilisateur", $identifiant_utilisateur, PDO::PARAM_INT);
        if($stmt->execute()) {
            $_SESSION['etat'] = "Succès";
            $_SESSION['message'] = "Sélection de personnage réussie.";
            header('Location: ../Views/index.php');
        } else {
            $_SESSION['etat'] = "Echec";
            header('Location: ../Views/index.php');
            $_SESSION['message'] = "Echec survenu lors de la sélection de personnage";
        }
    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../Views/index.php');
        $_SESSION['message'] = "Vous devez sélectionner un personnage.";
    }

?>