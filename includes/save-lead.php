<?php
require_once '../config/database.php';

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$user_type = $_POST['user_type'];

$sql = "INSERT INTO website_leads
(name,mobile,user_type)
VALUES
('$name','$mobile','$user_type')";

mysqli_query($conn,$sql);

header("Location:../index.php");

exit;
?>