<?php

class DBModel
{

  private $pdo;

  private $db_name = 'simple_ajax_example';
  private $db_host = 'localhost';
  private $db_char = 'utf8';
  private $db_user = 'root';
  private $db_pass = '';
  private $pdo_options = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, \PDO::ATTR_EMULATE_PREPARES => false];

  protected $table = 'users';
  protected $table_columns;

  protected function connexion()
  {
    $this->pdo = new PDO("mysql:host=$this->db_host;dbname=$this->db_name;charset=$this->db_char", $this->db_user, $this->db_pass, $this->pdo_options);

    if (empty($this->pdo) === FALSE)
    {
      // echo "Connected to database: $this->db_name <br>"; // just for debugging
      return TRUE;
    }
    else
    {
      echo "Failed connecting to database. <br>";
      return FALSE;
    }
  }

  protected function run_query($sql, $placeholders = [])
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
      echo "Failed to run requested query. <br>";
      return FALSE;
    }
  }

  protected function create_database()
  {
    $this->pdo = new PDO("mysql:host=$this->db_host;charset=$this->db_char", $this->db_user, $this->db_pass);

    if (empty($this->pdo) === FALSE)
    {
      $this->pdo->exec("DROP DATABASE IF EXISTS $this->db_name");
      $this->pdo->exec("CREATE DATABASE IF NOT EXISTS $this->db_name");
      $result = $this->pdo->exec("use $this->db_name");

      // echo "Database: $this->db_name created!<br>"; // just for debugging
      return TRUE;
    }
    else
    {
      echo 'Failed creating database. <br>';
      return FALSE;
    }
  }

  protected function create_table()
  {
    if ($this->connexion() === TRUE)
    {
      $this->pdo->exec("DROP TABLE IF EXISTS $this->table");
      $this->pdo->exec("CREATE TABLE IF NOT EXISTS $this->table $this->table_columns");

      // echo "Table: $this->table and columns: $this->table_columns created!<br>"; // just for debugging
      return TRUE;
    }
    else
    {
      echo 'Failed creating table and columns. <br>';
      return FALSE;
    }
  }

  protected function run_database()
  {
    $this->create_database();
    $this->create_table();
  }
}
