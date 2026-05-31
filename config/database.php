<?php
session_start();

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "club_db";

    public $conn;

    public function connect()
    {
        $this->conn = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->database,

        );

        if (!$this->conn) {
            die("Database Connection Failed: " . mysqli_connect_error());
        }

        mysqli_set_charset($this->conn, "utf8");

        return $this->conn;
    }
}

$db = new Database();
$conn = $db->connect();