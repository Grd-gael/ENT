<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Profil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="profil.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php 
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="accueil.php" class="lien-fil-ariane">Accueil</a>><span class="fin-fil-ariane">Profil</span></p>


<div class="section-profil">
    <div class="flex-vertical">
        <div class="photo-profil">
            <img src="img/profile.jpg" alt="">
        </div>
        <div class="nom-profil">
            <h1>Prénom Nom</h1>
            <h2>MMI 2 dev</h2>
        </div>
    </div>

    <div class="flex-vertical">
        <a href="modif-profil.php"> <i class="fa-solid fa-pen" style="color: #ffffff;"></i> Modifier le profil</a>
        <a href="accessibilite.php"><i class="fa-solid fa-universal-access" style="color: #ffffff;"></i>  Paramètres d'accessibilité</a>
    </div>
</div>

<div class="aPropos">
    <h3>À Propos</h3>
    <p>Je suis un dev créatif !</p>
</div>

<a href="connexion.php" class="button"> <i class="fa-solid fa-arrow-right-from-bracket" style="color: #f1402f;"></i> Se déconnecter</a>



<?php
require 'footer.php';
?>


<script src='script.js' ></script>
</body>
</html>