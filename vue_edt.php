<?php
include 'connect.php';

$etudiant = $_SESSION['etudiant']['etud_id'];
?>

<table class="jost">
    <?php
    if (!isset($_GET['week_offset'])) {
        $week_offset = 0;
    } else {
        $week_offset = $_GET['week_offset'];
    }

    $monday = date('d/m/Y', strtotime("monday this week $week_offset week"));
    $friday = date('d/m/Y', strtotime("friday this week $week_offset week"));
    echo '<caption><div class="flex-horizontal"><a class="button" id="arrow-left" href="?id='.$etudiant.'&week_offset=' . ($week_offset - 1) . '">Semaine précédente</a> <p>Semaine du '.$monday.' au '.$friday.'</p> <a class="button" id="arrow-right" href="?id='.$etudiant.'&week_offset=' . ($week_offset + 1) . '">Semaine suivante</a></div></caption>';
    ?>
    

    <thead>
        <tr>
            <th>Heures</th>
            <th>Lundi <?= date('d/m', strtotime("monday this week $week_offset week"))?></th>
            <th>Mardi <?= date('d/m', strtotime("tuesday this week $week_offset week"))?></th>
            <th>Mercredi <?= date('d/m', strtotime("wednesday this week $week_offset week"))?></th>
            <th>Jeudi <?= date('d/m', strtotime("thursday this week $week_offset week"))?></th>
            <th>Vendredi <?= date('d/m', strtotime("friday this week $week_offset week"))?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($h = 8; $h < 18; $h++) {
            for ($m = 0; $m < 60; $m += 15) {
            echo '<tr>';
            if ($h<10) {
                echo '<td class="heure">0'.$h.'h'.($m == 0 ? '00' : $m).'</td>';
            } else {
                echo '<td class="heure">'.$h.'h'.($m == 0 ? '00' : $m).'</td>';
            }
            for ($j = 0; $j < 5; $j++) {
                $sql = "SELECT cours.debut, cours.fin, module.module, salle.num_salle FROM cours JOIN relation_cours_classe ON cours.cour_id = relation_cours_classe.cour_fk JOIN classe ON classe.clas_id = relation_cours_classe.clas_fk JOIN etudiant ON etudiant.clas_fk = classe.clas_id JOIN module ON module.modu_id = cours.modu_fk JOIN reserve_salle ON reserve_salle.cour_fk = cours.cour_id JOIN salle ON salle.num_salle = reserve_salle.sall_fk WHERE etudiant.etud_id = :etudiant AND cours.debut = :debut;";

                $stmt = $db->prepare($sql);
                $stmt->bindParam(':etudiant', $etudiant);

                $debut_date = date('Y-m-d', strtotime("monday this week $week_offset week +$j days"));
                $debut_time = date('H:i', strtotime("$h:$m"));
                $debut = $debut_date.' '.$debut_time;
                $stmt->bindParam(':debut', $debut);

                $stmt->execute();
                $cours = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($cours){
                    $cours['debut'] = date('H:i', strtotime($cours['debut']));
                    $cours['fin'] = date('H:i', strtotime($cours['fin']));

                    $duree = date_diff(date_create($cours['debut']), date_create($cours['fin']));
                    $duree = $duree->h + ($duree->i / 60);
                    $duree = $duree * 4;
                    echo '<td data-time="'.$cours['debut'].' - '.$cours['fin'].'" class="cours" rowspan='.$duree.'><p>'.$cours['module'].'</p><p>Salle '.$cours['num_salle'].'</p></td>';
                } else {
                    echo '<td></td>';
                }
            }
            echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>