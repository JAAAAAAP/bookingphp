<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');
include_once('../plugin/script.php');

$targetDir = "../public/img/";


if (isset($_POST['submit'])) {
    if (isset($_POST['product_name']) && isset($_POST['amount'])) {
        $product_name = $_POST['product_name'];
        $amount = $_POST['amount'];

        
        $filename = $_FILES['fileupload']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = array('jpg', 'png', 'jpeg');

        if (!in_array($ext, $allowed)) {
            echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'อัพโฟลดได้แค่ไฟล์ JPG PNG JPEG',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        });
                    </script>";
            header("refresh:1.5; url=/jaa/bookingphp/public/admin/upload.php");
        } else {
            $name = explode(".", $filename);
            $ext = $name[1];
            $imgname = round(microtime(true) * 1000);
            $newfilename = $imgname . "." . $ext;

            $tmpname = $_FILES['fileupload']['tmp_name'];
            $moveto = $targetDir . $newfilename;

            if (move_uploaded_file($tmpname, $moveto)) {
                chmod($targetDir . $newfilename, 0777);
                try {
                    $sql = "INSERT INTO products(name,amount,img,upload_time) VALUE (:product_name, :amount, :img ,NOW())";
                    $query = $conn->prepare($sql);
                    $query->bindParam(":product_name", $product_name, PDO::PARAM_STR);
                    $query->bindParam(":amount", $amount, PDO::PARAM_INT);
                    $query->bindParam(":img", $newfilename, PDO::PARAM_STR);
                    $query->execute();
                    echo "<script>window.location.href='/jaa/bookingphp/public/admin/upload.php'</script>";
                    echo $filename;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                icon: 'warning',
                                title: 'มีบางอย่างผิดพลาด',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        });
                    </script>";
                header("refresh:1.5; url=/jaa/bookingphp/public/admin/upload.php");
            }
        }
    } else {
        echo "<script>alert('Please enter both name and amount');</script>";
        echo "<script>window.location.href='/jaa/bookingphp/public/admin/upload.php';</script>";
    }
}
