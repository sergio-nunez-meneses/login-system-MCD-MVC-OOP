<?php
require_once('tools/sql.php');

class Database
{

  private $pdo;

  protected function connexion()
  {
    $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR, DB_USER, DB_PASS, PDO_OPTIONS);

    if (empty($this->pdo) === FALSE)
    {
      // echo 'Connected to database: ' . DB_NAME . '<br>'; // just for debugging
      return TRUE;
    }
    else
    {
      echo 'Failed connecting to database. <br>';
      return FALSE;
    }
  }

  protected function run($sql, $placeholders = [])
  {
    if ($this->connexion() === TRUE)
    {
      if (empty($placeholders))
      {
        return $this->pdo->query($sql)->fetchAll();
      }
      else
      {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
      }
    }
    else
    {
      echo 'Failed to run requested query. <br>';
      return FALSE;
    }
  }
}
