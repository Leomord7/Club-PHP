<?php
require('../config/database.php');

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM membership_registrations
     WHERE id='$id'"
);

header("Location: ../admin/index.php?viewmember");
exit;
?>