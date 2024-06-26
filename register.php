<!DOCTYPE html>
<html>
<head>
    <title>注册页面</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
	<h2>注册</h2>
<?php


$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('homework', $conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $result = mysql_query("SELECT * FROM users WHERE username = '$username'");
    $row = mysql_fetch_assoc($result);

    if ($row) {
        echo "用户名已存在";
    } else {
        mysql_query("INSERT INTO users (username, password, email, address) VALUES ('$username', '$password', '$email', '$address')");
        echo "注册成功";
    }
}

mysql_close($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    header("Location: login.php");
    exit();
	}
	
?>

<form action="" method="POST">
    <input type="text" name="username" placeholder="用户名" required><br>
    <input type="password" name="password" placeholder="密码" required><br>
    <input type="email" name="email" placeholder="邮箱" required><br>
    <input type="text" name="address" placeholder="地址" required><br>
    <input type="submit" value="注册">
</form>

</body>
</html>