<?php
namespace Deg540\CleanCodeKata9;

interface ResultadosInterface
{
public function obtenerResultado(string $apuestas): ?string;
}