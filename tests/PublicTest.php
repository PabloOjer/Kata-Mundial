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
        $quiniela = new Quiniela();
        $respuesta = $quiniela->apostar("apostar españa-brasil 1");
        $this->assertEquals($respuesta, "españa-brasil: 1");
    }
}
?>