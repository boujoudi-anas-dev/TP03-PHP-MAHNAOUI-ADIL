
<?php
/*
Auteur : Votre nom
Objectif : Valider les notes et les enregistrer dans un fichier CSV
Date : 17/10/2026
*/

const NOTE_MIN = 0;
const NOTE_MAX = 20;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit("Veuillez envoyer le formulaire.");
}

$nom = trim($_POST['nom'] ?? '');
$note_info = $_POST['note_info'] ?? '';
$note_math = $_POST['note_math'] ?? '';

if (
    $nom === '' ||
    $note_info === '' ||
    $note_math === '' ||
    !is_numeric($note_info) ||
    !is_numeric($note_math)
) {
    exit("Erreur : veuillez remplir correctement tous les champs.");
}

$note_info = (float) $note_info;
$note_math = (float) $note_math;

if (
    $note_info < NOTE_MIN || $note_info > NOTE_MAX ||
    $note_math < NOTE_MIN || $note_math > NOTE_MAX
) {
    exit("Erreur : les notes doivent être comprises entre 0 et 20.");
}

$fichier = __DIR__ . '/data/notes.csv';
$handle = fopen($fichier, 'a');

if ($handle === false) {
    exit("Erreur : impossible d'ouvrir le fichier CSV.");
}

fputcsv($handle, [$nom, $note_info, $note_math], ';');
fclose($handle);

$moyenne = ($note_info + $note_math) / 2;

echo "<h2>Enregistrement réussi</h2>";
echo "Nom : " . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . "<br>";
echo "Note Info : " . $note_info . "<br>";
echo "Note Math : " . $note_math . "<br>";
echo "Moyenne : " . $moyenne;
?>
