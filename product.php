<!DOCTYPE html>
<html>
<head>
    <title>商品列表</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
	<h2>商品列表</h2>
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

$result = mysql_query("SELECT * FROM products");

while ($row = mysql_fetch_assoc($result)) {
	
    echo "<br>商品名称：" . $row['name'] . "<br>";
    echo "价格：" . $row['price'] . "<br>";
    echo "<form action='add_to_cart.php' method='POST'>";
    echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
    echo "<input type='hidden' name='user_id' value='" . $user_id . "'>";
    echo "<input type='submit' name='add_to_cart' value='添加到购物车'>";
    echo "</form>";
    echo "<br>";
}

mysql_close($conn);
?>

</body>
</html>