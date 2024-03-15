<?php
include_once('../config/connectdb.php');
$photo = new photo;

if (isset($_GET['del'])) {
    $products_id = $_GET['del'];
    // $image = $_GET['img'];
    // $filepath = "../src/img/" . $image;
    // if (file_exists($filepath)) {
    //     if (unlink($filepath)) {
    //         echo "<script>alert('ลบหมดจด');</script>";
    //         echo "<script>window.location.href='http://localhost/Pichitchai/bookingphp/src/upload.php';</script>";
    //     } else {
    //         echo "<script>alert('Somrthing went wrong 1');</script>";
    //     }
    // } else {
    //     echo "<script>alert('Somrthing went wrong 2');</script>";
    // }


    $sql = $photo->calldelete($products_id);
    if ($sql) {
        // echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
        echo "<script>window.location.href='http://localhost/Pichitchai/bookingphp/src/upload.php';</script>";
    } else {
        echo "<script>alert('Somrthing went wrong');</script>";
        echo "<script>window.location.href='http://localhost/Pichitchai/bookingphp/src/upload.php</script>";
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
    public function count()
    {
        $dbcon = new DB_con;
        $query = $dbcon->query("SELECT COUNT(*) AS total_rows FROM products");
        return $query;
    }
    private function deletephoto($id)
    {
        $dbcon = new DB_con;
        $query = $dbcon->query("DELETE FROM products WHERE p_id = '$id'");
        return $query;
    }
    public function calldelete($id)
    {
        $calldelete = $this->deletephoto($id);
        return $calldelete;
    }
}
