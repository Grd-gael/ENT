<?php
session_start();

if (!isset($_SESSION['etudiant'])) {
    header('Location: connexion.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Espace de stockage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="stockage.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="index.php" class="lien-fil-ariane">Accueil</a>><span class="fin-fil-ariane">Espace de stockage</span></p>

<h1>Espace de stockage</h1>

<div class="container-section-fullpage">
    <div class="container-stockage">

        <div class="tabs">
            <div class="tab active" data-target="tab-personal">Espace perso</div>
            <div class="tab" data-target="tab-shared">Espace partagé</div>
        </div>
    
        <div id="tab-personal" class="tab-content active">
            <div class="files">
                <div class="file"> <i class="fa-regular fa-file-pdf fa-3x"></i>Fichier 1</div>
                <div class="file"><i class="fa-regular fa-file-word fa-3x"></i>Fichier 2</div>
            </div>
        </div>
        <div id="tab-shared" class="tab-content">
            <div class="files">
                <div class="file"><i class="fa-regular fa-file-video fa-3x"></i>Fichier partagé 1</div>
            </div>
        </div>
    

        <button class="add-file-button">+</button>
    </div>
    

    <div class="popup" id="file-popup">
        <div class="popup-content">
            <h3>Ajouter un fichier</h3>
            <input type="text" placeholder="Nom du fichier">
            <input type="file" name="" id="">
            <button id="add-file-confirm">Ajouter</button>
        </div>
    </div>
</div>

<?php 
require 'footer.php';
?>

<script src='script.js' ></script>
<script src='stockage.js'></script>
</body>
</html>