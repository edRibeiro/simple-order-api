<?php

declare(strict_types=1);

namespace App\Entities;

class Cliente
{
  private int $id;
  private string $nome;
  private string $cidadeNome;
  private string $password;

  public function __construct(
    int $id,
    string $nome,
    string $cidadeNome,
    string $password
  ) {
    $this->id = $id;
    $this->nome = $nome;
    $this->cidadeNome = $cidadeNome;
    $this->password = $password;
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

  public function getPassword(): string
  {
    return $this->password;
  }

  public function setPassword(string $password): void
  {
    $this->password = $password;
  }
}
