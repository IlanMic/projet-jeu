<?php
    //Getter pour le nom d'un utilisateur
    function get_pseudo($id_utilisateur)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT pseudo FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $nom_utilisateur = $stmt->fetch();
            return $nom_utilisateur['pseudo'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le pseudonyme de l'utilisateur: ". $e->getMessage();
        }
    }

    //Getter pour le mot de passe d'un utilisateur
    function get_mot_de_passe($id_race)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT mot_de_passe FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $mot_de_passe = $stmt->fetch();
            return $mot_de_passe['mot_de_passe'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le mot de passe de l'utilisateur: ". $e->getMessage();
        }
    }
    
    //Getter pour le statut du compte d'un utilisateur
    function get_premium($id_utilisateur)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT compte_premium FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $compte_premium = $stmt->fetch();
            return $compte_premium['compte_premium'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le statut (premium ou non) de l'utilisateur: ". $e->getMessage();
        }
    }

    //Getter pour l'adresse mail d'un utilisateur
    function get_mail($id_utilisateur)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT adresse_mail FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $adresse_mail = $stmt->fetch();
            return $adresse_mail['adresse_mail'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir l'adresse mail de l'utilisateur: ". $e->getMessage();
        }
    }

    //Getter pour le personnage 1 d'un utilisateur
    function get_personnage_1($id_utilisateur)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_1_id FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $personnage_1 = $stmt->fetch();
            return $personnage_1['personnage_1_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le personnage 1 de l'utilisateur: ". $e->getMessage();
        }
    }

    //Getter pour le personnage 1 d'un utilisateur
    function get_personnage_2($id_utilisateur)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_2_id FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $personnage_2 = $stmt->fetch();
            return $personnage_2['personnage_2_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le personnage 2 de l'utilisateur: ". $e->getMessage();
        }
    }

    //Getter pour le personnage 1 d'un utilisateur
    function get_personnage_3($id_utilisateur)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_3_id FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $personnage_3 = $stmt->fetch();
            return $personnage_3['personnage_3_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le personnage 3 de l'utilisateur: ". $e->getMessage();
        }
    }

    //Getter pour le club dont l'utilisateur est propriétaire
    function get_club_nom($id_utilisateur)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT nom_club FROM club WHERE proprietaire_id = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $club = $stmt->fetch();
            return $club['nom_club'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le club de l'utilisateur: ". $e->getMessage();
        }
    }

    //Getter de race par identifiant
    function get_utilisateur_by_ID($id_utilisateur)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $utilisateur = $stmt->fetch();
            return $utilisateur;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations de l'utilisateur: ". $e->getMessage();
        }
    }

    //Getter pour obtenir tous les utilisateurs
    function get_all_utilisateurs()
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM utilisateur");
            $all_utilisateurs = $stmt->fetchAll();
            return $all_utilisateurs;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des utilisateur: ". $e->getMessage();
        }
    } 
?>