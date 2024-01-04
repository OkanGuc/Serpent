<?php

require_once(__DIR__ .'/../classes/serpent.class.php');
require_once(__DIR__ .'/../classes/bdd.class.php');
?>
<?php
$bdd = new Bdd();
$bddSerpent = new Serpent();
$serpents= $bddSerpent->selectAll();








if ($serpents != null) {
    echo "<h2>Liste des Serpents :</h2>";
    echo "<ul class='list-group'>";
    foreach ($serpents as $serpent) {
        $dateNaissance = new DateTime($serpent['heureDateNaissance']);
        $dateNaissanceFormatee = $dateNaissance->format('d-m-Y ' . ' h:i');

        echo "<li class='list-group-item list-group-item-action list-group-item-success'>";
        echo "Nom : " . $serpent['nom'] . "<br>";
        echo "Poids : " . $serpent['poids'] . " Kg" . "<br>";
        echo "Durée de vie : " . $serpent['dureeDeVie'] . "<br>";
        echo "Race : " . $serpent['Race'] . "<br>";
        echo "Date de naissance : " . $dateNaissanceFormatee . "<br>";
        echo "Genre : " . ($serpent['genre'] ? "Mâle" : "Femelle");
        echo "</li><br>";
    }
    echo "</ul>";
} else {
    echo "Aucun serpent trouvé dans la base de données.";
}




?>