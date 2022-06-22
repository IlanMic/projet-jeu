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
?>