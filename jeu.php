<?php

// Gère le jeu du Memory
class Jeu {
    private $cartes;
    private $cartesRetournées;
    private $cartesTrouvées;
    private $score;

    public function __construct($nombrePaires) {
        $this->cartes = [];
        $this->cartesRetournées = [];
        $this->cartesTrouvées = []; // Ajouter un tableau pour stocker les cartes trouvées
        $this->score = 0; // Initialiser le score à 0
        $this->générerCartes($nombrePaires);
    }

    private function générerCartes($nombrePaires) {
        $images = range(1, $nombrePaires);
        $images = array_merge($images, $images); // Doubler les cartes pour créer des paires
        shuffle($images); // Mélanger les cartes

        foreach ($images as $image) {
            $this->cartes[] = new Carte(uniqid(), $image);
        }
    }

    public function retournerCarte($index) {
        // Retourner une carte si elle n'a pas déjà été retournée ou trouvée
        if (!in_array($index, $this->cartesRetournées) && !in_array($index, $this->cartesTrouvées)) {
            $this->cartesRetournées[] = $index;

            // Si deux cartes sont retournées, vérifier si elles correspondent
            if (count($this->cartesRetournées) == 2) {
                $index1 = $this->cartesRetournées[0];
                $index2 = $this->cartesRetournées[1];

                // Vérifier si les deux cartes retournées sont identiques
                if ($this->cartes[$index1]->getImage() == $this->cartes[$index2]->getImage()) {
                    // C'est une paire ! Ajouter 10 points et marquer les cartes comme trouvées
                    $this->score += 10;
                    $this->cartesTrouvées[] = $index1;
                    $this->cartesTrouvées[] = $index2;
                }

                // Réinitialiser les cartes retournées (qu'elles correspondent ou non)
                $this->cartesRetournées = [];
            }
        }
    }

    public function cartesRestantes() {
        // Retourner true si toutes les cartes n'ont pas encore été trouvées
        return count($this->cartesTrouvées) < count($this->cartes);
    }

    public function getCartes() {
        return $this->cartes;
    }

    public function getScore() {
        return $this->score;
    }

    public function getCartesRetournées() {
        return $this->cartesRetournées;
    }

    public function getCartesTrouvées() {
        return $this->cartesTrouvées;
    }

    public function estGagné() {
        // Le jeu est gagné si toutes les cartes ont été trouvées
        return count($this->cartesTrouvées) === count($this->cartes);
    }
}
