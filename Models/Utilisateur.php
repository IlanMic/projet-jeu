<?php
    class Utilisateur{
        private $id_utilisateur;
        private $pseudo;
        private $adresse_mail;
        private $mot_de_passe;
        private $compte_premium;
        private $personnage_1_id;
        private $personnage_2_id;
        private $personnage_3_id;

        public function __construct($pseudo, $adresse_mail, $mot_de_passe, $compte_premium){
            $this-> $pseudo;
            $this-> $adresse_mail;
            $this-> $mot_de_passe;
            $this-> $compte_premium;
        }

        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }
        
        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
            return $this;
        }


    }
?>