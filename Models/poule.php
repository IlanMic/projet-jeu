<?php

    //Getter pour le nom d'une poule
    function get_nom_poule($id_poule)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT nom_poule FROM poule WHERE id_poule = :id_poule");
            $stmt->bindParam("id_poule", $id_poule, PDO::PARAM_INT);
            $stmt->execute();
            $nom_poule = $stmt->fetch();
            return $nom_poule['nom_poule'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nom d'une poule: ". $e->getMessage();
        }
    }

    //Getter pour la liste des clubs appartenant à la poule
    function get_clubs_poule($id_poule)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT club_1_id, club_2_id, club_3_id, club_4_id, club_5_id, club_6_id, club_7_id, club_8_id, club_9_id, club_10_id FROM poule WHERE id_poule = :id_poule");
            $stmt->bindParam("id_poule", $id_poule, PDO::PARAM_INT);
            $stmt->execute();
            $clubs_poule = $stmt->fetch();
            return $clubs_poule;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des clubs appartenant à cette poule: ". $e->getMessage();
        }
    }

    //Getter pour la liste des scores de cette poule
    function get_score_clubs_poule($id_poule)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT points_club_1, points_club_2, points_club_3, points_club_4, points_club_5, points_club_6, points_club_7, points_club_8, points_club_9, points_club_10 FROM poule WHERE id_poule = :id_poule");
            $stmt->bindParam("id_poule", $id_poule, PDO::PARAM_INT);
            $stmt->execute();
            $clubs_poule = $stmt->fetch();
            return $clubs_poule;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les scores cette poule: ". $e->getMessage();
        }
    }

    //Getter de poule par identifiant
    function get_poule_by_ID($id_poule)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM poule WHERE id_poule = :id_poule");
            $stmt->bindParam("id_poule", $id_poule, PDO::PARAM_INT);
            $stmt->execute();
            $poule = $stmt->fetch();
            return $poule;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations de la poule: ". $e->getMessage();
        }
    }

    //Getter pour obtenir toutes les poules
    function get_all_poules()
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM poule");
            $all_poules = $stmt->fetchAll();
            return $all_poules;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des poules: ". $e->getMessage();
        }
    } 

    //Getter pour obtenir la poule d'un club
    function get_poule_from_club_id($club_id)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT id_poule FROM poule WHERE club_id_1 = :club_1 OR club_id_2 = :club_2 OR club_id_3 = :club_3 OR club_id_4 = :club_4 OR club_id_5 = :club_5 OR club_id_6 = :club_6 OR club_id_7 = :club_7 OR club_id_8 = :club_8 OR club_id_9 = :club_9 OR club_id_10 = :club_10");
            $stmt->bindParam("club_1", $club_id, PDO::PARAM_INT);
            $stmt->bindParam("club_2", $club_id, PDO::PARAM_INT);
            $stmt->bindParam("club_3", $club_id, PDO::PARAM_INT);
            $stmt->bindParam("club_4", $club_id, PDO::PARAM_INT);
            $stmt->bindParam("club_5", $club_id, PDO::PARAM_INT);
            $stmt->bindParam("club_6", $club_id, PDO::PARAM_INT);
            $stmt->bindParam("club_7", $club_id, PDO::PARAM_INT);
            $stmt->bindParam("club_8", $club_id, PDO::PARAM_INT);
            $stmt->bindParam("club_9", $club_id, PDO::PARAM_INT);
            $stmt->bindParam("club_10", $club_id, PDO::PARAM_INT);
            $stmt->execute();
            $poule_du_club = $stmt->fetch();
            return $poule_du_club['id_poule'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la poule auquel ce club appartient: ". $e->getMessage();
        }
    } 
?>