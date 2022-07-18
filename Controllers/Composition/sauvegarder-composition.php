<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/orientation.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Models/composition.php");
    $total_joueurs = 0;


    //On récupère le nombre de personnage par poste
    if(isset($_POST['nombre_defenseurs'])) {
        $nombre_defenseurs = $_POST['nombre_defenseurs'];
        $total_joueurs = $nombre_defenseurs + $total_joueurs;
    }
    if(isset($_POST['nombre_milieux'])) {
        $nombre_milieux = $_POST['nombre_milieux'];
        $total_joueurs = $nombre_milieux + $total_joueurs;
    }
    if(isset($_POST['nombre_attaquants'])) {
        $nombre_attaquants = $_POST['nombre_attaquants'];
        $total_joueurs = $nombre_attaquants + $total_joueurs;
    }

    //On répète l'opération tant qu'une équipe entière de 7 joueurs n'a pas été sélectionnée
    if($total_joueurs == 6) {

        //On récupère l'identifiant de l'utilisateur
        $identifiant_utilisateur = $_SESSION['dernier_personnage_utilise'];

        //On récupère l'identifiant du personnage jouant le gardien
        $gardien_id = $_POST['gardien'];

        //On récupère les données des joueurs de champ
        $personnage_1_id = $_POST['joueur_1_id'];
        $personnage_1_poste = $_POST['joueur_1_poste'];
        $personnage_1_orientation = $_POST['joueur_1_orientation'];

        $personnage_2_id = $_POST['joueur_2_id'];
        $personnage_2_poste = $_POST['joueur_2_poste'];
        $personnage_2_orientation = $_POST['joueur_2_orientation'];

        $personnage_3_id = $_POST['joueur_3_id'];
        $personnage_3_poste = $_POST['joueur_3_poste'];
        $personnage_3_orientation = $_POST['joueur_3_orientation'];

        $personnage_4_id = $_POST['joueur_4_id'];
        $personnage_4_poste = $_POST['joueur_4_poste'];
        $personnage_4_orientation = $_POST['joueur_4_orientation'];

        $personnage_5_id = $_POST['joueur_5_id'];
        $personnage_5_poste = $_POST['joueur_5_poste'];
        $personnage_5_orientation = $_POST['joueur_5_orientation'];

        $personnage_6_id = $_POST['joueur_6_id'];
        $personnage_6_poste = $_POST['joueur_6_poste'];
        $personnage_6_orientation = $_POST['joueur_6_orientation'];

        require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");
        $pdo = connect_db();
        if(composition_existe_deja($identifiant_utilisateur) == 0) {
            $stmt = $pdo->prepare("INSERT INTO composition (personnage_utilisateur_id, gardien_id, personnage_1_id, personnage_1_poste, personnage_1_orientation, personnage_2_id, personnage_2_poste, personnage_2_orientation, personnage_3_id, personnage_3_poste, personnage_3_orientation, personnage_4_id, personnage_4_poste, personnage_4_orientation, personnage_5_id, personnage_5_poste, personnage_5_orientation, personnage_6_id, personnage_6_poste, personnage_6_orientation) VALUES (:utilisateur_id, :gardien_id, :personnage_1_id, :personnage_1_poste, :personnage_1_orientation, :personnage_2_id, :personnage_2_poste, :personnage_2_orientation, :personnage_3_id, :personnage_3_poste, :personnage_3_orientation, :personnage_4_id, :personnage_4_poste, :personnage_4_orientation, :personnage_5_id, :personnage_5_poste, :personnage_5_orientation, :personnage_6_id, :personnage_6_poste, :personnage_6_orientation)");
        }
        else {
            $stmt = $pdo->prepare("UPDATE composition SET personnage_utilisateur_id =:utilisateur_id, gardien_id =:gardien_id, personnage_1_id =:personnage_1_id, personnage_1_poste =:personnage_1_poste, personnage_1_orientation = :personnage_1_orientation, personnage_2_id =:personnage_2_id, personnage_2_poste =:personnage_2_poste, personnage_2_orientation =:personnage_2_orientation, personnage_3_id =:personnage_3_id, personnage_3_poste =:personnage_3_poste, personnage_3_orientation = :personnage_3_orientation, personnage_4_id =:personnage_4_id, personnage_4_poste =:personnage_4_poste, personnage_4_orientation =:personnage_4_orientation, personnage_5_id =:personnage_5_id, personnage_5_poste =:personnage_5_poste, personnage_5_orientation =:personnage_5_orientation, personnage_6_id =:personnage_6_id, personnage_6_poste =:personnage_6_poste, personnage_6_orientation =:personnage_6_orientation WHERE personnage_utilisateur_id =:id");
            $stmt->bindParam("id", $identifiant_utilisateur, PDO::PARAM_INT);
        }
        $stmt->bindParam("utilisateur_id", $identifiant_utilisateur, PDO::PARAM_INT);
        $stmt->bindParam("gardien_id", $gardien_id, PDO::PARAM_INT);

        $stmt->bindParam("personnage_1_id", $personnage_1_id, PDO::PARAM_INT);
        $stmt->bindParam("personnage_1_poste", $personnage_1_poste, PDO::PARAM_INT);
        $stmt->bindParam("personnage_1_orientation", $personnage_1_orientation, PDO::PARAM_INT);

        $stmt->bindParam("personnage_2_id", $personnage_2_id, PDO::PARAM_INT);
        $stmt->bindParam("personnage_2_poste", $personnage_2_poste, PDO::PARAM_INT);
        $stmt->bindParam("personnage_2_orientation", $personnage_2_orientation, PDO::PARAM_INT);

        $stmt->bindParam("personnage_3_id", $personnage_3_id, PDO::PARAM_INT);
        $stmt->bindParam("personnage_3_poste", $personnage_3_poste, PDO::PARAM_INT);
        $stmt->bindParam("personnage_3_orientation", $personnage_3_orientation, PDO::PARAM_INT);

        $stmt->bindParam("personnage_4_id", $personnage_4_id, PDO::PARAM_INT);
        $stmt->bindParam("personnage_4_poste", $personnage_4_poste, PDO::PARAM_INT);
        $stmt->bindParam("personnage_4_orientation", $personnage_4_orientation, PDO::PARAM_INT);

        $stmt->bindParam("personnage_5_id", $personnage_5_id, PDO::PARAM_INT);
        $stmt->bindParam("personnage_5_poste", $personnage_5_poste, PDO::PARAM_INT);
        $stmt->bindParam("personnage_5_orientation", $personnage_5_orientation, PDO::PARAM_INT);

        $stmt->bindParam("personnage_6_id", $personnage_6_id, PDO::PARAM_INT);
        $stmt->bindParam("personnage_6_poste", $personnage_6_poste, PDO::PARAM_INT);
        $stmt->bindParam("personnage_6_orientation", $personnage_6_orientation, PDO::PARAM_INT);

        if($stmt->execute()) {
            $_SESSION['etat'] = "Succès";
            $_SESSION['message'] = "La composition a bien été enregistrée.";
            header('Location: ../../Views/index.php');

        } else {
            $_SESSION['etat'] = "Echec";
            $_SESSION['message'] =  "Erreur: impossible d'enregistrer la composition pour le moment.";
            header('Location: ../../Views/index.php');
        }
    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../../Views/composition.php');
        $_SESSION['message'] = "Pour enregistrer une composition, l'utilisateur doit sélectionner au moins 6 joueurs hormis le gardien.";
    }

?>

