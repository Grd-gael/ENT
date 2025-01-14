<?php
session_start();

if (isset($_SESSUION['user'])) {
    switch ($_SESSION['user']['role']) {
        case 'admin':
            header('Location: backoffice.php');
            break;
        case 'prof':
            header('Location: professeur.php');
            break;
        case 'etudiant':
            header('Location: index.php');
            break;
        default:
            header('Location: connexion.php?error=login');
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>ENT | Connexion</title>
    <link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
        <div class="flex-horizontal container-logo">
            <img src="img/logo-eiffel.png" alt="Logo" width="50">       
            <div class="text-logo">
                <span class="barlow">Espace Numérique de Travail</span> <br>
                <span class="jost">Gustave Eiffel</span>
            </div>
        </div>
    <form class="block-connexion" action="traiteconnexion.php" method="post">
        <h2>Connexion</h2>
        <div class="error">
            <?php
            if (isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 'login':
                        echo 'Mauvais login';
                        break;
                    case 'mdp':
                        echo 'Mauvais mot de passe';
                        break;
                    default:
                        echo 'Erreur inconnue';
                        break;
                }
            }
            ?>
        </div>
            <label for="login">Identifiant</label>
            <input type="text" name="login" placeholder="ex : prenom.nom">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <a href="#">Mot de passe oublié ?</a>
            <div class="souvenirdemoi">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Se souvenir de moi</label>
            </div>
            <input type="submit" value="Connexion">
    </form>

</body>
</html>