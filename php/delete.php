<?php
require_once ("connect.php");
global $conn;
$svid = $_GET['kid'];
$xoa_sql = "DELETE FROM table_students WHERE id = '$svid'";
mysqli_query($conn, $xoa_sql);
header("location:list.php"); exit;
?>