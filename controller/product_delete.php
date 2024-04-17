<?php


if (isset($_POST['program']) && $_POST['program'] === 'del') {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');
    // include_once('../plugin/script.php');
    
    $id = $_POST['id'];
    $sql_delete = "INSERT INTO bin(p_id,name,amount,img,upload_time,delete_time) SELECT p_id,name,amount,img,upload_time, NOW() FROM products WHERE p_id = :id";
    $query_delete = $conn->prepare("$sql_delete");
    $query_delete->bindParam(":id", $id, PDO::PARAM_INT);
    $query_delete->execute();
    
    $delete = "DELETE FROM products WHERE p_id = :id";
    $query = $conn->prepare("$delete");
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->execute();

    $deleteOrderProducts = "DELETE FROM oder_product WHERE p_id = :id";
    $deleteOrderProducts_query = $conn->prepare("$deleteOrderProducts");
    $deleteOrderProducts_query->bindParam(":id", $id, PDO::PARAM_INT);
    $deleteOrderProducts_query->execute();
    $conn = null;

    if ($query) {

        echo "ok";
        $conn = null;
    }else{
        echo "maiok";
        $conn = null;
    }
}
