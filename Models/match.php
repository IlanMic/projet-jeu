<?php
    //classe match
    class Match
    {
        //identifiant du match
        private $id_match;

        //identifiant du type de match (amical ou compétitif,...)
        private $type_match_id;

        //identifiant du premier club
        private $club_1_id;

        //identifiant du second club
        private $club_2_id;

        //date et heure du début du match
        private $date_match;

        //score du premier club
        private $score_club_1;

        //score du second club
        private $score_club_2;

        //constructeur de la classe match
        public function __construct($type_match_id, $club_1_id, $club_2_id)
        {
            $this->type_match_id = $type_match_id;
            $this->club_1_id = $club_1_id;
            $this->club_2_id = $club_2_id;

            //Définit la zone temporaire comme étant l'UTC
            date_default_timezone_set('UTC');

            //La date et heure de création du match sont celle du début du match
            $this->date_match = date('Y-m-d H:i:s');

            //Les deux clubs commencent le match avec un score de 0
            $this->score_club_1 = 0;
            $this->score_club_2 = 0;
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