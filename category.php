<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php include 'helper/config.php';
                    $cat_id = isset($_GET['category-id']) ? $_GET['category-id'] : ''; 
                    $sql_2 = "SELECT * FROM category where category_id =  '{$cat_id}'";
                    $result = mysqli_query($conn, $sql_2) or die('Query Unsuccessful.');
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<h2 style='text-transform: capitalize;' class='page-heading'>" . $row['category_name'] . "</h2>";
                        }};
                    $limit = 5;
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;
                    // SQL Query Enter for Table Data
                    $sql = "SELECT
                        post.post_id,
                        post.title,
                        post.description,
                        post.post_date,
                        post.post_img	,
                        category.category_name,
                        user.username
                        FROM post
                        LEFT JOIN category ON post.category = category.category_id  
                        LEFT JOIN user ON post.author = user.user_id 
                        WHERE post.category = {$cat_id}
                        ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                    $result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>">
                                            <img src="admin/upload/<?php echo $row['post_img'] ?>"
                                                alt="<?php echo $row['post_img'] ?>" height="100%" /></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="inner-content clearfix">
                                            <h3><a style='text-transform: capitalize;' href='single.php?id=<?php echo $row['post_id'] ?>'>
                                                    <?php echo $row['title'] ?>
                                                </a>
                                            </h3>
                                            <div class="post-information">
                                                <span>
                                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                                    <a href='category.php?category-id=<?php echo $row['category'] ?>'>
                                                        <?php echo $row['category_name'] ?>
                                                    </a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <a href='author.php'>
                                                        <?php echo $row['username'] ?>
                                                    </a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php echo $row['post_date'] ?>
                                                </span>
                                            </div>
                                            <p class="description">
                                                <?php echo substr($row['description'], 0, 130) . '...' ?>
                                            </p>
                                            <a class='read-more pull-right'
                                                href='single.php?id=<?php echo $row['post_id'] ?>'>read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else {
                        echo "<div class='text-center'><h3>Not Available Post</h3></div>";
                    }
                    $sql_1 = "SELECT * FROM post  WHERE post.category = {$cat_id}";
                    $result_1 = mysqli_query($conn, $sql_1) or die("Query Failed.");
                    if (mysqli_num_rows($result_1) > 0) {
                        $total_records = mysqli_num_rows($result_1);
                        $total_page = ceil($total_records / $limit);
                        echo "<ul class='pagination admin-pagination'>";
                        if ($page > 1) {
                            echo "<li><a href='category.php?category-id={$cat_id}&page=" . ($page - 1) . "'>Prev</a></li>";
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $page) {
                                $active = 'active';
                            } else {
                                $active = '';
                            }
                            echo "<li class='{$active}'><a href='category.php?category-id={$cat_id}&page={$i}'>{$i}</a></li>";
                        }
                        if ($total_page > $page) {
                            echo "<li><a href='category.php?category-id={$cat_id}&page=" . ($page + 1) . "'>Next</a></li>";
                        }
                        echo "</ul>";
                    } ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>