<?php
    //Getter pour le nom d'une race
    function get_nom_race($id_race)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT nom_race FROM race WHERE id_race = :id_race");
            $stmt->bindParam("id_race", $id_race, PDO::PARAM_INT);
            $stmt->execute();
            $nom_race = $stmt->fetch();
            return $nom_race['nom_race'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nom d'une race de personnage: ". $e->getMessage();
        }
    }

    //Getter de race par identifiant
    function get_race_by_ID($id_race)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM race WHERE id_race = :id_race");
            $stmt->bindParam("id_race", $id_race, PDO::PARAM_INT);
            $stmt->execute();
            $race = $stmt->fetch();
            return $race;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations de la race: ". $e->getMessage();
        }
    }

    //Getter pour obtenir toutes les races
    function get_all_races()
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM race");
            $all_races = $stmt->fetchAll();
            return $all_races;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des races: ". $e->getMessage();
        }
    } 
?>