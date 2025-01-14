<?php
session_start();
require 'connect.php';

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


<aside>
<div class="content-open">
    <div class="close">
        <i class="fa-solid fa-xmark fa-3x" style="color:white;"></i>
    </div>
    <h2>Favoris</h2>
        <div class="aside-wrapper" id="favoris-list">
            <?php
            $sql = 'SELECT * FROM favoris WHERE etud_fk = :etudiant_id';
            $query = $db->prepare($sql);
            $query->bindValue(':etudiant_id', $_SESSION['etudiant']['etud_id'], PDO::PARAM_INT);
            $query->execute();
            $favoris = $query->fetchAll();

            if ($favoris){
            foreach ($favoris as $favori) {
                echo '<a href="' . $favori['page'] . '">'.$favori['page'].'</a>';
            }
        }
            ?>
    
        </div>
        <button id="btn-modifier-favoris" class="button" style="margin-left:35%; width:30%; margin-top: 30px;">Modifier</button>
</div>

<div class="content-close">
    <i class="fa-solid fa-chevron-left fa-3x"></i>
</div>
</aside>


<!-- Popup pour modifier les favoris -->
<div id="popup-favoris" class="popup hidden">
    <div class="popup-content">
        <h3>Modifier vos favoris</h3>
        <form id="favoris-form" action="favoris.php" method="post">
            <label>
                <input type="checkbox" name="favoris[]" value="commande.php"
                />
                Commande
            </label>
            <label>
                <input type="checkbox" name="favoris[]" value="reservation.php" checked />
                Réservation
            </label>
            <label>
                <input type="checkbox" name="favoris[]" value="notes.php" checked />
                Notes
            </label>

            <label>
                <input type="checkbox" name="favoris[]" value="edt.php" checked />
                Emploi du temps
            </label>
            <label>
                <input type="checkbox" name="favoris[]" value="absences.php" />
                Absences
            </label>
            <label>
                <input type="checkbox" name="favoris[]" value="mail.php" checked />
                Mail
            </label>
            <label>
                <input type="checkbox" name="favoris[]" value="tchat.php" />
                Tchat
            </label>

            <div class="popup-buttons">
            <button id="btn-fermer-popup" class="button">Fermer</button>
            <input type=submit id="btn-valider-favoris" class="button" value="Valider" />
            
        </div>
        </form>
        
    </div>
</div>



<?php 
require 'footer.php';
?>
  
  
<script src='script.js' ></script>
</body>
</html>