<?php

namespace App\Database\Repositories;

use PDO;

class ProdutoRepository
{
  private PDO $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function findAll(): array
  {
    try {
      $statement = $this->connection->query('SELECT * FROM produtos');

      if ($statement === false) {
        // Tratar o erro de consulta SQL
        return [];
      }

      return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
      // Aqui você pode lidar com o erro de forma apropriada,
      // como registrar o erro em logs, retornar um array vazio ou lançar uma exceção personalizada.
      // Por enquanto, vamos retornar um array vazio em caso de erro.
      return [];
    }
  }

  public function findById(int $id): ?array
  {
    try {
      $statement = $this->connection->prepare('SELECT * FROM produtos WHERE id = :id');
      $success = $statement->execute(['id' => $id]);

      if (!$success) {
        // Tratar o erro de preparação da declaração SQL ou de execução da consulta
        return null;
      }

      $produto = $statement->fetch(PDO::FETCH_ASSOC);
      return $produto ?: null;
    } catch (\PDOException $e) {
      // Lidar com o erro de forma apropriada
      return null;
    }
  }

  public function save(array $produto): bool
  {
    try {
      $sql = 'INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)';
      $statement = $this->connection->prepare($sql);

      return $statement->execute([
        'nome' => $produto['nome'],
        'preco' => $produto['preco']
      ]);
    } catch (\PDOException $e) {
      // Lidar com o erro de forma apropriada
      return false;
    }
  }

  public function update(int $id, array $produto): bool
  {
    try {
      $sql = 'UPDATE produtos SET nome = :nome, preco = :preco WHERE id = :id';
      $statement = $this->connection->prepare($sql);

      return $statement->execute([
        'id' => $id,
        'nome' => $produto['nome'],
        'preco' => $produto['preco']
      ]);
    } catch (\PDOException $e) {
      // Lidar com o erro de forma apropriada
      return false;
    }
  }

  public function delete(int $id): bool
  {
    try {
      $sql = 'DELETE FROM produtos WHERE id = :id';
      $statement = $this->connection->prepare($sql);

      return $statement->execute(['id' => $id]);
    } catch (\PDOException $e) {
      // Lidar com o erro de forma apropriada
      return false;
    }
  }
}
