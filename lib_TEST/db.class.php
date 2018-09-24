<?php
class Db{
    private $servername;
    private $dbname;
    private $username;
    private $password;
    private $conn;

    public function __construct(){
        $this->servername = DB_HOST;
        $this->dbname = DB_NAME;
        $this->username = DB_USER;
        $this->password = DB_PASSWORD;

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
    }


    /**
     * Get the value of conn
     */ 
    public function getConn()
    {
        return $this->conn;
    }
}
?>