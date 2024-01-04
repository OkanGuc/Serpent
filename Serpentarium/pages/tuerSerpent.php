<?php
require_once(__DIR__ . '/../classes/serpent.class.php');
require_once(__DIR__ . '/../classes/bdd.class.php');

$bddSerpent = new serpent();

if (isset($_GET['page']) && $_GET['page'] == 'tuerSerpent' && isset($_GET['Id_Serpent'])) {
    $idSerpent = $_GET['Id_Serpent'];
    $bddSerpent->tuerSerpent($idSerpent);

    echo 'le serpent est bien mort ';
    header("Location: index.php?page=nosSerpents");
    exit;
}