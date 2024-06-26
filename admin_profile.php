<!DOCTYPE html>
<html>
<head>
    <title>管理员档案</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
	<h2>管理员档案</h2>

<?php
session_start();

$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('homework', $conn);

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];

$result = mysql_query("SELECT * FROM admins WHERE id = $admin_id");
$admin = mysql_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPassword = $_POST['new_password'];

    mysql_query("UPDATE admins SET password = '$newPassword' WHERE id = $admin_id");

    header("Location: index.php");
    exit();
}

mysql_close($conn);
?>


    <h1>管理员档案</h1>

    <h3>管理员信息：</h3>
    <p>用户名: <?php echo $admin['username']; ?></p>

    <h3>修改密码：</h3>
    <form action="" method="POST">
        <input type="password" name="new_password" placeholder="新密码" required><br>
        <input type="submit" value="更新密码">
    </form>
</body>
</html>
