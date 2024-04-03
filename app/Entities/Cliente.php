<?php

declare(strict_types=1);

namespace App\Entities;

class Cliente
{
  public function __construct(
    private int $id,
    private string $nome,
    private string $cidadeNome
  ) {
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getNome(): string
  {
    return $this->nome;
  }

  public function getCidadeNome(): string
  {
    return $this->cidadeNome;
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function setNome(string $nome): void
  {
    $this->nome = $nome;
  }

  public function setCidadeNome(string $cidadeNome): void
  {
    $this->cidadeNome = $cidadeNome;
  }
}
