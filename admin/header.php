<?php
session_start();
include 'helper/config.php';
if (!isset($_SESSION['username'])) {
    header('Location: ' . $hostname . 'admin/index.php');
}
$page_name = basename($_SERVER['PHP_SELF']);
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
    <link rel="icon" type="image/x-icon" href="images/<?php echo $favicon ?>">
    <title>
        <?php echo $website_name ?> | Admin Panel
    </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- HEADER -->
    <div id="header-admin">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-2">
                    <?php
                    include 'helper/config.php';
                    // SQL Query Enter for Table Data
                    $sql_1 = "SELECT * FROM setting";
                    $result_1 = mysqli_query($conn, $sql_1) or die('Query Unsuccessful.');
                    if (mysqli_num_rows($result_1) > 0) {
                        while ($row_1 = mysqli_fetch_assoc($result_1)) {
                            if (empty($row_1['logo'])) {
                                echo '<a href="post.php"> <h1>' . $row_1['website_name'] . '</h1></a>';
                            } else {
                                echo '<a href="post.php" id="logo"><img src="images/' . $row_1['logo'] . '"' . ' width="400"
                                height="100" alt=' . $row_1['logo'] . '></a>';
                            }
                        }
                    } ?>
                </div>
                <!-- /LOGO -->
                <!-- LOGO-Out -->
                <div class="col-md-offset-6  col-md-4 d-flex">
                    <h3 class="text-white">Hello,
                        <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>
                    </h3>
                    <a href="logout.php" class="admin-logout">logout</a>
                </div>
                <!-- /LOGO-Out -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="admin-menubar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="admin-menu">
                        <li>
                            <a class='<?php echo ($page_name == 'post.php') ? 'active' : '' ?>'
                                href="post.php">Post</a>
                        </li>
                        <?php
                        if ($_SESSION['user_role'] == '1') {
                            ?>
                            <li>
                                <a class='<?php echo ($page_name == 'category.php') ? 'active' : '' ?>'
                                    href="category.php">Category</a>
                            </li>
                            <li>
                                <a class='<?php echo ($page_name == 'users.php') ? 'active' : '' ?>'
                                    href="users.php">Users</a>
                            </li>
                            <li>
                                <a class='<?php echo ($page_name == 'setting.php') ? 'active' : '' ?>'
                                    href="setting.php">Setting</a>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->