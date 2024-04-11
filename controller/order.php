<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');
include_once('../plugin/script.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['id'])) {

    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['id'];
        $product_id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $amount = $_POST['amount'];

        if ($amount != null) {
            $order_sql = "INSERT INTO oder_product(p_id, user_id, product_name, amount) VALUES (:p_id, :user_id, :product_name, :amount)";
            $oder_query = $conn->prepare($order_sql);
            $oder_query->bindParam(":p_id", $product_id, PDO::PARAM_INT);
            $oder_query->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $oder_query->bindParam(":product_name", $product_name, PDO::PARAM_STR);
            $oder_query->bindParam(":amount", $amount, PDO::PARAM_INT);
            $oder_query->execute();


            if ($oder_query) {
                echo "<script>window.location.href='/jaa/bookingphp/public/index.php'</script>";
                $conn = null;
            }
        } else {

            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'กรุณากรอกจำนวน',
                    timer: 1500,
                    showConfirmButton: false
                });
            });
        </script>";
            header("refresh:1.5; url=/jaa/bookingphp/public/index.php");
            $conn = null;
        }
    }
} else {
    echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'กรุณณาเข้าสู่ระบบ',
                    timer: 1500,
                    showConfirmButton: false
                });
            });
        </script>";
    header("refresh:1.5; url=/jaa/bookingphp/public/index.php");
    $conn = null;
}
