<?php
var_dump($_POST);
include 'connect.php';

$classe=$_POST['classe'];
$user=$_POST['user'];

$sql = 'SELECT role FROM user WHERE user_id='.$user.';';
$query = $db->query($sql);
$result = $query->fetch(PDO::FETCH_ASSOC);
$role = $result['role'];

switch ($role){
    case 'prof':
        $sql = 'SELECT * FROM professeur WHERE user_fk='.$user.';';
        $query = $db->query($sql);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $prof = $result['prof_id'];

        $sql = 'INSERT INTO relation_prof_classe (prof_fk, clas_fk) VALUES ('.$prof.', '.$classe.');';
        $query = $db->query($sql);

        header('Location: backoffice.php?affectclass=true');
        break;
    case 'etud':
        $sql = 'UPDATE etudiant SET clas_fk='.$classe.' WHERE user_fk='.$user.';';
        $query = $db->query($sql);

        header('Location: backoffice.php?affectclass=true&action=classes');
        break;
    default:
        header('Location: backoffice.php?affectclass=&action=classes');
        break;
}