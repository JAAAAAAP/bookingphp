<?php


if (isset($_GET['approve']) && isset($_GET['o'])) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');
    include_once('../plugin/script.php');

    $o_id = $_GET['o'];
    $p_id = $_GET['p'];
    $approve = $_GET['approve'];
    $amount = $_GET['amount'];






    if ($approve == 'ok') {
        $select_sql = 'SELECT p_id,amount FROM products WHERE p_id = :id';
        $select_query = $conn->prepare($select_sql);
        $select_query->bindParam(':id', $p_id, PDO::PARAM_INT);
        $select_query->execute();
        $rs = $select_query->fetch(PDO::FETCH_ASSOC);
        $rs['amount'];

        if ($rs['amount'] < $amount) {
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'จำนวนไม่เพียงพอต่อการอนุมัติ',
                timer: 1500,
                showConfirmButton: false
              });
            });
          </script>";
            header("refresh:1.5; url=/jaa/bookingphp/public/admin/admin.php?pt=status");
            exit;
        }

        $minus_sql = 'UPDATE products SET amount = amount - :amount WHERE p_id = :p_id';
        $minus = $conn->prepare($minus_sql);
        $minus->bindParam(':p_id', $p_id, PDO::PARAM_INT);
        $minus->bindParam(':amount', $amount, PDO::PARAM_INT);
        $minus->execute();



        $sql = "UPDATE oder_product SET status = :status WHERE o_id = :id";
        $query = $conn->prepare($sql);
        $query->bindParam(":id", $o_id, PDO::PARAM_INT);
        $query->bindValue(":status", "อนุมัติแล้ว", PDO::PARAM_STR);
        $query->execute();
        echo "<script>window.history.back();</script>";
    } elseif ($approve == 'no') {


        $reject_sql = "UPDATE oder_product SET status = :status WHERE o_id = :id";
        $reject_query = $conn->prepare($reject_sql);
        $reject_query->bindParam(":id", $o_id, PDO::PARAM_INT);
        $reject_query->bindValue(":status", "ไม่อนุมัติ", PDO::PARAM_STR);
        $reject_query->execute();
        echo "<script>window.history.back();</script>";
    } elseif ($approve == 'wait') {
        $pash_sql = 'UPDATE products SET amount = amount + :amount WHERE p_id = :p_id';
        $pash = $conn->prepare($pash_sql);
        $pash->bindParam(':p_id', $p_id, PDO::PARAM_INT);
        $pash->bindParam(':amount', $amount, PDO::PARAM_INT);
        $pash->execute();

        $wait_sql = "UPDATE oder_product SET status = :status WHERE o_id = :id";
        $wait_query = $conn->prepare($wait_sql);
        $wait_query->bindParam(":id", $o_id, PDO::PARAM_INT);
        $wait_query->bindValue(":status", "รออนุมัติ", PDO::PARAM_STR);
        $wait_query->execute();
        echo "<script>window.history.back();</script>";
    }
}
