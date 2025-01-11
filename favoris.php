<?php
session_start();
include 'connect.php';

var_dump($_POST);

$query = $db->prepare('DELETE FROM favoris WHERE etud_fk = :id_user');
$query->execute([
    'id_user' => $_SESSION['etudiant']['etud_id']
]);

$pages = $_POST['favoris'];
foreach($pages as $page){
    $query = $db->prepare('INSERT INTO favoris (etud_fk, page) VALUES (:id_user, :page)');
    $query->execute([
        'id_user' => $_SESSION['etudiant']['etud_id'],
        'page' => $page
    ]);
}

header('Location: accueil.php');
exit;
?>