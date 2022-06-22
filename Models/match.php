<?php
    //Getter pour le type de match
    function get_type_match_id($id_match)
    {
        try{
                require_once("../Core/ConnexionBDD.php");
                $pdo = connect_db();
                $stmt = $pdo->prepare("SELECT type_match_id FROM matchs WHERE id_match = :id_match");
                $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
                $stmt->execute();
                $type_match = $stmt->fetch();
                return $type_match['type_match_id'];
                $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le type de ce match: ". $e->getMessage();
        }

    }

    //Getter pour l'identifiant du premier club participant au match
    function get_club_1($id_match)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT club_1_id FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $club_1 = $stmt->fetch();
            return $club_1['club_1_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le premier club participant au match: ". $e->getMessage();
        }
    }

    //Getter pour l'identifiant du second club participant au match
    function get_club_2($id_match)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT club_2_id FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $club_2 = $stmt->fetch();
            return $club_2['club_2_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le second club participant au match: ". $e->getMessage();
        }
    }

    //Getter pour la date du match
    function get_date_match($id_match)
    {
        try{
        require_once("../Core/ConnexionBDD.php");
        $pdo = connect_db();
        $stmt = $pdo->prepare("SELECT date_match FROM matchs WHERE id_match = :id_match");
        $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
        $stmt->execute();
        $date_match = $stmt->fetch();
        return $date_match['date_match'];
        $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la date du match: ". $e->getMessage();
        }
    }

    //Getter pour le score du club 1
    function get_score_club_1($id_match)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT score_club_1 FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $score_club_1 = $stmt->fetch();
            return $score_club_1['score_club_1'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le score du club 1: ". $e->getMessage();
        }
    }

    
    //Getter pour le score du club 2
    function get_score_club_2($id_match)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT score_club_2 FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $get_score_club_2 = $stmt->fetch();
            return $get_score_club_2['score_club_2'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le score du club 2: ". $e->getMessage();
        }
    }

    //Getter de match par identifiant
    function get_match_by_ID($id_match)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $match = $stmt->fetch();
            return $match;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations du match: ". $e->getMessage();
        }
    }

    //Getter pour obtenir tous les matchs
    function get_all_matchs()
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM matchs");
            $all_match = $stmt->fetchAll();
            return $all_match;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des matchs: ". $e->getMessage();
        }
    }

?>