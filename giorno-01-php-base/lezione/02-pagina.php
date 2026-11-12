<?php
/*
 * 02 - PHP DENTRO UNA PAGINA HTML
 * Esecuzione: nel terminale, dalla cartella lezione:  php -S localhost:8000
 *             poi nel browser:  http://localhost:8000/02-pagina.php
 * php -S avvia un piccolo server web. Si ferma con Ctrl+C.
 *
 * Prova Ctrl+U nel browser: si vede solo HTML, il codice PHP non arriva mai.
 * Ricarica la pagina: l'ora cambia, perché PHP viene eseguito a ogni richiesta.
 */
$titolo = "Il barone rampante";
$copie = 3;
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Bookshelf</title>
</head>
<body>
    <h1>Bookshelf</h1>
    <!-- forma lunga -->
     php
    <p>Oggi è il <?php echo date('d/m/Y'); ?>, ore <?php echo date('H:i:s'); ?></p>

    <!-- forma breve: il tag con il segno uguale equivale a echo.
         Attenzione: i commenti HTML non fermano PHP. -->
    <p>Libro del giorno: <?= $titolo ?> (<?= $copie ?> copie)</p>
</body>
</html>
