<?php

//  joueur avec son nom et ses scores.
class Player {
    private $name;
    private $score;

    public function __construct($name) {
        $this->name = $name;
        $this->score = 0; // Initialise le score
    }

    public function getName() {
        return $this->name;
    }

    public function getScore() {
        return $this->score; // Retourne le score
    }

    public function setScore($score) {
        $this->score = $score; // Permet de mettre à jour le score
    }
}
