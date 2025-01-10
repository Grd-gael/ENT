<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Messagerie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">    
<link rel="stylesheet" href="messagerie.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php 
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="accueil.php" class="lien-fil-ariane">Accueil</a>><span class="fin-fil-ariane">Messagerie</span></p>

<h1 class="h1-section-margin">Messagerie</h1>

<div class="container-section-margin container-messagerie" id="container">
    <a href="tchat.php">
        <div class="section-box">
            <i class="fa-solid fa-message fa-5x"></i>
            <h2>Tchat</h2>
        </div>
    </a>
    <a href="mail.php">
        <div class="section-box">
            <i class="fa-solid fa-envelope fa-5x"></i>
            <h2>Mail</h2>
        </div>
    </a>
</div>

<aside>
<div class="content-open">
    <div class="close">
        <i class="fa-solid fa-xmark fa-3x"></i>
    </div>
    <h2>Annuaire de contact</h2>
    <input type="text" placeholder="Rechercher un contact" class="annuaire">
    <ul>
        <li><a href="#">Professeurs</a></li>
        <li><a href="#">Administration</a></li>
        <li><a href="#">Etudiants</a></li>
    </ul>
</div>
<div class="content-close">
    <i class="fa-solid fa-users fa-3x"></i>
</div>
</aside>


<?php
require 'footer.php';
?>
 
<script src='script.js'></script>
</body>
</html>