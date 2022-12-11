<?php  
session_start();
include('../../connect/db_conn.php');
$id=$_SESSION['id'];
mysqli_query($conn,"update user_log set logout_time = NOW() where user_id = '$id'");
session_unset();
session_destroy();

header("Location: ../../index.php");
