<?php
include 'connect.php';

$sql = 'SELECT absence.abse_id, absence.justifie, cours.debut, cours.fin, module.module, user.nom, user.prenom FROM absence JOIN cours ON absence.cour_fk = cours.cour_id JOIN module ON module.modu_id = cours.modu_fk JOIN professeur ON professeur.prof_id = cours.prof_fk JOIN user ON user.user_id = professeur.user_fk WHERE absence.etud_fk = :etudiant AND present = false;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':etudiant', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$absences = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($absences) {
    foreach ($absences as $absence) {
        $date = date('d/m/Y', strtotime($absence['debut']));
        $debut = date('H:i', strtotime($absence['debut']));
        $fin = date('H:i', strtotime($absence['fin']));
        $duree = date_diff(date_create($absence['debut']), date_create($absence['fin']));

        echo '<div>';
        echo '<p>'.$absence['module'].' - '.$absence['prenom'].' '.$absence['nom'].'</p>';
        echo '<p>Le '.$date.' de '.$debut.' à '.$fin.'</p>';
        echo '<p>'.$duree->format('%h h').' d\'absence</p>';
        echo '<p>Justifiée: '.($absence['justifie'] ? 'Oui' : 'Non').'</p>';
        if (!$absence['justifie']){
            echo '<a href="vue_absences.php?id='.$_GET['id'].'&absence='.$absence['abse_id'].'">Justifier</a>';
        }
        echo '</div>';       
    }
} else {
    echo '<p>Aucune absence</p>';
}

if (isset($_GET['absence'])) {
?>
    <div class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Justifier une absence</h2>
            <p>Absence le <?=$date?> de <?=$debut?> à <?=$fin?></p>
            <p><?=$duree->format('%h h')?> au total</p>
            <form action="justifie.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="absence" id="absence" value="<?= $absence['abse_id'] ?>">
                <input type="hidden" name="etudiant" id="etudiant" value="<?= $_GET['id'] ?>">
                <label for="motif">Motif :</label>
                <input type="radio" name="motif" value="Maladie"> Maladie avec certificat<br>
                <input type="radio" name="motif" value="Famille"> Raison familiale<br>
                <input type="radio" name="motif" value="Autre"> Autre<br>
                <input type="text" name="autre" id="autre" placeholder="Précisez"><br>
                <label for="justificatif">Justificatif :</label>
                <input type="file" name="justificatif" id="justificatif"><br>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
<?php
}
?>