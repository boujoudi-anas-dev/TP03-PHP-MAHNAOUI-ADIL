
<?php

require "config.php";

// ==================================================
// FONCTION MENTION
// ==================================================

function mention($note)
{
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

// ==================================================
// EXERCICE 3.1 : CREATION DES TABLEAUX
// ==================================================

echo "<h2>Exercice 3.1 : Création des tableaux</h2>";

$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

// Tableau indexé
$modules = ["PHP", "Système d'exploitation", "Recherche opérationnelle"];

echo "<h3>Affichage avec foreach</h3>";

foreach ($modules as $module) {
    echo $module . "<br>";
}

echo "<h3>Accès par indice</h3>";

echo $modules[0] . "<br>";
echo $modules[1] . "<br>";
echo $modules[2] . "<br>";


// ==================================================
// EXERCICE 3.2 : AFFICHAGE HTML
// ==================================================

echo "<h2>Exercice 3.2 : Affichage HTML</h2>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>Nom</th>
        <th>Note</th>
        <th>Mention</th>
      </tr>";

foreach ($notes as $nom => $note) {

    $couleur = ($note < SEUIL) ? "red" : "black";

    echo "<tr style='color: $couleur'>";
    echo "<td>$nom</td>";
    echo "<td>$note</td>";
    echo "<td>" . mention($note) . "</td>";
    echo "</tr>";
}

echo "</table>";


// ==================================================
// EXERCICE 3.3 : STATISTIQUES
// ==================================================

echo "<h2>Exercice 3.3 : Statistiques</h2>";

// 1. Calcul manuel sans array_sum()

$somme = 0;
$meilleureNote = null;
$plusFaibleNote = null;
$nombre = 0;

foreach ($notes as $nom => $note) {

    $somme += $note;
    $nombre++;

    if ($meilleureNote === null || $note > $meilleureNote) {
        $meilleureNote = $note;
    }

    if ($plusFaibleNote === null || $note < $plusFaibleNote) {
        $plusFaibleNote = $note;
    }
}

$moyenne = $somme / $nombre;

echo "Somme des notes : $somme<br>";
echo "Nombre d'apprenants : $nombre<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Meilleure note : $meilleureNote<br>";
echo "Plus faible note : $plusFaibleNote<br>";

// 2. Vérification avec les fonctions PHP

echo "<h3>Vérification avec les fonctions PHP</h3>";

echo "Somme : " . array_sum($notes) . "<br>";
echo "Nombre : " . count($notes) . "<br>";
echo "Moyenne : " . round(array_sum($notes) / count($notes), 2) . "<br>";
echo "Maximum : " . max($notes) . "<br>";
echo "Minimum : " . min($notes) . "<br>";

// 3. Nombre d'apprenants par mention

echo "<h3>Effectifs par mention</h3>";

$effectifs = [];

foreach ($notes as $nom => $note) {

    $m = mention($note);

    if (isset($effectifs[$m])) {
        $effectifs[$m]++;
    } else {
        $effectifs[$m] = 1;
    }
}

foreach ($effectifs as $m => $effectif) {
    echo "$m : $effectif apprenant(s)<br>";
}


// ==================================================
// EXERCICE 3.4 : TRI
// ==================================================

echo "<h2>Exercice 3.4 : Tri</h2>";

// Fonction pour afficher un tableau associatif

function afficher($tab)
{
    echo "<table border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";

    foreach ($tab as $nom => $note) {
        echo "<tr><td>$nom</td><td>$note</td></tr>";
    }

    echo "</table><br>";
}

// 1. Tri par noms croissants

echo "<h3>1. Noms croissants : ksort()</h3>";

$tab = $notes;
ksort($tab);
afficher($tab);

// 2. Tri par notes décroissantes

echo "<h3>2. Notes décroissantes : arsort()</h3>";

$tab = $notes;
arsort($tab);
afficher($tab);

// 3. Tri par noms décroissants

echo "<h3>3. Noms décroissants : krsort()</h3>";

$tab = $notes;
krsort($tab);
afficher($tab);

// 4. Tri par notes croissantes

echo "<h3>4. Notes croissantes : asort()</h3>";

$tab = $notes;
asort($tab);
afficher($tab);

// Tri d'un tableau indexé

echo "<h3>Tri du tableau indexé</h3>";

$modulesTries = $modules;
sort($modulesTries);

foreach ($modulesTries as $module) {
    echo $module . "<br>";
}


// ==================================================
// EXERCICE 3.5 : OPERATEURS DE TABLEAUX
// ==================================================

echo "<h2>Exercice 3.5 : Opérateurs de tableaux</h2>";

$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

// Opérateur +

echo "<h3>Résultat de a + b</h3>";

var_dump($a + $b);
echo "<br>";

// Opérateur ==

echo "<h3>Résultat de a == b</h3>";

var_dump($a == $b);
echo "<br>";

// Opérateur ===

echo "<h3>Résultat de a === b</h3>";

var_dump($a === $b);
echo "<br>";

?>

<?php
include "includes/entete_inc.php";
include "includes/menu_inc.php";
?>

<main>
    <h2>Exercice 3 : Tableaux</h2>

    <?php
    // Gardez ici le code de votre exercice 3
    // Création du tableau, affichage et statistiques...
    ?>
</main>

<?php
include "includes/pied_inc.php";
?>