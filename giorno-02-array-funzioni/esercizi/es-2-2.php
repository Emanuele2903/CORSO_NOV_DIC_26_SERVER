<?php

function iniziali(string $autore): string {

    $parole = explode(" ", $autore);

    $risultato = '';

    foreach ($parole as $parola) {
        $risultato .= $parola[0] . '.';
    }

    return $risultato;
}

echo iniziali("Italo Calvino") . "\n";
echo iniziali("Umberto Eco") . "\n";

function stelle(int $voto, int $massimo = 5): string {

    $piene = str_repeat('★', $voto);

    $vuote = str_repeat('☆', $massimo - $voto);

    return $piene . $vuote;
}

// Proviamo la funzione

echo stelle(3) . "\n";
echo stelle(7, 10) . "\n";


function euro(float $importo): string {

    $formattato = number_format($importo, 2, ',', '.');

    return $formattato . ' €';
}

echo euro(1234.5) . "\n";
echo euro(8) . "\n";

function slug(string $titolo): string {

    $testo = strtolower($titolo);

    $testo = strtr($testo, [
        'à' => 'a',
        'è' => 'e',
        'é' => 'e',
        'ì' => 'i',
        'ò' => 'o',
        'ù' => 'u'
    ]);

    $testo = str_replace([' ', "'"], '-', $testo);

    return $testo;
}
echo slug("Se questo è un uomo") . "\n";
echo slug("L'isola di Arturo") . "\n";

$libri = require __DIR__ . '/catalogo/libri.php';

foreach ($libri as $libro) {

    $autore = $libro['autore'];
    $titolo = $libro['titolo'];

    echo iniziali($autore) . " - ";
    echo $titolo . " - ";
    echo slug($titolo) . "\n";

}