<?php
include 'connect.php';

$etudiant = $_GET['id'];
?>

<style>
    .cours {
        background-color: #f0f0f0;
        padding: 5px;
        border: 1px solid #ccc;
    }

    #tooltip {
        display: none;
        position: absolute;
        background-color: #f0f0f0;
        padding: 5px;
        border: 1px solid #ccc;
    }
</style>

<div id="tooltip"></div>

<table>
    <?php
    if (!isset($_GET['week_offset'])) {
        $week_offset = 0;
    } else {
        $week_offset = $_GET['week_offset'];
    }

    $monday = date('d/m/Y', strtotime("monday this week $week_offset week"));
    $friday = date('d/m/Y', strtotime("friday this week $week_offset week"));
    echo '<div class="flex"><a href="?id='.$etudiant.'&week_offset=' . ($week_offset - 1) . '">Semaine précédente</a>';
    echo '<caption>Semaine du '.$monday.' au '.$friday.'</caption>';
    echo '<a href="?id='.$etudiant.'&week_offset=' . ($week_offset + 1) . '">Semaine suivante</a></div>';
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
            for ($j = 1; $j < 6; $j++) {
                $sql = "SELECT cours.debut, cours.fin, module.module, salle.num_salle FROM cours JOIN relation_cours_classe ON cours.cour_id = relation_cours_classe.cour_fk JOIN classe ON classe.clas_id = relation_cours_classe.clas_fk JOIN etudiant ON etudiant.clas_fk = classe.clas_id JOIN module ON module.modu_id = cours.modu_fk JOIN reserve_salle ON reserve_salle.cour_fk = cours.cour_id JOIN salle ON salle.num_salle = reserve_salle.sall_fk WHERE etudiant.etud_id = :etudiant AND debut = :debut;";

                $stmt = $db->prepare($sql);
                $stmt->bindParam(':etudiant', $etudiant);

                $debut = date('Y-m-d H:i:s', strtotime("monday this week $week_offset week +$j days +$h hours +$m minutes"));
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

<script>
    function getCursor(event) {
    let x = event.clientX;
    let y = event.clientY;

    const tooltip = document.getElementById('tooltip');
    tooltip.style.top = y + 10 + 'px';
    tooltip.style.left = x + 10 + 'px';
    }

    document.addEventListener('mousemove', getCursor);

    document.querySelectorAll('.heure').forEach(function(heure) {
        if (heure.innerHTML[4] == '5') {
            heure.innerHTML = '';
        }
    });

    document.querySelectorAll('.cours').forEach(function(cours) {
        cours.addEventListener('mouseover', function() {
            tooltip.innerHTML = cours.dataset.time;
            tooltip.style.display = 'block';
        });

        cours.addEventListener('mouseout', function() {
            tooltip.style.display = 'none';
        });
    });
</script>