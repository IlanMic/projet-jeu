<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/Core.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");

    if(isset($_POST['nom_perso']) && isset($_POST['race']) && $_POST['race']!="null") {

        $zero = 0;

        //Récupération des variables du formulaire
        $nom_perso = $_POST['nom_perso'];
        $race = $_POST['race'];
        $strength = $_POST['force'];
        $defense = $_POST['defense'];
        $tacle = $_POST['tacle'];
        $endurance = $_POST['endurance'];
        $technique = $_POST['technique'];
        $vitesse = $_POST['vitesse'];
        $intelligence = $_POST['intelligence'];
        $passe = $_POST['passe'];
        $tir = $_POST['tir'];

        $pdo = connect_db();

        //On récupère le slot de personnage disponible (si l'utilisateur a déjà 2 personnages, ce sera le troisième)
        $personnage_id="";
        $id_utilisateur = $_SESSION['utilisateur_id'];
        $id_personnage_disponible = $pdo->prepare("SELECT personnage_1_id, personnage_2_id, personnage_3_id FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
        $id_personnage_disponible->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
        $id_personnage_disponible->execute();
        $data=$id_personnage_disponible->fetch(PDO::FETCH_ASSOC);
        if(is_null($data['personnage_1_id'])) {
            $personnage_id="personnage_1_id";
        }
        else if(is_null($data['personnage_2_id'])) {
            $personnage_id="personnage_2_id";
        }
        else if(is_null ($data['personnage_3_id'])) {
            $personnage_id="personnage_3_id";
        }
        else{
            $personnage_id="";
        }
        //insertion du personnage dans la base de données sans biographie ni illustration
        if(!file_exists($_FILES["illustration"]["tmp_name"]) && !isset($_POST['biographie'])) {
            $stmt = $pdo->prepare("INSERT INTO personnage (nom_personnage, race_id, endurance, strength, tacle, defense, technique, vitesse, intelligence, tir, passe, experience, niveau) VALUES (:nom_personnage, :race_id, :endurance, :strength, :tacle, :defense, :technique, :vitesse, :intelligence, :tir, :passe, :experience, :niveau)");
            $stmt->bindParam("nom_personnage", $nom_perso, PDO::PARAM_STR);
            $stmt->bindParam("race_id", $race, PDO::PARAM_INT);
            $stmt->bindParam("endurance", $endurance, PDO::PARAM_INT);
            $stmt->bindParam("strength", $strength, PDO::PARAM_INT);
            $stmt->bindParam("tacle", $tacle, PDO::PARAM_INT);
            $stmt->bindParam("defense", $defense, PDO::PARAM_INT);
            $stmt->bindParam("technique", $technique, PDO::PARAM_INT);
            $stmt->bindParam("vitesse", $vitesse, PDO::PARAM_INT);
            $stmt->bindParam("intelligence", $intelligence, PDO::PARAM_INT);
            $stmt->bindParam("tir", $tir, PDO::PARAM_INT);
            $stmt->bindParam("passe", $passe, PDO::PARAM_INT);
            $stmt->bindParam("experience", $zero, PDO::PARAM_INT);
            $stmt->bindParam("niveau", $zero, PDO::PARAM_INT);
        }
        //insertion du personnage dans la base de données sans biographie mais avec illustration
        else if(file_exists($_FILES["illustration"]["tmp_name"]) && !isset($_POST['biographie'])) {
            $illu = $_FILES["illustration"]["tmp_name"];
            $illustration = file_get_contents($illu);
            $stmt = $pdo->prepare("INSERT INTO personnage (nom_personnage, race_id, endurance, strength, tacle, defense, technique, vitesse, intelligence, tir, passe, experience, niveau, illustration) VALUES (:nom_personnage, :race_id, :endurance, :strength, :tacle, :defense, :technique, :vitesse, :intelligence, :tir, :passe, :experience, :niveau, :illustration)");
            $stmt->bindParam("nom_personnage", $nom_perso, PDO::PARAM_STR);
            $stmt->bindParam("race_id", $race, PDO::PARAM_INT);
            $stmt->bindParam("endurance", $endurance, PDO::PARAM_INT);
            $stmt->bindParam("strength", $strength, PDO::PARAM_INT);
            $stmt->bindParam("tacle", $tacle, PDO::PARAM_INT);
            $stmt->bindParam("defense", $defense, PDO::PARAM_INT);
            $stmt->bindParam("technique", $technique, PDO::PARAM_INT);
            $stmt->bindParam("vitesse", $vitesse, PDO::PARAM_INT);
            $stmt->bindParam("intelligence", $intelligence, PDO::PARAM_INT);
            $stmt->bindParam("tir", $tir, PDO::PARAM_INT);
            $stmt->bindParam("passe", $passe, PDO::PARAM_INT);
            $stmt->bindParam("experience", $zero, PDO::PARAM_INT);
            $stmt->bindParam("niveau", $zero, PDO::PARAM_INT);
            $stmt->bindParam("illustration", $illustration, PDO::PARAM_LOB);
        }
        //insertion du personnage dans la base de données avec biographie mais sans illustration
        else if(!file_exists($_FILES["illustration"]["tmp_name"]) && isset($_POST['biographie'])) {
            $biographie = $_POST['biographie'];
            $stmt = $pdo->prepare("INSERT INTO personnage (nom_personnage, race_id, endurance, strength, tacle, defense, technique, vitesse, intelligence, tir, passe, experience, niveau, biographie) VALUES (:nom_personnage, :race_id, :endurance, :strength, :tacle, :defense, :technique, :vitesse, :intelligence, :tir, :passe, :experience, :niveau, :biographie)");
            $stmt->bindParam("nom_personnage", $nom_perso, PDO::PARAM_STR);
            $stmt->bindParam("race_id", $race, PDO::PARAM_INT);
            $stmt->bindParam("endurance", $endurance, PDO::PARAM_INT);
            $stmt->bindParam("strength", $strength, PDO::PARAM_INT);
            $stmt->bindParam("tacle", $tacle, PDO::PARAM_INT);
            $stmt->bindParam("defense", $defense, PDO::PARAM_INT);
            $stmt->bindParam("technique", $technique, PDO::PARAM_INT);
            $stmt->bindParam("vitesse", $vitesse, PDO::PARAM_INT);
            $stmt->bindParam("intelligence", $intelligence, PDO::PARAM_INT);
            $stmt->bindParam("tir", $tir, PDO::PARAM_INT);
            $stmt->bindParam("passe", $passe, PDO::PARAM_INT);
            $stmt->bindParam("experience", $zero, PDO::PARAM_INT);
            $stmt->bindParam("niveau", $zero, PDO::PARAM_INT);
            $stmt->bindParam("biographie", $biographie, PDO::PARAM_STR);
        } 
        //Insertion de l'utilisateur dans la base de données si tout champ a été rempli
        else if(file_exists($_FILES["illustration"]["tmp_name"]) && isset($_POST['biographie'])) {
            $illu = $_FILES["illustration"]["tmp_name"];
            $illustration = file_get_contents($illu);
            $biographie = $_POST['biographie'];
            $stmt = $pdo->prepare("INSERT INTO personnage (nom_personnage, race_id, endurance, strength, tacle, defense, technique, vitesse, intelligence, tir, passe, experience, niveau, illustration, biographie) VALUES (:nom_personnage, :race_id, :endurance, :strength, :tacle, :defense, :technique, :vitesse, :intelligence, :tir, :passe, :experience, :niveau, :illustration, :biographie)");
            $stmt->bindParam("nom_personnage", $nom_perso, PDO::PARAM_STR);
            $stmt->bindParam("race_id", $race, PDO::PARAM_INT);
            $stmt->bindParam("endurance", $endurance, PDO::PARAM_INT);
            $stmt->bindParam("strength", $strength, PDO::PARAM_INT);
            $stmt->bindParam("tacle", $tacle, PDO::PARAM_INT);
            $stmt->bindParam("defense", $defense, PDO::PARAM_INT);
            $stmt->bindParam("technique", $technique, PDO::PARAM_INT);
            $stmt->bindParam("vitesse", $vitesse, PDO::PARAM_INT);
            $stmt->bindParam("intelligence", $intelligence, PDO::PARAM_INT);
            $stmt->bindParam("tir", $tir, PDO::PARAM_INT);
            $stmt->bindParam("passe", $passe, PDO::PARAM_INT);
            $stmt->bindParam("experience", $zero, PDO::PARAM_INT);
            $stmt->bindParam("niveau", $zero, PDO::PARAM_INT);
            $stmt->bindParam("illustration", $illustration, PDO::PARAM_LOB);
            $stmt->bindParam("biographie", $biographie, PDO::PARAM_STR);
        }
        if($stmt->execute()) {
            $dernier_id = $pdo->lastInsertId();
            if($_POST['capacite_1'] && $_POST['race']!="null") {
                $capacite_1 = $_POST['capacite_1'];
                $update_capacite_1 = $pdo->prepare("UPDATE personnage SET capacite_1_id = :capacite_1 WHERE id_personnage = :id_personnage");
                $update_capacite_1->bindParam("capacite_1", $capacite_1, PDO::PARAM_INT);
                $update_capacite_1->bindParam("id_personnage", $dernier_id, PDO::PARAM_INT);
                if($update_capacite_1->execute()) {
                    $_SESSION['etat'] = "Succès";
                    $_SESSION['message'] = "Ajout de la capacité 1 réussi";
                    header('Location: ../../Views/page-admin.php');
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Viewspage-admin.php');
                    $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi. La création de club ne peut aboutir.";
                }
            }
            if($_POST['capacite_2'] && $_POST['race']!="null") {
                $capacite_2 = $_POST['capacite_2'];
                $update_capacite_2 = $pdo->prepare("UPDATE personnage SET capacite_2_id = :capacite_2 WHERE id_personnage = :id_personnage");
                $update_capacite_2->bindParam("capacite_2", $capacite_2, PDO::PARAM_INT);
                $update_capacite_2->bindParam("id_personnage", $dernier_id, PDO::PARAM_INT);
                if($update_capacite_2->execute()) {
                    $_SESSION['etat'] = "Succès";
                    $_SESSION['message'] = "Ajout de la capacité 1 réussi";
                    header('Location: ../../Views/page-admin.php');
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi. La création de club ne peut aboutir.";
                }
            }
            $_SESSION['etat'] = "Succès";
            $_SESSION['message'] = "Ajout de personnage réussi";
            header('Location: ../../Views/page-admin.php');
        } else {
            print_r($pdo->errorInfo());
        }

        //Fermeture connexion base de données
        $pdo = null;

    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../../Views/page-admin.php');
        $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi. La création de club ne peut aboutir.";
    }

?>