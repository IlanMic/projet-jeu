<?php
    //Vérifie qu'aucun autre club ne possède le même nom (vrai si unique, faux sinon)
    function club_est_unique($nom_club){
        try{
            require_once("../Core/ConnexionBDD.php");
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

    //Vérifie qu'aucun autre club ne possède le même nom (vrai si unique, faux sinon)
    function club_est_unique_depuis_Admin($nom_club){
        try{
            require_once("../../Core/ConnexionBDD.php");
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
            require_once("../Core/ConnexionBDD.php");
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
            require_once("../Core/ConnexionBDD.php");
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
            require_once("../Core/ConnexionBDD.php");
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
    

?>