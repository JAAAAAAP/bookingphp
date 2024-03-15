<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'borrowphp');
$path = "http://localhost/Pichitchai/bookingphp/";


class DB_con
{
    public function __construct()
    {
        $this->dbcon = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if (!$this->dbcon) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    
    public function query($sql)
    {
        $query = mysqli_query($this->dbcon, $sql);
        return $query;
    }
}
