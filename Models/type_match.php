<?php
    //classe type de match: amical ou compétitif
    class TypeMatch
    {
        //identifiant du type de match
        private $id_type_match;

        //nom du type de match: amical ou compétitif
        private $type_match;

        //nombre de points accordés au gagnant
        private $points_gagnant;

        //nombre de points accordés au perdant
        private $points_perdant;

        //constructeur de la classe orientation
        public function __construct($type_match, $points_gagnant, $points_perdant)
        {
            $this->type_match = $type_match;
            $this->points_gagnant = $points_gagnant;
            $this->points_perdant = $points_perdant;
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