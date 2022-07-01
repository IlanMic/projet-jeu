<?php

    //Getter pour le nom du club
    function get_club($id_club)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT nom_club FROM club WHERE id_club = :id_club");
            $stmt->bindParam("id_club", $id_club, PDO::PARAM_INT);
            $stmt->execute();
            $nom_club = $stmt->fetch();
            return $nom_club['nom_club'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nom du club: ". $e->getMessage();
        }
    }

    //Getter pour l'identifiant du propriétaire du club
    function get_proprietaire_id($id_club)
    {
        try {
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT proprietaire_id FROM club WHERE id_club = :id_club");
            $stmt->bindParam("id_club", $id_club, PDO::PARAM_INT);
            $stmt->execute();
            $proprietaire = $stmt->fetch();
            return $proprietaire['proprietaire_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le propriétaire du club: ". $e->getMessage();
        }
    }

    //Getter pour l'identifiant du club à partir de celui de son propriétaire
    function get_club_id_from_proprietaire_id($id_proprietaire)
    {
        try {
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT id_club FROM club WHERE proprietaire_id = :id_proprietaire");
            $stmt->bindParam("id_proprietaire", $id_proprietaire, PDO::PARAM_INT);
            $stmt->execute();
            $club = $stmt->fetch();
            return $club['id_club'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le club: ". $e->getMessage();
        }
    }

    //Getter de club par identifiant
    function get_club_by_ID($id_club)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM club WHERE id_club = :id_club");
            $stmt->bindParam("id_club", $id_club, PDO::PARAM_INT);
            $stmt->execute();
            $club = $stmt->fetch();
            return $club;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le club: ". $e->getMessage();
        }
    }

    //Getter pour obtenir tous les clubs
    function get_all_clubs()
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM club");
            $all_club = $stmt->fetchAll();
            return $all_club;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les clubs: ". $e->getMessage();
        }
    }

    //Getter pour obtenir tous 25 clubs n'appartenant pas à une poule
    function get_40_clubs()
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT club.* FROM club ORDER BY RAND() LIMIT 40");
            $all_club = $stmt->fetchAll();
            return $all_club;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les clubs: ". $e->getMessage();
        }
    }

    //Getter pour obtenir tous les clubs
    function get_all_clubs_from_name($nom_club)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM club WHERE nom_club LIKE :nom_club");
            $stmt->execute(array(":nom_club" => "%".$nom_club."%"));
            $all_club_by_name = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $all_club_by_name;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les clubs à partir de leur nom: ". $e->getMessage();
        }
    }

    //Getter pour le propriétaire du club
    function get_proprietaire($proprietaire_id)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = :proprietaire_id");
            $stmt->bindParam("proprietaire_id", $proprietaire_id, PDO::PARAM_INT);
            $stmt->execute();
            $proprietaire = $stmt->fetch();
            return $proprietaire;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le propriétaire du club: ". $e->getMessage();
        }
    }

    //Getter pour les membres du club
    function get_all_personnages_club($club_id)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM personnage WHERE club_id = :club_id");
            $stmt->bindParam("club_id", $club_id, PDO::PARAM_INT);
            $stmt->execute();
            $all_personnages_club = $stmt->fetchAll();
            return $all_personnages_club;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des membres du club: ". $e->getMessage();
        }
    }
?>