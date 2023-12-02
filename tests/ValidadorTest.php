<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SuportesBalanceados\Validador;

class ValidadorTest extends TestCase
{
  public function test_it_should_validate_simple_brackets(): void
  {
    $validador = new Validador();
    self::assertEquals($validador->digaOiMundo(), "Oi, mundo!");
  }
}