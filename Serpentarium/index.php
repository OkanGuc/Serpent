<?php
require_once('classes/bdd.class.php');
?>
<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<?php
include('menu.php')
?>
<div class="container">
<div id="content">
    <?php
    if(!isset($_GET['page']) || $_GET['page'] == '') $_GET['page'] = 'accueil';
    $fileimport = 'pages/'.$_GET['page'].'.php';
    if(file_exists($fileimport))
    {
        include($fileimport);
    } else {
        echo "Oups, la page n'est pas disponible.";
    }


    ?>
    <footer class="bg-success text-white text-center p-3" >
        © 2023 Serpentarium
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
</div>
</body>
</html>