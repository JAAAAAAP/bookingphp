<?php 
include_once('../config/connectdb.php');

class User {
        private function check($username,$password) {
            $dbcon = new DB_con;
            $query = $dbcon->query("SELECT * FROM user WHERE user = '$username' AND password = '$password'");
            return $query;
        }
        public function login ($username,$password) {
            $login = $this->check($username,$password);
            return $login;
        }
        private function fecth($id) {
            $dbcon = new DB_con;
            $query = $dbcon->query("SELECT * FROM user WHERE user_id = '$id'");
            return $query;
        }
        public function callfecth ($id) {
            $calllfecth = $this->fecth($id);
            return $calllfecth;
        }
    }
?>
