<?php

namespace App\Database\Repositories;

use App\Entities\Cliente;
use PDO;

class ClienteRepository
{
  private PDO $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function findById(int $id): ?Cliente
  {
    $statement = $this->connection->prepare('SELECT * FROM clientes WHERE id = :id');
    $statement->execute(['id' => $id]);
    $clienteData = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$clienteData) {
      return null;
    }

    return new Cliente(
      $clienteData['id'],
      $clienteData['nome'],
      $clienteData['cidade_nome'],
      $clienteData['password']
    );
  }

  public function save(Cliente $cliente): bool
  {
    $sql = 'INSERT INTO clientes (nome, cidade_nome, password) VALUES (:nome, :cidadeNome, :password)';
    $statement = $this->connection->prepare($sql);

    return $statement->execute([
      'nome' => $cliente->getNome(),
      'cidadeNome' => $cliente->getCidadeNome(),
      'password' => $cliente->getPassword()
    ]);
  }

  public function findAll(): array
  {
    $statement = $this->connection->query('SELECT * FROM clientes');
    $clientes = [];

    while ($clienteData = $statement->fetch(PDO::FETCH_ASSOC)) {
      $clientes[] = new Cliente(
        $clienteData['id'],
        $clienteData['nome'],
        $clienteData['cidade_nome'],
        $clienteData['password']
      );
    }

    return $clientes;
  }

  public function update(Cliente $cliente): bool
  {
    $sql = 'UPDATE clientes SET nome = :nome, cidade_nome = :cidadeNome, password = :password WHERE id = :id';
    $statement = $this->connection->prepare($sql);

    return $statement->execute([
      'id' => $cliente->getId(),
      'nome' => $cliente->getNome(),
      'cidadeNome' => $cliente->getCidadeNome(),
      'password' => $cliente->getPassword()
    ]);
  }

  public function delete(int $id): bool
  {
    $sql = 'DELETE FROM clientes WHERE id = :id';
    $statement = $this->connection->prepare($sql);

    return $statement->execute(['id' => $id]);
  }
}
