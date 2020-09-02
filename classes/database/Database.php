<?php
require_once('tools/sql.php');

class Database
{

  private $pdo;

  public function __construct()
  {
    try
    {
      $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR, DB_USER, DB_PASS, PDO_OPTIONS);
      // echo 'connected to ' . DB_NAME . '<br>'; // just for debugging
    } catch (\PDOException $e)
    {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
      echo "error: $e!";
    }
  }

  public function run($sql, $placeholders = [])
  {
    try
    {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($placeholders);
      return $stmt;
    } catch (\PDOException $e)
    {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
      echo "error: $e!";
    }
  }
}
