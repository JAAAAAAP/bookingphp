<?php
session_start();
require "../controller/photo.php";
require "../controller/user.php";
$dbcon = new User;
$photo = new photo;



// body
// sidebar
include ("./component/sidebar.php")
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>

    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>

<script src="./js/admin.js"></script>
</body>

</html>