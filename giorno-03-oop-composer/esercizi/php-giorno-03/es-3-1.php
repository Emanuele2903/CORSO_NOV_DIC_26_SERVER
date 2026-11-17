<?php

class Autore
{

    public function __construct(
        public string $nome,
        public string $cognome,
        public int $annoNascita
    ) {}
    public function nomeCompleto(): string
    {
        return $this->nome . ' ' . $this->cognome;
    }
    public function etaOggi(): int
    {
        return (int) date('Y') - $this->annoNascita;
    }
}
$autore1 = new Autore('Italo', 'Calvino', 1923);
$autore2 = new Autore('Alessandro', 'Manzoni', 1785);
$autore3 = new Autore('Dante', 'Alighieri', 1265);
$autori = [$autore1, $autore2, $autore3];
foreach ($autori as $autore) {
    echo $autore->nomeCompleto() . ", nato nel " . $autore->annoNascita . "\n";
    echo $autore->etaOggi() . " anni \n";
}