<?php
    session_start();
    $_SESSION['statut_connexion'] = false;
    header('Location: ../Views/index.php');
?>