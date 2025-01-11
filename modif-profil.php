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
    <title>ENT | Modification de profil</title>
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

<p class="fil-ariane">>><a href="index.php" class="lien-fil-ariane">Accueil</a>><span class="fin-fil-ariane">Profil</span></p>


<div class="container-modif">
    
        <form action="post" class="modif-profil">
                <div class="modif-photo-profil">
                    <img src="img/profile.jpg" class="preview-image" alt="">
                    <input type="file" name="photo" id="photo" accept="image/*" onchange="previewFile()">
                </div>
    
                <label for="aPropos">À Propos</label>
                <textarea name="aPropos" id="aPropos" value="Je suis un dev créatif !"></textarea>
    
            <input type="submit" value="Enregistrer les modifications" class="button">
        </form>
</div>





<?php
require 'footer.php';
?>


<script src='script.js' ></script>
</body>
</html>