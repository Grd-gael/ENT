<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice</title>
</head>
<body>
    <h1>Backoffice</h1>
    <h2>Gestion des utilisateurs</h2>
    <details>
    <summary>
        <h3>Liste des utilisateurs</h3>
    </summary>

        <?php
        if (isset($_GET['adduser'])){
            echo '<p>Utilisateur ajouté avec succès</p>';
        } elseif (isset($_GET['deleteuser'])){
            echo '<p>Utilisateur supprimé avec succès</p>';
        }
        ?>
        <table>
            <caption>Liste des utilisateurs</caption>
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Login</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = 'SELECT * FROM user;';
            $query = $db->query($sql);
            $users = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($users as $user){
                switch ($user['role']) {
                    case 'etud':
                        $role = 'Étudiant';
                        break;
                    case 'prof':
                        $role = 'Professeur';
                        break;
                    case 'admi':
                        $role = 'Admin';
                        break;
                }
                echo '<tr>';
                echo '<td>'.$user['user_id'].'</td>';
                echo '<td>'.$user['prenom'].'</td>';
                echo '<td>'.$user['nom'].'</td>';
                echo '<td>'.$user['login'].'</td>';
                echo '<td>'.$role.'</td>';
                echo '<td><a href="edituser.php?id='.$user['user_id'].'">Modifier</a>';
                if ($user['user_id'] != 1){
                    echo ' | <a href="deleteuser.php?id='.$user['user_id'].'&role='.$user['role'].'">Supprimer</a>';
                }
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </details>
    <details>
        <summary>
            <h3>Ajouter un utilisateur</h3>
        </summary>
        <form action="adduser.php" method="post">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <label for="role">Rôle</label>
            <select name="role" id="role">
                <option value="etud">Étudiant</option>
                <option value="prof">Professeur</option>
                <option value="admi">Admin</option>
            </select>
            <input type="submit" value="Ajouter">
        </form>
    </details>

    <h2>Classes</h2>
    <details>
        <summary>
            <h3>Liste des classes</h3>
        </summary>

        <table>
            <caption>Liste des classes</caption>
            <tr>
                <th>Id</th>
                <th>Classe</th>
                <th>Année</th>
            </tr>
            <?php
            $sql = 'SELECT * FROM classe;';
            $query = $db->query($sql);
            $classes = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($classes as $classe){
                echo '<tr>';
                echo '<td>'.$classe['clas_id'].'</td>';
                echo '<td id="c_'.$classe['clas_id'].'">'.$classe['tp'].'</td>';
                echo '<td>'.$classe['annee'].'</td>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </details>

    <details>
        <summary>
            <h3>Affectation de classes</h3>
        </summary>

        <?php
        if (isset($_GET['affect'])){
            if ($_GET['affect']){
                echo '<p>Affectation réussie</p>';
            }
        }
        ?>

        <form action="affectclass.php" method="POST">
            <label for="classe">Classe</label>
            <select name="classe" id="classe">
                <?php
                $sql = 'SELECT * FROM classe;';
                $query = $db->query($sql);
                $classes = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($classes as $classe){
                    echo '<option value="'.$classe['clas_id'].'">'.$classe['tp'].' - '.$classe['annee'].'e année</option>';
                }
                ?>
            </select>
            <label for="user">Utilisateur</label>
            <select name="user" id="user">
                <?php
                $sql = 'SELECT * FROM user;';
                $query = $db->query($sql);
                $users = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($users as $user){
                    if ($user['role'] == 'prof' || $user['role'] == 'etud'){
                        echo '<option value="'.$user['user_id'].'">'.$user['prenom'].' '.$user['nom'].'</option>';
                    }
                }
                ?>
            </select>
            <input type="submit" value="Affecter">
        </form>
    </details>

    
</body>
</html>