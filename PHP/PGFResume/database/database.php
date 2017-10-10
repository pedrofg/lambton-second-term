<?php
class Database {
    private $host      = "localhost";
    private $user      = "root";
    private $pass      = "";
    private $dbname    = "resumedb";

    private $dbh;
    private $error;

    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    public static function getInstance() {
        static $inst = null;
        if ($inst === null) {
            $inst = new Database();
        }
        return $inst;
    }

    public function query($query) {
      $sth = $this->dbh->prepare($query);
      $sth->execute();
      return $sth->fetchAll();
    }

    public function getPDO() {
      return $this->dbh;
    }

}

?>