<?php
session_start();
require "../controller/photo.php";
require('../controller/user.php');
$dbcon = new User;
$photo = new photo;
$id = $_GET['update'];

if (isset($_POST['submit'])) {
    $sql = $photo->callid($id);
    $row = $sql->fetch_assoc();
    $file = $_FILES['file']['name'];
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $targetDir = "./img/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (empty($file)) {
        $update = $photo->callupdate($row['p_id'], $name, $amount, $row['img']);
        if (empty($amount)) {
            $update = $photo->callupdate($row['p_id'], $name, $row['amount'], $row['img']);
        }
        if (empty($name)) {
            $update = $photo->callupdate($row['p_id'], $row['name'], $amount, $row['img']);
        }
    }
    if (!empty($file)){
        $filename = basename($file);
        $targetfile = $targetDir . $filename;
        $filetype = pathinfo($targetfile, PATHINFO_EXTENSION);
        if (in_array($filetype, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
                unlink($targetDir . $row['img']);
                $update = $photo->callupdate($row['p_id'], $name, $amount, $filename);
                if (empty($name) && empty($amount)) {
                    $update = $photo->callupdate($row['p_id'], $row['name'], $row['amount'], $filename);
                }
                if (empty($amount)) {
                    $update = $photo->callupdate($row['p_id'], $name, $row['amount'], $filename);
                }
                if (empty($name)) {
                    $update = $photo->callupdate($row['p_id'], $row['name'], $amount, $filename);
                }
            }
        }
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>

    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/update.css">
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
                            <div>ลำดับที่</div>
                        </div>
                    </th>
                    <th>รูป</th>
                    <th>ชื่อ</th>
                    <th>จำนวนคงเหลือ</th>
                    <th>แก้ไขข้อมูล</th>
                    <th>ลบข้อมูล</th>
                </tr>
                <?php
                if (isset($_GET['update'] , $_GET['no'])) {
                    $id = $_GET['update'];
                    $number = $_GET['no'];
                    $sql = $photo->callid($id);
                    if ($sql->num_rows > 0) {
                        while ($row = $sql->fetch_assoc()) {
                            $imgUrl = './img/' . $row['img'];
                ?>
                            <form action="" enctype="multipart/form-data" method="post">
                                <tr>
                                    <td>
                                        <h4><?= $number ?></h4>
                                    </td>
                                    <td>
                                        <img src="<?php echo $imgUrl ?>" alt="">
                                        <div class="form-file">
                                            <h4>เปลี่ยนรูปเป็น</h4>
                                            <input type="file" accept="image/jpg, image/png ,image/jpeg" name="file">
                                        </div>
                                    </td>
                                    <td>
                                        <h4><?= $row['name'] ?></h4>
                                        <div class="form">
                                            <h4>เปลี่ยนชื่อเป็น</h4>
                                            <input type="text" name="name" placeholder="<?= $row['name'] ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <h4><?= $row['amount'] ?></h4>
                                        <div class="form">
                                            <h4>แก้ไขจำนวน</h4>
                                            <input type="number" name="amount" min="0"  value="<?= $row['amount'] ?>" placeholder="<?= $row['amount'] ?>">
                                        </div>
                                    </td>
                                    <td><button name="submit" class="edit">บันทึก</button></td>
                                    <td><a href="../controller/photo.php?del=<?php echo $row['p_id'] ?>&img=<?php echo $row['img'] ?>"><button class="delete">ลบข้อมูล</button></a></td>
                                </tr>
                            </form>
                <?php
                        }
                    }
                }
                ?>

            </thead>
        </table>
    </div>

</body>
<script src="./js/admin.js"></script>

</html>