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

<body>
    <nav class="navbar justify-between bg-base-200 shadow-lg">
        <div class="flex">
            <a class="btn btn-ghost text-xl">logo</a>
        </div>
        <ul class="flex flex-row-reverse">
            <?php
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $qr = $dbcon->callfecth($id);
                $rs = mysqli_fetch_assoc($qr);
            ?>
                <li><a class="text-base mx-2 btn btn-ghost uppercase" onclick="profile.showModal()"><?= $_SESSION['user'] ?></a></li>
                <li><a class="text-base mx-2 btn btn-ghost">รายการยืม</a></li>
            <?php
            } else {
            ?>
                <li><a class="text-base mx-2 btn btn-ghost" onclick="login.showModal()">เข้าสู่ระบบ</a></li>
            <?php
            }
            ?>
            <li><a href="#" class="text-base mx-2 btn btn-ghost">ติดต่อ</a></li>
        </ul>
    </nav>

    <!-- login -->
    <dialog id="login" class="modal">
        <div class="modal-box flex flex-col items-center justify-center">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="mb-2 text-2xl">เข้าสู่ระบบ</h3>
            <form method="post" class="flex flex-col justify-center items-center">
                <input class="input input-sm border-2 border-black my-4" type="text" name="username" placeholder="ชื่อผู้ใช้">
                <input class="input input-sm border-2 border-black mb-4" type="password" name="password" placeholder="รหัสผ่าน">
                <button class="btn" name="login">เข้าสู่ระบบ</button>
            </form>

        </div>
    </dialog>

    <!-- profile -->
    <dialog id="profile" class="modal justify-end items-start top-14 pr-10">
        <div class="modal-box flex flex-col items-center justify-center w-96">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>

            <h3 class="mb-2 text-2xl">จัดการโปรไฟล์</h3>
            <?php if ($_SESSION['role'] == 1) { ?>
                <a class="text-base my-2 btn btn-primary" href="./admin.php">โปรไฟล์</a>
            <?php
            }
            ?>
            <a class="text-base my-2 btn btn-error" href="logout.php">ออกจากระบบ</a>
        </div>
    </dialog>

</body>

</html>