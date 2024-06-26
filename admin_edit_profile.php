<!DOCTYPE html>
<html>
<head>
    <title>修改管理员档案</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
	<h2>管理员编辑档案</h2>
	
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];

$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('homework', $conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysql_query("UPDATE admins SET username = '$username', password = '$password' WHERE id = $admin_id");
    echo "个人信息已更新";
}

$result = mysql_query("SELECT * FROM admins WHERE id = $admin_id");
$row = mysql_fetch_assoc($result);

if ($row) {
    ?>

    <form action="" method="POST">
        <input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="用户名" required><br>
        <input type="password" name="password" value="<?php echo $row['password']; ?>" placeholder="密码" required><br>
        <input type="submit" value="保存">
    </form>

    <?php
} else {
    echo "管理员不存在";
}

mysql_close($conn);
?>
<br/>
<a href="index.php">返回主页</a>
</body>
</html>