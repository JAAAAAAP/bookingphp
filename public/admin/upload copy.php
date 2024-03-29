<?php
session_start();
require "../../controller/photo.php";
require('../../controller/user.php');
$dbcon = new User;
$photo = new photo;
$targetDir = "./img/";



if (isset($_POST['submit'])) {
    $photoname = ($_POST['name']);
    $amount = ($_POST['amount']);
    if (!empty($_FILES["fileupload"]["name"])) {
        $fileName = basename($_FILES["fileupload"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['fileupload']['tmp_name'], $targetFilePath)) {
                $insert = $photo->callphoto($photoname, $amount, $fileName);
                if ($insert) {
                    echo "<script>window.location.href='upload.php';</script>";
                } else {
                    echo "<script>alert('มีบางอย่างผิดพลาด');</script>";
                    echo "<script>window.location.href='upload.php';</script>";
                }
            } else {
                echo "<script>alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์');</script>";
                echo "<script>window.location.href='upload.php';</script>";
            }
        } else {
            echo "<script>alert('อัพโหลดได้แค่ไฟล์ JPG, JPEG, PNG');</script>";
            echo "<script>window.location.href='upload.php';</script>";
        }
    } else {
        echo "<script>alert('กรุณาเลือกรูป');</script>";
        echo "<script>window.location.href='upload.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>

    <link rel="stylesheet" href="css/upload.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> -->
</head>

<body>
    <!-- body -->
    <!-- sidebar -->
    <?php include("./component/sidebar.php"); ?>
    <!-- แบบฟอร์ม -->
    <div class="form-text">
        <h3>เพิ่มข้อมูล</h3>
    </div>
    <div class="form-container">
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="fileupload" accept="image/jpg, image/png ,image/jpeg" required>
            <input type="text" style="padding-left: 5px;" name="name" placeholder="ชื่อสิ่งของ" required>
            <input type="number" style="padding-left: 5px;" name="amount" min="0" placeholder="จำนวน" required>
            <button type="submit" name="submit">เพิ่มข้อมูล</button>
        </form>
    </div>


    <!-- ตารางแสดงข้อมูลของ -->
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
                $sql = $photo->fecthphoto();
                $i = 1;
                $n = 1;
                if ($sql->num_rows > 0) {
                    while ($row = $sql->fetch_assoc()) {
                        $imgUrl = './img/' . $row['img'];
                ?>
                        <tr>
                            <td>
                                <h4>
                                    <?php echo $i++;?>
                                </h4>
                            </td>
                            <td><img src="<?php echo $imgUrl ?>" alt=""></td>
                            <td>
                                <h4><?= $row['name'] ?></h4>
                            </td>
                            <td>
                                <h4><?= $row['amount'] ?></h4>
                            </td>
                            <td><a href="./update.php?update=<?php echo $row['p_id'] ?>&no=<?php echo $n++ ?>"><button class="edit">แก้ไขข้อมูล</button></a></td>
                            <td><a href="../controller/photo.php?del=<?php echo $row['p_id'] ?>&img=<?php echo $row['img'] ?>"><button class="delete">ลบข้อมูล</button></a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </thead>
        </table>
    </div>



</body>

</html>