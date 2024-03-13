<?php
  define('DB_SERVER', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'borrowphp');

    class DB_con {
        public function __construct()
        {
            $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            $this->dbcon = $conn;
            if(mysqli_connect_errno()){
                echo "fail" . mysqli_connect_error();
            }
        }
        public function query($sql){
            $query = mysqli_query($this->dbcon,$sql);
            return $query;
        }
    }
?>