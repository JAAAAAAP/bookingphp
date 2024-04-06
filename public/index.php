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
    <title>index</title>
    <?php include_once "../plugin/plug.php" ?>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Kanit', sans-serif;
    }
</style>

<body>

    <!-- navbar -->
    <?php include_once("./component/navbar.php") ?>

    <div class="grid grid-cols-4 gap-4 m-8">
        <?php
        $sql = "SELECT * FROM products";
        $query = $conn->prepare($sql);
        $query->execute();
        $rs = $query->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;

        if ($query->rowCount() > 0) {
            foreach ($rs as $row) {
                $imgUrl = './img/' . $row['img'];
        ?>
                <div class="card bg-base-200 rounded-xl h-auto shadow-md">
                    <div class="card-body items-center justify-center">
                        <img class="shadow-lg rounded-lg h-40 w-52" src="<?= $imgUrl ?>" alt="">
                        <h3 class="card-title"><?= $row['name'] ?></h3>

                        <form class="card-body justify-center items-center p-0 w-full" action="../controller/order.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['p_id'] ?>">
                            <input type="hidden" name="product_name" value="<?php echo $row['name'] ?>">
                            <input class="input input-md w-48 border-2 border-black " type="number" name="amount" min="1" max="<?= $row['amount'] ?>" placeholder="จำนวนที่เหลือ <?= $row['amount'] ?>">
                            <div class="card-actions justify-center">
                                <button class="btn w-24 text-lg shadow-xl" type="submit" name="submit">ยืม</button>
                            </div>
                        </form>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>




    <?php include_once "../plugin/tailwind.php" ?>
</body>

</html>