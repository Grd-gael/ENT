<?php
session_start();

if (!isset($_SESSION['etudiant'])) {
    header('Location: connexion.php');
    exit;
}

require 'connect.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Scolarité</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="scolarite.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>

<?php 
require 'navbar.php';
?>
    

<p class="fil-ariane">>><a href="index.php" class="lien-fil-ariane">Accueil</a>><span class="fin-fil-ariane">Scolarité</span></p>

<h1>Scolarité</h1>

<a href="https://elearning.univ-eiffel.fr/login/index.php" target="_blank" class="button elearning">Accéder à Elearning</a>

<?php
$sql = "SELECT module.module, devoir.note FROM devoir JOIN enonce ON enonce.enon_id = devoir.enon_fk JOIN module ON module.modu_id = enonce.modu_fk WHERE devoir.etud_fk = :etud_fk ORDER BY devoir.date DESC LIMIT 3;";
$stmt = $db->prepare($sql);
$stmt->execute(['etud_fk' => $_SESSION['etudiant']['etud_id']]);
$notes = $stmt->fetchAll();

$sql = "SELECT module.module, cours.debut, cours.fin FROM cours JOIN module ON module.modu_id = cours.modu_fk JOIN relation_cours_classe ON relation_cours_classe.cour_fk = cours.cour_id JOIN classe ON classe.clas_id = relation_cours_classe.clas_fk WHERE cours.debut = :jour AND classe.clas_id = :classe_etudiant ORDER BY cours.debut ASC;";
$stmt = $db->prepare($sql);
$stmt->execute(['jour' => date('Y-m-d'), 'classe_etudiant' => $_SESSION['etudiant']['clas_fk']]);
$cours = $stmt->fetchAll();

$sql = "SELECT module.module, cours.debut, cours.fin FROM absence JOIN cours ON cours.cour_id = absence.cour_fk JOIN module ON module.modu_id = cours.modu_fk WHERE absence.etud_fk = :etud_fk ORDER BY cours.debut DESC LIMIT 2;";
$stmt = $db->prepare($sql);
$stmt->execute(['etud_fk' => $_SESSION['etudiant']['etud_id']]);
$absences = $stmt->fetchAll();
?>

<div class="container-section-fullpage">
    <a href="notes.php">
        <div class="section-box-scolarite">
            <h2>Dernières notes</h2>

            <?php foreach ($notes as $note){ ?>
                <div class="note">
                    <p><?= $note['module'] ?></p>
                    <hr>
                    <p><?= $note['note'] ?>/20</p>
                </div>
            <?php } ?>
            <button class="button">Voir mes notes</button>
        </div>
    </a>
    <a href="edt.php">
        <div class="section-box-scolarite">
            <h2>Aujourd'hui</h2>
            <div class="edt">
                <?php 
                if (empty($cours)) {
                    echo '<p>Pas de cours aujourd\'hui</p>';
                } else {
                foreach ($cours as $cours){ ?>
                    <div class="edt-item">
                        <p><?= $cours['module'] ?></p>
                        <p><?= date('H\hi', strtotime($cours['debut'])) ?>-<?= date('H\hi', strtotime($cours['fin'])) ?></p>
                    </div>
                <?php }} ?>
            </div>
            <button class="button">Voir mon emploi du temps</button>
        </div>
    </a>
    <a href="absences.php">
        <div class="section-box-scolarite">
            <h2>Dernières Absences</h2>
            <?php foreach ($absences as $absence){ ?>
                <div class="absence">
                    <p><?= $absence['module'] ?></p>
                    <hr>
                    <p><?= date('d/m/Y', strtotime($absence['debut'])) ?></p>
                </div>
            <?php } ?>
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