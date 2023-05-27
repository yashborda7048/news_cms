<?php include "header.php";
if ($_SESSION['user_role'] == '0') {
    header('Location: ' . $hostname . 'admin/post.php');
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Website Setting</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <?php
                include 'helper/config.php';
                // SQL Query Enter for Table Data
                $sql = "SELECT * FROM setting";
                $result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <form action="update-setting.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Website Name</label>
                                <input type="text" name="website_name" class="form-control" placeholder="Website Name"
                                    value="<?php echo $row['website_name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Website Logo</label>
                                <input type="file" name="new-image" value="<?php echo $row['logo']; ?>">
                                <img src="images/<?php echo $row['logo']; ?>" style="margin-top: 15px;" width="300"
                                    height="100">
                                <input type="hidden" name="old-image" value="<?php echo $row['logo']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Footer Description</label>
                                <textarea name="footer_desc" class="form-control"
                                    placeholder="Footer Description"><?php echo $row['footer_desc']; ?></textarea>
                            </div>
                            <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                        </form>
                    <?php }
                } ?>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>