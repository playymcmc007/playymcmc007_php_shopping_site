<!DOCTYPE html>
<html>
<head>
    <title>修改档案</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>
	<h2>修改档案</h2>
	
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('homework', $conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    if (!empty($password)) {

        mysql_query("UPDATE users SET email = '$email', address = '$address', password = '$password' WHERE id = $user_id");
    } else {

        mysql_query("UPDATE users SET email = '$email', address = '$address' WHERE id = $user_id");
    }

    echo "个人信息已更新";

    session_destroy();

    header("Location: index.php");
    exit();
}

$result = mysql_query("SELECT * FROM users WHERE id = $user_id");
$row = mysql_fetch_assoc($result);

if ($row) {
    ?>

    <form action="" method="POST">
        邮箱:<input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="邮箱" required><br>
        地址:<input type="text" name="address" value="<?php echo $row['address']; ?>" placeholder="地址" required><br>
		新密码:<input type="password" name="password" placeholder="新密码" required><br>
        <input type="submit" value="保存">
    </form>

    <?php
} else {
    echo "用户不存在";
}

mysql_close($conn);
?>
<a href="profile.php">取消修改(回到档案页面)</a>


</body>
</html>
