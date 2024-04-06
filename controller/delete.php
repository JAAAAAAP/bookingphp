<?php


if (isset($_GET['del'])) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');
    include_once('../plugin/script.php');
    
    $id = $_GET['del'];
    $sql_delete = "INSERT INTO bin(p_id,name,amount,img,upload_time,delete_time) SELECT p_id,name,amount,img,upload_time, NOW() FROM products WHERE p_id = :id";
    $query_delete = $conn->prepare("$sql_delete");
    $query_delete->bindParam(":id", $id, PDO::PARAM_INT);
    $query_delete->execute();

    $delete = "DELETE FROM products WHERE p_id = :id";
    $query = $conn->prepare("$delete");
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $conn = null;
    if ($query) {

        echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'ลบข้อมูลสำเร็จ',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        });
                    </script>";
        header("refresh:1.5; url=/jaa/bookingphp/public/admin/upload.php");
        $conn = null;
    }
}
