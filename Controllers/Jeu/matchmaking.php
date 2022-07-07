<?php
    session_start();

    $type_match = 0;

    
    //On détermine tout d'abord le type de match auquel le joueur veut participer
    if(isset($_POST['tournoi']) || isset($_POST['coupe']) || isset($_POST['championnat']) || isset($_POST['match_competitif'])) {
        if(isset($_POST['tournoi'])) {
            $type_match = 3;
        } else if(isset($_POST['coupe'])) {
            $type_match = 5;
        } else if(isset($_POST['championnat'])) {
            $type_match = 4;
        } else if(isset($_POST['match_competitif'])){
            $type_match = 2;
        }

        //On va maintenant chercher un match correspondant au mode de jeu sélectionné et comportant des places disponibles
        echo "EN CONSTRUCTION";
    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../../Views/index.php');
        $_SESSION['message'] = "Veuillez au moins sélectionner un mode de jeu";
    }
?>