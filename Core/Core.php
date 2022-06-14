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
    }


    //Redirige vers la page d'accueil si aucun utilisateur n'est connecté
    function redirection_si_non_connecte($statut_connexion)
    {
        if($statut_connexion == false) {
            header('Location: ../Views/index.php');
        }
    }

?>