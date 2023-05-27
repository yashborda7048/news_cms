<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>
                    <?php
                    include 'helper/config.php';
                    // SQL Query Enter for Table Data
                    $sql_1 = "SELECT * FROM setting";
                    $result_1 = mysqli_query($conn, $sql_1) or die('Query Unsuccessful.');
                    if (mysqli_num_rows($result_1) > 0) {
                        while ($row_1 = mysqli_fetch_assoc($result_1)) {
                            if (empty($row_1['footer_desc'])) {
                                echo "© Copyright 2023 | " . $row_1['website_name'];
                            } else {
                                echo $row_1['footer_desc'];
                            }
                        }
                    } ?> 
                </span>
            </div>
        </div>
    </div>
</div>
</body>

</html>