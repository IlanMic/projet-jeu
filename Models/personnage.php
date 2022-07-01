<?php

    //Getter pour le nom du personnage
    function get_nom_personnage($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT nom_personnage FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $nom_personnage = $stmt->fetch();
            return $nom_personnage['nom_personnage'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le nom du personnage: ". $e->getMessage();
        }
    }

    //Getter pour l'identifiant de la race du personnage
    function get_race_id($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT race_id FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $race_id = $stmt->fetch();
            return $race_id['race_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la race du personnage: ". $e->getMessage();
        }
    }

    //Getter pour les points d'endurance du personnage
    function get_endurance($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT endurance FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $endurance = $stmt->fetch();
            return $endurance['endurance'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les points d'endurance du personnage: ". $e->getMessage();
        }
    }

    //Getter pour les points de force du personnage
    function get_force($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT strength FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $force = $stmt->fetch();
            return $force['strength'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les points de force du personnage: ". $e->getMessage();
        }
    }

    //Getter pour les points de tacle du personnage
    function get_tacle($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT tacle FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $tacle = $stmt->fetch();
            return $tacle['tacle'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les points de tacle du personnage: ". $e->getMessage();
        }
    }

    //Getter pour les points de defense du personnage
    function get_defense($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT defense FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $defense = $stmt->fetch();
            return $defense['defense'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les points de défense du personnage: ". $e->getMessage();
        }
    }

    //Getter pour les points de technique du personnage
    function get_technique($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT technique FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $technique = $stmt->fetch();
            return $technique['technique'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les points de technique du personnage: ". $e->getMessage();
        }
    }

    //Getter pour les points de vitesse du personnage
    function get_vitesse($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT vitesse FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $vitesse = $stmt->fetch();
            return $vitesse['vitesse'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les points de vitesse du personnage: ". $e->getMessage();
        }
    }

    //Getter pour le nom du personnage
    function get_intelligence($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT intelligence FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $intelligence = $stmt->fetch();
            return $intelligence['intelligence'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les points d'intelligence du personnage: ". $e->getMessage();
        }
    }

    //Getter pour le nom du personnage
    function get_passe($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT passe FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $passe = $stmt->fetch();
            return $passe['passe'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les points de passe du personnage: ". $e->getMessage();
        }
    }

    //Getter pour les points de tir du personnage
    function get_tir($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT tir FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $tir = $stmt->fetch();
            return $tir['tir'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les points de tir du personnage: ". $e->getMessage();
        }
    }

    //Getter pour les points d'expérience du personnage
    function get_experience($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT experience FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $experience = $stmt->fetch();
            return $experience['experience'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les points d'expérience du personnage: ". $e->getMessage();
        }
    }

    //Getter pour le niveau du personnage
    function get_niveau($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT niveau FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $niveau = $stmt->fetch();
            return $niveau['niveau'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le niveau du personnage: ". $e->getMessage();
        }
    }

    //Getter pour l'identifiant du club du personnage
    function get_club_id($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT club_id FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $club_id = $stmt->fetch();
            return $club_id['club_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le club auquel le personnage appartient: ". $e->getMessage();
        }
    }

    //Getter pour le club du personnage
    function get_club_infos($id_club)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM club WHERE id_club = :id_club");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $club = $stmt->fetch();
            return $club;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le club auquel le personnage appartient: ". $e->getMessage();
        }
    }

    //Getter pour l'illustration du personnage
    function get_illustration($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT illustration FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $illustration = $stmt->fetch();
            return $illustration['illustration'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir l'illustration du personnage: ". $e->getMessage();
        }
    }

    //Getter pour la biographie du personnage
    function get_biographie($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT biographie FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $biographie = $stmt->fetch();
            return $biographie['biographie'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la biographie du personnage: ". $e->getMessage();
        }
    }

    //Getter pour la capacité 1 du personnage
    function get_capacite_1($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT capacite_1_id FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $capacite_1 = $stmt->fetch();
            return $capacite_1['capacite_1_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la capacité 1 du personnage: ". $e->getMessage();
        }
    }

    //Getter pour la capacité 2 du personnage
    function get_capacite_2($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT capacite_2_id FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $capacite_2 = $stmt->fetch();
            return $capacite_2['capacite_2_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la capacité 1 du personnage: ". $e->getMessage();
        }
    }

    //Getter pour le poste du personnage du personnage
    function get_personnage_poste_id($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT poste_id FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $poste_id = $stmt->fetch();
            return $poste_id['poste_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le poste du personnage: ". $e->getMessage();
        }
    }

    //Getter pour obtenir le joueur possédant le personnage
    function get_joueur($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT id_utilisateur FROM utilisateur WHERE personnage_1_id = :id_personnage_1 OR personnage_2_id = :id_personnage_2 OR personnage_3_id = :id_personnage_3");
            $stmt->bindParam("id_personnage_1", $id_personnage, PDO::PARAM_INT);
            $stmt->bindParam("id_personnage_2", $id_personnage, PDO::PARAM_INT);
            $stmt->bindParam("id_personnage_3", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $joueur = $stmt->fetch();
            return $joueur['id_utilisateur'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations du joueur possédant le personnage: ". $e->getMessage();
        }
    }

    //Getter de personnage par identifiant
    function get_personnage_by_ID($id_personnage)
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            $stmt->execute();
            $personnage = $stmt->fetch();
            return $personnage;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations du personnage: ". $e->getMessage();
        }
    }

    //Getter pour obtenir tous les personnages
    function get_all_personnages()
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM personnage");
            $all_personnages = $stmt->fetchAll();
            return $all_personnages;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des personnages: ". $e->getMessage();
        }
    }  
    
    
    //Getter pour obtenir tous les personnages sans club
    function get_40_personnages_sans_club()
    {
        try{
            require_once("../Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->query("SELECT * FROM personnage WHERE club_id IS NULL ORDER BY RAND() LIMIT 40");
            $all_personnages_sans_club= $stmt->fetchAll();
            return $all_personnages_sans_club;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir la liste des personnages: ". $e->getMessage();
        }
    }    

?>