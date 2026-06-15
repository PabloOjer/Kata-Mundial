<?php

namespace Deg540\CleanCodeKata9;

class Quiniela
{
    public function apostar(string $apuesta): string
    {
        $equipos = explode(" ", $apuesta)[1];
        $ganador = explode(" ", $apuesta)[2];
        return $equipos . ": " . $ganador;
    }
}