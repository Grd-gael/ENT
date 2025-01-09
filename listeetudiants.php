<?php

include 'connect.php';

$sql = 'SELECT user.nom, user.prenom FROM etudiant JOIN user ON etudiant.user_fk = user.user_id WHERE clas_fk='.$_GET['classe'].';';

$query = $db->query($sql);
$etudiants = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT tp, annee FROM classe WHERE clas_id='.$_GET['classe'].';';
$query = $db->query($sql);
$classe = $query->fetch(PDO::FETCH_ASSOC);

echo '<table>';
echo '<caption>Liste des étudiants en '.$classe['tp'].' - '.$classe['annee'].'e année</caption>';
echo '<tr>';
echo '<th>Nom</th>';
echo '<th>Prénom</th>';
echo '</tr>';
foreach($etudiants as $etudiant){
    echo '<tr>';
    echo '<td>'.$etudiant['nom'].'</td>';
    echo '<td>'.$etudiant['prenom'].'</td>';
    echo '</tr>';
}
echo '</table>';

?>