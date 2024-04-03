<?php

declare(strict_types=1);

namespace App\Entities;

class Produto
{
  public function __construct(
    private string $nome,
    private float $valorUnitario
  ) {
  }

  public function getNome(): string
  {
    return $this->nome;
  }

  public function getValorUnitario(): float
  {
    return $this->valorUnitario;
  }

  public function setNome(string $nome): void
  {
    $this->nome = $nome;
  }

  public function setValorUnitario(float $valorUnitario): void
  {
    $this->valorUnitario = $valorUnitario;
  }
}
