<?php

namespace Deg540\CleanCodeKata9;

class Quiniela
{
    private $apuestas = "";
    public function apostar(string $apuesta): string
    {
        $equipos = explode(" ", $apuesta)[1];
        $ganador = explode(" ", $apuesta)[2];
        if(in_array($ganador,["1","2","x","X"])){
            $this->apuestas = $this->apuestas . $equipos . ": " . $ganador . ", ";
            return substr($this->apuestas, 0, -2);
        }
        return "Signo no valido";
    }
}