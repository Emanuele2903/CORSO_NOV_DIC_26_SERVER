<?php
/*
 * 03 - VARIABILI, TIPI, STRINGHE
 * Esecuzione:  php 03-variabili-stringhe.php
 */

// Le variabili iniziano con $. Non si dichiarano: si assegnano e basta.
$titolo = "Il barone rampante";   // string
$anno = 1957;                     // int
$prezzo = 12.50;                  // float
$disponibile = true;              // bool

// var_dump mostra tipo e valore: è il console.log di PHP
var_dump($titolo, $anno, $prezzo, $disponibile);

// Costanti
const ANNO_CORRENTE = 2026;
echo "Il libro ha " . (ANNO_CORRENTE - $anno) . " anni\n";

// ---------------- STRINGHE ----------------
// Il punto unisce le stringhe (in JavaScript era il +)
echo $titolo . " (" . $anno . ")\n";

// Virgolette DOPPIE: le variabili dentro vengono sostituite (come il template literal di JS)
echo "Titolo: $titolo, anno: $anno\n";
echo "Prezzo: {$prezzo}euro\n";   // le graffe aiutano quando il testo segue subito

// Virgolette SINGOLE: il testo resta com'è, $titolo non viene sostituito
echo 'Titolo: $titolo' . "\n";

// Alcune funzioni sulle stringhe
echo strlen($titolo) . "\n";                    // lunghezza
echo strtoupper($titolo) . "\n";                // maiuscolo
echo str_contains($titolo, "barone") ? "contiene barone\n" : "non contiene\n";
echo number_format($prezzo, 2, ',', '.') . " €\n"; // 12,50 € (formato italiano) 2 è il numero di decimali, la virgola è il separatore dei decimali e il punto il separatore delle migliaia

// ---------------- OPERATORI ----------------
$copie = 3;
$copie++;           // 4
$copie += 2;        // 6
echo "Copie: $copie\n";
echo 10 % 3, "\n";  // resto: 1

// Confronti: === come in JavaScript (valore e tipo)
var_dump(5 === 5, 5 === "5", 5 !== 3);
