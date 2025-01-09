<?php

include 'connect.php';

$user_id = $_GET['id'];
$role = $_GET['role'];

switch ($role) {
    case 'etud':
        $sql = 'DELETE FROM etudiant WHERE user_fk = :id;';
        break;
    case 'prof':
        $sql = 'DELETE FROM professeur WHERE user_fk = :id;';
        break;
    case 'admi':
        $sql = 'DELETE FROM administrateur WHERE user_fk = :id;';
        break;
}

$query = $db->prepare($sql);
$query->bindValue(':id', $user_id, PDO::PARAM_INT);
$query->execute();

$sql = 'DELETE FROM user WHERE user_id = :id;';
$query = $db->prepare($sql);
$query->bindValue(':id', $user_id, PDO::PARAM_INT);
$query->execute();

header('Location: backoffice.php?deleteuser=true');