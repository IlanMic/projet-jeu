<?php
    //classe club: groupe auquel peuvent appartenir plusieurs personnages
    class Club
    {
        //identifiant du club
        private $id_club;

        //nom du club
        private $nom_club;

        //identifiant du propriétaire du club
        private $proprietaire_id;

        //constructeur de la classe club
        public function __construct($nom_club, $proprietaire_id)
        {
            $this->nom_club = $nom_club;
            $this->proprietaire_id = $proprietaire_id;
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