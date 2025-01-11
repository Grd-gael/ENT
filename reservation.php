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
    <title>ENT | Réservation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="reservation.css">
    <link rel="stylesheet" href="general.css">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="accueil.php" class="lien-fil-ariane">Accueil</a>><a href="services.php" class="lien-fil-ariane">Services</a>><span class="fin-fil-ariane">Réservation</span></p>

<div class="container">
        <h1>Réservation de Salle</h1>

        <div class="form-container">
            <h2>Réserver une Salle</h2>
            <label for="salle">Choisir une Salle:</label>
            <select id="salle">
                <option value="Salle A">Salle A</option>
                <option value="Salle B">Salle B</option>
                <option value="Salle C">Salle C</option>
            </select>

            <label for="utilisateur">Nom de l'utilisateur:</label>
            <input type="text" id="utilisateur" placeholder="Votre nom">

            <label for="start">Date de début:</label>
            <input type="datetime-local" id="start">

            <label for="end">Date de fin:</label>
            <input type="datetime-local" id="end">

            <button id="submitReservation">Réserver</button>
        </div>
    </div>


<?php
require 'footer.php';
?>

<script src='script.js' ></script>    
</body>
</html>