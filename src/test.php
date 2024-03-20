<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    array_push($_SESSION['cart'], $productId);
}

$productsInCart = $_SESSION['cart'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ระบบตะกร้าสินค้า</h1>
    <div id="product-list">
        <h2>รายการสินค้า</h2>
        <ul>
            <li>สินค้าที่ 1 - ราคา $10 <button onclick="addToCart(1)">เพิ่มในตะกร้า</button></li>
            <li>สินค้าที่ 2 - ราคา $20 <button onclick="addToCart(2)">เพิ่มในตะกร้า</button></li>
            <li>สินค้าที่ 3 - ราคา $30 <button onclick="addToCart(3)">เพิ่มในตะกร้า</button></li>
        </ul>
    </div>
    <div id="cart">
        <h2>ตะกร้าสินค้า</h2>
        <ul>
            <?php foreach ($productsInCart as $productId) : ?>
                <li>สินค้าที่ <?php echo $productId; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <form method="post">
        <input type="hidden" name="product_id" id="product_id_input">
    </form>

    <script>
        function addToCart(productId) {
            document.getElementById('product_id_input').value = productId;
            document.querySelector('form').submit();
        }
    </script>
</body>

</html>