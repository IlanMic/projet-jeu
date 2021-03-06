<?php
    //Getter pour le nom d'un utilisateur
    function get_pseudo($id_utilisateur)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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

    //Getter pour la date de derni??re connexion d'un utilisateur
    function get_derniere_connexion($id_utilisateur)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT derniere_connexion FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $derniere_connexion = $stmt->fetch();
            return $derniere_connexion['derniere_connexion'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la date de derni??re connexion de l'utilisateur: ". $e->getMessage();
        }
    }

    //Getter pour le dernier personnage s??lectionn?? par l'utilisateur
    function get_dernier_personnage($id_utilisateur)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT dernier_personnage_utilise FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $dernier_personnage_utilise = $stmt->fetch();
            return $dernier_personnage_utilise['dernier_personnage_utilise'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le dernier personnage s??lectionn?? par l'utilisateur: ". $e->getMessage();
        }
    }

    //Getter pour le club dont l'utilisateur est propri??taire
    function get_club_nom($id_utilisateur)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM utilisateur");
            $all_utilisateurs = $stmt->fetchAll();
            return $all_utilisateurs;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des utilisateur: ". $e->getMessage();
        }
    }

        //Getter pour obtenir tous les utilisateurs non proprietaires
        function get_all_utilisateurs_non_proprietaires()
        {
            try{
                require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
                $pdo = connect_db();
                $stmt = $pdo->query("SELECT utilisateur.* FROM utilisateur LEFT JOIN club ON utilisateur.id_utilisateur = club.proprietaire_id WHERE club.proprietaire_id IS NULL");
                $all_utilisateurs_non_proprietaires = $stmt->fetchAll();
                return $all_utilisateurs_non_proprietaires;
                $pdo = null;
            } catch(PDOException $e) {
                echo "Impossible d'obtenir la liste des utilisateur non propri??taires: ". $e->getMessage();
            }
        } 
?>