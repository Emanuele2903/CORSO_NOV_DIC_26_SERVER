# Giorno 1 – Esercizi del pomeriggio (PHP di base)

Crea una cartella `php-giorno-01` e aprila in VS Code. Ogni esercizio è un file `.php`.
- Gli esercizi 1.1, 1.2, 1.3, 1.4 e 1.7 si eseguono nel terminale: `php es-1-1.php`.
- Gli esercizi 1.5 e 1.6 sono pagine web: nel terminale `php -S localhost:8000`,
  poi nel browser `http://localhost:8000/calendario.php` (o `scheda-libro.php`).

Le funzioni nuove sono indicate negli aiuti: cercale sul manuale (https://www.php.net),
scrivendo il nome nella casella di ricerca.

---

## 1.1 – Il codice di collocazione (25 minuti) – `es-1-1.php`
In biblioteca ogni libro ha un codice sullo scaffale. Con le variabili `$cognome`,
`$genere`, `$anno` e `$numero` (per esempio `"Calvino"`, `"Romanzo"`, `1957`, `42`):
1. Stampa il codice `CAL-ROM-1957`: le prime tre lettere del cognome e del genere, in maiuscolo.
2. Aggiungi il numero di inventario su 5 cifre: `CAL-ROM-1957-00042`.
3. Stampa lo stesso codice usando una sola chiamata a `sprintf`.
4. Prova con `"Eco"` e `"Giallo"`: cosa succede con un cognome di tre lettere? E con due (`"Fo"`)?

Aiuto: `substr($testo, 0, 3)`, `strtoupper`, `str_pad($numero, 5, "0", STR_PAD_LEFT)`,
`sprintf("%s-%05d", $testo, $numero)`.

## 1.2 – La tessera della biblioteca (30 minuti) – `es-1-2.php`
Variabili: `$annoNascita` e `$residente` (true/false). Calcola l'età con `date('Y')`.
| Età | Tessera | Costo annuo |
|---|---|---|
| fino a 13 | Ragazzi | gratis |
| 14-25 | Giovani | 5 € |
| 26-64 | Adulti | 15 € |
| 65 e oltre | Senior | 8 € |

I residenti hanno il 20% di sconto. Stampa
`Età 30 - tessera Adulti - costo 12,00 €` con `number_format` all'italiana
(virgola per i decimali), oppure `costo gratuito`.
Prova con almeno quattro anni di nascita.

Aiuto: si può fare con `if / elseif` oppure con `match (true) { $eta <= 13 => ..., }`.
Prova entrambi i modi.

## 1.3 – Lo scaffale con match (20 minuti) – `es-1-3.php`
Variabile `$genere`. Con `match` ricava lo scaffale: Romanzo → A, Giallo e Thriller → B,
Saggio → C, Poesia → D, qualsiasi altro → "Chiedi al bancone". Stampa
`Il genere Giallo è nello scaffale B`. Prova con quattro generi diversi.

## 1.4 – La scadenza del prestito (30 minuti) – `es-1-4.php`
Un prestito dura 30 giorni.
1. `$prestito = strtotime('2026-11-13');` è la data del prestito.
   Stampa `Prestito: 13/11/2026`.
2. Calcola la scadenza con `strtotime('+30 days', $prestito)` e stampala nello stesso formato.
3. Stampa anche il giorno della settimana **in italiano**: `date('N', $data)` restituisce
   1 per lunedì ... 7 per domenica; trasformalo in parola con `match`.
4. La biblioteca la domenica è chiusa: se la scadenza cade di domenica, spostala al lunedì
   e stampa `(spostata al lunedì)`.
5. Il prestito del 13/11/2026 scade proprio di domenica. Prova anche con il 31/10/2026:
   la scadenza deve restare com'è.

## 1.5 – Il calendario delle aperture (40 minuti) – `calendario.php`
Una pagina web con una tabella delle prossime due settimane, a partire da oggi:
1. Una riga per giorno, con la data  e il giorno della settimana in italiano.
2. Un ciclo `for` da 0 a 13: il giorno `$i` è `strtotime("+$i days")`.
3. Le domeniche non compaiono (`continue`).
4. Accanto al sabato: `chiude alle 13:00`; accanto agli altri giorni `9:00 - 19:00`.
5. Sotto la tabella: `Giorni di apertura: 12`. Il numero va contato nel ciclo, non scritto a mano.

## 1.6 – Una pagina PHP (45 minuti) – `scheda-libro.php`
1. In cima al file, in un blocco PHP, crea le variabili di un libro: `$titolo`, `$autore`,
   `$anno`, `$pagine`, `$disponibile` (true/false).
2. Sotto, una pagina HTML completa che mostra titolo (in un `h1`), autore, anno e pagine,
   usando `<?= ... ?>`.
3. Una riga "Disponibile" o "In prestito" in base a `$disponibile` (ternario dentro `<?= ?>`).
4. Una riga "Libro lungo" solo se le pagine sono più di 400: usa un `if` intorno all'HTML:
   ```php
   <?php if ($pagine > 400) { ?>
       <p>Libro lungo</p>
   <?php } ?>
   ```
5. In fondo alla pagina: `Pagina generata il dataCorrente alle orarioCorrente` con `date()`.
6. Apri Ctrl+U nel browser: cosa vedi al posto del codice PHP?

## 1.7 – Cosa stampa? (20 minuti) – `es-1-7.php`
Prima scrivi su carta cosa ti aspetti. Poi esegui una riga alla volta e confronta.
```php
echo "10" + "5";
echo "10" . "5";
echo 7 / 2;
echo intdiv(7, 2);
echo 7 % 2;
var_dump("1" == "01");
var_dump("1" === "01");
var_dump("abc" == 0);
var_dump(0.1 + 0.2 == 0.3);
$nome = null;
echo $nome ?? "ospite";
$autore = "Calvino";
echo 'Autore: $autore';
echo "Autore: $autore";
echo "5 mele" + 3;
echo "mele" + 3;
```
Per ogni riga che ti ha sorpreso scrivi in un commento perché.
