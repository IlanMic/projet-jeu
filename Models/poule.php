<?php
    //classe poule: poule des clubs d'un niveau similaire
    class Poule
    {
        //identifiant de la poule
        private $id_poule;

        //nom de l'orientation
        private $nom_orientation;

        //identifiant du club 1
        private $club_1_id;

        //identifiant du club 2
        private $club_2_id;

        //identifiant du club 3
        private $club_3_id;

        //identifiant du club 4
        private $club_4_id;

        //identifiant du club 5
        private $club_5_id;

        //identifiant du club 6
        private $club_6_id;

        //identifiant du club 7
        private $club_7_id;

        //identifiant du club 8
        private $club_8_id;

        //identifiant du club 9
        private $club_9_id;

        //identifiant du club 10
        private $club_10_id;

        //points du club 1
        private $points_club_1;

        //points du club 2
        private $points_club_2;

        //points du club 3
        private $points_club_3;

        //points du club 4
        private $points_club_4;

        //points du club 5
        private $points_club_5;

        //points du club 6
        private $points_club_6;

        //points du club 7
        private $points_club_7;

        //points du club 8
        private $points_club_8;
        
        //points du club 9
        private $points_club_9;

        //points du club 10
        private $points_club_10;

        //constructeur de la classe orientation
        public function __construct($nom_orientation)
        {
            $this->nom_orientation = $nom_orientation;
        }

        /*public function __construct($nom_orientation, $club_1_id,  $club_2_id, $club_3_id, $club_4_id, $club_5_id, $club_6_id, $club_7_id, $club_8_id, $club_9_id, $club_10_id)
        {
            $this->nom_orientation = $nom_orientation;
            $this->club_1_id = $club_1_id;
            $this->club_2_id = $club_2_id;
            $this->club_3_id = $club_3_id;
            $this->club_4_id = $club_4_id;
            $this->club_5_id = $club_5_id;
            $this->club_6_id = $club_6_id;
            $this->club_7_id = $club_7_id;
            $this->club_8_id = $club_8_id;
            $this->club_9_id = $club_9_id;
            $this->club_10_id = $club_10_id;
            $this->points_club_1 = 0;
            $this->points_club_2 = 0;
            $this->points_club_3 = 0;
            $this->points_club_4 = 0;
            $this->points_club_5 = 0;
            $this->points_club_6 = 0;
            $this->points_club_7 = 0;
            $this->points_club_8 = 0;
            $this->points_club_9 = 0;
            $this->points_club_10 = 0;
        }*/

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