<?php

    //Retourne l'identifiant de l'utilisateur auquel appartient cette composition
    function get_proprietaire_composition($id_composition)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_utilisateur_id FROM composition WHERE id_composition = :id_composition");
            $stmt->bindParam("id_composition", $id_composition, PDO::PARAM_INT);
            $stmt->execute();
            $utilisateur_id = $stmt->fetch();
            return $utilisateur_id['utilisateur_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir l'identifiant de l'utilisateur ayant enregistré cette composition': ". $e->getMessage();
        }
    }

    //Retourne l'identifiant de l'utilisateur auquel appartient cette composition
    function get_composition_selon_id_personnage($id_personnage)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT id_composition FROM composition WHERE personnage_utilisateur_id = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $composition = $stmt->fetch();
            return $composition['id_composition'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir l'identifiant de la composition correspondant au personnage sélectionné: ". $e->getMessage();
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

    //Retourne l'identifiant du personnage qui jouera le joueur 1
    function get_personnage_1($id_composition)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_1_id FROM composition WHERE id_composition = :id_composition");
            $stmt->bindParam("id_composition", $id_composition, PDO::PARAM_INT);
            $stmt->execute();
            $personnage = $stmt->fetch();
            return $personnage['personnage_1_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le joueur 1 de cette composition': ". $e->getMessage();
        }
    }

    //Retourne l'identifiant du personnage qui jouera le joueur 2
    function get_personnage_2($id_composition)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_2_id FROM composition WHERE id_composition = :id_composition");
            $stmt->bindParam("id_composition", $id_composition, PDO::PARAM_INT);
            $stmt->execute();
            $personnage = $stmt->fetch();
            return $personnage['personnage_2_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le joueur 2 de cette composition': ". $e->getMessage();
        }
    }

    //Retourne l'identifiant du personnage qui jouera le joueur 3
    function get_personnage_3($id_composition)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_3_id FROM composition WHERE id_composition = :id_composition");
            $stmt->bindParam("id_composition", $id_composition, PDO::PARAM_INT);
            $stmt->execute();
            $personnage = $stmt->fetch();
            return $personnage['personnage_3_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le joueur 3 de cette composition': ". $e->getMessage();
        }
    }

    //Retourne l'identifiant du personnage qui jouera le joueur 4
    function get_personnage_4($id_composition)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_4_id FROM composition WHERE id_composition = :id_composition");
            $stmt->bindParam("id_composition", $id_composition, PDO::PARAM_INT);
            $stmt->execute();
            $personnage = $stmt->fetch();
            return $personnage['personnage_4_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le joueur 4 de cette composition': ". $e->getMessage();
        }
    }

    //Retourne l'identifiant du personnage qui jouera le joueur 5
    function get_personnage_5($id_composition)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_5_id FROM composition WHERE id_composition = :id_composition");
            $stmt->bindParam("id_composition", $id_composition, PDO::PARAM_INT);
            $stmt->execute();
            $personnage = $stmt->fetch();
            return $personnage['personnage_5_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le joueur 5 de cette composition': ". $e->getMessage();
        }
    }

    //Retourne l'identifiant du personnage qui jouera le joueur 6
    function get_personnage_6($id_composition)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_6_id FROM composition WHERE id_composition = :id_composition");
            $stmt->bindParam("id_composition", $id_composition, PDO::PARAM_INT);
            $stmt->execute();
            $personnage = $stmt->fetch();
            return $personnage['personnage_6_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le joueur 6 de cette composition': ". $e->getMessage();
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