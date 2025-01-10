<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Emploi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="emploi.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="accueil.php" class="lien-fil-ariane">Accueil</a>><span class="fin-fil-ariane">Emploi</span></p>

<h1>Offre d'emploi</h1>

<div class="job-listing-container">
    <!-- Filtres -->
    <div class="filters">
        <select id="filter-domaine" class="filter">
            <option value="all">Tous les domaines</option>
            <option value="dev">Développement</option>
            <option value="crea">Création</option>
        </select>
        <select id="filter-type" class="filter">
            <option value="all">Tous les types</option>
            <option value="stage">Stage</option>
            <option value="alternance">Alternance</option>
        </select>
        <select id="filter-duree" class="filter">
            <option value="all">Toutes les durées</option>
            <option value="short">1-3 mois</option>
            <option value="medium">4-6 mois</option>
            <option value="long">6 mois et plus</option>
        </select>
        <button class="filter-btn">Appliquer les filtres</button>
    </div>

    <div class="job-list">
        <div class="job-card">
            <div class="job-header">
                <h3>Nom de la Structure</h3>
                <p class="job-type">Stage - Développement</p>
            </div>
            <div class="job-info">
                <p><strong>Domaine :</strong> Développement</p>
                <p><strong>Durée :</strong> 4-6 mois</p>
                <p><strong>Compétences requises :</strong> HTML, CSS, JavaScript, React</p>
                <p><strong>Missions :</strong> Création d'une application web, maintenance, intégration de maquettes.</p>
            </div>
            <div class="job-actions">
                <button class="job-btn">Voir l'offre</button>
                <button class="job-btn">Postuler</button>
            </div>
        </div>

        <div class="job-card">
            <div class="job-header">
                <h3>Agence Créa</h3>
                <p class="job-type">Alternance - Création</p>
            </div>
            <div class="job-info">
                <p><strong>Domaine :</strong> Création</p>
                <p><strong>Durée :</strong> 12 mois</p>
                <p><strong>Compétences requises :</strong> Photoshop, Illustrator, After Effects</p>
                <p><strong>Missions :</strong> Réalisation de visuels, motion design, direction artistique.</p>
            </div>
            <div class="job-actions">
                <button class="job-btn">Voir l'offre</button>
                <button class="job-btn">Postuler</button>
            </div>
        </div>

        <div class="job-card">
            <div class="job-header">
                <h3>Studio Web</h3>
                <p class="job-type">
                    Stage - Développement
                </p>
                </div>
            <div class="job-info">
                <p><strong>Domaine :</strong> Front End</p>
                <p><strong>Durée :</strong> 6 mois</p>
                <p><strong>Compétences requises :</strong> HTML, CSS, JavaScript, Tailwind</p>
                <p><strong>Missions :</strong> Intégration de maquettes, appliquer les règles d'accessibilité.</p>
            </div>
            <div class="job-actions">
                <button class="job-btn">Voir l'offre</button>
                <button class="job-btn">Postuler</button>
            </div>
        </div>

    </div>

    <!-- Pagination -->
    <div class="pagination">
        <button class="page-btn">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <button class="page-btn">Suivant</button>
    </div>
</div>


<?php 
require 'footer.php';
?>

<script src='script.js' ></script>
</body>
</html>