
<?php

// ==================================================
// PARTIE 0 : MISE EN PLACE
// ==================================================

echo "<h2>Partie 0 : Mise en place</h2>";

echo "Hello PHP<br>";

// Commentaire sur une ligne avec //
# Commentaire sur une ligne avec #

/*
Commentaire
sur plusieurs lignes
*/


// ==================================================
// EXERCICE 1.1 : NOMS DE VARIABLES
// ==================================================

echo "<h2>Exercice 1.1 : Noms de variables</h2>";

// $x : valide
$x = 10;

// $_x : valide
$_x = 20;

// $2x : invalide, un nom ne peut pas commencer par un chiffre

// $x-y : invalide comme nom de variable ; PHP lit $x - y

// $Prix_HT : valide
$Prix_HT = 50;

// $prix ht : invalide, un espace est interdit dans le nom

// $état : valide en PHP
$état = "Maroc";

echo "x = $x<br>";
echo "_x = $_x<br>";
echo "Prix_HT = $Prix_HT<br>";
echo "état = $état<br>";

// $a et $A sont deux variables distinctes
$a = 100;
$A = 200;

echo "a = $a<br>";
echo "A = $A<br>";


// ==================================================
// EXERCICE 1.2 : CONSTANTES
// ==================================================

echo "<h2>Exercice 1.2 : Constantes</h2>";

require "config.php";

echo "Etablissement : " . ETABLISSEMENT . "<br>";
echo "Note minimale : " . NOTE_MIN . "<br>";
echo "Note maximale : " . NOTE_MAX . "<br>";
echo "Seuil : " . SEUIL . "<br>";

if (defined("SEUIL")) {
    echo "La constante SEUIL est définie.<br>";
}

if (defined("INCONNUE")) {
    echo "INCONNUE est définie.<br>";
} else {
    echo "La constante INCONNUE n'est pas définie.<br>";
}

/*
Si on utilise une constante non définie, PHP peut afficher
un avertissement ou une erreur selon le contexte et la version.

const définit une constante dans le code.
define() permet de définir une constante pendant l'exécution.
*/


// ==================================================
// EXERCICE 1.3 : CALCUL DU PRIX TTC
// ==================================================

echo "<h2>Exercice 1.3 : Calcul</h2>";

$prix_ht = 60;
$tva = 20;

$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

echo "Le prix TTC du produit est de " . $prix_ttc . " €.<br>";


// ==================================================
// EXERCICE 1.4 : TYPES ET CONVERSIONS
// ==================================================

echo "<h2>Exercice 1.4 : Types et conversions</h2>";

// 1. Convertir un entier en chaîne de caractères
$test = 42;
$test = (string) $test;

var_dump($test);
echo "<br>";

// 2. Conversion en booléen
var_dump((bool) 0);
echo "<br>";

var_dump((bool) 0.0);
echo "<br>";

var_dump((bool) "0");
echo "<br>";

var_dump((bool) "");
echo "<br>";

var_dump((bool) "abc");
echo "<br>";

var_dump((bool) []);
echo "<br>";

var_dump((bool) null);
echo "<br>";

// 3. Autres conversions
var_dump((int) 3.9);
echo "<br>";

var_dump((int) "12abc");
echo "<br>";

var_dump((float) "1.5e3");
echo "<br>";

var_dump((int) true);
echo "<br>";

// 4. Nombre 255 dans quatre bases
$decimal = 255;
$hexadecimal = 0xFF;
$octal = 0377;
$binaire = 0b11111111;

echo "Décimal : " . $decimal . "<br>";
echo "Hexadécimal : " . dechex($hexadecimal) . "<br>";
echo "Octal : " . decoct($octal) . "<br>";
echo "Binaire : " . decbin($binaire) . "<br>";


// ==================================================
// EXERCICE 1.5 : CHAÎNES DE CARACTÈRES
// ==================================================

echo "<h2>Exercice 1.5 : Chaînes de caractères</h2>";

$traitees = "égales à";
$ici = 2;

// 1. Guillemets et apostrophe
echo 'Ahmed a dit : "J\'ai réussi"';
echo "<br>";

// 2. Chemin et caractères spéciaux
echo 'Voulez-vous supprimer C:\*.*?';
echo "<br>";

// 3. Afficher \n tel quel
echo 'Ceci n\'affichera pas \n de nouvelle ligne';
echo "<br>";

// 4. Variables non interprétées
echo 'Les variables ne seront pas $traitees $ici';
echo "<br>";

// 5. Variables interprétées
echo "Les variables seront $traitees $ici";
echo "<br>";

// Supprimer les étoiles au début et à la fin
$chaine = "*Bonjour les développeurs*";

$resultat = trim($chaine, "*");

echo $resultat . "<br>";

// Afficher chaque lettre sur une ligne
// Exemple avec Bonjour : strlen() compte ici les caractères ASCII.
$mot = "Bonjour";

for ($i = 0; $i < strlen($mot); $i++) {
    echo $mot[$i] . "<br>";
}

?>
