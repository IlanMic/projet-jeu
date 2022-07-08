<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/Core.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
    //On vérifie que le nom du club et son propriétaire ont bien été renseignés
    if(isset($_POST['nom']) && isset($_POST['proprietaire']) && $_POST['proprietaire']!="null") {
        //On associe les variables
        $club = $_POST['nom'];
        $proprietaire = $_POST['proprietaire'];
        
        //On vérifie qu'aucun club ne possède ce nom
        if(club_est_unique_depuis_Admin($club) == true) {

            //On ouvre la connexion
            $pdo = connect_db();
            //On prépare la requête SQL
            $stmt = $pdo->prepare("INSERT INTO club (nom_club, proprietaire_id) VALUES (:club, :proprietaire)");
            $stmt->bindParam("club", $club, PDO::PARAM_INT);
            $stmt->bindParam("proprietaire", $proprietaire, PDO::PARAM_INT);
            
            //Si cela fonctionne, on procède à l'éventuel ajout de personnages dans le club
            if($stmt->execute()) {
                //On enregistre dans une variable l'identifiant du club tout juste créé
                $dernier_club_ajoute = $pdo->lastInsertId();

                //On ajoute les personnages sélectionnés au club
                if(isset($_POST['joueur']) && $_POST['joueur']!="null"){
                    $joueur = $_POST['joueur'];
                    //On prépare la requête SQL pour mettre à jour le club du personnage
                    $update_joueur_club = $pdo->prepare("UPDATE personnage SET club_id =:club_id WHERE id_personnage =:id_personnage");
                    $update_joueur_club->bindParam("club_id", $dernier_club_ajoute, PDO::PARAM_INT);
                    $update_joueur_club->bindParam("id_personnage", $joueur, PDO::PARAM_INT);
                    if($update_joueur_club->execute()) {
                    } else {
                        $_SESSION['etat'] = "Echec";
                        header('Location: ../../Views/page-admin.php');
                        $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                    }
                }

                if(isset($_POST['joueur2']) && $_POST['joueur2']!="null"){
                    $joueur = $_POST['joueur2'];
                    //On prépare la requête SQL pour mettre à jour le club du personnage
                    $update_joueur_club = $pdo->prepare("UPDATE personnage SET club_id =:club_id WHERE id_personnage =:id_personnage");
                    $update_joueur_club->bindParam("club_id", $dernier_club_ajoute, PDO::PARAM_INT);
                    $update_joueur_club->bindParam("id_personnage", $joueur, PDO::PARAM_INT);
                    if($update_joueur_club->execute()) {
                    } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                    }
                }

                if(isset($_POST['joueur3']) && $_POST['joueur3']!="null"){
                    $joueur = $_POST['joueur3'];
                    //On prépare la requête SQL pour mettre à jour le club du personnage
                    $update_joueur_club = $pdo->prepare("UPDATE personnage SET club_id =:club_id WHERE id_personnage =:id_personnage");
                    $update_joueur_club->bindParam("club_id", $dernier_club_ajoute, PDO::PARAM_INT);
                    $update_joueur_club->bindParam("id_personnage", $joueur, PDO::PARAM_INT);
                    if($update_joueur_club->execute()) {
                    } else {
                    $_POST['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_POST['message'] = "Le personnage n'a pu rejoindre le club";
                    }
                }

                if(isset($_POST['joueur4']) && $_POST['joueur4']!="null"){
                    $joueur = $_POST['joueur4'];
                    //On prépare la requête SQL pour mettre à jour le club du personnage
                    $update_joueur_club = $pdo->prepare("UPDATE personnage SET club_id =:club_id WHERE id_personnage =:id_personnage");
                    $update_joueur_club->bindParam("club_id", $dernier_club_ajoute, PDO::PARAM_INT);
                    $update_joueur_club->bindParam("id_personnage", $joueur, PDO::PARAM_INT);
                    if($update_joueur_club->execute()) {
                    } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                    }
                }

                if(isset($_POST['joueur5']) && $_POST['joueur5']!="null"){
                    $joueur = $_POST['joueur5'];
                    //On prépare la requête SQL pour mettre à jour le club du personnage
                    $update_joueur_club = $pdo->prepare("UPDATE personnage SET club_id =:club_id WHERE id_personnage =:id_personnage");
                    $update_joueur_club->bindParam("club_id", $dernier_club_ajoute, PDO::PARAM_INT);
                    $update_joueur_club->bindParam("id_personnage", $joueur, PDO::PARAM_INT);
                    if($update_joueur_club->execute()) {
                    } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                    }
                }

                if(isset($_POST['joueur6']) && $_POST['joueur6']!="null"){
                    $joueur = $_POST['joueur6'];
                    //On prépare la requête SQL pour mettre à jour le club du personnage
                    $update_joueur_club = $pdo->prepare("UPDATE personnage SET club_id =:club_id WHERE id_personnage =:id_personnage");
                    $update_joueur_club->bindParam("club_id", $dernier_club_ajoute, PDO::PARAM_INT);
                    $update_joueur_club->bindParam("id_personnage", $joueur, PDO::PARAM_INT);
                    if($update_joueur_club->execute()) {
                    } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                    }
                }

                if(isset($_POST['joueur7']) && $_POST['joueur7']!="null"){
                    $joueur = $_POST['joueur7'];
                    //On prépare la requête SQL pour mettre à jour le club du personnage
                    $update_joueur_club = $pdo->prepare("UPDATE personnage SET club_id =:club_id WHERE id_personnage =:id_personnage");
                    $update_joueur_club->bindParam("club_id", $dernier_club_ajoute, PDO::PARAM_INT);
                    $update_joueur_club->bindParam("id_personnage", $joueur, PDO::PARAM_INT);
                    if($update_joueur_club->execute()) {
                    } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu rejoindre le club";
                    }
                }

                $_SESSION['etat'] = "Succès";
                $_SESSION['message'] = "Le club a pu être créé et les personnages sélectionnés ont pu rejoindre le club.";
                header('Location: ../../Views/page-admin.php');

            //Message d'erreur dans le cas où l'exécution de la requête SQL n'a pu se réaliser
            } else {
                $_SESSION['etat'] = "Echec";
                header('Location: ../../Views/page-admin.php');
                $_SESSION['message'] = "La création de club n'a pu aboutir.";
            }

        //Message d'erreur dans le cas où un club existant possède déjà ce nom    
        } else {
                $_SESSION['etat'] = "Echec";
                header('Location: ../../Views/page-admin.php');
                $_SESSION['message'] = "La création de club n'a pu aboutir: un club possède déjà ce nom.";
            }



    //Message d'erreur dans le cas où un des champs obligatoires n'a pas été saisi
    } else  {
        $_SESSION['etat'] = "Echec";
        header('Location: ../../Views/page-admin.php');
        $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi. La création de club ne peut aboutir.";
    }
?>