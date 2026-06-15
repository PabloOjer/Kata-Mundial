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
}
?>