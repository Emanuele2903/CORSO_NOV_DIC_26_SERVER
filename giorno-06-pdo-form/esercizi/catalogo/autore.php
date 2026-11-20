<?php
// Il dettaglio di un autore: autore.php?id=8
require __DIR__ . '/db.php';

$id = (int) ($_GET['id'] ?? 0);

$stmt = db()->prepare(
    "SELECT a.nome, a.cognome, a.nazionalita, a.anno_nascita FROM autori a WHERE id=?"
);
$stmt->execute([$id]);
$autore = $stmt->fetch();


if ($autore === false) {
    http_response_code(404);
    $titoloPagina = 'Autore non trovato';
    require __DIR__ . '/parti/testata.php';
    echo '<h1>Autore non trovato</h1>';
    require __DIR__ . '/parti/piede.php';
    exit;
}

// // Una seconda query per i libri (relazione N-N)
$stmt = db()->prepare(
    "SELECT l.* FROM libri l
LEFT JOIN libri_autori la ON la.libro_id=l.id
WHERE la.autore_id=?"
);
$stmt->execute([$id]);
$libri = $stmt->fetchAll();

$titoloPagina = $autore['cognome'];
require __DIR__ . '/parti/testata.php';
?>

<h1><?=e($autore['cognome']) . " " . e($autore['nome']) ?></h1>

<p>Anno di nascita: <?= $autore['anno_nascita'] ?? '-' ?> - Nazionalità: <?= $autore['nazionalita'] ?? '-' ?></p>

<table>
    <tr><th>Titolo</th>
    <th>Genere</th>
    <th>Anno</th></tr>
    <?php foreach ($libri as $libro) { ?>
        <tr>
            <td><a href="libro.php?id=<?= $libro['id'] ?>"><?= e($libro['titolo']) ?></a></td>
            <td><?= $libro['anno'] ?></td>
        </tr>
    <?php } ?>
</table>
<p><a href="autori.php">Torna agli autori</a></p>

<?php require __DIR__ . '/parti/piede.php'; ?>
