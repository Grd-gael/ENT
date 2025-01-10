<?php

include 'connect.php';

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$login = $_POST['prenom'].'.'.$_POST['nom'];
$password = password_hash($_POST['prenom'].'.'.$_POST['nom'], PASSWORD_DEFAULT);
$role = $_POST['role'];

$sql = 'INSERT INTO user (prenom, nom, login, mdp, role) VALUES (:prenom, :nom, :login, :password, :role);';
$query = $db->prepare($sql);
$query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$query->bindValue(':nom', $nom, PDO::PARAM_STR);
$query->bindValue(':login', $login, PDO::PARAM_STR);
$query->bindValue(':password', $password, PDO::PARAM_STR);
$query->bindValue(':role', $role, PDO::PARAM_STR);
$query->execute();

switch ($role) {
    case 'etud':
        $sql = 'INSERT INTO etudiant (user_fk) VALUES (:id);';
        break;
    case 'prof':
        $sql = 'INSERT INTO professeur (user_fk) VALUES (:id);';
        break;
    case 'admi':
        $sql = 'INSERT INTO administrateur (user_fk) VALUES (:id);';
        break;
}

$query = $db->prepare($sql);
$query->bindValue(':id', $db->lastInsertId(), PDO::PARAM_INT);
$query->execute();

header('Location: backoffice.php?adduser=true&action=users');