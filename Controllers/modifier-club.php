<?php
    session_start();
    require_once("../Core/Core.php");

    if(isset($_POST['nom_club']) && $_POST['nom_club'] != "") {
        if(isset($_POST['club_id'])) {
            $nom = $_POST['nom_club'];
            if(club_est_unique($nom)){
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
                    $pdo =null;
                } catch(PDOException $e) {
                    echo "Impossible de modifier le club: ". $e->getMessage();
                }    
            } else {
                $_SESSION['etat'] = "Echec";
                header('Location: ../Views/modification-club.php?club='.$_POST['club_id']);
                $_SESSION['message'] = "Un club possède déjà ce nom. Impossible de renommer votre club ainsi.";
            }
        } else {
            $_SESSION['etat'] = "Echec";
            header('Location: ../Views/index.php');
            $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi.";
        }
    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../Views/modification-club.php?club='.$_POST['club_id']);
        $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi.";
    }
?>