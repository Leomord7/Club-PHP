<?php
require('../config/database.php');

$id = $_GET['id'];
$status = $_GET['status'];

mysqli_query(
    $conn,
    "UPDATE membership_registrations
     SET status='$status'
     WHERE id='$id'"
);

header("Location: ../admin/index.php?viewmember");
exit;
?>