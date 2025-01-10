<?php
include 'connect.php';

$sql = "SELECT devoir.note, devoir.date, devoir.remarque, enonce.intitule, enonce.coeff, module.module FROM devoir JOIN enonce ON enonce.enon_id = devoir.enon_fk JOIN module ON module.modu_id = enonce.modu_fk WHERE etud_fk = :etudiant_id ORDER BY date DESC LIMIT 2;";
$stmt = $db->prepare($sql);
$stmt->bindParam(':etudiant_id', $_GET['id']);
$stmt->execute();
$last_added_notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-section-fullpage">
    <!-- Panneau des dernières notes -->
    <div class="notes-panel">
    <h3>Dernières notes</h3>

    <?php
        foreach ($last_added_notes as $note) {
            $date = date_create($note['date']);
    ?>
        <div class="note-item" 
            onclick="showPopup('<?= addslashes($note['intitule']) ?>', 
               '<?= $date -> format('d/m/Y') ?>', 
               '<?= $note['note'] ?>/20', 
               '<?= $note['coeff'] ?>', 
               '<?= addslashes($note['remarque']) ?>')">
            <p><?=$note['module']?></p>
            <span class="note-value"><?=$note['note']?>/20</span>
        </div>

    <?php
    }
    ?>
    </div>

<?php
$sql = "SELECT * FROM module;";
$stmt = $db->query($sql);
$modules = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<div class="subjects-panel">';

foreach ($modules as $module) {
    echo '<div class="subject-card">';
    echo "<h4>".$module['module']."</h4>";

    $sql = "SELECT devoir.note, devoir.date, devoir.remarque, enonce.intitule, enonce.coeff, module.module FROM devoir JOIN enonce ON enonce.enon_id = devoir.enon_fk JOIN module ON module.modu_id = enonce.modu_fk WHERE etud_fk = :etudiant_id AND enonce.modu_fk = :module_id ORDER BY devoir.date DESC;";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':etudiant_id', $_GET['id']);
    $stmt->bindParam(':module_id', $module['modu_id']);
    $stmt->execute();
    $devoirs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<div class="score-list">';

    foreach ($devoirs as $note) {
        $date = date_create($note['date']);
        ?>
            <span class="score" 
    onclick="showPopup('<?= addslashes($note['intitule']) ?>', 
                       '<?= $date -> format('d/m/Y') ?>', 
                       '<?= $note['note'] ?>/20', 
                       '<?= $note['coeff'] ?>', 
                       '<?= addslashes($note['remarque']) ?>')">
    <?=$note['note']?>
</span>

        <?php
    }
    echo '</div>';
    echo '</div>';
}
echo '</div>';
?>

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