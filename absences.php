<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Absences</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="absences.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
require 'navbar.php';
?>

<p class="fil-ariane">>><a href="accueil.php" class="lien-fil-ariane">Accueil</a>><a href="scolarite.php" class="lien-fil-ariane">Scolarité</a>><span class="fin-fil-ariane">Absences</span></p>

<h1>Absences</h1>

<div class="container-section-fullpage">

        <div class="container-absences">
            <div class="summary-panel">
                <h3>Total d’heures non justifiées</h3>
                <p>6 heures</p>
                <h3>Total d’heures d’absence</h3>
                <p>8 heures</p>
                <h3>Retards</h3>
                <p>3</p>
            </div>

            <div class="absence-list">

                <div class="absence-card">
                    <h4>Absence le 11/12/2024 de 15h à 17h</h4>
                    <p>2h total</p>
                    <p class="status justified">Justifiée</p>
                    <i class="fa-solid fa-circle-check fa-xl status justified status-icon"></i>
                    <button class="button justified">Justifiée</button>
                </div>

                <div class="absence-card">
                    <h4>Absence le 10/12/2024 de 10h à 12h</h4>
                    <p>2h total</p>
                    <p class="status unjustified">Non justifiée</p>
                    <i class="fa-solid fa-circle-xmark fa-xl status-icon status unjustified"></i>
                    <button class="button unjustified" onclick="openPopup()">Justifier mon absence</button>
                </div>

                <div class="absence-card">
                    <h4>Absence le 5/11/2024 de 8h à 10h</h4>
                    <p>2h total</p>
                    <p class="status unjustified">Non justifiée</p>
                    <i class="fa-solid fa-circle-xmark fa-xl status-icon status unjustified"></i>
                    <button class="button unjustified" onclick="openPopup()">Justifier mon absence</button>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-overlay" id="popupOverlay" onclick="closePopup(event)">
        <div class="popup" onclick="event.stopPropagation()">
            <button class="close-popup" onclick="closePopup(event)">×</button>
            <h2>Ajouter un justificatif</h2>
            <form>
            <label for="file">Choisir un fichier</label>
                <input type="file" name="file" accept=".pdf,.jpg,.png">
            <div class="motif">
                <input type="radio" name="justification" value="maladie" id="maladie">
                <label for="maladie">Maladie</label>
            </div>
            <div class="motif">
                <input type="radio" name="justification" value="famille" id="famille">
                <label for="famille">Raison familiale</label>
            </div>
            <div class="motif">
                <input type="radio" name="justification" value="rdv" id="rdv">
                <label for="rdv">Rendez-vous professionnel</label>
            </div>
            <div class="motif">
                <input type="radio" name="justification" value="autre" id="autre">
                <label for="autre">Autre</label>
            </div>
            <textarea name="message" id="message" cols="10" rows="2" placeholder="Autre motif"></textarea>


                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>



<?php
require 'footer.php';
?>

<script src='absences.js'></script>
<script src='script.js' ></script>    
</body>
</html>