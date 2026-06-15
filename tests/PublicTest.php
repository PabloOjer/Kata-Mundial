<?php

namespace Deg540\CleanCodeKata9\Test;

use PHPUnit\Framework\TestCase;
use Deg540\CleanCodeKata9\Quiniela;

final class PublicTest extends TestCase
{
    /**
     * @test
     */
    public function apostarPartido(): void
    {
        // Arrange
        $quiniela = new Quiniela();

        //Act
        $respuesta = $quiniela->apostar("apostar españa-brasil 1");
        
        //Assert
        $this->assertEquals($respuesta, "españa-brasil: 1");
    }

    /**
     * @test
     */
    public function apostarErroneoPartido(): void
    {
        // Arrange
        $quiniela = new Quiniela();

        //Act
        $respuesta = $quiniela->apostar("apostar españa-brasil 3");
        
        //Assert
        $this->assertEquals($respuesta, "Signo no valido");
    }

    /**
     * @test
     */
    public function apostarVariosPartidos(): void
    {
        // Arrange
        $quiniela = new Quiniela();

        //Act
        $primeraApuesta = $quiniela->apostar("apostar españa-brasil 1");
        $respuesta = $quiniela->apostar("apostar francia-alemania x");

        //Assert
        $this->assertEquals($respuesta, "españa-brasil: 1, francia-alemania: x");
        
    }
}
?>