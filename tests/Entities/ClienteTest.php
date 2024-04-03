<?php

declare(strict_types=1);

namespace Tests\Entities;

use App\Entities\Cliente;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Cliente::class)]
class ClienteTest extends TestCase
{
  public function testGetId(): void
  {
    $cliente = new Cliente(1, 'John Doe', 'New York');
    self::assertSame(1, $cliente->getId());
  }

  public function testGetNome(): void
  {
    $cliente = new Cliente(1, 'John Doe', 'New York');
    self::assertSame('John Doe', $cliente->getNome());
  }

  public function testGetCidadeNome(): void
  {
    $cliente = new Cliente(1, 'John Doe', 'New York');
    self::assertSame('New York', $cliente->getCidadeNome());
  }

  public function testSetId(): void
  {
    $cliente = new Cliente(1, 'John Doe', 'New York');
    $cliente->setId(2);
    self::assertSame(2, $cliente->getId());
  }

  public function testSetNome(): void
  {
    $cliente = new Cliente(1, 'John Doe', 'New York');
    $cliente->setNome('Jane Smith');
    self::assertSame('Jane Smith', $cliente->getNome());
  }

  public function testSetCidadeNome(): void
  {
    $cliente = new Cliente(1, 'John Doe', 'New York');
    $cliente->setCidadeNome('Los Angeles');
    self::assertSame('Los Angeles', $cliente->getCidadeNome());
  }
}
