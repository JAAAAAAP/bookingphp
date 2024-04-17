<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');


$sql = "SELECT COUNT(*) FROM products";
$query = $conn->prepare($sql);
$query->execute();
$count = $query->fetchColumn();


?>


<div class="flex flex-col w-full h-full">

    <!-- sidebar-toggle -->

    <label for="my-drawer" class="drawer-button h-14 ">
        <div class="my-4 ml-3">
            <div class="flex justify-start items-start text-4xl">
                <i class="bx bx-menu cursor-pointer"></i>
                <span class="font-bold text-2xl ml-1">ระบบยืมคืน</span>
            </div>
        </div>
    </label>

    <!-- card -->

    <div class="flex flex-row mx-4 mt-4 gap-6 justify-center items-center">
        <!-- จำนวนคนที่ยืม -->
        <div class="flex justify-center items-center rounded-2xl w-1/4 h-40 bg-base-100 shadow-xl">
            <a href="">
                <figure class="flex items-center justify-center mt-3 text-7xl">
                    <i class='bx bx-user'></i>
                </figure>
                <div class="card-body items-center text-center p-0">
                    <h2 class="card-title">จำนวนคนที่ยืม</h2>
                    <p class="font-bold text-xl">10</p>
                </div>
            </a>
        </div>

        <!-- เลยกำหนด -->

        <div class="flex justify-center items-center rounded-2xl w-1/4 h-40 bg-base-100 shadow-xl">
            <a href="">
                <figure class="flex items-center justify-center mt-3 text-7xl">
                    <i class='bx bx-time-five'></i>
                </figure>
                <div class="card-body items-center text-center p-0">
                    <h2 class="card-title">เลยกำหนด</h2>
                    <p class="font-bold text-xl">10</p>
                </div>
            </a>
        </div>

        <!-- จำนวนของ -->

        <div class="flex justify-center items-center rounded-2xl w-1/4 h-40 bg-base-100 shadow-xl">
            <a href="admin.php?pt=upload">
                <figure class="flex items-center justify-center mt-3 text-7xl">
                    <i class='bx bx-archive-in'></i>
                </figure>
                <div class="card-body items-center text-center p-0">
                    <h2 class="card-title">จำนวนของ</h2>
                    <p class="font-bold text-xl"><?php echo $count ?></p>
                </div>
            </a>
        </div>


    </div>

    <div class="flex justify-center items-center w-full">
        <div class="divider divider-neutral w-11/12"></div>
    </div>
</div>