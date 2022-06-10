<?php
    //classe personnage: personnage jouable par l'utilisateur
    class Personnage
    {
        //identifiant du personnage
        private $id_personnage;

        //nom du personnage
        private $nom_personnage;

        //identifiant de la race du personnage
        private $race_id;

        //compétence en endurance
        private $endurance;

        //compétence en force
        private $force;

        //compétence en tacle
        private $tacle;

        //compétence en défense
        private $defense;

        //compétence en technique
        private $technique;

        //compétence en vitesse
        private $vitesse;

        //compétence en intelligence
        private $intelligence;

        //compétence en tir
        private $tir;

        //compétence en passe
        private $passe;

        //experience du personnage (entre 0 et 10 puis montée de niveau à 10)
        private $experience;

        //niveau du personnage
        private $niveau;

        //identifiant du club auquel appartient le personnage
        private $club_id;

        //illustration (photo de profil) du personnage
        private $illustration;

        //biographie du personnage
        private $biographie;

        //identifiant de la première capacité du personnage
        private $capacite_id_1;

        //identifiant de la seconde capacité du personnage
        private $capacite_id_2;

        //poste du personnage
        private $poste;

        //constructeur de la classe capacité
        public function __construct($nom_personnage, $race_id)
        {
            $this->nom_personnage = $nom_personnage;
            $this->race_id = $race_id;
            $this->endurance = 0;
            $this->force = 0;
            $this->tacle = 0;
            $this->defense = 0;
            $this->technique = 0;
            $this->vitesse = 0;
            $this->intelligence = 0;
            $this->tir = 0;
            $this->passe = 0;
            $this->experience = 0;
            $this->niveau = 0;
        }

        //Getter des propriétés de la classe
        public function __get($property)
        {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }

        //Setter des propriétés de la classe
        public function __set($property, $value)
        {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
            return $this;
        }
    }
?>