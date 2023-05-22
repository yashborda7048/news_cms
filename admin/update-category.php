<?php include "header.php";
if ($_SESSION['user_role'] == '0') {
    header('Location: ' . $hostname . 'admin/post.php');
}
if (isset($_POST['sumbit'])) {
    include 'helper/config.php';

    $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
    $sql_1 = "UPDATE category SET 
                category_name = '{$cat_name}'
                WHERE category.category_id = {$cat_id}";
    if (mysqli_query($conn, $sql_1)) {
        header('Location: ' . $hostname . 'admin/category.php');
    } else {
        echo 'Query Failed.';
    }
    mysqli_close($conn);
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php
                $id = $_GET['id'];
                include 'helper/config.php';
                // SQL Query Enter for Table Data
                $sql = "SELECT * FROM category where category_id =  '{$id}'";
                $result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="cat_id" class="form-control"
                                    value="<?php echo $row['category_id'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="cat_name" class="form-control"
                                    value="<?php echo $row['category_name'] ?>" placeholder="" required>
                            </div>
                            <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                        </form>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>