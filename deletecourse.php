<?php
include 'connect.php';

$cours_id = $_GET['id'];

$sql = 'DELETE FROM relation_cours_classe WHERE cour_fk = :id;';
$query = $db->prepare($sql);
$query->bindValue(':id', $cours_id, PDO::PARAM_INT);
$query->execute();

$sql = 'DELETE FROM cours WHERE cour_id = :id;';
$query = $db->prepare($sql);
$query->bindValue(':id', $cours_id, PDO::PARAM_INT);
$query->execute();

header('Location: backoffice.php?deletecourse=true');
?>