<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Posts</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-post.php">add post</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        include 'helper/config.php';
                        $limit = 5;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($page - 1) * $limit;
                        // SQL Query Enter for Table Data
                        if ($_SESSION['user_role'] == '1') {
                            //  Admin user 
                            $sql = "SELECT
                         post.post_id,
                         post.title,
                         post.category,
                         category.category_name,
                         post.post_date,
                         user.username
                         FROM post
                         LEFT JOIN category ON post.category = category.category_id  
                         LEFT JOIN user ON post.author = user.user_id  
                         ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                            $result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
                        } elseif (($_SESSION['user_role'] == '0')) {
                            // Normal user 
                            $sql = "SELECT
                            post.post_id,
                            post.title,
                            post.category,
                            category.category_name,
                            post.post_date,
                            user.username
                            FROM post
                            LEFT JOIN category ON post.category = category.category_id  
                            LEFT JOIN user ON post.author = user.user_id  
                            WHERE post.author = {$_SESSION['user_id']}
                            ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                            $result = mysqli_query($conn, $sql) or die('Query Unsuccessful.');
                        }
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td class='id'>
                                        <?php echo $row['post_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['title'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['category_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['post_date'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['username'] ?>
                                    </td>
                                    <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id'] ?>'><i
                                                class='fa fa-edit'></i></a></td>
                                    <td class='delete'> <a
                                            href='delete-post.php?id=<?php echo $row['post_id']; ?>&category=<?php echo $row['category']; ?>'>
                                            <i class='fa fa-trash-o text-danger'></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo "<tr>
                                <td colspan='7' class='text-center'>
                                <h3>Add Post</h3>
                                </td> 
                                </tr>";
                        } ?>
                    </tbody>
                </table>
                <?php
                if ($_SESSION['user_role'] == '1') {
                    $sql_1 = "SELECT * FROM post";
                } elseif ($_SESSION['user_role'] == '0') {
                    $sql_1 = "SELECT * FROM post WHERE post.author = {$_SESSION['user_id']}";
                }
                $result_1 = mysqli_query($conn, $sql_1) or die("Query Failed.");
                if (mysqli_num_rows($result_1) > 0) {
                    $total_records = mysqli_num_rows($result_1);
                    $total_page = ceil($total_records / $limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if ($page > 1) {
                        echo "<li><a href='post.php?page=" . ($page - 1) . "'>Prev</a></li>";
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $active = 'active';
                        } else {
                            $active = '';
                        }
                        echo "<li class='{$active}'><a href='post.php?page={$i}'>{$i}</a></li>";
                    }
                    if ($total_page > $page) {
                        echo "<li><a href='post.php?page=" . ($page + 1) . "'>Next</a></li>";
                    }
                    echo "</ul>";
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>