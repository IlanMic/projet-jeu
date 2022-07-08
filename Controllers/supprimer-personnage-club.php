<?php
    session_start();

    if(isset($_POST['personnage_id'])) {

        $id_personnage = $_POST['personnage_id'];

        require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
        $pdo = connect_db();

        //Récupération des utilisateurs correspondants
        $stmt = $pdo->prepare("UPDATE personnage SET club_id = NULL WHERE id_personnage = :id_personnage");
        $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
        if($stmt->execute()) {
            $_SESSION['etat'] = "Succès";
            header('Location: ../Views/index.php');
            $_SESSION['message'] = "Le personnage a bien été supprimé du club.";
        } else {
            $_SESSION['etat'] = "Echec";
            header('Location: ../Views/index.php');
            $_SESSION['message'] = "Impossible de supprimer un personnage pour le moment.";
        }
        
    }else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../Views/index.php');
        $_SESSION['message'] = "Impossible de supprimer un personnage pour le moment.";
    }


?>