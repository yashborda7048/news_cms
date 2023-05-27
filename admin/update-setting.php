<?php
include 'helper/config.php';
if (empty($_FILES['new-image']['name'])) {
    $file_name = $_POST['old-image'];
} else {
    $errors = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];

    if ($file_size > 2097152) {
        $errors[] = 'File size must be 2MB or lower.';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, 'images/' . $file_name);
    } else {
        print_r($errors);
        die();
    }
}

if (isset($_POST['save'])) {

    $website_name = mysqli_real_escape_string($conn, $_POST['website_name']);
    $footer_desc = mysqli_real_escape_string($conn, $_POST['footer_desc']);

    $sql_1 = "UPDATE setting SET website_name = '{$website_name}', logo = '{$file_name}', footer_desc = '{$footer_desc}' WHERE 1";
    if (mysqli_query($conn, $sql_1)) {
        header('Location: ' . $hostname . 'admin/setting.php');
    } else {
        echo 'Query Failed.';
    }
    mysqli_close($conn);
}
?>