<?php
session_start();
$_SESSION["role"] == "1" ? " " :  header("Location:/jaa/bookingphp/public/index.php") . exit;
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <?php include_once "../../plugin/plug.php" ?>

</head>

<body class="bg-slate-100">

    <div class="flex  justify-center fixed top-0 absolute w-screen h-screen z-50 bg-gray-900/50 hidden" id="loading-spinner">
        <span class="loading top-0 loading-dots loading-lg text-white "></span>
    </div>

    <div class="flex row">
        <div class="flex flex-col mr-20 h-screen w-auto">
            <?php include_once "../component/sidebar.php" ?>
        </div>
        <div class="flex flex-col w-screen">
            <div class="h-auto"><?php include_once "../component/menu.php" ?></div>

            <?php
            if (isset($_GET['pt']) && $_GET['pt'] == "upload") {
                include_once "./upload.php";
            }
            elseif (isset($_GET["pt"]) && $_GET["pt"] == "status") {
                include_once "./status.php";
            }
            elseif (isset($_GET["pt"]) && $_GET["pt"] == "history") {
                include_once "./history.php";
            }
            else {
                include_once "./status.php";
            }
            ?>
        </div>

    </div>

    <?php echo include_once "../../plugin/tailwind.php" ?>
</body>

</html>