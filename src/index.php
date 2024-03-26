<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>

    <script src="https://kit.fontawesome.com/3cc09a7ed1.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <!-- navbar -->
    <?php include("./component/navbar.php") ?>

    <div class="card">
        <?php
        $sql = $photo->fecthphoto();
        if ($sql->num_rows > 0) {
            while ($row = $sql->fetch_assoc()) {
                $imgUrl = './img/' . $row['img'];
        ?>
                <div class="container">
                    <img src="<?= $imgUrl ?>" alt="">
                    <h3 name="name" style="margin-top: 10px;"><?= $row['name'] ?></h3>
                    <form action="index.php?get=<?php echo $row['p_id'] ?>" method="post">
                        <input type="number" name="amount[]" min="0" max="<?= $row['amount'] ?>" placeholder="จำนวนที่เหลือ <?= $row['amount'] ?>">
                        <button type="submit" name="submit">ยืม</button>
                    </form>
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