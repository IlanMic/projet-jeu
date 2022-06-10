<?php
    //classe race: race du personnage (elfe, nain, humain ou orc)
    class Race
    {
        //identifiant de la race
        private $id_race;

        //nom de la race
        private $nom_race;

        //constructeur de la classe orientation
        public function __construct($nom_race)
        {
            $this->nom_race = $nom_race;
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