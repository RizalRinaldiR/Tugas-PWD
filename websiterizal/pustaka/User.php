<?php
require_once('Koneksi.php');
class User extends Koneksi
{
    public function escape_string($value)
    {
        return $this->conn->real_escape_string($value);
    }

    public function check_login($username, $password)
    {
        $sql = "SELECT * FROM login WHERE username='$username'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                return $row['id'];
            }
        }
        return false;
    }

    public function details($sql)
    {
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function get_connection()
    {
        return $this->conn;
    }
}
?>
