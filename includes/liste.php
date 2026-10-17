
<?php
/*
Auteur : Votre nom
Objectif : Lire le fichier CSV et afficher les résultats
Date : 17/10/2026
*/

$fichier = __DIR__ . '/data/notes.csv';

if (!file_exists($fichier)) {
    exit("Erreur : le fichier notes.csv n'existe pas.");
}

$handle = fopen($fichier, 'r');

if ($handle === false) {
    exit("Erreur : impossible de lire le fichier CSV.");
}

$totalMoyennes = 0;
$nombreApprenants = 0;

echo "<h1>Liste des apprenants</h1>";
echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
        <th>Moyenne</th>
        <th>Mention</th>
      </tr>";

while (($ligne = fgetcsv($handle, 0, ';')) !== false) {
    if (count($ligne) < 3 || !is_numeric($ligne[1]) || !is_numeric($ligne[2])) {
        continue;
    }

    $nom = $ligne[0];
    $info = (float) $ligne[1];
    $math = (float) $ligne[2];
    $moyenne = ($info + $math) / 2;

    if ($moyenne >= 16) {
        $mention = "Très bien";
    } elseif ($moyenne >= 14) {
        $mention = "Bien";
    } elseif ($moyenne >= 12) {
        $mention = "Assez bien";
    } elseif ($moyenne >= 10) {
        $mention = "Passable";
    } else {
        $mention = "Insuffisant";
    }

    echo "<tr>";
    echo "<td>" . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>$info</td>";
    echo "<td>$math</td>";
    echo "<td>" . number_format($moyenne, 2) . "</td>";
    echo "<td>$mention</td>";
    echo "</tr>";

    $totalMoyennes += $moyenne;
    $nombreApprenants++;
}

echo "</table>";
fclose($handle);

if ($nombreApprenants > 0) {
    $moyenneClasse = $totalMoyennes / $nombreApprenants;
    echo "<p>Moyenne générale de la classe : "
        . number_format($moyenneClasse, 2) . "</p>";
} else {
    echo "<p>Aucun résultat valide.</p>";
}
?>
