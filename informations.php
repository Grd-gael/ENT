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
    <title>ENT | Informations</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="informations.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php 
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="index.php" class="lien-fil-ariane">Accueil</a>><span class="fin-fil-ariane">Informations</span></p>

<h1>Informations</h1>

    <div class="banniere-info">
        <div class="flex-vertical">
            <h2>Tournoi d'échec</h2>
            <p>La maison de l'étudiant organise un <b>tournoi d'échec</b> ce <b>mercredi 20 janvier 2025</b></p>
        </div>
    </div>


    <div class="aLaUne">
        <h2>A la une</h2>
        <div class="articles">
            <div class="article flex-vertical">
                <h3>Conférence sur l'écologie</h3>
                <p>Le département de biologie organise une conférence sur l'écologie le <b>jeudi 21 janvier 2025</b></p>
                <button class&></button>
            </div>
            <div class="article flex-vertical">
                <h3>Soirée étudiante</h3>
                <p>La maison de l'étudiant organise une soirée étudiante le <b>vendredi 22 janvier 2025</b></p>
            </div>
        </div>
    </div>

<?php
require 'footer.php';
?>

<script src='script.js' ></script>   
</body>
</html>