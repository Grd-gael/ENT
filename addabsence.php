<?php

include 'connect.php';

$eleve = $_POST['eleve'];
$cours = $_POST['cours'];

$sql = 'INSERT INTO absence (present, justifie, cour_fk, etud_fk) VALUES (false, false, :cours, :eleve);';

$stmt = $db->prepare($sql);
$stmt->bindValue(':cours', $cours, PDO::PARAM_INT);
$stmt->bindValue(':eleve', $eleve, PDO::PARAM_INT);
$stmt->execute();

header('Location: professeur.php?id='.$_GET['id'].'&addabsence');

?>