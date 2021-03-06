<?php
    //Vérifie qu'aucun autre club ne possède le même nom (vrai si unique, faux sinon)
    function club_est_unique($nom_club){
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM club WHERE nom_club = :nom_club");
            $stmt->bindParam("nom_club", $nom_club, PDO::PARAM_STR);
            $stmt->execute();
            $unique = $stmt->fetchColumn();
            if($unique ==0) {
                return true;
            } else {
                return false;
            }
            $pdo = null;
        } catch(PDOException $e) {
            echo 'Impossible de vérifier si le nom de club saisi est unique: '. $e->getMessage();
        }
    }

    //Vérifie qu'aucun autre utilisateur ne possède le même mail (vrai si unique, faux sinon)
    function mail_est_unique($mail){
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateur  WHERE adresse_mail = :mail");
            $stmt->bindParam("mail", $mail, PDO::PARAM_STR);
            $stmt->execute();
            $unique = $stmt->fetchColumn();
            if($unique ==0) {
                return true;
            } else {
                return false;
            }
            $pdo = null;
        } catch(PDOException $e) {
            echo 'Impossible de vérifier si le nom de club saisi est unique: '. $e->getMessage();
        }
    }

    //Vérifie qu'aucun autre utilisateur ne possède le même pseudo (vrai si unique, faux sinon)
    function pseudo_est_unique($pseudo){
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateur  WHERE pseudo = :pseudo");
            $stmt->bindParam("pseudo", $pseudo, PDO::PARAM_STR);
            $stmt->execute();
            $unique = $stmt->fetchColumn();
            if($unique ==0) {
                return true;
            } else {
                return false;
            }
            $pdo = null;
        } catch(PDOException $e) {
            echo 'Impossible de vérifier si le nom de club saisi est unique: '. $e->getMessage();
        }
    }

    //Vérifie qu'aucun autre club ne possède le même nom (vrai si unique, faux sinon)
    function club_est_unique_depuis_Admin($nom_club){
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM club WHERE nom_club = :nom_club");
            $stmt->bindParam("nom_club", $nom_club, PDO::PARAM_STR);
            $stmt->execute();
            $unique = $stmt->fetchColumn();
            if($unique ==0) {
                return true;
            } else {
                return false;
            }
            $pdo = null;
        } catch(PDOException $e) {
            echo 'Impossible de vérifier si le nom de club saisi est unique: '. $e->getMessage();
        }
    }
    
    //Compter le nombre de personnages appartenant à un utilisateur
    function compter_personnages_utilisateur($id_utilisateur)
    {
        try{
            $counter = 0;
            //Connexion à la base de données
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT personnage_1_id, personnage_2_id, personnage_3_id FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
            $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch();
            if(isset($data['personnage_1_id'])) {
                $counter += 1;
            }
            if(isset($data['personnage_2_id'])) {
                $counter += 1;
            }
            if(isset($data['personnage_3_id'])) {
                $counter += 1;
            }
            return $counter;
            $pdo = null;
        } catch(PDOException $e) {
            echo 'Impossible de vérifier le nombre de personnages possédés par l\'utilisateur: '. $e->getMessage();
        }
    }

    //Compter le nombre de personnages appartenant à un club
    function compter_personnages_club($id_club)
    {
        try{
            //Connexion à la base de données
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM personnage WHERE club_id = :id_club");
            $stmt->bindParam("id_club", $id_club, PDO::PARAM_INT);
            $stmt->execute();
            $resultat = $stmt->fetchColumn();
            return $resultat;
            $pdo = null;
        } catch(PDOException $e) {
            echo 'Impossible de vérifier le nombre de personnages ayant rejoint le club:'. $e->getMessage();
        }
    }


    //Redirige vers la page d'accueil si aucun utilisateur n'est connecté
    function redirection_si_non_connecte($statut_connexion)
    {
        if($statut_connexion == false) {
            header('Location: ../Views/index.php');
        }
    }

    //Vérifie que le mot de passe correspond bien aux conditions
    function mot_de_passe_valide($mdp)
    {
        if(preg_match("/^(?=.{6,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/", $mdp)){
            return true;
        } else {
            return false;
        }
    }

    //Passe au niveau supérieur d'un personnage
    function level_up($id_personnage){
        try {
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $stmt = $pdo->prepare("SELECT experience FROM personnage WHERE id_personnage = :id_personnage");
            $stmt->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            if($stmt->execute()) {
                $resultat = $stmt->fetch();
                $experience = $resultat['experience'];
                if($experience == 9) {
                    $experience = 0;
                    try{
                        $level_up = $pdo->prepare("UPDATE personnage SET niveau = niveau+1, experience = :experience WHERE id_personnage = :id_personnage");
                        $level_up->bindParam("experience", $experience, PDO::PARAM_INT);
                        $level_up->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
                        $level_up->execute();
                    } catch (PDOException $e){
                        echo "Echec lors du passage au niveau supérieur du personnage: ". $e->getMessage();
                    }
                }
                $pdo = null;
            }
        } catch(PDOException $e) {
            echo "Echec lors du passage au niveau supérieur du personnage: ". $e->getMessage();
        }
    }

    /**
     * Permet de déterminer si l'équipe du club d'un personnage est complète pour un match
     * Retourne le nombre de personnage présents dans l'équipe
     * Si c'est inférieur à 7, alors l'équipe est incomplète
     */
    function equipe_est_complete($id_personnage, $id_match)
    {
        try {
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            $pdo = connect_db();
            $count = NULL;
            $query_club = $pdo->prepare("SELECT club_id FROM personnage WHERE id_personnage =:id_personnage");
            $query_club->bindParam("id_personnage", $id_personnage, PDO::PARAM_INT);
            if($query_club->execute()) {
                $resultats = $query_club->fetch();
                $club_personnage = $resultats['club_id'];
                try {
                    $query_club_match = $pdo->prepare("SELECT utilisateur_1_id, utilisateur_2_id FROM matchs WHERE id_match =:id_match");
                    $query_club_match->bindParam("id_match", $id_match, PDO::PARAM_INT);
                    if($query_club_match->execute()) {
                        $resultats_club_match = $query_club_match->fetch();
                        $club_1 = $resultats_club_match['utilisateur_1_id'];
                        $club_2 = $resultats_club_match['utilisateur_2_id'];
                        if($club_1 == $club_personnage) {
                            $query_full_1 = $pdo->prepare("SELECT utilisateur_1_joueur_1, utilisateur_1_joueur_2, utilisateur_1_joueur_3, utilisateur_1_joueur_4, utilisateur_1_joueur_5, utilisateur_1_joueur_6, utilisateur_1_joueur_7,
                            (
                            COALESCE((CASE WHEN utilisateur_1_joueur_1 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_1_joueur_2 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_1_joueur_3 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_1_joueur_4 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_1_joueur_5 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_1_joueur_6 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_1_joueur_7 IS NOT NULL THEN 1 ELSE 0 END), 0) 
                            ) AS SOMME
                            FROM matchs
                            WHERE id_match =:id_match");
                            $query_full_1->bindParam("id_match", $id_match, PDO::PARAM_INT);
                            if($query_full_1->execute()) {
                                $resultats_full_1 = $query_full_1->fetch();
                                $count = $resultats_full_1['SOMME'];
                            } else {
                                $count = NULL;
                            }
                        } else if($club_2 == $club_personnage) {
                            $query_full_2 = $pdo->prepare("SELECT utilisateur_2_joueur_1, utilisateur_2_joueur_2, utilisateur_2_joueur_3, utilisateur_2_joueur_4, utilisateur_2_joueur_5, utilisateur_2_joueur_6, utilisateur_2_joueur_7,
                            (
                            COALESCE((CASE WHEN utilisateur_2_joueur_1 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_2_joueur_2 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_2_joueur_3 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_2_joueur_4 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_2_joueur_5 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_2_joueur_6 IS NOT NULL THEN 1 ELSE 0 END), 0) +
                            COALESCE((CASE WHEN utilisateur_2_joueur_7 IS NOT NULL THEN 1 ELSE 0 END), 0) 
                            ) AS SOMME
                            FROM matchs
                            WHERE id_match =:id_match");
                            $query_full_2->bindParam("id_match", $id_match, PDO::PARAM_INT);
                            if($query_full_2->execute()) {
                                $resultats_full_2 = $query_full_1->fetch();
                                $count = $resultats_full_1['SOMME'];
                            } else {
                                $count = NULL;
                            }
                        } else {
                            echo "Le club du personnage ne participe pas à ce match";
                        }
                    } else {
                        echo "Impossible de trouver le club du personnage dans le match.";
                    }
                } catch(PDOException $e) {
                    echo "Impossible de déterminer si le club participe au match ou non: ". $e->getMessage();
                }
            } else{
                echo "Impossible de trouver le club du personnage.";
            }
            return $count;

            $pdo = null;
        } catch(PDOException $e) {
            echo "Impossible de savoir si l'équipe de votre club est complète: ". $e->getMessage();
        }
    }

    /**
     * Redirige l'utilisateur vers la page d'accueille s'il n'est pas administrateur
     */
    function redirect_si_non_admin($id_utilisateur)
    {
        if(isset($_SESSION['utilisateur_pseudo'])) {
            $pseudo = $_SESSION['utilisateur_pseudo'];
        }
        if(isset($_SESSION['mdp'])) {
            $mdp = $_SESSION['mdp'];
            $mdpcheck = password_verify("Administrateur",$mdp);
        }   
        if($pseudo !="Administrateur" || $mdpcheck != 1) {
            $_SESSION['etat'] = "Echec";
            $_SESSION['message'] = "Il faut être administrateur du site pour accéder à cette page.";
            ?><script> location.replace("../Views/index.php"); </script><?php
        }
    }

    /**
     * Calcule la différence entre la date et l'heure actuelles et la date et l'heure du prochain match
     * 
     * Retourne 1 si le match est dans plus d'une heure
     * Retourne 0 si aucun match ne correspond
     * Retourne 2 si le match est dans moins d'une heure
     * Retourne 3 si le personnage n'a pas de club
     */
    function is_match_in_less_than_1_hour($id_personnage)
    {
        try{
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
            require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/personnage.php");
            $pdo = connect_db();
            if(get_club_id($id_personnage) != null) {
                $get_match_and_date = $pdo->prepare("SELECT id_match, date_match FROM matchs WHERE utilisateur_1_id = :user OR utilisateur_2_id =:user_2 AND a_commence =0 AND est_fini =0");
                $get_match_and_date->bindParam("user", $id_personnage, PDO::PARAM_INT);
                $get_match_and_date->bindParam("user_2", $id_personnage, PDO::PARAM_INT);
                if($get_match_and_date->execute()) {
                    $resultats = $get_match_and_date->fetch();
                    $id_match = $resultats['id_match'];
                    $date_match = new DateTime($resultats['date_match'], new DateTimeZone('Europe/Paris'));      
                    $date_actuelle = new DateTime("now", new DateTimeZone('Europe/Paris'));
                    $difference = $date_match->diff($date_actuelle);
                    $hours = $difference->format('%h');
                    $days = $difference->format('%d');
                    if($days > 0 || ($days == 0 && $hours >0)) {
                        return 1;
                    } else {
                        return 2;
                    }
                }
                else {
                    return 0;
                }
            } else {
                return 3;
            }
        } catch(PDOException $e) {
            return 0;
        }
    }

    /**
     * Redirection vers admin 
     */
    function redirect_to_index()
    {
        ?><script> location.replace("../Views/index.php"); </script><?php
    }

    function redirect_to_composition()
    {
        ?><script> location.replace("../Views/composition.php"); </script><?php
    }

    function redirect_to($path)
    {
        ?><script> location.replace($path); </script><?php
    }
    

?>