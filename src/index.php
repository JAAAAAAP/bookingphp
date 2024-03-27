<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.8.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Kanit', sans-serif;
    }
</style>

<body>
    <!-- navbar -->
    <?php include("./component/navbar.php") ?>

    <div class="grid grid-cols-4 gap-4 m-8">
        <?php
        $sql = $photo->fecthphoto();
        if ($sql->num_rows > 0) {
            while ($row = $sql->fetch_assoc()) {
                $imgUrl = './img/' . $row['img'];
        ?>
                <div class="card bg-base-200 rounded-xl h-auto shadow-md">
                    <div class="card-body items-center justify-center">
                        <img class="shadow-lg rounded-lg w-52" src="<?= $imgUrl ?>" alt="">
                        <h3 class="card-title"><?= $row['name'] ?></h3>
                        <form class="card-body justify-center items-center p-0 w-full" action="index.php?get=<?php echo $row['p_id'] ?>" method="post">
                            <input class="input input-md w-48 border-2 border-black " type="number" name="amount[]" min="0" max="<?= $row['amount'] ?>" placeholder="จำนวนที่เหลือ <?= $row['amount'] ?>">
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

    <?php
    if (isset($_POST['submit'])) {
        $id = $_GET['get'];
        $amount = $_POST['amount'];
        $sql = $photo->callid($id);
        $rowproducts = $sql->fetch_assoc();

    ?>
        <div class="basket">
            <div class="amount">
                <h5>5</h5>
            </div>
            <div class="basket-item">
                <a href="borrow.php">
                    <i class="fa-solid fa-basket-shopping fa-2xl"></i>
                </a>
            </div>
        </div>
    <?php } ?>

</body>

</html>