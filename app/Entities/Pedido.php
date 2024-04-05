<?php

declare(strict_types=1);

namespace App\Entities;

class Pedido
{
  public function __construct(
    private string $clientId,
    private array $items
  ) {
  }

  public function getClientId(): string
  {
    return $this->clientId;
  }

  public function getItems(): array
  {
    return $this->items;
  }

  public function setClientId(string $clientId): void
  {
    $this->clientId = $clientId;
  }

  public function setItems(array $items): void
  {
    $this->items = $items;
  }

  public function addItem(ItemPedido $item): void
  {
    $this->items[] = $item;
  }
}
