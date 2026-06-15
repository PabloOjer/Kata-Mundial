<?php

namespace Deg540\CleanCodeKata9;

class Quiniela
{
    private string $apuestas = "";

    public function __construct(private ResultadosInterface $resultados){

    }

    public function accionar(string $entrada): string
    {
        $accion = explode(" ", $entrada)[0];
        if($accion === "apostar"){
            return $this->apostar($entrada);
        }
        if($accion === "aciertos"){
            return $this->aciertos();
        }
        if($accion === "quitar"){
            return $this->quitar($entrada);
        }
        if($accion === "vaciar"){
            return $this->vaciar();
        }
        return "No se ha podido procesar la acción";
    }

    private function apostar(string $apuesta): string
    {
        $equipos = explode(" ", $apuesta)[1];
        $ganador = explode(" ", $apuesta)[2];
        $resultado = $this->resultados->obtenerResultado($equipos);
        if($resultado === null){
            return "Apuesta Invalida";
        }
        if(in_array($ganador,["1","2","x","X"])){
            $this->apuestas = $this->apuestas . $equipos . ": " . $ganador . ", ";
            return substr($this->apuestas, 0, -2);
        }
        return "Signo no valido";
    }

    private function vaciar(): string
    {
        $this->apuestas = "";
        return "La quiniela esta vacía";
    }

    private function aciertos(): string
    {
        $corregir = explode(", ", $this->apuestas);
        foreach($this->corregir as $apuesta){
            $equipos = explode(": ", $apuesta)[0];
            $ganador = explode(": ", $apuesta)[1];
            $resultado = $this->resultados->obtenerResultado($apuesta);
            if($resultado === $ganador){
                $aciertos++;
            }
        }
        return "Aciertos: " . $aciertos;
    }
}