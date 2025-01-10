<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice</title>
    <!-- <link rel="stylesheet" href="general.css"> -->
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
            <label for="role">Rôle</label>
            <select name="role" id="role">
                <option value="etud">Étudiant</option>
                <option value="prof">Professeur</option>
                <option value="admi">Admin</option>
            </select>
            <input type="submit" value="Ajouter">
        </form>
    </details>

    <h2>Gestion des classes</h2>
    <details>
        <summary>
            <h3>Liste des classes</h3>
        </summary>

        <?php
        if (isset($_GET['classe'])){
            $sql = 'SELECT * FROM classe WHERE clas_id = :id;';
            $query = $db->prepare($sql);
            $query->bindValue(':id', $_GET['classe'], PDO::PARAM_INT);
            $query->execute();
            $classe = $query->fetch(PDO::FETCH_ASSOC);
            echo '<div class="classe popup">';
            echo '<h4>Classe '.$classe['tp'].' - MMI'.$classe['annee'].'</h4>';
            echo '<ul>';
            $sql = 'SELECT user.prenom, user.nom FROM etudiant JOIN user ON user.user_id = etudiant.user_fk WHERE etudiant.clas_fk = :id;';
            $query = $db->prepare($sql);
            $query->bindValue(':id', $_GET['classe'], PDO::PARAM_INT);
            $query->execute();
            $users = $query->fetchAll(PDO::FETCH_ASSOC);
            echo '<li>Étudiants : <ul>';
            foreach($users as $user){
                echo '<li>'.$user['prenom'].' '.$user['nom'].'</li>';
            }
            echo '</ul></li>';

            $sql = 'SELECT user.prenom, user.nom FROM relation_prof_classe JOIN professeur ON professeur.prof_id = relation_prof_classe.prof_fk JOIN user ON user.user_id = professeur.user_fk WHERE relation_prof_classe.clas_fk = :id;';
            $query = $db->prepare($sql);
            $query->bindValue(':id', $_GET['classe'], PDO::PARAM_INT);
            $query->execute();
            $users = $query->fetchAll(PDO::FETCH_ASSOC);
            echo '<li>Professeurs : <ul>';
            foreach($users as $user){
                echo '<li>'.$user['prenom'].' '.$user['nom'].'</li>';
            }
            echo '</ul></li>';
            echo '</ul>';
            echo '<a href="backoffice.php">Fermer</a>';
            echo '</div>';
        }
        ?>

        <table>
            <caption>Liste des classes</caption>
            <tr>
                <th>Id</th>
                <th>Classe</th>
                <th>Année</th>
                <th>Effectif</th>
                <th>Détails</th>
            </tr>
            <?php
            $sql = 'SELECT * FROM classe;';
            $query = $db->query($sql);
            $classes = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($classes as $classe){
                echo '<tr>';
                echo '<td>'.$classe['clas_id'].'</td>';
                echo '<td id="c_'.$classe['clas_id'].'">'.$classe['tp'].'</td>';
                echo '<td>MMI'.$classe['annee'].'</td>';
                $sql = 'SELECT COUNT(*) as effectif FROM etudiant WHERE clas_fk = :id;';
                $query = $db->prepare($sql);
                $query->bindValue(':id', $classe['clas_id'], PDO::PARAM_INT);
                $query->execute();
                $effectif = $query->fetch(PDO::FETCH_ASSOC);
                echo '<td>'.$effectif['effectif'].'</td>';
                echo '<td><a href="backoffice.php?classe='.$classe['clas_id'].'">Détails</a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </details>

    <details>
        <summary>
            <h3>Affecter une classe</h3>
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

    <h2>Gestion des cours</h2>
    <details>
        <summary>
            <h3>Liste des cours</h3>
        </summary>

        <?php
        if (isset($_GET['addcourse'])){
            echo '<p>Cours ajouté avec succès</p>';
        }

        if (isset($_GET['deletecourse'])){
            echo '<p>Cours supprimé avec succès</p>';
        }
        ?>

        <table>
            <caption>Liste des cours</caption>
            <tr>
                <th>Id</th>
                <th>Module</th>
                <th>Date</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Professeur</th>
                <th>Classe</th>
                <th>Actions</th>
            </tr>
            <?php

            $sql = 'SELECT cours.cour_id, cours.debut, cours.fin,
            classe.tp, classe.annee, module.module, user.prenom, user.nom 
            FROM cours
            JOIN professeur ON professeur.prof_id = cours.prof_fk 
            JOIN user ON user.user_id = professeur.user_fk 
            JOIN relation_cours_classe ON relation_cours_classe.cour_fk = cours.cour_id 
            JOIN classe ON relation_cours_classe.clas_fk = classe.clas_id 
            JOIN module ON module.modu_id = cours.modu_fk';

            $query = $db->prepare($sql);
            $query->execute();
            $cours = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach($cours as $cours){
                $date = date('d/m/Y', strtotime($cours['debut']));
                $heure_debut = date('H:i', strtotime($cours['debut']));
                $heure_fin = date('H:i', strtotime($cours['fin']));

                echo '<tr>';
                echo '<td>'.$cours['cour_id'].'</td>';
                echo '<td>'.$cours['module'].'</td>';
                echo '<td>'.$date.'</td>';
                echo '<td>'.$heure_debut.'</td>';
                echo '<td>'.$heure_fin.'</td>';
                echo '<td>'.$cours['prenom'].' '.$cours['nom'].'</td>';
                echo '<td>MMI'.$classe['annee'].' | '.$classe['tp'].'</td>';
                echo '<td><a href="backoffice.php?action=editcourse&id='.$cours['cour_id'].'">Modifier</a> | <a href="deletecourse.php?id='.$cours['cour_id'].'">Supprimer</a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </details>

    <details>
        <summary>
            <h3>Ajouter un cours</h3>
        </summary>

        <form action="addcourse.php" method="POST">
            <label for="module">Module</label>
            <select name="module" id="module">
                <?php
                $sql = 'SELECT * FROM module;';
                $query = $db->query($sql);
                $modules = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($modules as $module){
                    echo '<option value="'.$module['modu_id'].'">'.$module['module'].'</option>';
                }

                $date = date('Y-m-d');
                ?>
            </select>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" min=<?='"'.$date.'"'?>>
            <label for="heure_debut">Heure de début</label>
            <input type="time" name="heure_debut" id="heure_debut">
            <label for="heure_fin">Heure de fin</label>
            <input type="time" name="heure_fin" id="heure_fin">
            <label for="prof">Professeur</label>
            <select name="prof" id="prof">
                <?php
                $sql = 'SELECT * FROM user WHERE role = "prof";';
                $query = $db->query($sql);
                $profs = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($profs as $prof){
                    echo '<option value="'.$prof['user_id'].'">'.$prof['prenom'].' '.$prof['nom'].'</option>';
                }
                ?>
            </select>
            <label for="classe">Classe</label>
            <select name="classe" id="classe">
                <?php
                $sql = 'SELECT * FROM classe;';
                $query = $db->query($sql);
                $classes = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($classes as $classe){
                    echo '<option value="'.$classe['clas_id'].'">MMI'.$classe['annee'].' | '.$classe['tp'].'</option>';
                }
                ?>
            </select>
            <input type="submit" value="Ajouter">
        </form>
    </details>

    <h2>Gestion des modules</h2>
    <details>
        <summary>
            <h3>Liste des modules</h3>
        </summary>

        <table>
            <caption>Liste des modules</caption>
            <tr>
                <th>Id</th>
                <th>Module</th>
                <th>Enseignant</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = 'SELECT user.prenom, user.nom, module.modu_id, module.module, professeur.prof_id FROM relation_prof_module JOIN professeur ON professeur.prof_id = relation_prof_module.prof_fk JOIN user ON user.user_id = professeur.user_fk JOIN module ON module.modu_id = relation_prof_module.modu_fk;';
            $query = $db->query($sql);
            $modules = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($modules as $module){
                echo '<tr>';
                echo '<td>'.$module['modu_id'].'</td>';
                echo '<td>'.$module['module'].'</td>';
                echo '<td>'.$module['prenom'].' '.$module['nom'].'</td>';
                echo '<td><a href="deletemodule.php?id='.$module['modu_id'].'">Supprimer</a> | <a href="desaffectmodule.php?module='.$module['modu_id'].'&prof='.$module['prof_id'].'">Désaffecter</a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </details>

    <details>
        <summary>
            <h3>Affecter un module</h3>
        </summary>

        <form action="affectmodule.php" method="POST">
            <label for="module">Module</label>
            <select name="module" id="module">
                <?php
                $sql = 'SELECT * FROM module;';
                $query = $db->query($sql);
                $modules = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($modules as $module){
                    echo '<option value="'.$module['modu_id'].'">'.$module['module'].'</option>';
                }
                ?>
            </select>
            <label for="prof">Professeur</label>
            <select name="prof" id="prof">
                <?php
                $sql = 'SELECT * FROM user WHERE role = "prof";';
                $query = $db->query($sql);
                $profs = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($profs as $prof){
                    echo '<option value="'.$prof['user_id'].'">'.$prof['prenom'].' '.$prof['nom'].'</option>';
                }
                ?>
            </select>
            <input type="submit" value="Affecter">
        </form>
</body>
</html>