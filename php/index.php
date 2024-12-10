<?php
require "connect.php";
global $conn;

$fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : null;
$dob = isset($_POST["dob"]) ? $_POST["dob"] : null;
$gender = isset($_POST["gender"]) ? $_POST["gender"] : null;
$hometown = isset($_POST["hometown"]) ? $_POST["hometown"] : null;
$level = isset($_POST["level"]) ? $_POST["level"] : null;
$group = isset($_POST["group"]) ? $_POST["group"] : null;

if(isset($fullname, $dob, $gender, $hometown, $level, $group) && $fullname !== '' && $dob !== '' && $gender !== '' && $hometown !== '' && $level !== '' && $group !== ''){
    $addsql = "INSERT INTO table_students (`fullname`, `dob`, `gender`, `hometown`, `level`, `group`)
               VALUES ('$fullname','$dob','$gender','$hometown','$level','$group')";
    mysqli_query($conn, $addsql);
    $fullname = str_replace('\'', '\\\'', $fullname);
    $hometown = str_replace('\'', '\\\'', $hometown);
    header("location:list.php"); exit;
}
else{
    echo "Nhập đầy đủ thông tin";

}
