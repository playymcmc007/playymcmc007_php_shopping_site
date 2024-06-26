<!DOCTYPE html>
<html>
<head>
    <title>管理员管理面板</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
	<h2>管理面板</h2>
	
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

?>
   
    <a href="admin_edit_profile.php">修改管理员档案</a>
    <a href="admin_edit_product.php">修改商品</a>
	<a href="index.php">返回主页</a>
</body>
</html>
