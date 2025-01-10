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
    <title>ENT | Services</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="services.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="accueil.php" class="lien-fil-ariane">Accueil</a>><span class="fin-fil-ariane">Services</span></p>

<h1>Services</h1>

<div class="container-section-fullpage">
<a href="restauration.php">
        <div class="section-box">
            <i class="fa-solid fa-utensils fa-4x"></i>
            <h2>Restauration</h2>
            <p>Consultez le menu du crous et commandez en ligne !</p>
        </div>
    </a>
    <a href="reservation.php">
        <div class="section-box">
            <i class="fa-solid fa-calendar-week fa-4x"></i>
            <h2>Réservation</h2>
            <p>Réservez du materiel pour réaliser vos projets !</p>
        </div>
    </a>
    <a href="rdv.php">
        <div class="section-box">
            <i class="fa-solid fa-clock fa-4x"></i>
            <h2>Prise de rendez-vous</h2>
            <p>Prenez rendez-vous avec des professionnels qui répondent à vos besoins !</p>
        </div>
    </a>
</div>

<?php
require 'footer.php';
?>
    



<script src='script.js' ></script>
</body>
</html>