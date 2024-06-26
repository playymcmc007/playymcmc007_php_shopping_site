<!DOCTYPE html>
<html>
<head>
    <title>买东西的网站</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
	<h2>我的档案</h2>
    <a href="product.php">查看所有商品</a>
    <a href="cart.php">查看购物车</a>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('homework', $conn);
mysql_set_charset('utf8', $conn);

$result = mysql_query("SELECT * FROM users WHERE id = $user_id");
$row = mysql_fetch_assoc($result);

if ($row) {
    echo "<br>用户名：" . $row['username'] . "<br>";
    echo "邮箱：" . $row['email'] . "<br>";
    echo "地址：" . $row['address'] . "<br>";
    echo "<br><a href='edit_profile.php'>修改个人信息</a>	";
} else {
    echo "用户不存在";
}
 
mysql_close($conn);
?>
<a href="index.php">返回主页</a>

</body>
</html>
