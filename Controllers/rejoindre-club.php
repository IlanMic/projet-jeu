<?php
    session_start();

    if(isset($_POST['personnageid'])) {
        $identifiant_club = $_POST['club_id'];
        $identififiant_personnage = $_POST['personnageid'];
        require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
        $pdo = connect_db();
        $stmt = $pdo->prepare("UPDATE personnage SET club_id = :club_id WHERE id_personnage = :id_personnage");
        $stmt->bindParam("club_id", $identifiant_club, PDO::PARAM_INT);
        $stmt->bindParam("id_personnage", $identififiant_personnage, PDO::PARAM_INT);
        if($stmt->execute()) {
            $_SESSION['etat'] = "Succès";
            $_SESSION['message'] = "Le personnage a bien rejoint le club.";
            header('Location: ../Views/index.php');
        } else {
            $_SESSION['etat'] = "Echec";
            $_SESSION['message'] = "Le personnage ne peut rejoindre le club";
            header('Location: ../Views/index.php');
        }
    } else{
        $_SESSION['etat'] = "Echec";
        $_SESSION['message'] = "Veuillez remplir tous les champs obligatoires pour que le personnage puiss rejoindre le club.";
        header('Location: ../Views/index.php');
    }
?>