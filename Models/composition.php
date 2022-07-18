<?php

    //Retourne l'identifiant de l'utilisateur auquel appartient cette composition
    function get_proprietaire_composition($id_composition)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT utilisateur_id FROM composition WHERE id_composition = :id_composition");
            $stmt->bindParam("id_composition", $id_composition, PDO::PARAM_INT);
            $stmt->execute();
            $utilisateur_id = $stmt->fetch();
            return $utilisateur_id['utilisateur_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir l'identifiant de l'utilisateur ayant enregistré cette composition': ". $e->getMessage();
        }
    }

    //Retourne l'identifiant du personnage qui jouera le gardien
    function get_gardien($id_composition)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT gardien_id FROM composition WHERE id_composition = :id_composition");
            $stmt->bindParam("id_composition", $id_composition, PDO::PARAM_INT);
            $stmt->execute();
            $gardien = $stmt->fetch();
            return $gardien['gardien_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le gardien cette composition': ". $e->getMessage();
        }
    }

    //Retourne 1 si l'utilisateur possède déjà une composition, 0 sinon
    function composition_existe_deja($id_utilisateur)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT id_composition FROM composition WHERE personnage_utilisateur_id = :utilisateur_id");
            $stmt->bindParam("utilisateur_id", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $composition_existe_deja = $stmt->fetch();
            if($composition_existe_deja != null) {
                return 1;
            } else {
                return 0;
            }
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le gardien cette composition': ". $e->getMessage();
        }
    }

?>