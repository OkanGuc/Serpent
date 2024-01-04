<?php
require_once(__DIR__ .'/../classes/serpent.class.php');
require_once(__DIR__ .'/../classes/bdd.class.php');

$bddSerpent = new Serpent();


$serpentsParPage = 15;


$genreFiltre = isset($_GET['genre']) ? $_GET['genre'] : '';

$totalSerpents = ($genreFiltre === '') ? $bddSerpent->countSerpents() : $bddSerpent->countSerpentsByGenre($genreFiltre);

$pagesTotal = ceil($totalSerpents / $serpentsParPage);


$pageCourante = isset($_GET['pg']) ? (int)$_GET['pg'] : 1;
$pageCourante = max(1, min($pageCourante, $pagesTotal));


$premier = ($pageCourante - 1) * $serpentsParPage;


$serpents = ($genreFiltre === '') ? $bddSerpent->selectSerpentsByPage($premier, $serpentsParPage) : $bddSerpent->selectSerpentsByGenre($premier, $serpentsParPage, $genreFiltre);
$nombreMales = $bddSerpent->countMales();
$nombreFemelles = $bddSerpent->countFemales();



echo "<form action='index.php' method='get'>
    <input type='hidden' name='page' value='nosserpents'>
    <div style='text-align: center'>
    <select name='genre'>
        <option value=''>Tous</option>
        <option value='1' " . ($genreFiltre === '1' ? 'selected' : '') . ">Mâle</option>
        <option value='0' " . ($genreFiltre === '0' ? 'selected' : '') . ">Femelle</option>
    </select>
    </div>
    <input  class='text-center'  type='submit' value='Filtrer'>
</form>";
if ($serpents != null) {
    echo " <p class='text-center'>Nombre de serpents mâles : " . $nombreMales . "♂️" . "</p><br>";
    echo "<p class='text-center'>Nombre de serpents femelles : " . $nombreFemelles . "♀️" . "</p><br>";
    echo "<h2>Liste des Serpents :</h2>";
    echo "<ul class='list-group'>";
    foreach ($serpents as $serpent) {
        $dateNaissance = new DateTime($serpent['heureDateNaissance']);
        $dateNaissanceFormatee = $dateNaissance->format('d-m-Y h:i');


        echo "<li class='list-group-item list-group-item-action list-group-item-success'>";

        echo "Nom : " . $serpent['nom'] . "<br>";
        echo "Poids : " . $serpent['poids'] . " Kg" . "<br>";
        echo "Race : " . $serpent['Id_Race'] . "<br>";
        echo "Durée de vie : " . $serpent['dureeDeVie'] . "<br>";
        echo "Date de naissance : " . $dateNaissanceFormatee . "<br>";
        echo "Genre : " . ($serpent['genre'] ? "Mâle" : "Femelle") . "<br>";
        echo "<a  href='index.php?page=modifierserpents&Id_Serpent=" . $serpent['Id_Serpent'] . "'>Modifier</a><br>";
        echo "<a href='index.php?page=tuerSerpent&Id_Serpent=" . $serpent['Id_Serpent'] . "'>Marquer comme mort</a><br>";


        echo "</li><br>";
    }
    echo "</ul>";
} else {
    echo "Aucun serpent trouvé dans la base de données.";
}


echo "<div class='pagination'>";
for ($page = 1; $page <= $pagesTotal; $page++) {
    echo "<a class='page-link' href='index.php?page=nosserpents&pg=$page&genre=$genreFiltre'>$page</a> ";
}
echo "</div>";

?>
