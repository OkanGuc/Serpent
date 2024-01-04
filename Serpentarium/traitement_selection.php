<?php
require_once(__DIR__ . '/classes/serpent.class.php');
require_once(__DIR__ . '/classes/bdd.class.php');

$serpent = new serpent();

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $serpent->generateAndInsertRandomSerpents(1);

    echo "<p>Un nouveau serpent a été créé.</p>";
    echo "<script>setTimeout(function() {
        window.location.href = 'index.php';
    }, 5000);</script>";
}
?>