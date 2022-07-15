<?php

    //Getter pour l'identifiant du poste correspondant à cette orientation
    function get_poste_id($id_orientation)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT poste_id FROM orientation WHERE id_orientation = :id_orientation");
            $stmt->bindParam("id_orientation", $id_orientation, PDO::PARAM_INT);
            $stmt->execute();
            $poste = $stmt->fetch();
            return $poste['poste_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le type de ce match: ". $e->getMessage();
        }
    }

    //Getter pour le nom de l'orientation
    function get_orientation($id_orientation)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT nom_orientation FROM orientation WHERE id_orientation = :id_orientation");
            $stmt->bindParam("id_orientation", $id_orientation, PDO::PARAM_INT);
            $stmt->execute();
            $orientation = $stmt->fetch();
            return $orientation['nom_orientation'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nom de l'orientation: ". $e->getMessage();
        }
    }

    //Getter d'orientation par identifiant
    function get_orientation_by_ID($id_orientation)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM orientation WHERE id_orientation = :id_orientation");
            $stmt->bindParam("id_orientation", $id_orientation, PDO::PARAM_INT);
            $stmt->execute();
            $orientation = $stmt->fetch();
            return $orientation;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir l'orientation: ". $e->getMessage();
        }
    }

    //Getter pour obtenir toutes les orientations
    function get_all_orientations()
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM orientation");
            $all_orientation = $stmt->fetchAll();
            return $all_orientation;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des orientations: ". $e->getMessage();
        }
    }

    //Getter pour les orientations de défense
    function get_all_defense_orientations()
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM orientation WHERE poste_id = 2");
            $all_orientation = $stmt->fetchAll();
            return $all_orientation;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des orientations de défense: ". $e->getMessage();
        }
    }

    //Getter pour les orientations de milieu de terrain
    function get_all_milieu_orientations()
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM orientation WHERE poste_id = 3");
            $all_orientation = $stmt->fetchAll();
            return $all_orientation;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des orientations de milieu de terrain: ". $e->getMessage();
        }
    }

    //Getter pour les orientations d'attaque
    function get_all_attaque_orientations()
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM orientation WHERE poste_id = 4");
            $all_orientation = $stmt->fetchAll();
            return $all_orientation;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des orientations d'attaque: ". $e->getMessage();
        }    
    }

?>