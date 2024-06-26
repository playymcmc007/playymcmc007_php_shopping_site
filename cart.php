<!DOCTYPE html>
<html>
<head>
    <title>买东西的网站</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
    <a href="product.php">查看所有商品</a>
    <a href="cart.php">查看购物车</a>
    <a href="profile.php">个人档案</a>
    <a href="logout.php">退出登录</a>
<?php
$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('homework', $conn);
mysql_set_charset('utf8', $conn);

session_start();
$user_id = $_SESSION['user_id'];


$result = mysql_query("SELECT products.name, products.price FROM carts INNER JOIN products ON carts.product_id = products.id WHERE carts.user_id = $user_id");

$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {
    echo "<h2>购物车</h2>";

    while ($row = mysql_fetch_assoc($result)) {
        echo "商品名称：" . $row['name'] . "<br>";
        echo "价格：" . $row['price'] . "<br>";
        echo "<br>";
    }

    echo "<form action='' method='POST'>";
    echo "<input type='submit' name='checkout' value='支付'>";
    echo "</form>";
    echo "<a href='product.php'>回到商品页面</a>";
} else {
    echo "<br>购物车为空<br>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['checkout'])) {

        mysql_query("DELETE FROM carts WHERE user_id = $user_id");

        mysql_close($conn);

        echo "<script>";
        echo "alert('谢谢惠顾！');";
        echo "window.location.href = 'index.php';";
        echo "</script>";
        exit;
    }
}

mysql_close($conn);
?>

</body>
</html>