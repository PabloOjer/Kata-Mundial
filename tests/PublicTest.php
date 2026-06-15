<?php

namespace Deg540\CleanCodeKata9\Test;

use PHPUnit\Framework\TestCase;
use Deg540\CleanCodeKata9\Quiniela;
use Deg540\CleanCodeKata9\ResultadosInterface;

final class PublicTest extends TestCase
{
    /**
     * @test
     */
    public function apostarPartido(): void
    {
        // Arrange
        $resultados = $this->createMock(ResultadosInterface::class);
        $resultados->method("obtenerResultado")->with("españa-brasil")->willReturn("1");
        $quiniela = new Quiniela($resultados);

        //Act
        $respuesta = $quiniela->accionar("apostar españa-brasil 1");
        
        //Assert
        $this->assertEquals($respuesta, "españa-brasil: 1");
    }

    /**
     * @test
     */
    public function apostarErroneoPartido(): void
    {
        // Arrange
        $resultados = $this->createMock(ResultadosInterface::class);
        $resultados->method("obtenerResultado")->with("españa-brasil")->willReturn("1");
        $quiniela = new Quiniela($resultados);

        //Act
        $respuesta = $quiniela->accionar("apostar españa-brasil 3");
        
        //Assert
        $this->assertEquals($respuesta, "Signo no valido");
    }

    /**
     * @test
     */
    public function apostarVariosPartidos(): void
    {
        // Arrange
        $resultados = $this->createMock(ResultadosInterface::class);
        $resultados->method("obtenerResultado")->willReturnMap([
            ["españa-brasil", "1"],
            ["francia-alemania", "x"]
        ]);
        $quiniela = new Quiniela($resultados);

        //Act
        $primeraApuesta = $quiniela->accionar("apostar españa-brasil 1");
        $respuesta = $quiniela->accionar("apostar francia-alemania x");

        //Assert
        $this->assertEquals($respuesta, "españa-brasil: 1, francia-alemania: x");
        
    }

    /**
     * @test
     */
    public function apostarPartidoNoExiste(): void
    {
        // Arrange
        $resultados = $this->createMock(ResultadosInterface::class);
        $resultados->method("obtenerResultado")->with("japon-alemania")->willReturn(null);
        $quiniela = new Quiniela($resultados);

        //Act
        $respuesta = $quiniela->accionar("apostar japon-alemania 1");
        
        //Assert
        $this->assertEquals($respuesta, "Apuesta Invalida");
    }

    /**
     * @test
     */
    public function vaciarQuiniela(): void
    {
        // Arrange
        $resultados = $this->createMock(ResultadosInterface::class);
        $resultados->method("obtenerResultado")->with("españa-brasil")->willReturn("1");
        $quiniela = new Quiniela($resultados);

        //Act
        $respuesta = $quiniela->accionar("vaciar");

        //Assert
        $this->assertEquals($respuesta, "Quiniela vacía");
    }
}
?>