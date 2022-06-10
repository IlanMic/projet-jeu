<?php
    //classe poste: poste qu'un personnage peut occuper
    class Poste
    {
        //identifiant du poste
        private $id_poste;

        //nom du poste
        private $nom_poste;

        //constructeur de la classe orientation
        public function __construct($nom_poste)
        {
            $this->nom_poste = $nom_poste;
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