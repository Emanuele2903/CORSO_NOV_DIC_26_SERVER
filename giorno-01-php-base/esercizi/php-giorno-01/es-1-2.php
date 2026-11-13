<?php

$annoNascita = 2018;
$residente = true;

$annoCorrente = date("Y");

$eta = $annoCorrente - $annoNascita;


if ($eta <= 13) {
    $tessera = "Ragazzi";
    $costo = 0;
} elseif ($eta <= 25) {
    $tessera = "Giovani";
    $costo = 5;
} elseif ($eta <= 64) {
    $tessera = "Adulti";
    $costo = 15;
} else {
    $tessera = "Anziani";
    $costo = 8;
}

if ($residente) {
    $costo = $costo * 0.80;
}

if ($costo == 0) {
    echo "Età $eta - tessera $tessera - costo gratuito";
} else {
    echo "Età $eta - tessera $tessera - costo " . number_format($costo, 2, ',', '.') . " €";
}
