<!DOCTYPE html>
<html>
<head>
    <title>登录页面</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
	<h2>登录</h2>
	
<?php
$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('homework', $conn);
mysql_set_charset('utf8', $conn);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'");

    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        header('Location: index.php');
        exit;
    } else {
        echo "用户名或密码错误！";
    }
}

mysql_close($conn);
?>

    <form action="" method="POST">
        <input type="text" name="username" placeholder="用户名" required><br><br>
        <input type="password" name="password" placeholder="密码" required><br><br>
        <input type="submit" value="登录">
    </form>
	<a href="index.php">返回主页</a>
</body>
</html>