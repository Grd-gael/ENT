<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>ENT | Connexion</title>
</head>
<body>
    <form class="block-connexion" action="connexion.php" method="post">
        <h1>ENT des MMI</h1>
        <form action="connexion.php" method="post">
            <label for="login">Identifiant</label>
            <input type="text" name="login" placeholder="Identifiant">
            <label for="password">Mot de Passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <input type="checkbox" name="remember" id="remember"> 
            <label for="remember">Se souvenir de moi</label>
            <input type="submit" value="Connexion">
    </form>
</body>
</html>