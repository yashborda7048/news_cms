<?php
session_start();
include 'helper/config.php';
if (isset($_SESSION['username'])) {
    header('Location: ' . $hostname . 'admin/post.php');
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <?php echo $website_name ?> | Admin Login
    </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                <?php
                    include 'helper/config.php';
                    // SQL Query Enter for Table Data
                    $sql_1 = "SELECT * FROM setting";
                    $result_1 = mysqli_query($conn, $sql_1) or die('Query Unsuccessful.');
                    if (mysqli_num_rows($result_1) > 0) {
                        while ($row_1 = mysqli_fetch_assoc($result_1)) {
                            if (empty($row_1['logo'])) {
                                echo '<h1>' . $row_1['website_name'] . '</h1>';
                            } else {
                                echo '<img src="images/' . $row_1['logo'] . '"' . ' width="400"
                                height="100" alt=' . $row_1['logo'] . '>';
                            }
                        }
                    } ?>
                    <h3 class="heading">Admin</h3>
                    <!-- Form Start -->
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" required>
                        </div>
                        <input type="submit" name="login" class="btn btn-primary" value="login" />
                    </form>
                    <?php
                    if (isset($_POST['login'])) {
                        include 'helper/config.php';
                        $username = mysqli_real_escape_string($conn, $_POST['username']);
                        $password = md5($_POST['password']);

                        $sql = "SELECT user_id,username, first_name, last_name, role FROM user where username = '{$username}' AND password = '{$password}'";
                        $result = mysqli_query($conn, $sql) or die('Query Failed.');
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['first_name'] = $row['first_name'];
                                $_SESSION['last_name'] = $row['last_name'];
                                $_SESSION['user_id'] = $row['user_id'];
                                $_SESSION['user_role'] = $row['role'];
                                header('Location: ' . $hostname . 'admin/post.php');
                            }
                        } else {
                            echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
                        }
                    }
                    ?>
                    <!-- /Form  End -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>