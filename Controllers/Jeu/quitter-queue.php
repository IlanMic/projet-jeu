<?php
    session_start();

    if(isset($_SESSION['match_en_attente'])){
        unset($_SESSION['match_en_attente']);
        unset($_SESSION['opposant']);
        unset($_SESSION['match_en_attente_id']);
    }
    
    if(isset($_SESSION['match_en_cours'])){
        unset($_SESSION['opposant_match']);
        unset($_SESSION['match_en_cours']);
    }

    $_SESSION['etat'] = "Succès";
    header('Location: ../../Views/index.php');
    $_SESSION['message'] = "Vous avez bien quitté le match.";

    /**
     *                      A FAIRE ENCORE
     * 
     *    Mettre à null les données du joueur ayant quitté
     * 
     */

?>
