<?php
    //classe capacite: compétence avantageuse d'un personnage
    class Capacite
    {
        //identifiant de la capacité
        private $id_capacite;

        //nom de la capacité
        private $nom_capacite;

        //type de la capacité (magie ou fourberie)
        private $type;

        //temps de chargement en secondes de la capacité
        private $temps_chargement_secondes;

        //nom de l'effet provoqué par la capacité (ralentissement, maladresse,...)
        private $nom_effet;

        //durée effective de la capacité en secondes
        private $duree_secondes_effet;

        //constructeur de la classe capacité
        public function __construct($nom_capacite, $type, $temps_chargement_secondes, $nom_effet, $duree_secondes_effet)
        {
            $this->nom_capacite = $nom_capacite;
            $this->type = $type;
            $this->temps_chargement_secondes = $temps_chargement_secondes;
            $this->nom_effet = $nom_effet;
            $this->duree_secondes_effet = $duree_secondes_effet;
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