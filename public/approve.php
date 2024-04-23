<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "../plugin/plug.php" ?>

</head>


<body>
    <?php include_once("./component/navbar.php") ?>

    <div class="flex justify-center text-center w-full">
        <div class="w-11/12">
            <div class="divider divider-neutral font-bold text-xl">การอนุมัติ</div>

            <?php
            $i = 1;
            $group_sql = "SELECT DISTINCT group_id FROM oder_product WHERE user_id = :id AND status !='รอดำเนินการ'";
            $group_result = $conn->prepare($group_sql);
            $group_result->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
            $group_result->execute();
            $groups = $group_result->fetchAll(PDO::FETCH_ASSOC);

            foreach ($groups as $group) {
                $group_id = $group['group_id'];
                // เลือกข้อมูลสินค้าในกลุ่มนี้
                $product_sql = "SELECT o.o_id,o.p_id,o.user_id,p.name,o.amount,o.status,o.group_id,p.amount AS products_amount
                                FROM products as p 
                                INNER JOIN oder_product as o on p.p_id = o.p_id 
                                WHERE user_id = :id AND group_id = :group_id";
                $product_result = $conn->prepare($product_sql);
                $product_result->bindParam(':group_id', $group_id, PDO::PARAM_INT);
                $product_result->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
                $product_result->execute();
                $products = $product_result->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <div class="card w-full bg-base-100 shadow-xl mb-8 border-4 ">
                    <div class="card-body">
                        <a href="..\controller\approve_delete.php?group=<?= $group['group_id'] ?>" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-xl">✕</a>
                        <div class="text-xl font-bold">
                            <h1>ใบที่ <?= $i++ ?></h1>
                        </div>

                        <table class="table text-center">
                            <!-- head -->
                            <thead>
                                <tr class="text-base text-black">
                                    <th class="w-12">No.</th>
                                    <th>ชื่อ</th>
                                    <th class="w-10">จำนวน</th>
                                    <th class="w-36">สถานะ</th>
                                    <th class="w-28">นำออก</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $n = 1;
                                foreach ($products as $product) { ?>
                                    <tr class="font-bold text-base">
                                        <td><?= $n++ ?></td>
                                        <td><?= $product['name']; ?></td>
                                        <td><?= $product['amount']; ?></td>
                                        <td>
                                            <div tabindex="0" role="button" class="btn btn-md btn-<?= $product['status'] === "อนุมัติแล้ว" || $product['status'] === "กำลังยืม" || $product['status'] === "คืนแล้ว" ? "success" : ($product['status'] === "ไม่อนุมัติ" || $product['status'] === "เลยกำหนด" ? "error" : "warning") ?> text-white">
                                                <?= $product['status'] ?>
                                            </div>
                                        </td>
                                        <td><a href="..\controller\approve_delete.php?p=<?= $product['p_id'] ?>" class="btn btn-error text-white <?= $product['status'] === "กำลังยืม" ?  "btn-disabled" : "" ?>">นำออก</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php if ($product['status'] === "กำลังยืม") { ?>
                            <div class="text-end">
                                <input type="hidden" name="group_id" value="<?= $product['group_id'] ?>">
                                <a href="pdf.php?group=<?= $product['group_id'] ?>"><button name="submit" type="submit" class="btn btn-info text-white mt-4 ">ปริ้นเอกสาร</button></a>
                            </div>
                        <?php } else { ?>
                            <form method="post" action="..\controller\approve.php">
                                <div class="text-end">
                                    <?php foreach ($products as $product) { ?>
                                        <input type="hidden" name="p_id[]" value="<?= $product['p_id'] ?>">
                                    <?php } ?>
                                    <input type="hidden" name="group_id" value="<?= $product['group_id'] ?>">
                                    <button name="submit" type="submit" class="btn btn-success text-white mt-4 <?= $product['status'] === "รออนุมัติ" || $product['status'] === "เลยกำหนด" || $product['status'] === "คืนแล้ว" ? "btn-disabled" : "" ?>">ยืนยันการยืม</button>
                                </div>
                            <?php } ?>
                            </form>

                    </div>
                </div>
            <?php } ?>



        </div>
    </div>








    <?php include_once "../plugin/tailwind.php" ?>
    <?php include_once "../plugin/script.php" ?>
</body>

</html>