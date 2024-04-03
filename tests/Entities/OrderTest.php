<?php

declare(strict_types=1);

namespace Tests\Entities;

use App\Entities\ItemOrder;
use App\Entities\Order;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(OrderTest::class)]
class OrderTest extends TestCase
{
  public function testGetClientId(): void
  {
    $order = new Order('123', []);
    self::assertSame('123', $order->getClientId());
  }

  public function testGetItems(): void
  {
    $item1 = new ItemOrder('1', 10.99, 2);
    $item2 = new ItemOrder('2', 15.99, 1);
    $order = new Order('123', [$item1, $item2]);
    self::assertSame([$item1, $item2], $order->getItems());
  }

  public function testSetClientId(): void
  {
    $order = new Order('123', []);
    $order->setClientId('456');
    self::assertSame('456', $order->getClientId());
  }

  public function testSetItems(): void
  {
    $item1 = new ItemOrder('1', 10.99, 2);
    $item2 = new ItemOrder('2', 15.99, 1);
    $order = new Order('123', []);
    $order->setItems([$item1, $item2]);
    self::assertSame([$item1, $item2], $order->getItems());
  }

  public function testAddItem(): void
  {
    $item1 = new ItemOrder('1', 10.99, 2);
    $item2 = new ItemOrder('2', 15.99, 1);
    $order = new Order('123', [$item1]);
    $order->addItem($item2);
    self::assertSame([$item1, $item2], $order->getItems());
  }
}
