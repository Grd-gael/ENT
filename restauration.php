<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Restauration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="restauration.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>

<body>

<?php
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="accueil.php" class="lien-fil-ariane">Accueil</a>><a href="services.php" class="lien-fil-ariane">Sevices</a>><span class="fin-fil-ariane">Restauration</span></p>

<h1>Restauration</h1>


<div class="container-section-fullpage">
    <div class="section-box-menu">
        <h2>Menu du jour</h2>
        <div class="menu">
            <div class="menu-item">
                <p>Entrée</p>
                <p>Salade verte</p>
            </div>
            <div class="menu-item">
                <p>Plat</p>
                <p>Steak frites</p>
            </div>
            <div class="menu-item">
                <p>Dessert</p>
                <p>Yaourt</p>
            </div>
        </div>

    </div>
    <div class="flex-vertical">
        <a href="commande.php">
            <div class="section-box">
                <i class="fa-solid fa-basket-shopping fa-5x"></i>
                <h2>Commander</h2>
            </div>
        </a>
        <a href="https://mon-espace.izly.fr/Home/Logon?ReturnUrl=%2f" target="_blank">
            <div class="section-box">
            <i class="fa-solid fa-arrow-up-right-from-square fa-5x"></i>
                <h2>Izly</h2>
            </div>
        </a>
    </div>
</div>


<?php 
require 'footer.php';
?>



<script src='script.js' ></script>
</body>
</html>