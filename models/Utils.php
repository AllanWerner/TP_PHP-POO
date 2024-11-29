<?php

namespace Models;
use Exception;

class Utils{

  public static function launchException(string $message): never{
    throw new Exception($message);
  }

  public static function readException(Exception $e): never{
    die("Erreur : ". $e->getMessage());
  }

}