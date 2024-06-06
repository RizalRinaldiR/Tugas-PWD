<?php
class Koneksi {
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DB = 'tubes';

    protected $conn;

    function __construct() {
        $this->conn = new mysqli(self::HOST, self::USER, self::PASS, self::DB);

        if ($this->conn->connect_error) {
            die("Koneksi Gagal: " . $this->conn->connect_error);
        }
    }

    public function escape_string($string) {
        return $this->conn->real_escape_string($string);
    }
}
?>
