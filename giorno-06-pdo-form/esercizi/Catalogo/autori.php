<?php
require __DIR__ . '/db.php';
$valori = [];
 $sql = "SELECT a.*, COUNT(la.libro_id) libri FROM autori a
   LEFT JOIN libri_autori la ON la.autore_id = a.id
   GROUP BY a.id
   ORDER BY a.cognome";

$stmt = db()->query($sql);
$autori = $stmt->fetchAll();
$titoloPagina = 'Autori';
require __DIR__ . '/parti/testata.php';
?>
<table>
    <tr><th>Cognome Nome</th><th>Nazionalità</th><th>Anno</th><th>Libri in catalogo</th></tr>
    <?php foreach ($autori as $a) { ?>
        <tr>
            <td><a href="autore.php?id=<?= $a['id']  ?>"><?= e($a['cognome']) . " " . e($a['nome']) ?></a></td>
            <td><?= e($a['nazionalita']) ?></td>
            <td><?= e($a['anno_nascita']) ?></td>
            <td><?= e($a['libri']) ?></td>
        </tr>
    <?php } ?>
</table>