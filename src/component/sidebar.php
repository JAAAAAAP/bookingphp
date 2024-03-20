<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="http://localhost/Pichitchai/bookingphp/src/admin.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">สถานะ</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="http://localhost/Pichitchai/bookingphp/src/admin.php">สถานะ</a></li>
                </ul>
            </li>
            <!-- เพิ่ม -->
            <li>
                <a href="upload.php">
                    <i class='bx bx-plus'></i>
                    <span class="link_name">เพิ่ม</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="upload.php">เพิ่ม</a></li>
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
        <!-- icon -->
        <div class="cardcontaner">
            <div class="card">
                <div class="carditem">
                    <a href="http://localhost/Pichitchai/bookingphp/src/admin.php">
                        <i class='bx bx-user'></i>
                        <h4>จำนวนคนที่ยืม</h4>
                        <span>10</span>
                    </a>
                </div>

                <div class="carditem">
                    <a href="#">
                    <i class='bx bx-time-five' ></i>
                        <h4>เลยกำหนด</h4>
                        <span>10</span>
                    </a>
                </div>

                <div class="carditem">
                    <a href="upload.php">
                        <i class='bx bx-archive-in'></i>
                        <h4>จำนวนของ</h4>
                        <?php
                        $sql = $photo->count();
                        if($sql){
                            $row = $sql->fetch_assoc();
                        }
                        ?>
                        <span><?=$row['total_rows']?></span>
                    </a>
                </div>
            </div>
        </div>

        <hr size="5" color="#374151" width="95%" style="margin-top: 2rem; margin-left:2.5%">
    </section>
    <script src="./js/admin.js"></script>
</body>