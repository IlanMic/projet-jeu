<?php
    //classe orientation: orientation que peut occuper un personnage
    class Orientation
    {
        //identifiant de l'orientation
        private $id_capacite;

        //identifiant du poste
        private $poste_id;

        //nom de l'orientation
        private $nom_orientation;

        //constructeur de la classe orientation
        public function __construct($poste_id, $nom_orientation)
        {
            $this->poste_id = $poste_id;
            $this->nom_orientation = $nom_orientation;
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