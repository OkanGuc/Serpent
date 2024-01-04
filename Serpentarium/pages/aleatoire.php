<?php
require_once(__DIR__ . '/../classes/serpent.class.php');
require_once(__DIR__ . '/../classes/bdd.class.php');

$serpent = new serpent();

if (isset($_POST['nombreSerpents']) && is_numeric($_POST['nombreSerpents'])) {
$nombreSerpents = $_POST['nombreSerpents'];


$serpent->generateAndInsertRandomSerpents($nombreSerpents);

echo "<p>$nombreSerpents serpents ont été générés aléatoirement !</p>";

echo "<script>setTimeout(function() {
        window.location.href = 'index.php';
    }, 5000);</script>";

exit;
}
?>

<h2>Générer des Serpents Aléatoires</h2>
<form action="" method="post">
    Nombre de serpents à générer : <input type="number" name="nombreSerpents" min="1" max="100"><br>
    <input type="submit" value="Générer">
</form>
