
<?php

require_once("db.php");
require_once("carte.php");
require_once("jeu.php");
require_once("tableau.php");

$connexion = new Connexion();
$pdo = $connexion->getPdo();


// Créer ou récupérer le nom du joueur
if (!isset($_SESSION['playerName'])) {
    if (isset($_POST['playerName'])) {
        $_SESSION['playerName'] = $_POST['playerName'];
    } else {
        echo "<form method='POST'>
                <input type='text' name='playerName' placeholder='Votre nom' required>
                <input type='submit' value='Jouer'>
              </form>";
        exit;
    }
}
///////////////////// ERREUR//////////////////////////////
// Vérifier si le jeu est déjà créé dans la session
if (!isset($_SESSION['jeu'])) {
    $nombrePaires = 8; // Nombre de paires
    $jeu = new Jeu($nombrePaires);
    $_SESSION['jeu'] = serialize($jeu); // Stocker le jeu dans la session
} else {
    // $jeu = unserialize($_SESSION['jeu']); // Charger le jeu depuis la session
}
/////////////////////////////////////////////////
// Démarrer le jeu
$nombrePaires = 8; // Nombre de paires
$jeu = new Jeu($nombrePaires);

// Vérifier si une carte a été retournée
if (isset($_POST['carte'])) {
    $indexCarte = (int)$_POST['carte'];
    $jeu->retournerCarte($indexCarte);
}

// Vérifier si toutes les cartes ont été retournées
if (!$jeu->cartesRestantes()) {
    $tableau = new Tableau($pdo);
    $score = $jeu->getScore(); // Calculer le score
    $tableau->ajouterScore($_SESSION['playerName'], $score);
    echo "Félicitations ! Votre score est de $score.";
}

// Afficher les cartes
echo "<h1>CANDYMEMO</h1>";
echo "<h2>Cartes:</h2>";
echo "<form method='POST'>";
echo "<div style='display: flex; flex-wrap: wrap;'>";
foreach ($jeu->getCartes() as $index => $carte) {
    // Afficher la carte seulement si elle a été retournée
    $image = in_array($index, $jeu->getCartesRetournées()) ? $carte->getImage() : "X"; // Affiche 'X' si non retournée
    echo "<div class='carte' style='margin: 5px; border: 1px solid black; padding: 10px;'>
            <button type='submit' name='carte' value='$index'>$image</button>
          </div>";
}
echo "</div>";
echo "</form>";

// Afficher les meilleurs joueurs
$tableau = new Tableau($pdo);
$meilleursJoueurs = $tableau->obtenirMeilleursJoueurs();
echo "<h2>Meilleurs joueurs</h2>";
echo "<ul>";
foreach ($meilleursJoueurs as $joueur) {
    echo "<li>" . $joueur['name'] . " : " . $joueur['score'] . "</li>";
}
echo "</ul>";
?>
