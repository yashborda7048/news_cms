<?php
include 'helper/config.php';

if (empty($_FILES['new-image']['name'])) {
    $img = $_POST['old-image'];
} else {
    $errors = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    // $file_ext = strtolower(end(explode('.', $file_name)));
    // $extensions = array('jpeg', 'jpg', 'png');

    // if (in_array($file_ext, $extensions) === false) {
    //     $errors[] = 'This extension file not allowed, Please choose JPG or PNG file.';
    // }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be 2MB or lower.';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, 'upload/' . $file_name);
    } else {
        print_r($errors);
        die();
    }
}

$post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
$title = mysqli_real_escape_string($conn, $_POST['post_title']);
$description = mysqli_real_escape_string($conn, $_POST['postdesc']);
$category = mysqli_real_escape_string($conn, $_POST['category']);

if ($_POST['category'] == $_POST['old-category']) {
    // not change img 
    $sql = "UPDATE post SET title = '{$title}', description = '{$description}', category={$category},post_img= '{$file_name}'
            WHERE post_id = {$post_id}";
    if (mysqli_query($conn, $sql)) {
        header('Location: ' . $hostname . 'admin/post.php');
    } else {
        echo "<div class='alert alert-danger'>Query Failed.</div>";
    }
} else {
    // change img
    $sql = "UPDATE post SET title = '{$title}', description = '{$description}', category={$category},post_img= '{$file_name}'
            WHERE post_id = {$post_id};";
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $sql .= "UPDATE category SET post = post - 1 WHERE category_id = {$_POST['old-category']};";
    $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$_POST['category']};";
    if (mysqli_multi_query($conn, $sql)) {
        header('Location: ' . $hostname . 'admin/post.php');
    } else {
        echo "<div class='alert alert-danger'>Query Failed.</div>";
    }
}



mysqli_close($conn);

?>