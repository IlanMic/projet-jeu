<?php
    session_start();

    //On définit les colonnes à modifier en les enregistrant dans une chaine de caractère intégrée dans la requete
    $valeurs_a_remplacer = "";
    if(isset($_POST['nom_perso']) && $_POST['nom_perso'] != "") {
        $valeurs_a_remplacer .= "nom_personnage = :nom_personnage,";
    }
    if(isset($_POST['race'])) {
        $valeurs_a_remplacer .= "race_id= :race, ";
    }
    if(file_exists($_FILES["illustration"]["tmp_name"])) {
        $valeurs_a_remplacer .= "illustration = :illustration,";
    }
    if(isset($_POST['biographie'])) {
        $valeurs_a_remplacer .= "biographie =:biographie,";
    }
    if(isset($_POST['endurance'])) {
        $valeurs_a_remplacer .= "endurance = :endurance,";
    }
    if(isset($_POST['force'])) {
        $valeurs_a_remplacer .= "strength = :strength,";
    }
    if(isset($_POST['defense'])) {
        $valeurs_a_remplacer .= "defense = :defense,";
    }
    if(isset($_POST['tacle'])) {
        $valeurs_a_remplacer .= "tacle = :tacle,";
    }
    if(isset($_POST['technique'])) {
        $valeurs_a_remplacer .= "technique = :technique,";
    }
    if(isset($_POST['vitesse'])) {
        $valeurs_a_remplacer .= "vitesse = :vitesse,";
    }
    if(isset($_POST['intelligence'])) {
        $valeurs_a_remplacer .= "intelligence = :intelligence,";
    }
    if(isset($_POST['passe'])) {
        $valeurs_a_remplacer .= "passe = :passe,";
    }
    if(isset($_POST['tir'])) {
        $valeurs_a_remplacer .= "tir = :tir, ";
    }
    if(isset($_POST['personnage_id'])) {
        $personnage_id = $_POST['personnage_id'];
    }
    if($valeurs_a_remplacer !="") {
        $valeurs_a_remplacer = rtrim($valeurs_a_remplacer, " ,");
        //Connexion à la base de données
        require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
        $pdo = connect_db();

        //On prépare la requête et associe les colonnes à mettre à jour
        $stmt = $pdo->prepare("UPDATE personnage SET ". $valeurs_a_remplacer ." WHERE id_personnage = :personnage_id");
        if(isset($_POST['nom_perso']) && $_POST['nom_perso'] != "") {
            $stmt->bindParam("nom_personnage", $_POST['nom_perso'], PDO::PARAM_STR);
        }
        if(isset($_POST['race'])) {
            $stmt->bindParam("race", $_POST['race'], PDO::PARAM_STR);
        }
        if(file_exists($_FILES["illustration"]["tmp_name"])) {
            $illu = $_FILES["illustration"]["tmp_name"];
            $illustration = file_get_contents($illu);
            $stmt->bindParam("illustration", $illustration, PDO::PARAM_LOB);
        }
        if(isset($_POST['biographie'])) {
            $stmt->bindParam("biographie", $_POST['biographie'], PDO::PARAM_STR);
        }
        if(isset($_POST['endurance'])) {
            $stmt->bindParam("endurance", $_POST['endurance'], PDO::PARAM_INT);
        }
        if(isset($_POST['force'])) {
            $stmt->bindParam("strength", $_POST['force'], PDO::PARAM_INT);
        }
        if(isset($_POST['defense'])) {
            $stmt->bindParam("defense", $_POST['defense'], PDO::PARAM_INT);
        }
        if(isset($_POST['tacle'])) {
            $stmt->bindParam("tacle", $_POST['tacle'], PDO::PARAM_INT);
        }
        if(isset($_POST['technique'])) {
            $stmt->bindParam("technique", $_POST['technique'], PDO::PARAM_INT);
        }
        if(isset($_POST['vitesse'])) {
            $stmt->bindParam("vitesse", $_POST['vitesse'], PDO::PARAM_INT);
        }
        if(isset($_POST['intelligence'])) {
            $stmt->bindParam("intelligence", $_POST['intelligence'], PDO::PARAM_INT);
        }
        if(isset($_POST['passe'])) {
            $stmt->bindParam("passe", $_POST['passe'], PDO::PARAM_INT);
        }
        if(isset($_POST['tir'])) {
            $stmt->bindParam("tir", $_POST['tir'], PDO::PARAM_INT);
        }
        $stmt->bindParam("personnage_id", $_POST['personnage_id'], PDO::PARAM_INT);

        //En cas de succès ou d'échec, 
        if($stmt->execute()) {
            $_SESSION['etat'] = "Succès";
            $_SESSION['message'] = "Mise à jour du personnage réussi";
            header('Location: ../Views/index.php');
        }else {
            $_SESSION['etat'] = "Echec";
            header('Location: ../Views/modifier-personnage.php?p=<?php echo $personnage_id; ?>');
            $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi.";
        }

        //Fermeture connexion à la base de données
        $pdo= null;    
    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../Views/index.php');
        $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi. La modification de personnage ne peut aboutir.";
    }
   
    
?>