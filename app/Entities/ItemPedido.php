<?php

declare(strict_types=1);

namespace App\Entities;

class ItemPedido
{
  public function __construct(
    private string $productId,
    private float $unitPrice,
    private int $quantity
  ) {
  }

  public function getProductId(): string
  {
    return $this->productId;
  }

  public function getUnitPrice(): float
  {
    return $this->unitPrice;
  }

  public function getQuantity(): int
  {
    return $this->quantity;
  }

  public function setProductId(string $productId): void
  {
    $this->productId = $productId;
  }

  public function setUnitPrice(float $unitPrice): void
  {
    $this->unitPrice = $unitPrice;
  }

  public function setQuantity(int $quantity): void
  {
    $this->quantity = $quantity;
  }
}
