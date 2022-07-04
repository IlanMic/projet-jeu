<?php
    session_start();
    require_once("../../Core/Core.php");
    require_once("../../Core/ConnexionBDD.php");

    //On vérifie que les champs obligatoires ont été saisis 
    if(isset($_POST['nom_poule']) && isset($_POST['division']) && isset($_POST['type'])) {
        //On définit les variables du formulaires
        $poule = $_POST['nom_poule'];
        $division = $_POST['division'];
        $type_matchs_poule = $_POST['type'];

        //Préparation de la requête SQL
        $pdo = connect_db();
        $stmt = $pdo->prepare("INSERT INTO poule (nom_poule, division, type_poule) VALUES (:poule, :division, :type_matchs_poule)");
        $stmt->bindParam("poule", $poule, PDO::PARAM_STR);
        $stmt->bindParam("division", $division, PDO::PARAM_INT);
        $stmt->bindParam("type_matchs_poule", $type_matchs_poule, PDO::PARAM_INT);

        //Si la requête s'exécute, on pourra ajouter d'éventuels clubs dans la poule
        if($stmt->execute()) {
            $derniere_poule_ajoute = $pdo->lastInsertId();
            //On vérifie que tous les clubs du club ont été sélectionnés et agit en conséquence
            if(isset($_POST['club_1']) && $_POST['club_1']!="null"){
                $club = $_POST['club_1'];
                //On prépare la requête SQL pour mettre à jour le club du personnage
                $update_joueur_club = $pdo->prepare("UPDATE poule SET club_id_1 =:club_id WHERE id_poule =:poule");
                $update_joueur_club->bindParam("club_id", $club, PDO::PARAM_INT);
                $update_joueur_club->bindParam("poule", $derniere_poule_ajoute, PDO::PARAM_INT);
                if($update_joueur_club->execute()) {
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                }
            }

            if(isset($_POST['club_2']) && $_POST['club_2']!="null"){
                $club = $_POST['club_2'];
                //On prépare la requête SQL pour mettre à jour le club du personnage
                $update_joueur_club = $pdo->prepare("UPDATE poule SET club_id_2 =:club_id WHERE id_poule =:poule");
                $update_joueur_club->bindParam("club_id", $club, PDO::PARAM_INT);
                $update_joueur_club->bindParam("poule", $derniere_poule_ajoute, PDO::PARAM_INT);
                if($update_joueur_club->execute()) {
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                }
            }

            if(isset($_POST['club_3']) && $_POST['club_3']!="null"){
                $club = $_POST['club_3'];
                //On prépare la requête SQL pour mettre à jour le club du personnage
                $update_joueur_club = $pdo->prepare("UPDATE poule SET club_id_3 =:club_id WHERE id_poule =:poule");
                $update_joueur_club->bindParam("club_id", $club, PDO::PARAM_INT);
                $update_joueur_club->bindParam("poule", $derniere_poule_ajoute, PDO::PARAM_INT);
                if($update_joueur_club->execute()) {
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                }
            }

            if(isset($_POST['club_4']) && $_POST['club_4']!="null"){
                $club = $_POST['club_4'];
                //On prépare la requête SQL pour mettre à jour le club du personnage
                $update_joueur_club = $pdo->prepare("UPDATE poule SET club_id_4 =:club_id WHERE id_poule =:poule");
                $update_joueur_club->bindParam("club_id", $club, PDO::PARAM_INT);
                $update_joueur_club->bindParam("poule", $derniere_poule_ajoute, PDO::PARAM_INT);
                if($update_joueur_club->execute()) {
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                }
            }


            if(isset($_POST['club_5']) && $_POST['club_5']!="null"){
                $club = $_POST['club_5'];
                //On prépare la requête SQL pour mettre à jour le club du personnage
                $update_joueur_club = $pdo->prepare("UPDATE poule SET club_id_5 =:club_id WHERE id_poule =:poule");
                $update_joueur_club->bindParam("club_id", $club, PDO::PARAM_INT);
                $update_joueur_club->bindParam("poule", $derniere_poule_ajoute, PDO::PARAM_INT);
                if($update_joueur_club->execute()) {
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                }
            }

            if(isset($_POST['club_6']) && $_POST['club_6']!="null"){
                $club = $_POST['club_6'];
                //On prépare la requête SQL pour mettre à jour le club du personnage
                $update_joueur_club = $pdo->prepare("UPDATE poule SET club_id_6 =:club_id WHERE id_poule =:poule");
                $update_joueur_club->bindParam("club_id", $club, PDO::PARAM_INT);
                $update_joueur_club->bindParam("poule", $derniere_poule_ajoute, PDO::PARAM_INT);
                if($update_joueur_club->execute()) {
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                }
            }

            if(isset($_POST['club_7']) && $_POST['club_7']!="null"){
                $club = $_POST['club_7'];
                //On prépare la requête SQL pour mettre à jour le club du personnage
                $update_joueur_club = $pdo->prepare("UPDATE poule SET club_id_7 =:club_id WHERE id_poule =:poule");
                $update_joueur_club->bindParam("club_id", $club, PDO::PARAM_INT);
                $update_joueur_club->bindParam("poule", $derniere_poule_ajoute, PDO::PARAM_INT);
                if($update_joueur_club->execute()) {
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                }
            }

            if(isset($_POST['club_8']) && $_POST['club_8']!="null"){
                $club = $_POST['club_8'];
                //On prépare la requête SQL pour mettre à jour le club du personnage
                $update_joueur_club = $pdo->prepare("UPDATE poule SET club_id_8 =:club_id WHERE id_poule =:poule");
                $update_joueur_club->bindParam("club_id", $club, PDO::PARAM_INT);
                $update_joueur_club->bindParam("poule", $derniere_poule_ajoute, PDO::PARAM_INT);
                if($update_joueur_club->execute()) {
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                }
            }

            if(isset($_POST['club_9']) && $_POST['club_9']!="null"){
                $club = $_POST['club_9'];
                //On prépare la requête SQL pour mettre à jour le club du personnage
                $update_joueur_club = $pdo->prepare("UPDATE poule SET club_id_9 =:club_id WHERE id_poule =:poule");
                $update_joueur_club->bindParam("club_id", $club, PDO::PARAM_INT);
                $update_joueur_club->bindParam("poule", $derniere_poule_ajoute, PDO::PARAM_INT);
                if($update_joueur_club->execute()) {
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                }
            }

            if(isset($_POST['club_10']) && $_POST['club_10']!="null"){
                $club = $_POST['club_10'];
                //On prépare la requête SQL pour mettre à jour le club du personnage
                $update_joueur_club = $pdo->prepare("UPDATE poule SET club_id_10 =:club_id WHERE id_poule =:poule");
                $update_joueur_club->bindParam("club_id", $club, PDO::PARAM_INT);
                $update_joueur_club->bindParam("poule", $derniere_poule_ajoute, PDO::PARAM_INT);
                if($update_joueur_club->execute()) {
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                }
            }

            //Message de validation d'ajout de la poule et de ses éventuels clubs
            $_SESSION['etat'] = "Succès";
            $_SESSION['message'] = "La poule a pu être créée et les clubs sélectionnés ont pu rejoindre la poule.";
            header('Location: ../../Views/page-admin.php');

        //Message d'erreur en cas de non exécution de la requête SQL
        } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../../Views/page-admin.php');
        $_SESSION['message'] = "La création de la poule n'a pu aboutir: veuillez renseigner tous les champs obligatoires.";
        }

    //Message d'erreure en cas de non saisie des champs obligatoires
    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../../Views/page-admin.php');
        $_SESSION['message'] = "La création de la poule n'a pu aboutir: veuillez renseigner tous les champs obligatoires.";
    }
?>
