<?php
include_once('../config/connectdb.php');
$photo = new photo;


if (isset($_GET['del'])) {
    if(isset($_GET['img'])){
        $products_id = $_GET['del'];
        $img = $_GET['img'];
        $pathimg = realpath("../src/img/");
        $filename = $pathimg . "/" . $img;
    
    
        $sql = $photo->calldelete($products_id,$filename);
        if ($sql) {
            // echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
            echo "<script>window.location.href='http://localhost/Pichitchai/bookingphp/src/upload.php';</script>";
        } else {
            // echo "<script>alert('Somrthing went wrong');</script>";
            echo "<script>window.location.href='http://localhost/Pichitchai/bookingphp/src/upload.php</script>";
        }
        
    }
}


class photo
{
    private function photo($photoname, $amount, $fileName)
    {
        $dbcon = new DB_con;
        $query = $dbcon->query("INSERT INTO products(name,amount,img,time) VALUES ('$photoname','$amount','$fileName',NOW())");
        return $query;
    }
    public function callphoto($photoname, $amount, $fileName)
    {
        $calllfecth = $this->photo($photoname, $amount, $fileName);
        return $calllfecth;
    }
    public function fecthphoto()
    {
        $dbcon = new DB_con;
        $query = $dbcon->query("SELECT * FROM products");
        return $query;
    }
    private function fecthid($id)
    {
        $dbcon = new DB_con;
        $query = $dbcon->query("SELECT * FROM products WHERE p_id = '$id'");
        return $query;
    }
    public function callid($id)
    {
        $calldid = $this->fecthid($id);
        return $calldid;
    }
    public function count()
    {
        $dbcon = new DB_con;
        $query = $dbcon->query("SELECT COUNT(*) AS total_rows FROM products");
        return $query;
    }
    private function deletephoto($id,$filename)
    {
        $dbcon = new DB_con;
        $delete = unlink($filename);
        $query = $dbcon->query("DELETE FROM products WHERE p_id = '$id'");
        return $query . $delete;
    }
    public function calldelete($id,$filename)
    {
        $calldelete = $this->deletephoto($id,$filename);
        return $calldelete;
    }
    private function update($id,$name,$amount,$img){
        $dbcon = new DB_con;
        $query = $dbcon->query("UPDATE products SET name = '$name' , amount = '$amount', img = '$img' , time = NOW() WHERE p_id = '$id'");
        return $query;
    }
    public function callupdate($id,$name,$amount,$img)
    {
        $callupdate = $this->update($id,$name,$amount,$img);
        return $callupdate;
    }
}
?>