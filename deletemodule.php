<?php
include 'connect.php';

$module = $_GET['id'];

$sql = 'DELETE FROM relation_prof_module WHERE modu_fk = :module;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->execute();

$sql = 'DELETE FROM relation_cours_classe WHERE cour_fk IN (SELECT cour_id FROM cours WHERE modu_fk = :module);';
$stmt = $db->prepare($sql);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->execute();

$sql = 'DELETE FROM cours WHERE modu_fk = :module;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->execute();

$sql = 'DELETE FROM devoir WHERE enon_fk IN (SELECT enon_id FROM enonce WHERE modu_fk = :module);';
$stmt = $db->prepare($sql);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->execute();

$sql = 'DELETE FROM enonce WHERE modu_fk = :module;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->execute();

$sql = 'DELETE FROM reponse WHERE ques_fk IN (SELECT ques_id FROM question WHERE modu_fk = :module);';
$stmt = $db->prepare($sql);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->execute();

$sql = 'DELETE FROM question WHERE modu_fk = :module;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->execute();

$sql = 'DELETE FROM module WHERE modu_id = :module;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->execute();

header('Location: backoffice.php?deletemodule=true&action=modules');
?>