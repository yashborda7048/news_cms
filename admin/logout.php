<?php
include 'helper/config.php';
session_start();
session_unset();
session_destroy();
header('Location: ' . $hostname . 'admin/index.php');
?>