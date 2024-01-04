<?php
require_once(__DIR__ . '/../classes/serpent.class.php');
require_once(__DIR__ . '/../classes/bdd.class.php');




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Id_Serpent'])) {
    $serpent = new Serpent($_POST['Id_Serpent']);

    $serpent->set('nom', $_POST['nom']);
    $serpent->set('poids', $_POST['poids']);
    $serpent->set('dureeDeVie', $_POST['dureeDeVie']);

    $serpent->set('genre', $_POST['genre']);
    $serpent->set('id_Race', $_POST['id_Race']);

    echo 'Les informations du serpent ont été mises à jour.';
}

if (isset($_GET['Id_Serpent'])) {
    $serpent = new Serpent();
    $detailsSerpent = $serpent->getSerpentById($_GET['Id_Serpent']);


    if ($detailsSerpent) {
        echo '<h2>Modifier un Serpent</h2>';
        echo'<div class="d-flex justify-content-center">';
        echo '<form action="" method="post">';

        echo '<input type="hidden" name="Id_Serpent" value="' . $detailsSerpent[0]['Id_Serpent']  . '">';
        echo 'Nom : <input type="text" name="nom" value="' . htmlspecialchars($detailsSerpent[0]['nom'] ?? '') . '"><br>';
        echo 'Poids : <input type="number" name="poids" value="' . htmlspecialchars($detailsSerpent[0]['poids'] ?? '') . '"><br>';
        echo 'Durée de vie : <input type="text" name="dureeDeVie" placeholder="HH-MM-SS" value="' . htmlspecialchars($detailsSerpent[0]['dureeDeVie'] ?? '') . '"><br>';

        echo 'Genre : <input type="text" name="genre" value="' . htmlspecialchars($detailsSerpent[0]['genre'] ?? '') . '"><br>';
        echo 'Race : <input type="number" name="id_Race" value="' . htmlspecialchars($detailsSerpent[0]['id_Race'] ?? '') . '"><br>';
        echo '<input type="submit" value="Enregistrer les modifications">';
        echo '</form>';
        echo '</div>';
    } else {
        echo 'Le serpent demandé n\'existe pas.';
    }
} else {
    echo 'Aucun serpent sélectionné pour la modification.';
}
?>
