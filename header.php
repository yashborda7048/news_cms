<?php
include 'helper/config.php';
$file_name = basename($_SERVER['PHP_SELF']);

switch ($file_name) {
    case 'single.php':
        if (isset($_GET['id'])) {
            $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
            $result_title = mysqli_query($conn, $sql_title) or die('Query Unsuccessful.');
            $row_title = mysqli_fetch_assoc($result_title);
            $heading_title = " | " . $row_title['title'];
        } else {
            $heading_title = ' | No Post Found.';
        }
        break;
    case 'category.php':
        if (isset($_GET['category-id'])) {
            $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['category-id']}";
            $result_title = mysqli_query($conn, $sql_title) or die('Query Unsuccessful.');
            $row_title = mysqli_fetch_assoc($result_title);
            $heading_title = " | " . $row_title['category_name'];
        } else {
            $heading_title = ' | No Post Found.';
        }
        break;
    case 'author.php':
        if (isset($_GET['author-id'])) {
            $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['author-id']}";
            $result_title = mysqli_query($conn, $sql_title) or die('Query Unsuccessful.');
            $row_title = mysqli_fetch_assoc($result_title);
            $heading_title = " | " . $row_title['username'];
        } else {
            $heading_title = ' | No Post Found.';
        }
        break;
    case 'search.php':
        if (isset($_GET['search'])) {
            $heading_title = " | " . $_GET['search'];
        } else {
            $heading_title = ' | No Post Found.';
        }
        break;
    default:
        $heading_title = '';
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php
    $sql_2 = "SELECT * FROM setting";
    $result_2 = mysqli_query($conn, $sql_2) or die('Query Unsuccessful.');
    if (mysqli_num_rows($result_2) > 0) {
        while ($row_2 = mysqli_fetch_assoc($result_2)) {
            if (empty($row_2['website_name'])) {
                $website_name = '';
            } else {
                $website_name = $row_2['website_name'];
            }
            $favicon = $row_2['logo'];
        }
    }
    ?>
    <link rel="icon" type="image/x-icon" href="admin/images/<?php echo $favicon ?>">
    <title>
        <?php
        echo $website_name . $heading_title ?>
    </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class=" col-md-offset-4 col-md-4">
                    <?php
                    include 'helper/config.php';
                    // SQL Query Enter for Table Data
                    $sql_1 = "SELECT * FROM setting";
                    $result_1 = mysqli_query($conn, $sql_1) or die('Query Unsuccessful.');
                    if (mysqli_num_rows($result_1) > 0) {
                        while ($row_1 = mysqli_fetch_assoc($result_1)) {
                            if (empty($row_1['logo'])) {
                                echo '<a href="index.php"> <h1>' . $row_1['website_name'] . '</h1></a>';
                            } else {
                                echo '<a href="index.php" id="logo"><img src="admin/images/' . $row_1['logo'] . '"' . ' width="400"
                                height="100" alt=' . $row_1['logo'] . '></a>';
                            }
                        }
                    } ?>
                </div>
                <!-- /LOGO -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="menu-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class='menu'>
                        <?php
                        include 'helper/config.php';
                        $cat_id = isset($_GET['category-id']) ? $_GET['category-id'] : '';
                        $home_active = ($cat_id == '') ? 'active' : '';
                        echo "<li>
                                <a class='{$home_active}' href='{$hostname}'> Home </a>
                            </li>";
                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($conn, $sql) or die('Query Failed.');
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $active = ($row['category_id'] == $cat_id) ? 'active' : ''; ?>
                                <li>
                                    <a class='<?php echo $active; ?>'
                                        href='category.php?category-id=<?php echo $row['category_id'] ?>'>
                                        <?php echo $row['category_name'] ?>
                                    </a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->