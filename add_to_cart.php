<?php
$conn = mysql_connect('localhost', 'root', '');
mysql_select_db('homework', $conn);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $user_id = $_POST['user_id'];

        mysql_query("INSERT INTO carts (user_id, product_id) VALUES ('$user_id', '$product_id')");

        header('Location: cart.php');
        exit;
    }
}

mysql_close($conn);
?>
