<?php
require_once ('db.php'); 
// carte du jeu candymemory

class Carte {
    private $id;
    private $image;

    public function __construct($id, $image) {
        $this->id = $id;
        $this->image = $image;
    }

    public function getId() {
        return $this->id;
    }

    public function getImage() {
        return $this->image;
    }
}
?>
