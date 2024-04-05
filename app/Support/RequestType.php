<?php

namespace App\Support;

class RequestType
{
  static function get(): string
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }
}
