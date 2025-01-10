<?php
include 'connect.php';

var_dump($_POST);

$sql = 'SELECT * FROM professeur WHERE user_fk = :prof;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':prof', $_POST['prof'], PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$prof = $result['prof_id'];
$module = $_POST['module'];

$check = 'SELECT * FROM relation_prof_module WHERE prof_fk = :prof AND modu_fk = :module;';
$stmt = $db->prepare($check);
$stmt->bindValue(':prof', $prof, PDO::PARAM_INT);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    header('Location: backoffice.php?addrelation=false');
    exit;
} else {
    $sql = 'INSERT INTO relation_prof_module (prof_fk, modu_fk) VALUES (:prof, :module);';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':prof', $prof, PDO::PARAM_INT);
    $stmt->bindValue(':module', $module, PDO::PARAM_INT);
    $stmt->execute();
}

header('Location: backoffice.php?addrelation=true&action=modules');
?>