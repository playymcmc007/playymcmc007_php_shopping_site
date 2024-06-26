<!DOCTYPE html>
<html>
<head>
    <title>买东西的网站</title>
</head>
<body bgcolor="pink" style="text-align:center">
    <h1><a href="index.php" style="background-color:#9999FF">买东西的网站</a></h1>

    <?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        ?>
        欢迎您，<font color="red;"><?php echo $_SESSION['username']; ?></font><br/><br/>
       	<a href="product.php">查看所有商品</a>
        <a href="cart.php">查看购物车</a>
        <a href="profile.php">个人档案</a>
        <a href="logout.php">退出登录</a>
        <?php
    } else {
        ?>
        <a href="product.php">查看所有商品</a>
        <a href="cart.php">查看购物车</a>
        <a href="login.php">登录</a>
        <a href="register.php">注册</a>
        <a href="admin_login.php">管理员登录</a>
        <?php
    }
    ?>
	<br><br>
</body>
</html>
