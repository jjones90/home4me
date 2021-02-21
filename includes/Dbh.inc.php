<?php
  /**
   *
   */
  class Dbh
  {
  public $connection;
  private $host = "localhost";
  private $user = "root";
  private $pass = "";
  private $dbname = "complimentme";

  public function __construct() {
    $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
  }

  public function query($sql) {
    return $this->connection->query($sql);
  }
  }
?>
