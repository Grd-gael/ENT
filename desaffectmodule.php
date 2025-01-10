<?php
include 'connect.php';

$module = $_GET['module'];
$prof = $_GET['prof'];

$sql = 'DELETE FROM relation_prof_module WHERE modu_fk = :module AND prof_fk = :prof;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':module', $module, PDO::PARAM_INT);
$stmt->bindValue(':prof', $prof, PDO::PARAM_INT);
$stmt->execute();

header('Location: backoffice.php?desaffectmodule=true&action=modules');
?>