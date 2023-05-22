<?php
include 'helper/config.php';
$id = $_GET['id'];
$category = $_GET['category'];

$sql_1 = "SELECT * FROM post WHERE post_id = $id";
$result = mysqli_query($conn, $sql_1) or die('Query Failed.');
$row = mysqli_fetch_assoc($result);

unlink('upload/' . $row['post_img']);

$sql = "DELETE FROM post WHERE post.post_id = {$id};";
$sql .= "UPDATE category SET post = post - 1 WHERE category_id = {$category};";
if (mysqli_multi_query($conn, $sql)) {
    header('Location: ' . $hostname . 'admin/post.php');
} else {
    echo "<p class='text-center text-danger'>Can't not delete Post.</p>";
}
mysqli_close($conn);
?>