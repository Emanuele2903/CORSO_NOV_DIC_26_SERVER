<?php 
$prestiti = [
    'Il nome della rosa'  => 'Rossi',
    'Le città invisibili' => 'Bianchi',
    "L'isola di Arturo"   => 'Rossi',
];

$prestiti['Il pendolo di Foucault'] = 'Verdi';
unset($prestiti['Le città invisibili']);

foreach ($prestiti as $titolo => $lettore) {
    echo "$titolo: in prestito a $lettore <br> \n";
}
if (isset($prestiti['Marcovaldo'])) {
    echo "Marcovaldo: in prestito \n";
} else {
    echo "Marcovaldo: disponibile \n";
}
if (isset($prestiti['Il nome della rosa'])) {
    echo "Il nome della rosa: in prestito \n";
} else {
    echo "Il nome della rosa: disponibile \n";
}
ksort($prestiti);
foreach ($prestiti as $titolo => $lettore) {
    echo "$titolo: in prestito a $lettore <br> \n";
}

$conteggio = array_count_values($prestiti);
echo "Rossi ha " . $conteggio['Rossi'] . " libri in prestito";

echo "<pre>";

print_r($prestiti);

var_dump($prestiti);

echo "</pre>";