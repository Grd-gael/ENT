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
    <title>ENT | Mail</title>
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

<p class="fil-ariane">>><a href="index.php" class="lien-fil-ariane">Accueil</a>><span class="fin-fil-ariane">Messagerie</span></p>



<div class="container-section-margin" id="container">

    <div class="mail">
        <h1>Jean Dupont</h1>
        <h2>Bilan de réunion</h2>
        <p>Bonjour, <br> <br>
            Voici le bilan de la réunion d'hier. <br> <br>
            Cordialement, <br>
            Jean Dupont
        </p>

        <a href="mail.php" class="button" style="background-color:white; outline:solid black 1px"><i class="fa-solid fa-reply"></i> Répondre</a>
    </div>
</div>

<aside class="reduced-aside">
<div class="content-open">
    <div class="close">
        <i class="fa-solid fa-xmark fa-3x" style="color:white;"></i>
    </div>
    <a href="mail.php" class="button" style="background-color:white; margin-left:32%;">Nouveau message</a>
    <h2>Emails reçus</h2>
    <ul>
        <li><a href="voirmail.php"><i class="fa-solid fa-envelope-circle-check fa-xl"></i> <div class="flex-vertical"><span>Jean Dupont</span><span class="sujet-mail">Bilan de réunion</span></div></a></li>
        <li><a href="voirmail.php"><i class="fa-solid fa-envelope fa-xl"></i><div class="flex-vertical"><span>Alicia Manor</span><span class="sujet-mail">Attestation</span></div></a></li>
        <li><a href="voirmail.php"><i class="fa-solid fa-envelope-circle-check fa-xl"></i> <div class="flex-vertical"><span>Justine Menier</span><span class="sujet-mail">Note de Saé</span></div></a></li>
    </ul>
</div>
<div class="content-close">
    <i class="fa-solid fa-envelope fa-3x"></i>
</div>
</aside>



 
<script src='script.js'></script>
</body>
</html>