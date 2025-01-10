<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface professeur</title>
</head>
<body>
    <h1>Interface professeur</h1>

    <details>
        <summary>
            <h2>Absences</h2>
        </summary>
        <h3>Déclarer une absence</h3>
        <form action="addabsence.php?id=<?=$_GET['id']?>" method="post">
            <label for="eleve">Élève</label>
            <select name="eleve" id="eleve">
                <option value="0" selected>-- Sélectionner un élève --</option>
                <?php
                $sql = 'SELECT user.nom, user.prenom, etudiant.etud_id, etudiant.clas_fk FROM etudiant JOIN relation_prof_classe ON etudiant.clas_fk = relation_prof_classe.clas_fk JOIN user ON user.user_id = etudiant.user_fk WHERE relation_prof_classe.prof_fk = :prof_id;';
        
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
                $stmt->execute();
                $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($etudiants as $etudiant) {
                    echo '<option value="'.$etudiant['etud_id'].'" data-classe="'.$etudiant['clas_fk'].'">'.$etudiant['prenom'].' '.$etudiant['nom'].'</option>';
                }
                ?>
            </select>
            <label for="cours">Cours</label>
            <select name="cours" id="cours">
                <option value="0" selected>-- Sélectionner un cours --</option>
                <?php
                $sql = 'SELECT cours.cour_id, cours.debut, cours.fin, module.module, relation_cours_classe.clas_fk FROM cours JOIN module ON module.modu_id = cours.modu_fk JOIN relation_cours_classe ON relation_cours_classe.cour_fk = cours.cour_id WHERE cours.prof_fk = :prof_id;';
        
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
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
            $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
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

    <details>
        <summary>
            <h2>Devoirs</h2>
        </summary>

        <h3>Ajouter un devoir</h3>
        <form action="addenonce.php?id=<?=$_GET['id']?>" method="POST">
            <label for="module">Module</label>
            <select name="module" id="module">
                <option value="0" selected>-- Sélectionner un module --</option>
                <?php
                $sql = 'SELECT module.modu_id, module.module FROM module JOIN relation_prof_module ON module.modu_id = relation_prof_module.modu_fk WHERE relation_prof_module.prof_fk = :prof_id;';
        
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
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
                $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
                $stmt->execute();
                $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($classes as $classe) {
                    echo '<option value="'.$classe['clas_id'].'">'.$classe['tp'].' MMI'.$classe['annee'].'</option>';
                }
                ?>
            </select>
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
                <th>Module</th>
                <th>Classe</th>
                <th>Date de rendu</th>
                <th>Coefficient</th>
                <th>Intitulé</th>
            </tr>
            <?php
            $sql = 'SELECT module.module, classe.tp, classe.annee, enonce.date_rendu, enonce.intitule, enonce.coeff FROM enonce JOIN relation_prof_enonce ON enonce.enon_id = relation_prof_enonce.enon_fk JOIN relation_enonce_classe ON enonce.enon_id = relation_enonce_classe.enon_fk JOIN module ON module.modu_id = enonce.modu_fk JOIN classe ON classe.clas_id = relation_enonce_classe.clas_fk WHERE relation_prof_enonce.prof_fk = :prof_id;';
        
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();
            $enonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($enonces as $enonce) {
                $date = date('d/m/Y', strtotime($enonce['date_rendu']));
                $heure = date('H:i', strtotime($enonce['date_rendu']));
                echo '<tr>';
                echo '<td>'.$enonce['module'].'</td>';
                echo '<td>'.$enonce['tp'].' MMI'.$enonce['annee'].'</td>';
                echo '<td>'.$date.' à '.$heure.'</td>';
                echo '<td>'.$enonce['coeff'].'</td>';
                echo '<td>'.$enonce['intitule'].'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </details>

    <details>
        <summary>
            <h2>Notes</h2>
        </summary>
            <?php
            if (isset($_GET['addnote'])) {
                echo '<p>Notes ajoutées avec succès</p>';
            }
            if (isset($_GET['devoir'])) {
                $sql = 'SELECT enonce.intitule, module.module, classe.tp, classe.annee, devoir.devo_id, MAX(devoir.date) as date, devoir.note, devoir.remarque FROM devoir JOIN enonce ON enonce.enon_id = devoir.enon_fk JOIN module ON module.modu_id = enonce.modu_fk JOIN relation_enonce_classe ON enonce.enon_id = relation_enonce_classe.enon_fk JOIN classe ON classe.clas_id = relation_enonce_classe.clas_fk WHERE devoir.prof_fk = :prof_id AND devoir.devo_id = :devoir_id GROUP BY enonce.enon_id;';
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
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
                echo '<a href="professeur.php?id='.$_GET['id'].'">Fermer</a>';
                echo '</div>';
            }
            ?>

        <h3>Ajouter des notes</h3>
            <form action="addnotes.php?id=<?=$_GET['id']?>" method="POST">
                <label for="enonce">Énoncé</label>
                <select name="enonce" id="note_enonce">
                    <option value="0" selected>-- Sélectionner un énoncé --</option>
                    <?php
                    $sql = 'SELECT enonce.enon_id, enonce.intitule, module.module, relation_enonce_classe.clas_fk FROM enonce JOIN relation_prof_enonce ON enonce.enon_id = relation_prof_enonce.enon_fk JOIN module ON module.modu_id = enonce.modu_fk JOIN relation_enonce_classe ON relation_enonce_classe.enon_fk = enonce.enon_id WHERE relation_prof_enonce.prof_fk = :prof_id;';
            
                    $stmt = $db->prepare($sql);
                    $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $enonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($enonces as $enonce) {
                        echo '<option data-classe="'.$enonce['clas_fk'].'" value="'.$enonce['enon_id'].'">'.$enonce['module'].' - '.$enonce['intitule'].'</option>';
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
                    $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($etudiants as $etudiant) {
                        echo '<tr id="note_etudiant" data-classe="'.$etudiant['clas_fk'].'">';
                        echo '<td>'.$etudiant['prenom'].' '.$etudiant['nom'].'</td>';
                        echo '<td><input type="number" name="note['.$etudiant['etud_id'].'][note]" min="0" max="20"></td>';
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
                $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
                $stmt->execute();
                $devoirs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($devoirs as $devoir) {
                    $date = date('d/m/Y', strtotime($devoir['date']));
                    $heure = date('H:i', strtotime($devoir['date']));
                    echo '<tr>';
                    echo '<td>'.$devoir['module'].' - '.$devoir['intitule'].'</td>';
                    echo '<td>'.$devoir['tp'].' MMI'.$devoir['annee'].'</td>';
                    echo '<td>'.$date.' à '.$heure.'</td>';
                    echo '<td><a href="professeur.php?id='.$_GET['id'].'&devoir='.$devoir['enon_fk'].'">Détails</a></td>';
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
        $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
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
        $stmt->bindValue(':prof_id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($classes as $classe) {
            echo '<li>MMI'.$classe['annee'].' | '.$classe['tp'].'</li>';
        }
        ?>

    <script>
        const eleve = document.getElementById('eleve');
        const cours = document.getElementById('cours');

        eleve.addEventListener('change', function() {
            if (eleve.value === '0') {
                for (let i = 0; i < cours.options.length; i++) {
                    cours.options[i].style.display = 'block';
                }
            } else {
            const classe = eleve.options[eleve.selectedIndex].getAttribute('data-classe');
            for (let i = 0; i < cours.options.length; i++) {
                if (cours.options[i].getAttribute('data-classe') !== classe && cours.options[i].value !== '0') {
                    cours.options[i].style.display = 'none';
                } else {
                    cours.options[i].style.display = 'block';
                }
            }
        }
        });

        cours.addEventListener('change', function() {
            if (cours.value === '0') {
                for (let i = 0; i < eleve.options.length; i++) {
                    eleve.options[i].style.display = 'block';
                }
            } else {
                const classe = cours.options[cours.selectedIndex].getAttribute('data-classe');
            for (let i = 0; i < eleve.options.length; i++) {
                if (eleve.options[i].getAttribute('data-classe') !== classe && eleve.options[i].value !== '0') {
                    eleve.options[i].style.display = 'none';
                } else {
                    eleve.options[i].style.display = 'block';
                }
            }
        }
        });

        const note_enonce = document.getElementById('note_enonce');
        const notes = document.querySelectorAll('#note_etudiant');
        if (note_enonce.value === '0') {
            notes.forEach(note => {
                note.style.display = 'none';
            });
        }

        note_enonce.addEventListener('change', function() {
            if (note_enonce.value === '0') {
                notes.forEach(note => {
                    note.style.display = 'none';
                });
            } else {
                const note_classe = note_enonce.options[note_enonce.selectedIndex].getAttribute('data-classe');
                notes.forEach(note => {
                    if (note.getAttribute('data-classe') !== note_classe) {
                        note.style.display = 'none';
                    } else {
                        note.style.display = 'table-row';
                    }
                });
            }
        });
    </script>
</body>
</html>