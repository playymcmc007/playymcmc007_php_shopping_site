<!DOCTYPE html>
<html>
<head>
    <title>编辑商品</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
	<h2>编辑商品</h2>
	
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = mysql_connect('localhost', 'root', '');
mysql_set_charset('utf8', $conn);
mysql_select_db('homework', $conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $price = $_POST['price'];

    mysql_query("UPDATE products SET price = '$price' WHERE name = '$name'", $conn);

    header("Location: admin_dashboard.php"); 
    exit();
}

mysql_close($conn);
?>


    <form action="" method="POST" accept-charset="UTF-8">

        <label for="name">商品名称:</label>
        <input type="text" id="name" name="name" placeholder="商品名称" required><br><br>

        <label for="price">商品价格:</label>
        <input type="number" id="price" name="price" step="0.01" placeholder="商品价格" required><br><br>

        <input type="submit" value="保存">
    </form>
	<br>
	
	<a href="index.php">返回主页</a>
</body>
</html>
