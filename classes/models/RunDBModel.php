<?php

class RunDBModel extends DBModel
{

  public function __construct()
  {
    $this->table_columns = '(
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      email VARCHAR(45) NOT NULL,
      pass VARCHAR(45) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';
    $this->run_database();
  }
}
