<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Tchat</title>
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



<div class="container-section-margin flex-vertical" id="container">


    <div class="names">
        <h1>Jean&nbsp;Dupont</h1>
        <h2>MMI 2</h2>
    </div>

    <div class="content">
        <div class="messages">
            <div class="message-received">
                <p class="message-text">Salut, tu as fait le devoir de PHP ?</p>
                <p class="message-date">12:30</p>
            </div>
            <div class="message-sent">
                <p class="message-text">Oui, je l'ai fait. Tu veux que je te l'envoie ?</p>
                <p class="message-date">12:31</p>
            </div>

            <div class="message-received">
                <p class="message-text">Oui, s'il te plaît</p>
                <p class="message-date">12:32</p>
            </div>

            <div class="message-sent">
                <p class="message-text">Je te l'envoie</p>
                <p class="message-date">12:33</p>
            </div>

            <div class="message-sent">
                <p class="message-text">À demain !</p>
                <p class="message-date">12:33</p>
            </div>

            <div class="message-sent">
                <p class="message-text">À demain !</p>
                <p class="message-date">12:33</p>
            </div>

            <div class="message-sent">
                <p class="message-text">À demain !</p>
                <p class="message-date">12:36</p>
            </div>
        </div>
    </div>
    <div class="message-input">
            <input type="text" placeholder="Ecrire un message" class="message-input">
            <button class="send-message">Envoyer</button>
    </div>
</div>

<aside class="reduced-aside">
<div class="content-open">
    <div class="close">
        <i class="fa-solid fa-xmark fa-3x"></i>
    </div>
    <h2>Annuaire de contact</h2>
    <input type="text" placeholder="Rechercher un contact" class="annuaire">
    <ul>
        <li><a href="#"><img src="" class="photo-annuaire" alt="">Jean Dupont</a></li>
        <li><a href="#"><img src="" class="photo-annuaire" alt="">Alicia Manor</a></li>
        <li><a href="#"><img src="" class="photo-annuaire" alt="">Justine Menier</a></li>
    </ul>
</div>
<div class="content-close">
    <i class="fa-solid fa-users fa-3x"></i>
</div>
</aside>



 
<script src='script.js'></script>
</body>
</html>