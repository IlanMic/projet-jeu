<?php
    //classe utilisateur: c'est le joueur
    class Utilisateur
    {
        //identifiant de l'utilisateur
        private $id_utilisateur;

        //pseudonyme de l'utilisateur
        private $pseudo;

        //adresse mail de l'utilisateur
        private $adresse_mail;

        //mot de passe de l'utilisateur
        private $mot_de_passe;

        //compte premium ou non de l'utilisateur
        private $compte_premium;

        //identifiant du personnage 1 de l'utilisateur
        private $personnage_1_id;

        //identifiant du personnage 2 de l'utilisateur
        private $personnage_2_id;

        //identifiant du personnage 3 de l'utilisateur
        private $personnage_3_id;

        //Constructeur de la classe utilisateur
        public function __construct($pseudo, $adresse_mail, $mot_de_passe, $compte_premium)
        {
            $this->pseudo = $pseudo;
            $this->adresse_mail = $adresse_mail;
            $this->mot_de_passe = $mot_de_passe;
            $this->compte_premium = $compte_premium;
        }

        //Getter des propriétés de la classe
        public function __get($property)
        {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }

        //Setter des propriétes de la classe
        public function __set($property, $value)
        {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
            return $this;
        }
    }
?>