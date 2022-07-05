<?php
    session_start();

    //Vérification que les champs du formulaire ont bien été saisis
    if(isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['premium'])) {

        //Récupération des variables du formulaire
        $pseudo = $_POST['pseudo'] ." [BOT]";
        $mail = $_POST['mail'];
        $pass =  $_POST['pass'];
        $premium = $_POST['premium'];
        $options = [
            'cost' => 12,
        ];
        require_once("../../Core/Core.php");
        if(mot_de_passe_valide($pass)) {
            //Connexion à la base de données
            require_once("../../Core/ConnexionBDD.php");
            $pdo = connect_db();

            //Vérification de la volonté de créer un compte premium ou non
            if($premium == 1) {
                $premium = 1;
            }else{
                $premium = 0;
            }

            //Insertion de l'utilisateur dans la base de données
            $stmt = $pdo->prepare("INSERT INTO utilisateur (pseudo, adresse_mail, mot_de_passe, compte_premium) VALUES (:pseudo, :mail, :mdp, :premium)");
            $hash_mdp = password_hash($pass, PASSWORD_BCRYPT, $options);
            $stmt->bindParam("pseudo", $pseudo, PDO::PARAM_STR);
            $stmt->bindParam("mail", $mail, PDO::PARAM_STR);
            $stmt->bindParam("mdp", $hash_mdp, PDO::PARAM_STR);
            $stmt->bindParam("premium", $premium, PDO::PARAM_INT);
            if($stmt->execute()) {

                $dernier_id = $pdo->lastInsertId();

                //Si des personnages sans propriétaire ont été sélectionnés, on les ajoute à l'utilisateur
                if(isset($_POST['perso_1']) && $_POST['perso_1']!="null"){
                    $perso = $_POST['perso_1'];
                    //On prépare la requête SQL pour mettre à jour le club du personnage
                    $update_joueur_utilisateur = $pdo->prepare("UPDATE utilisateur SET personnage_1_id =:perso WHERE id_utilisateur =:utilisateur");
                    $update_joueur_utilisateur->bindParam("perso", $perso, PDO::PARAM_INT);
                    $update_joueur_utilisateur->bindParam("utilisateur", $dernier_id, PDO::PARAM_INT);
                    if($update_joueur_utilisateur->execute()) {
                    } else {
                        $_SESSION['etat'] = "Echec";
                        header('Location: ../../Views/page-admin.php');
                        $_SESSION['message'] = "Le personnage n'a pu être associé à l'utilisateur.";
                    }
                }

                if(isset($_POST['perso_2']) && $_POST['perso_2']!="null") {
                    $perso = $_POST['perso_2'];
                    //On prépare la requête SQL pour mettre à jour le club du personnage
                    $update_joueur_utilisateur = $pdo->prepare("UPDATE utilisateur SET personnage_2_id =:perso WHERE id_utilisateur =:utilisateur");
                    $update_joueur_utilisateur->bindParam("perso", $perso, PDO::PARAM_INT);
                    $update_joueur_utilisateur->bindParam("utilisateur", $dernier_id, PDO::PARAM_INT);
                    if($update_joueur_utilisateur->execute()) {
                    } else {
                        $_SESSION['etat'] = "Echec";
                        header('Location: ../../Views/page-admin.php');
                        $_SESSION['message'] = "Le personnage n'a pu être associé à l'utilisateur.";
                    }
                }

                //Seulement pour les comptes premium
                if($premium == 1) {
                    if(isset($_POST['perso_3']) && $_POST['perso_3']!="null") {
                        $perso = $_POST['perso_3'];
                        //On prépare la requête SQL pour mettre à jour le club du personnage
                        $update_joueur_utilisateur = $pdo->prepare("UPDATE utilisateur SET personnage_3_id =:perso WHERE id_utilisateur =:utilisateur");
                        $update_joueur_utilisateur->bindParam("perso", $perso, PDO::PARAM_INT);
                        $update_joueur_utilisateur->bindParam("utilisateur", $dernier_id, PDO::PARAM_INT);
                        if($update_joueur_utilisateur->execute()) {
                        } else {
                            $_SESSION['etat'] = "Echec";
                            header('Location: ../../Views/page-admin.php');
                            $_SESSION['message'] = "Le personnage n'a pu être associé à l'utilisateur.";
                        }
                    }
                } else {
                    $_SESSION['etat'] = "Echec";
                    header('Location: ../../Views/page-admin.php');
                    $_SESSION['message'] = "Le personnage n'a pu être associé à l'utilisateur: un compte premium est requis pour bénéficier de trois personnages";
                }

                $_SESSION['etat'] = "Succès";
                $_SESSION['message'] = "Succès: La création du BOT utilisateur a fonctionné.";
                header('Location: ../../Views/page-admin.php');

            } else {
                $_SESSION['etat'] = "Echec";
                $_SESSION['message'] =  "Erreur: au moins une saisie ne remplit pas les conditions nécessaires.";
                header('Location: ../../Views/page-admin.php');
            }

            //Fermeture connexion base de données
            $pdo = null;
        } else {
            $_SESSION['etat'] = "Echec";
            header('Location: ../../Views/page-admin.php');
            $_SESSION['message'] = "Le mot de passe doit remplir les conditions suivantes: <br> - au moins 6 caractères <br> - au moins une lettre minuscule <br> - au moins une lettre majuscule <br> - au moins un caractère spécial <br> - au moins un chiffre";
        }


    } else {
        $_SESSION['statut_connexion'] = false;
        $_SESSION['etat'] = "Echec";
        header('Location: ../../Views/page-admin.php');
        $_SESSION['message'] = "Au moins un des champs obligatoires n'a pas été rempli.";
    }

?>