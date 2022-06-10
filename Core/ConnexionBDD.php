<?php
    function connect_db(){
        try
        {
            $db = new PDO(
                'mysql:host=localhost;dbname=projet_jeu;charset=utf8',
                'root',
                'root'
            );
        }
        catch(PDOException $e) {
            error_log("Echec de connexion à la base de données".$e->getMessage());
        }
        return $db;
    }
?>