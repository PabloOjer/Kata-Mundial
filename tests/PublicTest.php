<?php

namespace Deg540\CleanCodeKata9\Test;

use PHPUnit\Framework\TestCase;

final class PublicTest extends TestCase
{
    /**
     * @test
     */
    public function apostarPartido(): void
    {
        $this->assertEquals($respuesta, "españa-brasil: 1");
    }
}
?>