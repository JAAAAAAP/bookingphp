<?php





?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <?php include "../../plugin/plug.php" ?>

</head>

<body class="bg-slate-100">
    <div class="flex row">
        <div class="flex flex-col sticky top-0 h-screen w-auto">
            <?php include "../component/sidebar.php" ?>
        </div>
        <div class="flex flex-col w-screen">
            <div class="h-auto"><?php include "../component/menu.php" ?></div>

        </div>

    </div>

    <?php echo include "../../plugin/tailwind.php" ?>
</body>

</html>