<!DOCTYPE html>
<html>
<head>
    <title>管理员登录</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
	<h2>管理员登录</h2>
	
<?php
session_start();

$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('homework', $conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysql_query("SELECT * FROM admins WHERE username = '$username' AND password = '$password'");
    $row = mysql_fetch_assoc($result);

    if ($row) {

        $_SESSION['admin_id'] = $row['id'];
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "用户名或密码错误";
    }
}

mysql_close($conn);
?>

<form action="" method="POST">
    <input type="text" name="username" placeholder="管理员用户名" required><br>
    <input type="password" name="password" placeholder="管理员密码" required><br>
    <input type="submit" value="登录">
</form>
	<br>
	<a href="index.php">返回主页</a>

</body>
</html>