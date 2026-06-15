<?php

namespace Deg540\CleanCodeKata9;

class Quiniela
{
    public function apostar(string $apuesta): string
    {
        $equipos = explode(" ", $apuesta)[1];
        $ganador = explode(" ", $apuesta)[2];
        if($ganador == "1" || $ganador == "2" || $ganador == "x") {
            return $equipos . ": " . $ganador;
        } else {
            return "Signo no valido";
        }
    }
}