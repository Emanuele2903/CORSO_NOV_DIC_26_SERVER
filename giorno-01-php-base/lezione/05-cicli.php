<?php
/*
 * 05 - CICLI
 * Esecuzione:  php 05-cicli.php
 */

// for: come in JavaScript, con $ davanti alle variabili
for ($i = 1; $i <= 5; $i++) {
    echo "Giro $i\n";
}

// while
$copie = 5;
$giorno = 0;
while ($copie > 0) {
    $giorno++;
    $copie -= 2;
    echo "Giorno $giorno: restano " . max($copie, 0) . " copie\n";
}

// foreach: scorre gli elementi di un array (è il for...of di JavaScript).
// Gli array si vedono bene domani.
$titoli = ["Il barone rampante", "Il nome della rosa", "Lessico famigliare"];
foreach ($titoli as $titolo) {
    echo "- $titolo\n";
}

// con la posizione
foreach ($titoli as $indice => $titolo) {
    echo ($indice + 1) . ". $titolo\n";
}
