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
    <title>ENT | Accueil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="accueil.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php 
require 'navbar.php';
?>


<h1 class="h1-section-margin">Accueil</h1>

<div class="container-section-margin" id="container">
    <a href="services.php">
        <div class="section-box">
            <i class="fa-duotone fa-solid fa-users fa-5x"></i>
            <h2>Services</h2>
        </div>
    </a>
    <a href="scolarite.php">
        <div class="section-box">
            <i class="fa-solid fa-graduation-cap fa-5x"></i>
            <h2>Scolarité</h2>
        </div>
    </a>
    <a href="informations.php">
        <div class="section-box">
            <i class="fa-solid fa-circle-info fa-5x"></i>
            <h2>Informations</h2>
        </div>
    </a>
    <a href="messagerie.php">
        <div class="section-box">
            <i class="fa-solid fa-envelopes-bulk fa-5x"></i>
            <h2>Messagerie</h2>
        </div>
    </a>
    <a href="stockage.php">
        <div class="section-box">
            <i class="fa-solid fa-folder fa-5x"></i>
            <h2>Espace de stockage</h2>
        </div>
    </a>
    <a href="emploi.php">
        <div class="section-box">
            <i class="fa-solid fa-briefcase fa-5x"></i>
            <h2>Emploi</h2>
        </div>
    </a>
</div>


<div class="container-button">

    <div class="flex-vertical box-button">
        <p>Tu te poses des questions sur ton projet professionnel ?</p>
        <a href="" class="button">Quiz d'orientation</a>
    </div>
    
    <div class="flex-vertical box-button">
        <p>Besoin d'aide sur un projet ?</p>
        <a href="" class="button">Forum communautaire</a>
    </div>


    <div class="flex-vertical box-button">
        <p>Besoin d’astuces et d’infos sur ton statut d’étudiant ?</p>
        <a href="" class="button">Droits étudiants</a>
    </div>
</div>


<aside>
<div class="content-open">
    <div class="close">
        <i class="fa-solid fa-xmark fa-3x" style="color:white;"></i>
    </div>
    <h2>Favoris</h2>
        <div class="aside-wrapper">
            <a href="notes.php">
                <div class="favoris-box">
                    <i class="fa-solid fa-list fa-3x"></i>
                    <h3>Notes</h3>
                </div>
            </a>
    
            <a href="mail.php">
                <div class="favoris-box">
                    <i class="fa-solid fa-envelope fa-3x"></i>
                    <h3>Mail</h3>
                </div>
            </a>
            <a href="edt.php">
                    <div class="favoris-box">
                        <i class="fa-solid fa-calendar-days fa-3x"></i>
                        <h3>Emploi du temps</h3>
                    </div>
            </a>
    
        </div>
        <button class="button" style="margin-left:35%; width:30%; margin-top: 30px;">Modifier</button>
</div>

<div class="content-close">
<i class="fa-solid fa-chevron-left fa-3x"></i>
</div>

</div>
</aside>




<?php 
require 'footer.php';
?>
  
  
<script src='script.js' ></script>
</body>
</html>