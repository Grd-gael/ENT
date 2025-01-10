<?php
session_start();

if (!isset($_SESSION['prof'])) {
    header('Location: connexion.php');
    exit;
}
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENT | Espace professeurs</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo-eiffel.png" type="image/x-icon">
    <link rel="stylesheet" href="back.css">
    <link rel="stylesheet" href="general.css">
    <script src="https://kit.fontawesome.com/9f78fb8c04.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Espace professeurs</h1>

    <details open>
        <summary>
            <h2>Absences</h2>
        </summary>
        <h3>Déclarer une absence</h3>
        <form action="addabsence.php?id=<?=$_SESSION['prof']['prof_id']?>" method="post">
            <label for="etudiant">Élève</label>
            <select name="etudiant" id="etudiant_absence">
                <option value="0" selected>-- Sélectionner un élève --</option>
                <?php
                $sql = 'SELECT user.nom, user.prenom, etudiant.etud_id, etudiant.clas_fk FROM etudiant JOIN relation_prof_classe ON etudiant.clas_fk = relation_prof_classe.clas_fk JOIN user ON user.user_id = etudiant.user_fk WHERE relation_prof_classe.prof_fk = :prof_id;';
        
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
                $stmt->execute();
                $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($etudiants as $etudiant) {
                    echo '<option value="'.$etudiant['etud_id'].'" data-classe="'.$etudiant['clas_fk'].'">'.$etudiant['prenom'].' '.$etudiant['nom'].'</option>';
                }
                ?>
            </select>
            <label for="cours">Cours</label>
            <select name="cours" id="cours_absence">
                <option value="0" selected>-- Sélectionner un cours --</option>
                <?php
                $sql = 'SELECT cours.cour_id, cours.debut, cours.fin, module.module, relation_cours_classe.clas_fk FROM cours JOIN module ON module.modu_id = cours.modu_fk JOIN relation_cours_classe ON relation_cours_classe.cour_fk = cours.cour_id WHERE cours.prof_fk = :prof_id;';
        
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
                $stmt->execute();
                $cours = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($cours as $cours) {
                    $date = date('d/m/Y', strtotime($cours['debut']));
                    $heure_debut = date('H:i', strtotime($cours['debut']));
                    $heure_fin = date('H:i', strtotime($cours['fin']));
                    echo '<option value="'.$cours['cour_id'].'" data-classe="'.$cours['clas_fk'].'">'.$cours['module'].' le '.$date.' de '.$heure_debut.' à '.$heure_fin.'</option>';
                }
                ?>
            </select>
            <input type="submit" value="Déclarer">
        </form>
        <h3>Absences déclarées</h3>
        <table>
            <tr>
                <th>Élève</th>
                <th>Cours</th>
                <th>Date</th>
                <th>Justifiée</th>
            </tr>
            <?php
            $sql = 'SELECT user.nom, user.prenom, cours.debut, cours.fin, module.module, absence.justifie FROM absence JOIN etudiant ON etudiant.etud_id = absence.etud_fk JOIN user ON user.user_id = etudiant.user_fk JOIN cours ON cours.cour_id = absence.cour_fk JOIN module ON module.modu_id = cours.modu_fk WHERE cours.prof_fk = :prof_id;';
        
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
            $stmt->execute();
            $absences = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($absences as $absence) {
                $date = date('d/m/Y', strtotime($absence['debut']));
                $heure_debut = date('H:i', strtotime($absence['debut']));
                $heure_fin = date('H:i', strtotime($absence['fin']));
                echo '<tr>';
                echo '<td>'.$absence['prenom'].' '.$absence['nom'].'</td>';
                echo '<td>'.$absence['module'].' le '.$date.' de '.$heure_debut.' à '.$heure_fin.'</td>';
                echo '<td>'.$date.'</td>';
                echo '<td>'.($absence['justifie'] ? 'Oui' : 'Non').'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </details>

    <details open>
        <summary>
            <h2>Devoirs</h2>
        </summary>

        <h3>Ajouter un devoir</h3>
        <form action="addenonce.php?id=<?=$_SESSION['prof']['prof_id']?>" method="POST">
            <label for="module">Module</label>
            <select name="module" id="module">
                <option value="0" selected>-- Sélectionner un module --</option>
                <?php
                $sql = 'SELECT module.modu_id, module.module FROM module JOIN relation_prof_module ON module.modu_id = relation_prof_module.modu_fk WHERE relation_prof_module.prof_fk = :prof_id;';
        
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
                $stmt->execute();
                $modules = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($modules as $module) {
                    echo '<option value="'.$module['modu_id'].'">'.$module['module'].'</option>';
                }
                ?>
            </select>
            <label for="classe">Classe</label>
            <select name="classe" id="classe">
                <option value="0" selected>-- Sélectionner une classe --</option>
                <?php
                $sql = 'SELECT classe.clas_id, classe.tp, classe.annee FROM classe JOIN relation_prof_classe ON classe.clas_id = relation_prof_classe.clas_fk WHERE relation_prof_classe.prof_fk = :prof_id;';
        
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
                $stmt->execute();
                $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($classes as $classe) {
                    echo '<option value="'.$classe['clas_id'].'">'.$classe['tp'].' MMI'.$classe['annee'].'</option>';
                }
                ?>
            </select>
            <label for="coeff">Coefficient</label>
            <input type="number" name="coeff" id="coeff" min="0.5" max="5" step="0.5">
            <label for="date">Date de rendu</label>
            <input type="date" name="date" id="date" min="<?=date('Y-m-d')?>">
            <label for="heure">Heure de rendu</label>
            <input type="time" name="heure" id="heure">
            <label for="intitule">Intitulé</label>
            <input type="text" name="intitule" id="intitule">
            <input type="submit" value="Créer">
        </form>

        <h3>Devoirs créés</h3>
        <?php
        if (isset($_GET['addenonce'])) {
            echo '<p>Devoir créé avec succès</p>';
        }
        ?>
        <table>
            <tr>
                <th>Intitulé</th>
                <th>Module</th>
                <th>Classe</th>
                <th>Date de rendu</th>
                <th>Coefficient</th>
            </tr>
            <?php
            $sql = 'SELECT module.module, classe.tp, classe.annee, enonce.date_rendu, enonce.intitule, enonce.coeff FROM enonce JOIN relation_prof_enonce ON enonce.enon_id = relation_prof_enonce.enon_fk JOIN relation_enonce_classe ON enonce.enon_id = relation_enonce_classe.enon_fk JOIN module ON module.modu_id = enonce.modu_fk JOIN classe ON classe.clas_id = relation_enonce_classe.clas_fk WHERE relation_prof_enonce.prof_fk = :prof_id;';
        
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
            $stmt->execute();
            $enonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($enonces as $enonce) {
                $date = date('d/m/Y', strtotime($enonce['date_rendu']));
                $heure = date('H:i', strtotime($enonce['date_rendu']));
                echo '<tr>';
                echo '<td>'.$enonce['intitule'].'</td>';
                echo '<td>'.$enonce['module'].'</td>';
                echo '<td>'.$enonce['tp'].' MMI'.$enonce['annee'].'</td>';
                echo '<td>'.$date.' à '.$heure.'</td>';
                echo '<td>'.$enonce['coeff'].'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </details>

    <details open>
        <summary>
            <h2>Notes</h2>
        </summary>
            <?php
            if (isset($_GET['addnote'])) {
                echo '<p>Notes ajoutées avec succès</p>';
            }
            if (isset($_GET['devoir'])) {
                $sql = 'SELECT enonce.intitule, module.module, classe.tp, classe.annee, devoir.devo_id, MAX(devoir.date) as date, devoir.note, devoir.remarque FROM devoir JOIN enonce ON enonce.enon_id = devoir.enon_fk JOIN module ON module.modu_id = enonce.modu_fk JOIN relation_enonce_classe ON enonce.enon_id = relation_enonce_classe.enon_fk JOIN classe ON classe.clas_id = relation_enonce_classe.clas_fk WHERE devoir.prof_fk = :prof_id AND devoir.enon_fk = :devoir_id GROUP BY enonce.enon_id;';
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
                $stmt->bindValue(':devoir_id', $_GET['devoir'], PDO::PARAM_INT);
                $stmt->execute();
                $devoir = $stmt->fetch(PDO::FETCH_ASSOC);

                $date = date('d/m/Y', strtotime($devoir['date']));
                $heure = date('H:i', strtotime($devoir['date']));

                echo '<div class="devoir popup">';
                echo '<h3>Notes pour '.$devoir['module'].' - '.$devoir['intitule'].' le '.$date.' à '.$heure.'</h3>';
                echo '<table>';
                echo '<tr>';
                echo '<th>Étudiant</th>';
                echo '<th>Note</th>';
                echo '<th>Remarque</th>';
                echo '</tr>';
                $sql = 'SELECT user.nom, user.prenom, etudiant.etud_id, devoir.note, devoir.remarque FROM devoir JOIN etudiant ON etudiant.etud_id = devoir.etud_fk JOIN user ON user.user_id = etudiant.user_fk WHERE devoir.enon_fk = :devoir_id;';
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':devoir_id', $_GET['devoir'], PDO::PARAM_INT);
                $stmt->execute();
                $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($notes as $note) {
                    echo '<tr>';
                    echo '<td>'.$note['prenom'].' '.$note['nom'].'</td>';
                    echo '<td>'.$note['note'].'</td>';
                    echo '<td>'.$note['remarque'].'</td>';
                    echo '</tr>';
                }
                echo '</table>';
                echo '<a href="professeur.php?id='.$_SESSION['prof']['prof_id'].'">Fermer</a>';
                echo '</div>';
            }
            ?>

        <h3>Ajouter des notes</h3>
            <form action="addnotes.php?id=<?=$_SESSION['prof']['prof_id']?>" method="POST">
                <label for="enonce">Énoncé</label>
                <select name="enonce" id="note_enonce">
                    <option value="0" selected>-- Sélectionner un énoncé --</option>
                    <?php
                    $sql = 'SELECT enonce.enon_id, enonce.intitule, module.module, relation_enonce_classe.clas_fk, classe.tp, classe.annee FROM enonce JOIN relation_prof_enonce ON enonce.enon_id = relation_prof_enonce.enon_fk JOIN module ON module.modu_id = enonce.modu_fk JOIN relation_enonce_classe ON relation_enonce_classe.enon_fk = enonce.enon_id JOIN classe ON classe.clas_id = relation_enonce_classe.clas_fk WHERE relation_prof_enonce.prof_fk = :prof_id;';
            
                    $stmt = $db->prepare($sql);
                    $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $enonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($enonces as $enonce) {
                        $check = 'SELECT * FROM devoir WHERE enon_fk = :enonce AND prof_fk = :prof;';
                        $stmt = $db->prepare($check);
                        $stmt->bindValue(':enonce', $enonce['enon_id'], PDO::PARAM_INT);
                        $stmt->bindValue(':prof', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        if (!$result) {
                            echo '<option data-classe="'.$enonce['clas_fk'].'" value="'.$enonce['enon_id'].'">'.$enonce['module'].' - '.$enonce['intitule'].' - MMI'.$enonce['annee'].' '.$enonce['tp'].'</option>';
                        }
                    }
                    ?>
                </select>
                
                <table>
                    <tr>
                        <th>Étudiant</th>
                        <th>Note</th>
                        <th>Remarque</th>
                    </tr>
                    <?php
                    $sql = 'SELECT user.nom, user.prenom, etudiant.etud_id, etudiant.clas_fk FROM etudiant JOIN relation_prof_classe ON etudiant.clas_fk = relation_prof_classe.clas_fk JOIN user ON user.user_id = etudiant.user_fk WHERE relation_prof_classe.prof_fk = :prof_id;';
                    $stmt = $db->prepare($sql);
                    $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($etudiants as $etudiant) {
                        echo '<tr id="note_etudiant" data-classe="'.$etudiant['clas_fk'].'">';
                        echo '<td>'.$etudiant['prenom'].' '.$etudiant['nom'].'</td>';
                        echo '<td><input type="number" name="note['.$etudiant['etud_id'].'][note]" min="0" max="20" step="0.01"></td>';
                        echo '<td><textarea name="note['.$etudiant['etud_id'].'][remarque]"></textarea></td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
                <input type="submit" value="Ajouter">
            </form>

            <h3>Dernières notes ajoutées</h3>
            <table>
                <tr>
                    <th>Énoncé</th>
                    <th>Classe</th>
                    <th>Date</th>
                    <th>Détails</th>
                </tr>
                <?php
                $sql = 'SELECT enonce.intitule, module.module, classe.tp, classe.annee, devoir.enon_fk, MAX(devoir.date) as date FROM devoir JOIN enonce ON enonce.enon_id = devoir.enon_fk JOIN module ON module.modu_id = enonce.modu_fk JOIN relation_enonce_classe ON enonce.enon_id = relation_enonce_classe.enon_fk JOIN classe ON classe.clas_id = relation_enonce_classe.clas_fk WHERE devoir.prof_fk = :prof_id GROUP BY enonce.enon_id ORDER BY date DESC LIMIT 5;';
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
                $stmt->execute();
                $devoirs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($devoirs as $devoir) {
                    $date = date('d/m/Y', strtotime($devoir['date']));
                    $heure = date('H:i', strtotime($devoir['date']));
                    echo '<tr>';
                    echo '<td>'.$devoir['module'].' - '.$devoir['intitule'].'</td>';
                    echo '<td>'.$devoir['tp'].' MMI'.$devoir['annee'].'</td>';
                    echo '<td>'.$date.' à '.$heure.'</td>';
                    echo '<td><a href="professeur.php?id='.$_SESSION['prof']['prof_id'].'&devoir='.$devoir['enon_fk'].'">Détails</a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
    </details>

    <h2>Mes modules</h2>
     <ul>
        <?php
        $sql = 'SELECT module.module FROM module JOIN relation_prof_module ON module.modu_id = relation_prof_module.modu_fk WHERE relation_prof_module.prof_fk = :prof_id;';
        
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
        $stmt->execute();
        $modules = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($modules as $module) {
            echo '<li>'.$module['module'].'</li>';
        }
        ?>
     </ul>

    <h2>Mes classes</h2>
    <ul>
        <?php
        $sql = 'SELECT classe.tp, classe.annee FROM classe JOIN relation_prof_classe ON classe.clas_id = relation_prof_classe.clas_fk WHERE relation_prof_classe.prof_fk = :prof_id;';
        
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':prof_id', $_SESSION['prof']['prof_id'], PDO::PARAM_INT);
        $stmt->execute();
        $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($classes as $classe) {
            echo '<li>MMI'.$classe['annee'].' | '.$classe['tp'].'</li>';
        }
        ?>

    <script src="back.js"></script>
</body>
</html>