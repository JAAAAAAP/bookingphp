<?php
session_start();
require "../controller/photo.php";
require('../controller/user.php');
$dbcon = new User;
$photo = new photo;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>

    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

<body>
    <!-- sidebar -->
    <?php include("./component/sidebar.php"); ?>

    <div class="table-container" role="region" tabindex="0">
        <table>
            <thead>
                <tr>
                    <th>
                        <div>
                            <div>ลำดับ</div>
                        </div>
                    </th>
                    <th>รูป</th>
                    <th>ชื่อ</th>
                    <th>จำนวนคงเหลือ</th>
                    <th>บันทึกการเปลี่ยนแปลง</th>
                    <th>ลบข้อมูล</th>
                </tr>

                <tr>
                    <td>
                        <h4></h4>
                    </td>
                    <td>
                        <img src="" alt="">
                        <input type="file" placeholder="เปลี่ยนรูป">
                    </td>
                    <td>
                        <h4>ฟหกไกห</h4>
                        <input type="text" name="" id="" placeholder="แก้ไขชื่อ">
                    </td>
                    <td>
                        <h4>62651</h4>
                        <input type="number" name="" id="" placeholder="แก้ไขจำนวน">
                    </td>
                    <td><a href=""><button class="edit">บันทึก</button></a></td>
                    <td><a href=""><button class="delete">ลบข้อมูล</button></a></td>
                </tr>
            </thead>
        </table>
    </div>



</body>
<script src="./js/admin.js"></script>

</html>