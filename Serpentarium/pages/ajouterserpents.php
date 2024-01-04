<?php
require_once(__DIR__ . '/../classes/serpent.class.php');
require_once(__DIR__ . '/../classes/bdd.class.php');

$serpent = new serpent();


if (!empty($_POST)) {

    $nom = $_POST['nom'];
    $poids = $_POST['poids'];
    $dureeDeVie = $_POST['dureeDeVie'];
    $heureDateNaissance = $_POST['heureDateNaissance'];
    $id_Race = $_POST['id_Race'];


    $genre = isset($_POST['genre']) ? $_POST['genre'] : '';



    $serpent->insert($nom, $poids, $dureeDeVie, $heureDateNaissance, $genre, $id_Race);

    echo "<p>Votre serpent a été ajouté avec succès ! Vous allez être redirigé vers la page d'accueil.</p>";


    echo "<script>setTimeout(function() {
        window.location.href = 'index.php';
    }, 5000); // 5000 millisecondes = 5 secondes</script>";

    exit;

}

?>
<h2>Ajouter un serpent</h2> <br>
<div class="d-flex justify-content-center">
<form action="" method="post">
    Nom : <input type="text" name="nom"><br>
    Poids : <input type="text" name="poids"><br>
    Durée de vie : <input type="text" name="dureeDeVie"><br>
    Date et heure de naissance : <input type="text" name="heureDateNaissance" placeholder="Y-M-DD H-MIN-SEC"><br>
    Race : <input type="text" name="id_Race"><br>
    Genre : <br>
    <input type="radio" name="genre" value="1"> Mâle<br>
    <input type="radio" name="genre" value="0"> Femelle<br>
    <br>
    <input type="submit" value="Enregistrer les modifications">
</form>
</div>