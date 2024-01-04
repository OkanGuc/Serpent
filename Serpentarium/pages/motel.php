<?php
require_once(__DIR__ . '/../classes/serpent.class.php');
require_once(__DIR__ . '/../classes/bdd.class.php');

$serpent = new serpent();


$males = $serpent->getMales();
$femelles = $serpent->getFemales();


?>

<h2>Sélection de Serpents</h2>
<form action="traitement_selection.php" method="post">
    <div>
        <label for="maleSerpents">Sélectionnez un mâle :</label>
        <select name="maleSerpents" id="maleSerpents">
            <?php foreach ($males as $male) {
                echo "<option value='{$male['id']}'>{$male['nom']}</option>";
            } ?>
        </select>
    </div>
    <div>
        <label for="femaleSerpents">Sélectionnez une femelle :</label>
        <select name="femaleSerpents" id="femaleSerpents">
            <?php foreach ($femelles as $femelle) {
                echo "<option value='{$femelle['id']}'>{$femelle['nom']}</option>";
            } ?>
        </select>
    </div>
    <button type="submit">Créer un Serpent</button>
</form>
