<?php
include 'connect.php';

$sql = "SELECT * FROM module;";
$stmt = $db->query($sql);
$modules = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($modules as $module) {
    echo '<div class="module">';
    echo '<h2>' . $module['module'] . '</h2>';

    $sql = "SELECT devoir.devo_id, devoir.note, module.module FROM devoir JOIN enonce ON enonce.enon_id = devoir.enon_fk JOIN module ON module.modu_id = enonce.modu_fk WHERE devoir.etud_fk = :etudiant_id AND enonce.modu_fk = :module_id ORDER BY devoir.date DESC;";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':etudiant_id', $_GET['id']);
    $stmt->bindParam(':module_id', $module['modu_id']);
    $stmt->execute();
    $devoirs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($devoirs as $note) {
        echo '<a href="vue_notes.php?id=' . $_GET['id'] . '&note='.$note['devo_id'].'" class="note">'.$note['note'].'</a>';
        echo '</div>';
    }
}

if (isset($_GET['note'])) {
    $sql = "SELECT devoir.note, devoir.date, devoir.remarque, enonce.intitule, enonce.coeff, module.module, user.nom, user.prenom FROM devoir JOIN enonce ON enonce.enon_id = devoir.enon_fk JOIN module ON module.modu_id = enonce.modu_fk JOIN professeur ON professeur.prof_id = devoir.prof_fk JOIN user ON user.user_id = professeur.user_fk WHERE devoir.devo_id = :devoir_id;";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':devoir_id', $_GET['note']);
    $stmt->execute();
    $devoir = $stmt->fetch(PDO::FETCH_ASSOC);

    $date = new DateTime($devoir['date']);

    echo '<div class="devoir">';
    echo '<h2>Détail de la note</h2>';
    echo '<h3>'.$devoir['module'].'</h3>';
    echo '<h4>'.$devoir['intitule'].'</h4>';
    echo '<p>Ajoutée le '.$date -> format('d/m/Y').' par '.$devoir['prenom'].' '.$devoir['nom'].'</p>';
    echo '<p>Note obtenue : '.$devoir['note'].'/20</p>';
    echo '<p>Coeff. '.$devoir['coeff'].'</p>';
    echo '<h4>Remarques du professeur</h4>';
    echo '<p>'.$devoir['remarque'].'</p>';
    echo '<a href="vue_notes.php?id='.$_GET['id'].'" class="close">Fermer</a>';
    echo '</div>';
}