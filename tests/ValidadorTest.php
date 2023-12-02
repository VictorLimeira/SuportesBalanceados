<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use SuportesBalanceados\Validador;

class ValidadorTest extends TestCase
{
  public static function dataSetProvider(): array
  {
    return [
      'case 1'  => ['(){}[]', true],
      'case 2'  => ['[{()}](){}', true],
      'case 3'  => ['[]{()', false],
      'case 4'  => ['[{)]', false],
      'case 5'  => ['[{(', false],
      'case 6'  => [']})', false],
      'case 7'  => ['[a658{1h)35a]', false],
      'case 8'  => ['(ola){entre}[válidos]', true],
      'case 9'  => ['', true],
    ];
  }

  #[DataProvider('dataSetProvider')]
  public function test_it_should_validate_simple_brackets(string $value, bool $expectedReturn): void
  {
    $validador = new Validador();
    self::assertEquals($validador->validar($value), $expectedReturn);
  }
}
