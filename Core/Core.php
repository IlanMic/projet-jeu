<?php

    //Trouver l'identifiant d'un club en fonction de l'identifiant de son propriétaire
    function trouver_club_proprietaire($id_utilisateur)
    {
        //Connexion à la base de données
        require_once("../Core/ConnexionBDD.php");
        $pdo = connect_db();
        $stmt = $pdo->prepare("SELECT nom_club FROM club WHERE proprietaire_id = :id_proprietaire");
        $stmt->bindParam("id_proprietaire", $id_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    
    //Compter le nombre de personnages appartenant à un utilisateur
    function compter_personnages_utilisateur($id_utilisateur)
    {
        $counter = 0;
        //Connexion à la base de données
        require_once("../Core/ConnexionBDD.php");
        $pdo = connect_db();
        $stmt = $pdo->prepare("SELECT personnage_1_id, personnage_2_id, personnage_3_id FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
        $stmt->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_STR);
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

    //Récupère les informations d'un personnage via son identifiant
    function get_personnage($id)
    {
        require_once("../Core/ConnexionBDD.php");
        $pdo = connect_db();
        $stmt = $pdo->prepare("SELECT * FROM personnage WHERE id_personnage = :id_personnage");
        $stmt->bindParam("id_personnage", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        $pdo = null;
        return $data;
    }

    //Récupère les informations d'un personnage via son identifiant
    function get_race($race_id){
        require_once("../Core/ConnexionBDD.php");
        $pdo = connect_db();
        $stmt = $pdo->prepare("SELECT * FROM race WHERE id_race = :id_race");
        $stmt->bindParam("id_race", $race_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        $pdo = null;
        return $data['nom_race'];
    }

?>