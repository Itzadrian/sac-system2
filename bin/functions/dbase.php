<?php
class MySQLDatabase {
    private $connection;
    public function __construct() {
        $this->open_connection();
    }
    public function open_connection() {
        $this->connection = mysqli_connect("localhost", "root", "", "sac_system2");
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }
    public function escape_value($string) {
        return mysqli_real_escape_string($this->connection, $string);
    }
    public function query($sql) {
        $result = mysqli_query($this->connection, $sql);
        if (!$result) {
            die("Database query failed: " . mysqli_error($this->connection));
        }
        return $result;
    }
    public function fetch_array($result) {
        return mysqli_fetch_array($result);
    }
    public function num_rows($result) {
    return mysqli_num_rows($result);
}

}
$dbase = new MySQLDatabase();
