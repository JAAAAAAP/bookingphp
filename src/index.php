<?php
session_start();
require "../controller/photo.php";
require('../controller/user.php');
$dbcon = new User;
$photo = new photo;

if (isset($_POST['login'])) {
    $username = ($_POST['username']);
    $password = ($_POST['password']);

    $qr = $dbcon->login($username, $password);
    $row = mysqli_num_rows($qr);

    if ($row == 1) {
        $rs = mysqli_fetch_assoc($qr);
        $_SESSION['id'] = $rs['user_id'];
        $_SESSION['user'] = $rs['user'];
        $_SESSION['role'] = $rs['role'];
        if ($_SESSION['role'] == 0) {
            // echo "<script>alert('User Login Succes');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
        if ($_SESSION['role'] == 1) {
            // echo "<script>alert('Admin Login Succes');</script>";
            echo "<script>window.location.href='./admin.php';</script>";
        }
    } else {
        echo "<script>alert('Somrthing went wrong');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}


?>
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

    <nav>
        <div>logo</div>
        <ul>
            <?php
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $qr = $dbcon->callfecth($id);
                $rs = mysqli_fetch_assoc($qr);
            ?>
                <li><a id="userbutton" style="text-transform: uppercase;"><?= $_SESSION['user'] ?></a></li>
                <li><a>ดูของที่ยืม</a></li>
            <?php
            } else {
            ?>
                <li><a href="#" id="button">เข้าสู่ระบบ</a></li>
            <?php
            }
            ?>
            <li><a href="#">ติดต่อ</a></li>
        </ul>
    </nav>


    <div class="box">
        <div class="box-item">
            <div class="boxclose">
                <i class="fa-regular fa-circle-xmark fa-xl"></i>
            </div>
            <h3 style=" margin-top: 10px;">โปรไฟล์</h3>
            <?php if ($_SESSION['role'] == 1) { ?>
                <a class="logout" href="./admin.php">
                    <h4>จัดการ</h4>
                </a>
            <?php
            }
            ?>
            <a class="logout" href="logout.php">
                <h4>ออกจากระบบ</h4>
            </a>
        </div>
    </div>

    <div class="popup">
        <div class="popup-content">
            <div class="close">
                <i class="fa-regular fa-circle-xmark fa-xl"></i>
            </div>
            <form method="post">
                <h3>เข้าสู่ระบบ</h3>
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" name="login">เข้าสู่ระบบ</button>
            </form>
        </div>
    </div>


    <div class="card">
        <?php
        $sql = $photo->fecthphoto();
        if ($sql->num_rows > 0) {
            while ($row = $sql->fetch_assoc()) {
                $imgUrl = './img/' . $row['img'];
        ?>
                <div class="container">
                    <img src="<?= $imgUrl ?>" alt="">
                    <h3 style="margin-top: 10px;"><?= $row['name'] ?></h3>
                    <form method="post">
                        <input type="number" name="amount" min="0" max="<?= $row['amount']?>" placeholder="จำนวนที่เหลือ <?= $row['amount'] ?>">
                        <button type="submit" name="submit">ยืม</button>
                    </form>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <img src="../src/img/pexels-stephan-seeber-1261731.jpg" alt="">
    <script src="js/index.js"></script>
</body>

</html>