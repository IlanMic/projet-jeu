<?php
session_start();
    //Vérification de la déclaration des variables
    if(isset($_POST['nom_perso']) && isset($_POST['race'])) {

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

        require_once("../Core/Core.php");
        //Connexion à la base de données
        require_once("../Core/ConnexionBDD.php");
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

        

        //On vérifie que l'utilisateur n'a pas encore atteint son nombre maximal de personnage
        if(($_SESSION['compte_premium'] == 1 && is_null($data['personnage_3_id'])) || ($_SESSION['compte_premium'] == 0 && is_null($data['personnage_2_id']))){
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
                //On ajoute l'identifiant correspondant au nouveau personnage à l'utilisateur auquel il appartient
                $dernier_id = $pdo->lastInsertId();
                if($personnage_id == "personnage_1_id"){
                    $_SESSION['utilisateur_personnage_1'] = $dernier_id;
                }else if($personnage_id == "personnage_2y_id"){
                    $_SESSION['utilisateur_personnage_2'] = $dernier_id;
                }else if($personnage_id == "personnage_3_id"){
                    $_SESSION['utilisateur_personnage_3'] = $dernier_id;
                }
                if($personnage_id != "") {
                    $update_id = $pdo->prepare("UPDATE utilisateur SET ". $personnage_id ." =:personnage_id WHERE id_utilisateur =:id_utilisateur");
                    $update_id->bindParam("personnage_id", $dernier_id, PDO::PARAM_INT);
                    $update_id->bindParam("id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
                    if($update_id->execute()) {
                        $_SESSION['etat'] = "Succès";
                        $_SESSION['message'] = "Ajout de personnage réussi";
                        header('Location: ../Views/index.php');
                    } else {
                        print_r($pdo->errorInfo());
                    }
                }else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../Views/index.php');
                    $_SESSION['message'] = "Vous avez déjà atteint le nombre maximal autorisé de personnages.";
                }

            } else {
                print_r($pdo->errorInfo());
            }

        } else {
            $_SESSION['etat'] = "Echec";
            header('Location: ../Views/index.php');
            $_SESSION['message'] = "Nombre maximal de personnages autorisé déjà";
        }

        //Fermeture connexion base de données
        $pdo = null;

    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../Views/index.php');
        $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été rempli. La création de personnage ne peut aboutir.";
    }
?>