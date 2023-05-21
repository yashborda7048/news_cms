<?php
include 'helper/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM `user` WHERE `user`.`user_id` = {$id}";
if (mysqli_query($conn, $sql)) {
    header('Location: ' . $hostname . 'admin/users.php');
} else {
    echo "<p class='text-center text-danger'>Can't not delete user.</p>";
}
mysqli_close($conn);
?>