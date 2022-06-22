<?php
    //Getter pour le nom d'un type de match
    function get_type_match($id_type_match)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT type_match FROM type_match WHERE id_type_match = :id_type_match");
            $stmt->bindParam("id_type_match", $id_type_match, PDO::PARAM_INT);
            $stmt->execute();
            $type_match = $stmt->fetch();
            return $type_match['type_match'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nom du type de match: ". $e->getMessage();
        }
    }

    //Getter pour la valeur des points remportés pour le club gagnant
    function get_points_gagnant($id_type_match)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT points_gagnant FROM type_match WHERE id_type_match = :id_type_match");
            $stmt->bindParam("id_type_match", $id_type_match, PDO::PARAM_INT);
            $stmt->execute();
            $points_gagnant = $stmt->fetch();
            return $points_gagnant['points_gagnant'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nombre de points accordés au club gagnant: ". $e->getMessage();
        }
    }

    //Getter pour la valeur des points remportés pour le club gagnant
    function get_points_perdant($id_type_match)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT points_perdant FROM poule WHERE id_type_match = :id_type_match");
            $stmt->bindParam("id_type_match", $id_type_match, PDO::PARAM_INT);
            $stmt->execute();
            $points_perdant = $stmt->fetch();
            return $points_perdant['points_perdant'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nombre de points accordées au club perdant: ". $e->getMessage();
        }
    }

    //Getter de type de match par identifiant
    function get_type_match_by_ID($id_poule)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM type_match WHERE id_type_match = :id_type_match");
            $stmt->bindParam("id_type_match", $id_type_match, PDO::PARAM_INT);
            $stmt->execute();
            $type_match = $stmt->fetch();
            return $type_match;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations sur le type de match: ". $e->getMessage();
        }
    }

    //Getter pour obtenir tous les types de match
    function get_all_types_match()
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM type_match");
            $all_poules = $stmt->fetchAll();
            return $all_poules;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des poules: ". $e->getMessage();
        }
    } 
?>