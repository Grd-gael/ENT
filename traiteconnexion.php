<?php
session_start();
include 'connect.php';

$login = $_POST['login'];
$mdp = $_POST['password'];

$sql = 'SELECT * FROM user WHERE login = :login;';
$stmt = $db->prepare($sql);
$stmt->bindValue(':login', $login, PDO::PARAM_STR);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    if (!password_verify($mdp, $user['mdp'])) {
        header('Location: connexion.php?error=mdp');
        echo 'Mauvais mot de passe';
        exit();
    } else {
    $_SESSION['user'] = $user;

    switch ($user['role']) {
        case 'admi':
            $stmt = $db->prepare('SELECT * FROM administrateur WHERE user_fk = :id');
            $stmt->bindParam(':id', $user['user_id']);
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['admin'] = $admin;
            header('Location: backoffice.php');
            break;
        case 'prof':
            $stmt = $db->prepare('SELECT * FROM professeur WHERE user_fk = :id');
            $stmt->bindParam(':id', $user['user_id']);
            $stmt->execute();
            $prof = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['prof'] = $prof;
            header('Location: professeur.php');
            break;
        case 'etud':
            $stmt = $db->prepare('SELECT etudiant.etud_id, classe.tp, classe.annee FROM etudiant JOIN classe ON classe.clas_id = etudiant.clas_fk WHERE user_fk = :id');
            $stmt->bindParam(':id', $user['user_id']);
            $stmt->execute();
            $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['etudiant'] = $etudiant;
            header('Location: accueil.php');
            break;
    }
}
    
} else {
    header('Location: connexion.php?error=login');
    echo 'Mauvais login';
}
?>