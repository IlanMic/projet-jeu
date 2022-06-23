<?php
session_start();
require_once("../Core/Core.php");
require_once("../Models/utilisateur.php");

if(isset($_POST['nom_club'])) {
    $nom_club = $_POST['nom_club'];
    $proprietaire_id = $_SESSION['utilisateur_id'];

    //On vérifie que le propriétaire n'a pas club
    if(empty(get_club_nom($_SESSION['utilisateur_id']))) {

        //On vérifie qu'aucun autre club ne possède le même nom
        if(club_est_unique($nom_club)) {
            $pdo = connect_db();
            $stmt = $pdo->prepare("INSERT INTO club (nom_club, proprietaire_id) VALUES (:nom_club, :proprietaire_id)");
            $stmt->bindParam("nom_club", $nom_club, PDO::PARAM_STR);
            $stmt->bindParam("proprietaire_id", $proprietaire_id, PDO::PARAM_INT);
            if($stmt->execute()) {
                $_SESSION['etat'] = "Succès";
                $_SESSION['message'] = "Ajout de club réussi.";
                header('Location: ../Views/index.php');

            } else {
                $_SESSION['etat'] = "Echec";
                $_SESSION['message'] =  "Erreur: au moins une saisie ne remplit pas les conditions nécessaires.";
                header('Location: ../Views/creation-club.php');
            }
        } else {
            $_SESSION['etat'] = "Echec";
            header('Location: ../Views/creation-club.php');
            $_SESSION['message'] = "Un club possèdant le même nom existe déjà.";
        }
    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../Views/creation-club.php');
        $_SESSION['message'] = "Un club a déjà été créé avec ce compte";
    }
} else {
    $_SESSION['etat'] = "Echec";
    header('Location: ../Views/creation-club.php');
    $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été saisi.";
}

?>