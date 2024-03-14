<?php
session_start();
require('../controller/user.php');
$dbcon = new User;







?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <!-- sidebar -->
    <div class="sidebar close">
        <!-- logo -->
        <div class="logo-details">
            <i class='bx bx-book'></i>
            <span class="logo_name">ระบบจอง</span>
        </div>
        <!-- สถานะ -->
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">สถานะ</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">สถานะ</a></li>
                </ul>
            </li>
        <!-- เพิ่ม -->
            <li>
                <a href="#">
                    <i class='bx bx-plus'></i>
                    <span class="link_name">เพิ่ม</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">เพิ่ม</a></li>
                </ul>
            </li>
        <!-- ประวัติ -->
            <li>
                <a href="#">
                    <i class='bx bx-history'></i>
                    <span class="link_name">ประวัติ</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">ประวัติ</a></li>
                </ul>
            </li>
        <!-- ตั้งค่า -->
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">ตั้งค่า</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">ตั้งค่า</a></li>
                </ul>
            </li>
        <!-- โปรไฟล์ข้างล่าง -->
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                    <?php
                        if (isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];
                        $qr = $dbcon->callfecth($id);
                        $rs = mysqli_fetch_assoc($qr);
                    ?>
                        <div class="profile_name"><?= $_SESSION['user'] ?></div>
                    <?php
                    }
                    ?>
                    </div>
                    <a href="index.php"><i class='bx bx-home'></i></a>                
                    <a href="logout.php"><i class='bx bx-log-out'></i></a>
                    </div>
            </li>
        </ul>
    </div>
    <!-- หน้าหลัก -->
    <section class="home-section">
        <!-- header -->
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">ระบบจอง</span>
        </div>

    </section>


    <script src="js/admin.js"></script>
</body>

</html>