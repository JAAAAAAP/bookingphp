<?php





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
    <div class="flex row">
        <div class="flex flex-col mr-20 h-screen w-auto">
            <?php include_once "../component/sidebar.php" ?>
        </div>
        <div class="flex flex-col w-screen">
            <div class="h-auto"><?php include_once "../component/menu.php" ?></div>

        </div>

    </div>

    <?php echo include_once "../../plugin/tailwind.php" ?>
</body>

</html>