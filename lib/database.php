<?php
// // Database credentials
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "portfolio_builder";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
class Connect
{
    public $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "portfolio_builder";
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
