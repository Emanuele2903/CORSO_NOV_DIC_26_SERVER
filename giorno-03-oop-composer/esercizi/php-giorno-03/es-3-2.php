<?php

class Libro {

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
try {
    $libro1 = new Libro("Il Signore degli Anelli", "Tolkien", 0);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . "<\n>";
}
try {
    $libro2 = new Libro("1984", "George Orwell", 328);

    $libro2->presta();
    $libro2->presta();

} catch (RuntimeException $e) {
    echo $e->getMessage() . "<\n>";
}
echo "Fine dello script";