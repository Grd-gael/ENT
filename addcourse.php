<?php
include 'connect.php';

$module = $_POST['module'];
$date = $_POST['date'];
$heure_debut = $_POST['heure_debut'];
$heure_fin = $_POST['heure_fin'];
$classe = $_POST['classe'];
$prof = $_POST['prof'];

$debut = date('Y-m-d H:i:s', strtotime($date.' '.$heure_debut));
$fin = date('Y-m-d H:i:s', strtotime($date.' '.$heure_fin));

$sql = 'INSERT INTO cours (debut, fin, modu_fk, prof_fk) VALUES (:debut, :fin, :module, :prof);';
$query = $db->prepare($sql);
$query->bindValue(':module', $module, PDO::PARAM_STR);
$query->bindValue(':debut', $debut, PDO::PARAM_STR);
$query->bindValue(':fin', $fin, PDO::PARAM_STR);
$query->bindValue(':prof', $prof, PDO::PARAM_INT);
$query->execute();

$cours_id = $db->lastInsertId();
$sql = 'INSERT INTO relation_cours_classe (cour_fk, clas_fk) VALUES (:cours, :classe);';
$query = $db->prepare($sql);
$query->bindValue(':cours', $cours_id, PDO::PARAM_INT);
$query->bindValue(':classe', $classe, PDO::PARAM_INT);
$query->execute();

header('Location: backoffice.php?addcourse=true&action=courses');
?>