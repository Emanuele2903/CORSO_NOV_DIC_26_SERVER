<?php
$cognome = "Schizzo";
$genere = "Fantasy";
$anno = 2020;
$numero = 7;

$codCognome = strToupper(substr($cognome, 0, 3));

$codGenere = strToupper(substr($genere, 0, 3));

$unioneCod = $codCognome . "-" . $codGenere . "-" . $anno;

$unioneCod2 = sprintf(
    "%s-%s-%d-%05d",
    $codCognome,
    $codGenere,
    $anno,
    $numero

);
echo $unioneCod2;


