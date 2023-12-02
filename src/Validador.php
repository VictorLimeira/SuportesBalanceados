<?php

declare(strict_types=1);

namespace SuportesBalanceados;

class Validador
{
  public function validar(string $texto): bool
  {
    $textoSanitizado = $this->sanitizarEntrada($texto);
    return $this->ehValido($textoSanitizado);
  }

  private function sanitizarEntrada(string $texto): string
  {
    $padraoCaracteresPermitidos = '/[^\[\{\(\)\}\]]/i';
    return preg_replace($padraoCaracteresPermitidos, '', $texto);
  }

  private function ehValido(string $texto): bool
  {
    if (!strlen($texto)) {
      return true;
    }

    $pilhaAberturas = [];
    foreach (str_split($texto) as $caractere) {
      if ($this->ehAbertura($caractere)) {
        array_push($pilhaAberturas, $caractere);
        continue;
      }

      $ultimaAbertura = array_pop($pilhaAberturas);
      if (!$this->ehParValido($ultimaAbertura, $caractere)) {
        return false;
      }
    }

    if (!empty($pilhaAberturas)) {
      return false;
    }

    return true;
  }

  private function ehAbertura(string $caractere): bool|int
  {
    $padraoAberturas = '/[\[|\{|\(]/i';
    return preg_match($padraoAberturas, $caractere);
  }

  private function ehParValido(string|null $abertura, string $fechamento): bool
  {
    if (!$abertura) {
      return false;
    }

    $lookupParesAberturas = [
      '{' => '}',
      '[' => ']',
      '(' => ')'
    ];

    return $lookupParesAberturas[$abertura] == $fechamento;
  }
}
