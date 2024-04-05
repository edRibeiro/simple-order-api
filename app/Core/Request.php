<?php

namespace App\Core;

use Exception;
use PhpParser\Node\Expr\FuncCall;
use PHPUnit\Util\Json;

class Request
{
  public static function input(string $name)
  {
    if (isset($_POST[$name])) {
      return $_POST[$name];
    }

    throw new Exception("O índice {$name} não existe.", 1);
  }

  public static function all()
  {
    return $_POST;
  }

  public static function only(string|array $only)
  {
    $fieldsPost = self::all();
    $fieldsPostKeys = array_keys($fieldsPost);

    $arr = [];

    foreach ($fieldsPostKeys as $index => $value) {
      $onlyField = (is_string($only) ? $only : (isset($only[$index]) ? $only[$index] : null));
      if (isset($fieldsPost[$onlyField])) {
        $arr[$onlyField] = $fieldsPost[$onlyField];
      }
    }
    return $arr;
  }

  public static function excepts(string|array $excepts)
  {
    $fieldPost = self::all();

    if (is_array($excepts)) {
      foreach ($excepts as $index => $value) {
        unset($fieldPost[$value]);
      }
    }

    if (is_string($excepts)) {
      unset($fieldPost[$excepts]);
    }

    return $fieldPost;
  }

  public static function query($name)
  {
    if (!isset($_GET[$name])) {
      throw new Exception("Não existe a query string {$name}", 1);
    }
    return $_GET[$name];
  }

  public static function toJson(array $data)
  {
    return json_encode($data);
  }

  public static function toArray(string $data)
  {
    if (isJson($data)) {
      return json_decode($data);
    }
  }
}
