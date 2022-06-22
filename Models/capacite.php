<?php
    //Getter pour le nom de la capacité
    function get_nom_capacite($id_capacite)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT nom_capacite FROM capacite WHERE id_capacite = :id_capacite");
            $stmt->bindParam("id_capacite", $id_capacite, PDO::PARAM_INT);
            $stmt->execute();
            $nom_capacite = $stmt->fetch();
            return $nom_capacite['nom_capacite'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nom de la capacité ". $e->getMessage();
        }
    }

    //Getter pour le type de la capacité
    function get_type($id_capacite)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT type FROM capacite WHERE id_capacite = :id_capacite");
            $stmt->bindParam("id_capacite", $id_capacite, PDO::PARAM_INT);
            $stmt->execute();
            $type = $stmt->fetch();
            return $type['type'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le type de la capacité: ". $e->getMessage();
        }
    }

    //Getter pour le temps de chargement de la capacité
    function get_temps_chargement($id_capacite)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT temps_chargement_secondes FROM capacite WHERE id_capacite = :id_capacite");
            $stmt->bindParam("id_capacite", $id_capacite, PDO::PARAM_INT);
            $stmt->execute();
            $temps_chargement = $stmt->fetch();
            return $temps_chargement['temps_chargement_secondes'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le temps de chargement de la capacité: ". $e->getMessage();
        }
    }

    //Getter pour le nom de l'effet provoqué par la capacité (étourdissement, nausée, ...)
    function get_effet($id_capacite)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT nom_effet FROM capacite WHERE id_capacite = :id_capacite");
            $stmt->bindParam("id_capacite", $id_capacite, PDO::PARAM_INT);
            $stmt->execute();
            $nom_effet = $stmt->fetch();
            return $nom_effet['nom_effet'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nom de l'effet infligé par la capacité: ". $e->getMessage();
        }
    }

    //Getter pour la durée effective de la capacité
    function get_duree_effet($id_capacite)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT duree_secondes_effet FROM capacite WHERE id_capacite = :id_capacite");
            $stmt->bindParam("id_capacite", $id_capacite, PDO::PARAM_INT);
            $stmt->execute();
            $duree_effet = $stmt->fetch();
            return $duree_effet['duree_secondes_effet'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la durée de l'effet: ". $e->getMessage();
        }
    }

    //Getter de capacité par identifiant
    function get_capacite_by_ID($id_capacite)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM capacite WHERE id_capacite = :id_capacite");
            $stmt->bindParam("id_capacite", $id_capacite, PDO::PARAM_INT);
            $stmt->execute();
            $capacite = $stmt->fetch();
            return $capacite;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la capacité: ". $e->getMessage();
        }
    }

    //Getter pour obtenir toutes les capacités
    function get_all_capacites()
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM capacite");
            $all_capacite = $stmt->fetchAll();
            return $all_capacite;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des capacités: ". $e->getMessage();
        }
    }
?>