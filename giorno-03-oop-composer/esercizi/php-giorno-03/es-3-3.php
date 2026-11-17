<?php

class Libro
{

    public string $titolo;
    public string $autore;
    public int $pagine;
    private int $copie = 1;

    public function __construct(string $titolo, string $autore, int $pagine)
    {
        if ($titolo === '') {
            throw new InvalidArgumentException("Il titolo non può essere vuoto");
        }

        if ($pagine <= 0) {
            throw new InvalidArgumentException("Il numero di pagine deve essere maggiore di zero");
        }

        $this->titolo = $titolo;
        $this->autore = $autore;
        $this->pagine = $pagine;
    }

    public function presta(): void
    {
        if ($this->copie <= 0) {
            throw new RuntimeException("Nessuna copia disponibile");
        }

        $this->copie--;
    }
    public function restituisci(): void
    {
        $this->copie++;
    }
    public function disponibile(): bool
    {
        return $this->copie > 0;
    }
    public function copie(): int
    {
        return $this->copie;
    }
}
class Biblioteca
{

    private array $libri = [];
    public function aggiungi(Libro $libro): void
    {
        $this->libri[] = $libro;
    }
    public function numeroLibri(): int
    {
        return count($this->libri);
    }
    public function cercaPerAutore(string $autore): array
    {
        $risultati = [];

        foreach ($this->libri as $libro) {
            if ($libro->autore === $autore) {
                $risultati[] = $libro;
            }
        }

        return $risultati;
    }

    public function totalePagine(): int
    {
        $totale = 0;

        foreach ($this->libri as $libro) {
            $totale += $libro->pagine;
        }

        return $totale;
    }
    public function disponibili(): array
    {
        $risultati = [];

        foreach ($this->libri as $libro) {
            if ($libro->disponibile()) {
                $risultati[] = $libro;
            }
        }

        return $risultati;
    }
}

$biblioteca = new Biblioteca();


$libro1 = new Libro('Il barone rampante', 'Italo Calvino', 260);
$libro2 = new Libro('Il visconte dimezzato', 'Italo Calvino', 120);
$libro3 = new Libro('I promessi sposi', 'Alessandro Manzoni', 720);
$libro4 = new Libro('La divina commedia', 'Dante Alighieri', 500);
$libro5 = new Libro('Se questo è un uomo', 'Primo Levi', 180);


$biblioteca->aggiungi($libro1);
$biblioteca->aggiungi($libro2);
$biblioteca->aggiungi($libro3);
$biblioteca->aggiungi($libro4);
$biblioteca->aggiungi($libro5);


$libro3->presta();


echo "Numero libri: " . $biblioteca->numeroLibri() . "\n";


echo "\nLibri di Italo Calvino:\n";
foreach ($biblioteca->cercaPerAutore('Italo Calvino') as $libro) {
    echo $libro->titolo . "\n";
}


echo "\nTotale pagine: " . $biblioteca->totalePagine() . "\n";


echo "\nLibri disponibili:\n";
foreach ($biblioteca->disponibili() as $libro) {
    echo $libro->titolo . "\n";
}
