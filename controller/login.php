
<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');
include_once('../plugin/script.php');


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        $sql = "SELECT * FROM user WHERE user = :user AND password = :password";
        $checkdata = $conn->prepare($sql);
        $checkdata->bindParam(":user", $username, PDO::PARAM_STR);
        $checkdata->bindParam(":password", $password, PDO::PARAM_STR);
        $checkdata->execute();
        $row = $checkdata->fetch(PDO::FETCH_ASSOC);

        if ($checkdata->rowCount() > 0) {
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['user'] = $row['user'];
            $_SESSION['role'] = $row['role'];

            if ($_SESSION['role'] == 0) {

                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'เข้าสู่ระบบสำเร็จ',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    });
                </script>";
                header("refresh:1.5; url=/jaa/bookingphp/public/index.php");
            }

            if ($_SESSION['role'] == 1) {
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'เข้าสู่ระบบสำเร็จ',
                            timer: 1500,
                            showConfirmButton: false
                        });
                });
                </script>";
                header("refresh:1.5; url=/jaa/bookingphp/public/admin/admin.php");
            }
        } else {
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'มีบางอย่างไม่ถูกต้อง',
                        timer: 1500,
                        showConfirmButton: false
                    });
                });
                </script>";
            header("refresh:1.5; url=/jaa/bookingphp/public/index.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
