<?php

declare(strict_types=1);

namespace Tests\Entities;

use App\Entities\ItemOrder;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ItemOrderTest::class)]
class ItemOrderTest extends TestCase
{
  public function testGetProductId(): void
  {
    $item = new ItemOrder('1', 10.99, 2);
    self::assertSame('1', $item->getProductId());
  }

  public function testGetUnitPrice(): void
  {
    $item = new ItemOrder('1', 10.99, 2);
    self::assertSame(10.99, $item->getUnitPrice());
  }

  public function testGetQuantity(): void
  {
    $item = new ItemOrder('1', 10.99, 2);
    self::assertSame(2, $item->getQuantity());
  }

  public function testSetProductId(): void
  {
    $item = new ItemOrder('1', 10.99, 2);
    $item->setProductId('2');
    self::assertSame('2', $item->getProductId());
  }

  public function testSetUnitPrice(): void
  {
    $item = new ItemOrder('1', 10.99, 2);
    $item->setUnitPrice(15.99);
    self::assertSame(15.99, $item->getUnitPrice());
  }

  public function testSetQuantity(): void
  {
    $item = new ItemOrder('1', 10.99, 2);
    $item->setQuantity(3);
    self::assertSame(3, $item->getQuantity());
  }
}
