<?php

    //Getter pour le nom du poste
    function get_nom_poste($id_poste)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT nom_poste FROM poste WHERE id_poste = :id_poste");
            $stmt->bindParam("id_poste", $id_poste, PDO::PARAM_INT);
            $stmt->execute();
            $nom_poste = $stmt->fetch();
            return $nom_poste['nom_poste'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nom du poste: ". $e->getMessage();
        }
    }

    //Getter de poste par identifiant
    function get_poste_by_ID($id_poste)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM poste WHERE id_poste = :id_poste");
            $stmt->bindParam("id_poste", $id_poste, PDO::PARAM_INT);
            $stmt->execute();
            $poste = $stmt->fetch();
            return $poste;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations de ce poste: ". $e->getMessage();
        }
    }

    //Getter pour obtenir tous les postes
    function get_all_postes()
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM poste");
            $all_postes = $stmt->fetchAll();
            return $all_postes;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des postes: ". $e->getMessage();
        }
    }   
?>