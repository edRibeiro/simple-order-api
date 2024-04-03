<?php

declare(strict_types=1);

namespace Tests\Entities;

use App\Entities\Produto;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Produto::class)]
class ProdutoTest extends TestCase
{
  public function testGetNome(): void
  {
    $produto = new Produto('Produto A', 10.99);
    self::assertSame('Produto A', $produto->getNome());
  }

  public function testGetValorUnitario(): void
  {
    $produto = new Produto('Produto A', 10.99);
    self::assertSame(10.99, $produto->getValorUnitario());
  }

  public function testSetNome(): void
  {
    $produto = new Produto('Produto A', 10.99);
    $produto->setNome('Produto B');
    self::assertSame('Produto B', $produto->getNome());
  }

  public function testSetValorUnitario(): void
  {
    $produto = new Produto('Produto A', 10.99);
    $produto->setValorUnitario(20.99);
    self::assertSame(20.99, $produto->getValorUnitario());
  }
}
