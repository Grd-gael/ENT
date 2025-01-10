<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Notes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="notes.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="accueil.php" class="lien-fil-ariane">Accueil</a>><a href="scolarite.php" class="lien-fil-ariane">Scolarité</a>><span class="fin-fil-ariane">Notes</span></p>

<h1>Notes</h1>


<div class="container-section-fullpage">
        <!-- Panneau des dernières notes -->
        <div class="notes-panel">
            <h3>Dernières notes</h3>
            <div class="note-item" onclick="showPopup('Déploiement de service', '12/12/2024', '12/20', '2', 'Bon travail, mais peut mieux faire.')">
                <p>Déploiement de service</p>
                <span class="note-value">12/20</span>
            </div>
            <div class="note-item" onclick="showPopup('Intégration web', '14/12/2024', '17/20', '3', 'Excellent, continue ainsi !')">
                <p>Intégration web</p>
                <span class="note-value">17/20</span>
            </div>
        </div>

        <!-- Tableau des matières -->
        <div class="subjects-panel">
            <div class="subject-card">
                <h4>Déploiement de service</h4>
                <div class="score-list">
                    <span class="score" onclick="showPopup('Exercice 1', '11/12/2024', '12', '1', 'Manque de précision.')">12</span>
                    <span class="score" onclick="showPopup('Exercice 2', '20/12/2024', '5', '1', 'Très faible.')">5</span>
                </div>
            </div>
            <div class="subject-card">
                <h4>Javascript</h4>
                <div class="score-list">
                    <span class="score" onclick="showPopup('Projet JS', '15/12/2024', '10', '2', 'Peut être plus optimisé.')">10</span>
                </div>
            </div>
            <div class="subject-card">
                <h4>Intégration web</h4>
                <div class="score-list">
                    <span class="score" onclick="showPopup('Exercice 1', '14/12/2024', '17', '1', 'Très bon travail !')">17</span>
                </div>
            </div>

            <div class="subject-card">
                <h4>Culture Numérique</h4>
                <div class="score-list">
                    <span class="score" onclick="showPopup('Exercice 1', '14/12/2024', '17', '1', 'Bon travail !')">17</span>
                    <span class="score" onclick="showPopup('Exercice 1', '14/12/2024', '11', '1', 'À améliorer !')">11</span>
                    <span class="score" onclick="showPopup('Exercice 1', '14/12/2024', '19', '1', 'Bravo !')">19</span>
                    <span class="score" onclick="showPopup('Exercice 1', '20/12/2024', '16.5', '1', 'Très bon travail !')">16.5</span>
                </div>
            </div>

        </div>
    </div>

    <!-- Popup -->
    <div class="overlay" onclick="closePopup()"></div>
    <div class="popup" id="popup">
        <h4 id="popup-title">Titre du devoir</h4>
        <p id="popup-date">Date : </p>
        <p id="popup-note">Note : </p>
        <p id="popup-coef">Coefficient : </p>
        <p id="popup-comment">Commentaire : </p>
        <button class="close-btn" onclick="closePopup()">Fermer</button>
    </div>

<?php
require 'footer.php';
?>

<script src='notes.js'></script>
<script src='script.js' ></script>    
</body>
</html>