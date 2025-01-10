<?php

$module = $_POST['module'];
$classe = $_POST['classe'];
$coeff = $_POST['coeff'];
$rendu = date('Y-m-d H:i:s',strtotime($_POST['date'].' '.$_POST['heure']));
$intitule = $_POST['intitule'];
$prof = $_GET['id'];

include 'connect.php';

$sql = 'INSERT INTO enonce (date_rendu, coeff, intitule, modu_fk) VALUES (:date, :coeff, :intitule, :module);';
$stmt = $db->prepare($sql);
$stmt->bindValue(':date', $rendu, PDO::PARAM_STR);
$stmt->bindValue(':coeff', strval($coeff), PDO::PARAM_STR);
$stmt->bindValue(':intitule', $intitule, PDO::PARAM_STR);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->execute();

$enonce_id = $db->lastInsertId();
$sql = 'INSERT INTO relation_enonce_classe (enon_fk, clas_fk) VALUES (:enonce, :classe);';
$stmt = $db->prepare($sql);
$stmt->bindValue(':enonce', $enonce_id, PDO::PARAM_INT);
$stmt->bindValue(':classe', $classe, PDO::PARAM_INT);
$stmt->execute();

$sql = 'INSERT INTO relation_prof_enonce (prof_fk, enon_fk) VALUES (:prof, :enonce);';
$stmt = $db->prepare($sql);
$stmt->bindValue(':prof', $prof, PDO::PARAM_INT);
$stmt->bindValue(':enonce', $enonce_id, PDO::PARAM_INT);
$stmt->execute();

header('Location: professeur.php?id='.$_GET['id'].'&addenonce');