<?php

include 'connect.php';

$enonce = $_POST['enonce'];
$prof = $_GET['id'];

foreach ($_POST['note'] as $etudiant_id => $note_data){
    $note = $note_data['note'];
    $remarque = $note_data['remarque'];

    $sql = 'INSERT INTO devoir (note, date, remarque, enon_fk, etud_fk, prof_fk) VALUES (:note, :date, :remarque, :enonce, :etudiant, :prof);';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':note', $note, PDO::PARAM_INT);
    $stmt->bindValue(':date', date('Y-m-d H:i:s'), PDO::PARAM_STR);
    $stmt->bindValue(':remarque', $remarque, PDO::PARAM_STR);
    $stmt->bindValue(':enonce', $enonce, PDO::PARAM_INT);
    $stmt->bindValue(':etudiant', $etudiant_id, PDO::PARAM_INT);
    $stmt->bindValue(':prof', $prof, PDO::PARAM_INT);
    $stmt->execute();
}

header('Location: professeur.php?id='.$_GET['id'].'&addnote');

?>