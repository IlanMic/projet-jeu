<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']. "projet-jeu/Core/ConnexionBDD.php");

    if(isset($_POST['nom_capacite']) && isset($_POST['type_capacite']) && isset($_POST['temps_chargement']) && isset($_POST['nom_effet']) && isset($_POST['duree_effet']) && $_POST['type_capacite'] !=null) {
        $capacite = $_POST['nom_capacite'];
        $type_capacite = $_POST['type_capacite'];
        $temps_chargement = $_POST['temps_chargement'];
        $nom_effet = $_POST['nom_effet'];
        $duree_effet = $_POST['duree_effet'];

        $pdo = connect_db();
        $is_capacite_unique = $pdo->prepare("SELECT id_capacite FROM capacite WHERE nom_capacite = :nom");
        $is_capacite_unique->bindParam("nom", $capacite, PDO::PARAM_STR);
        if($is_capacite_unique->execute()) {
            $rs = $is_capacite_unique->fetch();
            $id_capacite = $rs['id_capacite'];
            if($id_capacite == null) {
                $insert_capacite = $pdo->prepare("INSERT INTO capacite (nom_capacite, type_capacite, temps_chargement_secondes, nom_effet, duree_secondes_effet) VALUES (:nom, :type_capacite, :temps_chargement, :effet, :duree_effet)");
                $insert_capacite->bindParam("nom", $capacite, PDO::PARAM_INT);
                $insert_capacite->bindParam("type_capacite", $type_capacite, PDO::PARAM_INT);
                $insert_capacite->bindParam("temps_chargement", $temps_chargement, PDO::PARAM_INT);
                $insert_capacite->bindParam("effet", $nom_effet, PDO::PARAM_INT);
                $insert_capacite->bindParam("duree_effet", $duree_effet, PDO::PARAM_INT);
                if($insert_capacite->execute()){
                    $_SESSION['etat'] = "Succès";
                    $_SESSION['message'] = "La capacité a pu être créée.";
                    header('Location: ../../Views/page-admin.php');
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Une capacité ayant le même nom existe déjà.";
                }
            } else {
                $_SESSION['etat'] = "Echec";
                header('Location: ../../Views/page-admin.php');
                $_SESSION['message'] = "Impossible de créer une capacité.";
            }
        } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../../Views/page-admin.php');
        $_SESSION['message'] = "Saisie incorrecte";
        }
        $pdo = null;        
    } else {
        $_SESSION['etat'] = "Echec";
        header('Location: ../../Views/page-admin.php');
        $_SESSION['message'] = "Saisie incorrecte";
    }

?>