<?php
include 'connect.php';

?>
<div class="container-section-fullpage">

<?php
$sql = 'SELECT absence.abse_id, absence.justifie, cours.debut, cours.fin FROM absence JOIN cours ON absence.cour_fk = cours.cour_id WHERE absence.etud_fk = :etudiant AND present = false;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':etudiant', $_SESSION['etudiant']['etud_id'], PDO::PARAM_INT);
$stmt->execute();
$absences = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_absences = 0;
$total_non_justifiees = 0;
foreach ($absences as $absence) {
    $duree = date_diff(date_create($absence['debut']), date_create($absence['fin']));
    $total_absences += $duree->format('%h');
    if (!$absence['justifie']) {
        $total_non_justifiees += $duree->format('%h');
    }
}
?>
<div class="container-absences">
    <div class="summary-panel">
        <h3>Total d’heures non justifiées</h3>
        <p><?=$total_non_justifiees?> heures</p>
        <h3>Total d’heures d’absence</h3>
        <p><?=$total_absences?> heures</p>
    </div>
   <div class=absence-list>
<?php
if ($absences) {
    foreach ($absences as $absence) {
        $date = date('d/m/Y', strtotime($absence['debut']));
        $debut = date('H:i', strtotime($absence['debut']));
        $fin = date('H:i', strtotime($absence['fin']));
        $duree = date_diff(date_create($absence['debut']), date_create($absence['fin']));

        echo '<div class="absence-card">';
        echo '<h4>Absence le '.$date.' de '.$debut.' à '.$fin.'</h4>';
        echo '<p>'.$duree->format('%h h').' total</p>';
        if ($absence['justifie']) {
            echo '<p class="status justified">Justifiée</p>';
            echo '<i class="fa-solid fa-circle-check fa-xl status justified status-icon"></i>';
            echo '<button class="button justified">Justifiée</button>';
        } else {
            echo '<p class="status unjustified">Non justifiée</p>';
            echo '<i class="fa-solid fa-circle-xmark fa-xl status-icon status unjustified"></i>';
            echo '<button data-absence="'.$absence['abse_id'].'" class="button unjustified" onclick="openPopup(event)">Justifier mon absence</button>';
        }
        echo '</div>';       
    }
} else {
    echo '<p>Aucune absence</p>';
}
echo '</div>';

?>
    <div class="popup-overlay" id="popupOverlay" onclick="closePopup(event)">
        <div class="popup" onclick="event.stopPropagation()">
            <button class="close-popup" onclick="closePopup(event)">×</button>
            <h2>Ajouter un justificatif</h2>
            <form action="justifie.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="absence" id="absence" value="">

                <label for="justificatif">Choisir un fichier</label>
                <input type="file" name="justificatif" id="justificatif" accept=".pdf,.jpg,.png">

                <label for="motif">Motif</label>
                <div class="motif">
                    <input type="radio" name="motif" value="maladie" id="maladie">
                    <label for="maladie">Maladie avec certificat</label>
                </div>

                <div class="motif">
                    <input type="radio" name="motif" value="famille" id="famille">
                    <label for="famille">Raison familiale</label>
                </div>

                <div class="motif">
                    <input type="radio" name="motif" value="rdv" id="rdv">
                    <label for="rdv">Rendez-vous professionnel</label>
                </div>

                <div class="motif">
                    <input type="radio" name="motif" value="autre" id="autre">
                    <label for="autre">Autre</label>
                </div>
                <textarea name="autre" id="message" cols="10" rows="2" placeholder="Autre motif"></textarea>

                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</div>