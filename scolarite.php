<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Scolarité</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="scolarite.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php 
require 'navbar.php';
?>
    

<p class="fil-ariane">>><a href="accueil.php" class="lien-fil-ariane">Accueil</a>><span class="fin-fil-ariane">Scolarité</span></p>

<h1>Scolarité</h1>

<a href="https://elearning.univ-eiffel.fr/login/index.php" class="button elearning">Accéder à Elearning</a>

<div class="container-section-fullpage">
    <a href="notes.php">
        <div class="section-box-scolarite">
            <h2>Dernières notes</h2>
            <div class="note">
                <p>Mathématiques</p>
                <hr>
                <p>15/20</p>
            </div>
            <div class="note">
                <p>Physique</p>
                <hr>
                <p>12/20</p>
            </div>
            <div class="note">
                <p>Anglais</p>
                <hr>
                <p>17/20</p>
            </div>
            <button class="button">Voir mes notes</button>
        </div>
    </a>
    <a href="edt.php">
        <div class="section-box-scolarite">
            <h2>Aujourd'hui</h2>
            <div class="edt">
                <div class="edt-item">
                    <p>Mathématiques</p>
                    <p>8h-10h</p>
                </div>
                <div class="edt-item">
                    <p>Physique</p>
                    <p>10h-12h</p>
                </div>
                <div class="edt-item">
                    <p>Anglais</p>
                    <p>14h-16h</p>
                </div>
                <div class="edt-item">
                    <p>EPS</p>
                    <p>16h-18h</p>
                </div>
            </div>
            <button class="button">Voir mon emploi du temps</button>
        </div>
    </a>
    <a href="absences.php">
        <div class="section-box-scolarite">
            <h2>Dernières Absences</h2>
            <div class="absence">
                <i class="fa-solid fa-circle-exclamation fa-xl" style="color: #f1402f;"></i>
                <p>Mathématiques</p>
                <hr>
                <p>2 absences</p>
            </div>
            <div class="absence">
            <i class="fa-solid fa-circle-check fa-xl" style="color: #63E6BE;"></i>
                <p>Physique</p>
                <hr>
                <p>1 absence</p>
            </div>

            <button class="button">Voir mes absences</button>
        </div>
    </a>
</div>

<?php
require 'footer.php';
?>

<script src='script.js' ></script>
</body>
</html>