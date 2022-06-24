<?php
    session_start();

    if(isset($_POST['nom_club']) && $_POST['nom_club'] != "") {
        if(isset($_POST['club_id'])) {
            try{
                require_once("../Core/ConnexionBDD.php");
                $pdo = connect_db();
                $stmt = $pdo->prepare("UPDATE club SET nom_club = :nom_club WHERE id_club = :id_club");
                $stmt->bindParam("nom_club", $_POST['nom_club'], PDO::PARAM_STR);
                $stmt->bindParam("id_club", $_POST['club_id'], PDO::PARAM_INT);
                if($stmt->execute()) {
                    $_SESSION['etat'] = "Succès";
                    $_SESSION['message'] = "Mise à jour du club réussi";
                    header('Location: ../Views/index.php');
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../Views/modification-club.php?club='.$_POST['club_id']);
                    $_SESSION['message'] = "Impossible de modifier le club pour le moment. ";                    
                }
            } catch(PDOException $e) {
                echo "Impossible de modifier le club: ". $e->getMessage();
            }

        } else {

        }
    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../Views/modification-club.php?club='.$_POST['club_id']);
        $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi.";
    }
?>