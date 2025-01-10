<?php

include 'connect.php';

$module = $_POST['module'];

$sql = 'INSERT INTO module (module) VALUES (:module);';
$query = $db->prepare($sql);
$query->bindValue(':module', $module, PDO::PARAM_STR);
$query->execute();

header('Location: backoffice.php?addmodule=true&action=modules');
?>