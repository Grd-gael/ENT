<?php
include 'connect.php';

$module = $_POST['module'];
$date = $_POST['date'];
$heure_debut = $_POST['heure_debut'];
$heure_fin = $_POST['heure_fin'];
$classe = $_POST['classe'];
$prof = $_POST['prof'];
$salle = $_POST['salle'];

$debut = date('Y-m-d H:i:s', strtotime($date.' '.$heure_debut));
$fin = date('Y-m-d H:i:s', strtotime($date.' '.$heure_fin));

$check_salle = 'SELECT * FROM reserve_salle WHERE sall_fk = :salle AND date_debut = :debut OR (
    (:debut BETWEEN date_debut AND date_fin) OR
    (:fin BETWEEN date_debut AND date_fin) OR
    (date_debut BETWEEN :debut AND :fin) OR
    (date_fin BETWEEN :debut AND :fin)
);';
$query = $db->prepare($check_salle);
$query->bindValue(':debut', $debut, PDO::PARAM_STR);
$query->bindValue(':fin', $fin, PDO::PARAM_STR);
$query->bindValue(':salle', $salle, PDO::PARAM_INT);
$query->execute();

if ($query->rowCount() > 0) {
    // Handle the case where the room is already reserved
    header('Location: backoffice.php?addcourse=false&action=courses&error=room_reserved');
    exit();
}

$sql = 'INSERT INTO cours (debut, fin, modu_fk, prof_fk) VALUES (:debut, :fin, :module, :prof);';
$query = $db->prepare($sql);
$query->bindValue(':debut', $debut, PDO::PARAM_STR);
$query->bindValue(':fin', $fin, PDO::PARAM_STR);
$query->bindValue(':module', $module, PDO::PARAM_STR);
$query->bindValue(':prof', $prof, PDO::PARAM_INT);
$query->execute();

$cours_id = $db->lastInsertId();
$sql = 'INSERT INTO relation_cours_classe (cour_fk, clas_fk) VALUES (:cours, :classe);';
$query = $db->prepare($sql);
$query->bindValue(':cours', $cours_id, PDO::PARAM_INT);
$query->bindValue(':classe', $classe, PDO::PARAM_INT);
$query->execute();

$sql = 'INSERT INTO reserve_salle (sall_fk, date_debut, date_fin, cour_fk) VALUES (:salle, :debut, :fin, :cours);';
$query = $db->prepare($sql);
$query->bindValue(':salle', $salle, PDO::PARAM_INT);
$query->bindValue(':debut', $debut, PDO::PARAM_STR);
$query->bindValue(':fin', $fin, PDO::PARAM_STR);
$query->bindValue(':cours', $cours_id, PDO::PARAM_INT);
$query->execute();

header('Location: backoffice.php?addcourse=true&action=courses');
?>