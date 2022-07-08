<?php
    session_start();
    //Définition du statut de connexion à faux
    $_SESSION['statut_connexion'] = false;

    //On supprime les variables de la session
    unset($_SESSION['utilisateur_id']);
    unset($_SESSION['utilisateur_pseudo']);
    unset($_SESSION['mail']);
    unset($_SESSION['mdp']);
    unset($_SESSION['utilisateur_club']);
    unset($_SESSION['compte_premium']);
    unset($_SESSION['utilisateur_personnage_1']);
    unset($_SESSION['utilisateur_personnage_2']);
    unset($_SESSION['utilisateur_personnage_3']);
    unset($_SESSION['dernier_personnage_utilise']);

    //Redirection vers la page d'accueil + message
    $_SESSION['etat'] = "Succès";
    header('Location: ../Views/index.php');
    $_SESSION['message'] = "Vous avez été déconnecté avec succès";
?>