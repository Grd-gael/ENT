<?php
include 'connect.php';

var_dump($_POST);
var_dump($_FILES);

$absence_id = $_POST['absence'];
$motif = $_POST['motif'];
if ($motif == 'autre') {
    $motif = $_POST['autre'];
}

$sql = 'UPDATE absence SET justifie = true, motif = :motif WHERE abse_id = :absence;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':motif', $motif, PDO::PARAM_STR);
$stmt->bindValue(':absence', $absence_id, PDO::PARAM_INT);
$stmt->execute();

$filepath = $_FILES['justificatif']['tmp_name'];
$target_dir = "justificatifs/";
$filename = $absence_id.'-'.basename($_FILES['justificatif']['name']);
$newFilepath = $target_dir . $filename;
move_uploaded_file($filepath, $newFilepath);

header('Location: absences.php?id='.$_POST['etudiant'].'&justifie');
?>