<?php
    function connect_db(){
        try
        {
            $db = new PDO(
                'mysql:host=localhost;dbname=projet_jeu;charset=utf8',
                'root',
                'root'
            );
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $db;
        }
        catch(PDOException $e) {
            error_log("Echec de connexion à la base de données".$e->getMessage());
        }
        
    }
?>