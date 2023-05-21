<?php
if ($_SESSION['user_role'] == '0') { 
    header('Location: ' . $hostname . 'admin/post.php');
}
include 'helper/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM `category` WHERE `category`.`category_id` = {$id}";
if (mysqli_query($conn, $sql)) {
    header('Location: ' . $hostname . 'admin/category.php?page=1');
} else {
    echo "<p class='text-center text-danger'>Can't not delete Category.</p>";
}
mysqli_close($conn);
?>