<?php

include 'connect.php';

$etudiant = $_POST['etudiant'];
$cours = $_POST['cours'];

$sql = 'INSERT INTO absence (present, justifie, cour_fk, etud_fk) VALUES (false, false, :cours, :etudiant);';

$stmt = $db->prepare($sql);
$stmt->bindValue(':cours', $cours, PDO::PARAM_INT);
$stmt->bindValue(':etudiant', $etudiant, PDO::PARAM_INT);
$stmt->execute();

header('Location: professeur.php?id='.$_GET['id'].'&addabsence');

?>