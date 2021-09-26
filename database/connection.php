<?php

//This class defines the database as an object. Through an instance of this 
//class you can initiate a new connection to a database, and execute queries in it.

class database
{
    private $host;
    public $user;
    private $pass;
    private $db;
    public $conn;

    function __construct($host, $user, $pass, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->conn = mysqli_connect($host, $user, $pass, $db);
    }
}
