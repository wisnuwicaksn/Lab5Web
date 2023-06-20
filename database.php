<?php

class Database {
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct() {
        $this->getConfig();
        $this->conn = new mysql($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}

private function getConfig(){
    include_once("config.php");
    $this->host = $config['host'];
    $this->user = $config['username'];
    $this->password = $config['password'];
    $this->db_name = $config['db_name'];
}

public function query($sql){
    return $this->conn->query($sql);
}

public function get($table, $where=null){
    if ($where){
        $where = " WHERE " .$where;
    }
    $sql = " SELECT * FROM " .$table.$where;
    $sql = $this->$conn->query($sql);
    $sql = $sql->fetch_assoc();
    return $sql;
}

public function insert($table, $data) {
    
}