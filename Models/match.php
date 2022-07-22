<?php
    //Getter pour le type de match
    function get_type_match_id($id_match)
    {
        try{
                require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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

    //Getter pour l'identifiant du premier utilisateur participant au match
    function get_utilisateur_1($id_match)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT utilisateur_1_id FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $utilisateur_1 = $stmt->fetch();
            return $utilisateur_1['utilisateur_1_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le premier utilisateur participant au match: ". $e->getMessage();
        }
    }

    //Getter pour l'identifiant du second utilisateur participant au match
    function get_utilisateur_2($id_match)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT utilisateur_2_id FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $utilisateur_2 = $stmt->fetch();
            return $utilisateur_2['utilisateur_2_id'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le second utilisateur participant au match: ". $e->getMessage();
        }
    }

    //Getter pour la date du match
    function get_date_match($id_match)
    {
        try{
        require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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

    //Getter pour le score du utilisateur 1
    function get_score_utilisateur_1($id_match)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT score_utilisateur_1 FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $score_utilisateur_1 = $stmt->fetch();
            return $score_utilisateur_1['score_utilisateur_1'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le score du utilisateur 1: ". $e->getMessage();
        }
    }

    
    //Getter pour le score du utilisateur 2
    function get_score_utilisateur_2($id_match)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT score_utilisateur_2 FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $get_score_utilisateur_2 = $stmt->fetch();
            return $get_score_utilisateur_2['score_utilisateur_2'];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir le score du utilisateur 2: ". $e->getMessage();
        }
    }

    //Getter retournant 1 si un match est terminé, 0 si ce n'est pas le cas
    function get_statut_match($id_match)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT est_fini FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $match_est_fini = $stmt->fetch();
            return $match_est_fini;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations du match: ". $e->getMessage();
        }
    }

    //Permet de retourner la composition de l'équipe 1 du match
    function get_equipe_1($id_match)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT utilisateur_1_joueur_1, utilisateur_1_joueur_2, utilisateur_1_joueur_3, utilisateur_1_joueur_4, utilisateur_1_joueur_5, utilisateur_1_joueur_6, utilisateur_1_joueur_7 FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $equipe_1 = $stmt->fetch();
            return $equipe_1;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir l'équipe 1 du match: ". $e->getMessage();
        }
    }

    //Permet de retourner la composition de l'équipe 2 du match
    function get_equipe_2($id_match)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT utilisateur_2_joueur_1, utilisateur_2_joueur_2, utilisateur_2_joueur_3, utilisateur_2_joueur_4, utilisateur_2_joueur_5, utilisateur_2_joueur_6, utilisateur_2_joueur_7 FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $equipe_1 = $stmt->fetch();
            return $equipe_1;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir l'équipe 1 du match: ". $e->getMessage();
        }
    }

    //Permet de retourner l'identifiant du joueur X du utilisateur Y
    function get_joueur_X_from_utilisateur_Y_from_match_z($joueur, $utilisateur, $id_match)
    {
        try{
            $data_utilisateur ="utilisateur_".$utilisateur."_joueur_".$joueur;
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT $data_utilisateur FROM matchs WHERE id_match = :id_match");
            $stmt->bindParam("id_match", $id_match, PDO::PARAM_INT);
            $stmt->execute();
            $match = $stmt->fetch();
            return $match[$data_utilisateur];
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations du joueur ". $joueur ." du utilisateur ".$utilisateur .": ". $e->getMessage();
        }
    }

    //Getter de match par identifiant
    function get_match_by_ID($id_match)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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

    //Getter de match par utilisateur
    function get_match_by_utilisateur($id_utilisateur)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM matchs WHERE utilisateur_1_id = :id_utilisateur OR utilisateur_2_id = :id_utilisateur2");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->bindParam("id_utilisateur2", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $match = $stmt->fetch();
            return $match;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations du match: ". $e->getMessage();
        }
    }

    //Getter de match en cours par utilisateur
    function get_match_en_cours_by_utilisateur($id_utilisateur)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT * FROM matchs WHERE utilisateur_1_id = :id_utilisateur OR utilisateur_2_id = :id_utilisateur2 AND est_fini = 0 AND a_commence = 0");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->bindParam("id_utilisateur2", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $match = $stmt->fetchAll();
            return $match;
            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations du match en cours: ". $e->getMessage();
        }
    }

    
    /**
     * Getter du prochain match
     * 
     * Retourne l'id du prochain match si plannifé
     * 
     * Retourne 0 sinon
     * 
     */    
    function get_next_match($id_personnage)
    {
        require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/personnage.php");
        require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/poule.php");
        require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
        try { 
            $club_personnage = get_club_id($id_personnage);
            if($club_personnage != null) {
                $poule_club_personnage = get_poule_from_club_id($club_personnage);
                if($poule_club_personnage != null) {
                    $type_match = 2;
                    $pdo = connect_db();
                    $get_next_match = $pdo->prepare("SELECT id_match FROM matchs WHERE a_commence = 0 AND est_fini = 0 AND type_match_id =:type_match AND (utilisateur_1_id = :user_1 OR utilisateur_2_id =:user_2) AND poule_id = :poule ORDER BY date_match ASC LIMIT 1");
                    $get_next_match->bindParam("type_match", $type_match, PDO::PARAM_INT);
                    $get_next_match->bindParam("user_1", $id_personnage, PDO::PARAM_INT);
                    $get_next_match->bindParam("user_2", $id_personnage, PDO::PARAM_INT);
                    $get_next_match->bindParam("poule", $poule_club_personnage, PDO::PARAM_INT);
                    if($get_next_match->execute()) {
                        $rs = $get_next_match->fetch();
                        $next_match = $rs['id_match'];
                        if($next_match != null) {
                            return $next_match;
                        } else {
                            return 0;
                        }
                    } else {
                        return 0;
                    }
                    $pdo = null;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } catch(PDOException $e) {
            echo "Impossible d'obtenir les informations du prochain matchs: ". $e->getMessage();
            return 0;
        }
    }

    //Getter pour obtenir tous les matchs
    function get_all_matchs()
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
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