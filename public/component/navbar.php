<?php
$sql = "SELECT COUNT(*) FROM oder_product WHERE user_id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $_SESSION['id'], PDO::PARAM_INT);
$query->execute();
$count = $query->fetchColumn();
$display = ($count > 0) ?  " " : "hidden" ;

?>
<nav class="navbar sticky top-0 z-50 justify-between bg-base-200 shadow-lg">
    <div class="flex">
        <a class="btn btn-ghost text-xl">logo</a>
    </div>
    <ul class="flex flex-row-reverse">
        <?php
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
        ?>
            <li><a class="text-base mx-2 btn btn-ghost uppercase" onclick="profile.showModal()"><?= $_SESSION['user'] ?></a></li>
            <li>
                <div class="indicator">
                    
                    <span class="indicator-item badge badge-primary top-1 right-2 <?php echo $display ?>" ><?php echo $count ?></span>
                    <a href="\jaa\bookingphp\public\order.php" class="text-base mx-2 btn btn-ghost uppercase">รายการยืม</a>
                </div>
            </li>
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
        <form method="post" action="/jaa/bookingphp/controller/login.php" class="flex flex-col justify-center items-center">
            <input class="input input-sm border-2 border-black my-4" type="text" name="username" placeholder="ชื่อผู้ใช้" required>
            <input class="input input-sm border-2 border-black mb-4" type="password" name="password" placeholder="รหัสผ่าน" required>
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
            <a class="text-base my-2 btn btn-primary" href="./admin/admin.php">โปรไฟล์</a>
        <?php
        }
        ?>
        <a class="text-base my-2 btn btn-error" href="logout.php">ออกจากระบบ</a>
    </div>
</dialog>