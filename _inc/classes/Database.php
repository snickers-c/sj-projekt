<?php
class Database
{


  private $host = "localhost";
  private $db = "scholar_db";
  private $user = "root";
  private $pass = "";
  private $charset = "utf8";
  private $pdo;


  public function __construct()
  {
    $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";

    try {
      $this->pdo = new PDO($dsn, $this->user, $this->pass);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "pripojenie zlyhalo " . $e->getMessage();
      exit;
    }
  }

  public function __destruct()
  {
    $this->pdo = null;
  }

  public function getConnection()
  {
    return $this->pdo;
  }
}
