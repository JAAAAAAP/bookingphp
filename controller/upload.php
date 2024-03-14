<?php
include_once('../config/connectdb.php');

class photo {
    private function photo($photoname,$amount,$fileName) {
        $dbcon = new DB_con;
        $query = $dbcon->query("INSERT INTO `product`(name,amount,img,time) VALUES ('$photoname','$amount','".$fileName."',NOW())");
        return $query;
    }
    public function callphoto ($photoname,$amount,$fileName) {
        $calllfecth = $this->photo($photoname,$amount,$fileName);
        return $calllfecth;
    }
    public function fecthphoto(){
        $dbcon = new DB_con;
        $query = $dbcon->query("SELECT * FROM product");
        return $query;
    }
}

?>