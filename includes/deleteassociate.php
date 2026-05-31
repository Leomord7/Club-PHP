<?php
require('../config/database.php');

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM associate_registrations
     WHERE id='$id'"
);

header("Location: ../admin/index.php?viewassociate");
exit;
?>