<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Commande</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="commande.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>

<body>

<?php
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="accueil.php" class="lien-fil-ariane">Accueil</a>><a href="services.php" class="lien-fil-ariane">Services</a>><a href="restauration.php" class="lien-fil-ariane">Restauration</a>><span class="fin-fil-ariane">Commande</span></p>


<h1>Commande</h1>

<div class="container-section-fullpage">

<div class="commande-container">

    <!-- Liste des plats (au centre) -->
    <div class="plats">
        <button class="plat-btn" data-plat="sandwich"> <img src="img/sandwich.png" alt=""> Sandwich</button>
        <button class="plat-btn" data-plat="pastabox"><img src="img/pastabox.png" alt="">Pastabox</button>
        <button class="plat-btn" data-plat="salades"><img src="img/salad.png" alt="">Salades</button>
        <button class="plat-btn" data-plat="wraps"><img src="img/wrap.png" alt="">Wraps</button>
        <button class="plat-btn" data-plat="boissons"><img src="img/drink.png" alt="">Boissons</button>
        <button class="plat-btn" data-plat="desserts"><img src="img/dessert.png" alt="">Desserts</button>
    </div>
    <!-- Panier (à gauche) -->
    <div class="panier">
        <h2>Mon panier</h2>
        <ul id="panier-items">
            <!-- Les items ajoutés apparaîtront ici -->
        </ul>
        <p id="total">Total : 0,00 €</p>
        <button class="btn-payer">Payer</button>
    </div>

</div>

<!-- Popup pour choisir les options -->
<div id="popup" class="popup hidden">
    <div class="popup-content">
        <h3 id="popup-title">Choisir un goût</h3>
        <ul id="popup-options">
            <!-- Options dynamiques ajoutées ici -->
        </ul>
        <button class="popup-close">Fermer</button>
    </div>
</div>

</div>

<?php 
require 'footer.php';
?>


<script src='commande.js'></script>
<script src='script.js'></script>
</body>
</html>