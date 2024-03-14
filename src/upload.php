<?php
session_start();
require "../controller/upload.php";
require('../controller/user.php');
$dbcon = new User;
$upload = new photo;
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
                $insert = $upload->callphoto($photoname, $amount, $fileName);
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

// body
// sidebar
include("./component/sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>

    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="fileupload" accept="image/jpg, image/png" required>
        <input type="text" name="name" required>
        <input type="number" name="amount" required>
        <button type="submit" name="submit">เพิ่มข้อมูล</button>
    </form>

    <?php
    $sql = $upload->fecthphoto();
    if ($sql->num_rows > 0) {
        while($row = $sql->fetch_assoc()){
            $imgUrl = './img/'.$row['img'];
        ?>
        <img src="<?php echo $imgUrl ?>" alt="" width="200px" class="card-img">
        <h4><?= $row['p_id'] ?></h4>
        <h4><?= $row['name'] ?></h4>
        <h4><?= $row['amount']?></h4>
    <?php
        }
    }
    ?>

    <script src="./js/admin.js"></script>
</body>

</html>