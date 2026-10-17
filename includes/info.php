
<?php

$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$sexe = $_GET['sexe'];

if ($sexe == "M") {
    echo "Bonjour Monsieur " . htmlspecialchars($prenom) . " " . htmlspecialchars($nom);
} else {
    echo "Bonjour Madame " . htmlspecialchars($prenom) . " " . htmlspecialchars($nom);
}

?>
