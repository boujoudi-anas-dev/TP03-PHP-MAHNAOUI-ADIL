
<?php

echo "Début du script<br>";

include "fichier_inexistant.php";

echo "Fin du script<br>";

?>
<?php

echo "Début du script<br>";

require "fichier_inexistant.php";

echo "Fin du script<br>";

?>